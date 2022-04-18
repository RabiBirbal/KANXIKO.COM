<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Buyer;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use App\Mail\BuyerEmailVerificationMail;
use App\Models\BuyerInfo;
use App\Models\PasswordReset;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;
use App\Mail\ResetPasswordMail;
use App\Mail\PasswordChangedSuccessful;

class BuyerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Session::has('admin')){
            $admin=User::find(Session::get('admin')['id']);
        }
        elseif(Session::has('buyer_department')){
            $admin=User::find(Session::get('buyer_department')['id']);
        }
        else{
            $admin=User::find(Session::get('seller_department')['id']);
        }
        $product= Product::join('buyers', 'buyers.product_id', '=', 'products.id')
        ->orderby('product_id','desc')
        ->get();
        // dd($product);
        return view('admin/order/buyer',compact("product","admin"));
    }

    public function buyerInviteRegister($refer)
    {   
        $refercode=$refer;
        return view('frontend/buyer/buyer-invite-register',compact("refercode"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules=[
              'email' => 'required|string|email|unique:buyer_infos',
             ];
           $v= Validator::make($request->all(),$rules);
           if($v->fails())
              {
                Session::put('error','Email has alredy taken');
                return back();
              }
            else{
                if($request->refer_code){
                    $buyer=BuyerInfo::where('refer_code',$request->refer_code)->first();
                    if($buyer){
                        $data = new BuyerInfo;
                        $data->first_name=$request->fname;
                        $data->last_name=$request->lname;
                        $data->password=Hash::make($request->password);
                        $data->email=$request->email;
                        $data->email_verification_code=Str::random(40);
                        $data->is_verified="0";
                        $data->contact=$request->mobile;
                        $data->address=$request->address;
                        $data->province=$request->province;
                        $data->district=$request->district;
                        $data->refer_code=Str::random(6);
                        $data->refer_id=$buyer->id;

                        $data->save();
                        Mail::to($request->email)->send(new BuyerEmailVerificationMail($data));
                        Session::put('success','Registration has been done successfully.');
                        return redirect()->route('index');
                    }
                    else{
                        Session::put('error','Referal code is not valid');
                        return back();
                    }
                }
                else{
                    $data = new BuyerInfo;
                    $data->first_name=$request->fname;
                    $data->last_name=$request->lname;
                    $data->password=Hash::make($request->password);
                    $data->email=$request->email;
                    $data->email_verification_code=Str::random(40);
                    $data->is_verified="0";
                    $data->contact=$request->mobile;
                    $data->address=$request->address;
                    $data->province=$request->province;
                    $data->district=$request->district;
                    $data->refer_code=Str::random(6);

                    $data->save();
                    Mail::to($request->email)->send(new BuyerEmailVerificationMail($data));
                    Session::put('success','Registration has been done successfully.');
                    return redirect()->route('index');
                }
            }
    }

    public function verify_email($verification_code){
        $buyer=BuyerInfo::where('email_verification_code',$verification_code)->first();
        if(!$buyer){
            Session::put('error','Invalid URL saas');
            return redirect()->route('buyer-register');
        }
        else{
            if($buyer->is_verified=="1"){
                Session::put('error','Email already Verified');
                return redirect()->route('index');
            }
            else{
                if($buyer->refer_id){
                    $buyer1=BuyerInfo::find($buyer->refer_id);
                    $buyer->is_verified="1";
                    $buyer->points = "50";
                    $buyer->update();

                    $buyer1->points = "50";
                    $buyer1->update();

                    Session::put('success','Email has been verified successfully.');
                    return redirect()->route('index');
                }
                else{
                    $buyer->is_verified="1";
                    $buyer->update();

                    Session::put('success','Email has been verified successfully.');
                    return redirect()->route('index');
                }
            }
        }
     }

     public function forgetPassword(){
         return view('frontend.buyer.forget-password');
     }

     public function resetPassword(Request $request){
        $buyer=BuyerInfo::where('email',$request->email)->first();
        if(!$buyer){
            Session::put('error','The email address that you entered is not valid. Please check the email address.');
            return back();
        }
        else{
            $data= new PasswordReset;
            $data->email=$request->email;
            $data->token=Str::random(40);
            $data->status="1";

            $data->save();
            Mail::to($request->email)->send(new ResetPasswordMail($data));
            Session::put('success','Password reset link has been sent to your email address');
            return back();
        }
    }

    public function getResetPassword($token){
        $resetPassword=PasswordReset::where('token',$token)->first();
        if(!$resetPassword){
            Session::put('error','Invalid URL');
            return redirect()->route('index');
        }
        else{
            if($resetPassword->status == 0){
                Session::put('error','Sorry!! Reset link is expire.');
                return redirect()->route('index');
            }
            else{
                return view('frontend/buyer/reset-password',compact("resetPassword"));
            }
        }
     }

     public function changePassword(Request $request){
        $buyer = BuyerInfo::where('email',$request->email)->first();
        $rules=[
            'password' => 'required|string|min:6',
            'cpassword' => 'required|string|min:6|same:password',
           ];
         $v= Validator::make($request->all(),$rules);
         if($v->fails())
            {
              Session::put('error','Password Error Occured');
              return back();
            }
        else{
            $buyer->password=Hash::make($request->password);

            $buyer->update();

            $data=PasswordReset::find($request->id);
            $data->status="0";
            $data->update();
            $seller=$buyer;
            Mail::to($request->email)->send(new PasswordChangedSuccessful($seller));
            Session::put('success','Password has been changed successfully');
            return redirect()->route('index');
        }
     }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        if(Session::has('admin')){
            $admin=User::find(Session::get('admin')['id']);
        }
        elseif(Session::has('buyer_department')){
            $admin=User::find(Session::get('buyer_department')['id']);
        }
        else{
            $admin=User::find(Session::get('seller_department')['id']);
        }
        $buyer = BuyerInfo::orderby('id','desc')->get();

        return view('admin/buyer/buyer-detail',compact("admin","buyer"));
    }

    public function getRegister(){
        return view('frontend/buyer/buyer-register');
    }

    public function getChangePassword($id)
    {   
        $id1 = Crypt::decryptString($id);
        $buyer= BuyerInfo::find($id1);

        return view('frontend/buyer/change-password',compact("buyer"));
    }

    public function PostChangePassword(Request $request)
    {   
        $buyer= BuyerInfo::find($request->id);
        if(!hash::check($request->current_password,$buyer->password)){
            Session::put('error','Current password didnt matched');
            return back();
        }
        else{
            if(!hash::check($request->password,$buyer->password)){
                $rules=[
                    'password' => 'required|string|min:6',
                    'cpassword' => 'required|string|min:6|same:password',
                   ];
                 $v= Validator::make($request->all(),$rules);
                 if($v->fails())
                    {
                      Session::put('error','Password Error Occured');
                      return back();
                    }
                else{
                    $buyer->password=Hash::make($request->password);

                    $buyer->update();
                    Session::forget('buyer');
                    $seller=$buyer;
                    Mail::to($request->email)->send(new PasswordChangedSuccessful($seller));
                    Session::put('success','password Changed Successfull');
                    return redirect()->route('index');
                }
            }
            else{
                Session::put('error','Current password and new password could not be same');
                return back();
            }
        }
    }

    public function myOrder(){
        $buyer=BuyerInfo::find(Session::get('buyer')['id']);
        $order=Product::join('buyers', 'buyers.product_id', '=', 'products.id')
        ->where('buyer_email',Session::get('buyer')['email'])
        ->orderby('products.id','desc')
        ->get();
        return view('frontend.order.order-detail',compact("buyer","order"));
    }

    public function viewDetail(){
        $id=Session::get('buyer')['id'];
        $buyer=BuyerInfo::find($id);
        return view('frontend/buyer/buyer-detail',compact("buyer"));
    }

    public function view(){
        return view('frontend/user/register-yourself');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $id=Session::get('buyer')['id'];
        $buyer=BuyerInfo::find($id);

        return view('frontend/buyer/buyer-edit',compact("buyer"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $buyer = BuyerInfo::find($request->id);
        $buyer->first_name=$request->fname;
        $buyer->last_name=$request->lname;
        $buyer->password=Hash::make($request->password);
        $buyer->contact=$request->mobile;
        $buyer->address=$request->address;
        $buyer->province=$request->province;
        $buyer->district=$request->district;

        $buyer->update();
        Session::put('success','Profile updated Successfully');
        return redirect()->route('buyer-profile-detail');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $buyer = BuyerInfo::find($request->id);
        $buyer->delete();
        Session::put('success','Profile deleted Successfully');
        return back();
    }
}
