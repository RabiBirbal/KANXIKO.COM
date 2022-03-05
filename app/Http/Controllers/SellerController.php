<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use App\Mail\EmailVerificationMail;
use App\Mail\RegistrationSuccessful;
use App\Mail\ReferSuccessfullMail;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;
use App\Models\Seller;
use App\Models\SellerInfo;
use App\Mail\PasswordChangedSuccessful;
use App\Models\User;
use App\Models\Wallet;

class SellerController extends Controller
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
        $seller= Seller::orderby('id','desc')->get();
        return view('admin/user/seller',compact("seller","admin"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function view()
    {
        return view('frontend/user/registration');
    }

    public function inviteRegister($refer)
    {   
        $refercode=$refer;
        return view('frontend/user/invite-register',compact("refercode"));
    }

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
            // 'fname' => 'required|string',
            // 'lname' => 'required|string',
              'email' => 'required|string|email|unique:sellers',
            //   'mobile' => 'required|string|min:10|max:10',
            //   'password' => 'required|string|min:6',
            //   'cpassword' => 'required|string|min:6|same:password',
            //   'address' => 'required|string',
            //   'city' => 'required|string',
            //   'province' => 'required|string',
            //   'district' => 'required|string',
            //   'company_name' => 'required|string',
            //   'company_address' => 'required|string',
             ];
           $v= Validator::make($request->all(),$rules);
           if($v->fails())
              {
                Session::put('error','Email has alredy taken');
                return back();
              }
              else{
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
                    if($request->refer){
                        $seller=Seller::where('refer_code',$request->refer)->first();
                        if($seller){
                            $data= new Seller;
                            $data->first_name=$request->fname;
                            $data->last_name=$request->lname;
                            $data->wallet_points='50';
                            $data->email=$request->email;
                            $data->password=Hash::make($request->password);
                            $data->mobile=$request->mobile;
                            $data->status="1";
                            $data->email_verification_code=Str::random(40);
                            $data->refer_id=$seller->id;
                            $data->refer_code=Str::random(6);

                            $data->save();

                            $wallet = new Wallet;
                            $wallet->email=$data->email;
                            $wallet->action="Credited";
                            $wallet->points="50";
                            $wallet->remarks="50 points has been credited to your wallet due to using referal code";
                            $wallet->save();

                            $info = new SellerInfo;
                            $info->seller_id=$data->id;
                            $info->address=$request->address;
                            $info->city=$request->city;
                            $info->province=$request->province;
                            $info->district=$request->district;
                            $info->company_name=$request->company_name;
                            $info->company_address=$request->company_address;
                            $info->landline=$request->landline;
                            $info->secondary_email=$request->secondary_email;
                            $info->terms_condition=$request->terms_condition;

                            $info->save();

                            Mail::to($request->email)->send(new EmailVerificationMail($data));
                            Session::put('success','Registration has been done successfully. Please Check your email address for verification process.');
                            return redirect()->route('user-login');
                        }
                        else{
                            Session::put('error','Referal code is not valid');
                            return back();
                        }
                    }
                    else{
                        $data= new Seller;
                        $data->first_name=$request->fname;
                        $data->last_name=$request->lname;
                        $data->wallet_points='0';
                        $data->email=$request->email;
                        $data->password=Hash::make($request->password);
                        $data->mobile=$request->mobile;
                        $data->status="1";
                        $data->email_verification_code=Str::random(40);
                        $data->refer_code=Str::random(6);
                        
                        $data->save();

                        $info = new SellerInfo;
                        $info->seller_id=$data->id;
                        $info->address=$request->address;
                        $info->city=$request->city;
                        $info->province=$request->province;
                        $info->district=$request->district;
                        $info->company_name=$request->company_name;
                        $info->company_address=$request->company_address;
                        $info->landline=$request->landline;
                        $info->secondary_email=$request->secondary_email;
                        $info->terms_condition=$request->terms_condition;

                        $info->save();

                        Mail::to($request->email)->send(new EmailVerificationMail($data));
                        Session::put('success','Registration has been done successfully. Please Check your email address for verification process.');
                        return redirect()->route('user-login');
                    }
                }
              }
    }

    public function verify_email($verification_code){
        $seller=Seller::where('email_verification_code',$verification_code)->first();
        if(!$seller){
            Session::put('error','Invalid URL');
            return redirect()->route('user-register');
        }
        else{
            if($seller->email_verified_at){
                Session::put('error','Email already Verified');
                return redirect()->route('user-login');
            }
            else{
                if($seller->refer_id){
                    $seller1=Seller::find($seller->refer_id);
                    $wallet1 = new Wallet;
                    $wallet1->email=$seller1->email;
                    $wallet1->action="Credited";
                    $wallet1->points="50";
                    $wallet1->remarks="50 points has been credited to your wallet as your friend has completed registration with your referal code";
                    $wallet1->save();

                    $seller1->wallet_points=$seller1->wallet_points + 50;
                    $seller1->update();
                    Mail::to($seller1->email)->send(new ReferSuccessfullMail($seller1));  
                    
                    $seller->email_verified_at=\Carbon\Carbon::now();
                    $seller->update();
                    Session::put('success','Email Verified Successfully');
                    Mail::to($seller->email)->send(new RegistrationSuccessful($seller));
                    return redirect()->route('user-login');
                }
                else{
                    $seller->email_verified_at=\Carbon\Carbon::now();
                    $seller->update();
                    Session::put('success','Email Verified Successfully');
                    Mail::to($seller->email)->send(new RegistrationSuccessful($seller));
                    return redirect()->route('user-login');
                }
            }
        }
     }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function sendVerificationCode($id)
    {   
        $seller=Seller::find($id);
        return view('frontend/user/verify-mail',compact("seller"));
    }
    public function verificationCode($id)
    {   
        $data=Seller::find($id);
        Mail::to($data->email)->send(new EmailVerificationMail($data));
        Session::put('success','Verification code has been sent to your email. Please verify!!');
        return back();
    }

    public function show(Request $request)
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
        $seller_id=$request->seller_id;
        $sellerInfo= Seller::join('seller_infos', 'seller_infos.seller_id', '=', 'sellers.id')
        ->where('seller_id',$seller_id)
        ->first();
        return view('admin/user/seller-details',compact("sellerInfo","admin"));
    }

    public function viewProfile()
    {
        $sellerId=Session::get('seller')['id'];
        $seller=Seller::find(Session::get('seller')['id']);
        $sellerInfo= Seller::join('seller_infos', 'seller_infos.seller_id', '=', 'sellers.id')
        ->where('seller_id',$sellerId)
        ->first();
        return view('frontend/user/profile-detail',compact("seller","sellerInfo"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
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
        $id1 = Crypt::decryptString($id);
        $sellerInfo= Seller::join('seller_infos', 'seller_infos.seller_id', '=', 'sellers.id')
        ->where('seller_id',$id1)
        ->first();
        return view('admin/user/seller-edit',compact("sellerInfo","admin"));
    }

    public function editProfile($id)
    {
        $seller=Seller::find(Session::get('seller')['id']);
        $id1 = Crypt::decryptString($id);
        $sellerInfo= Seller::join('seller_infos', 'seller_infos.seller_id', '=', 'sellers.id')
        ->where('seller_id',$id1)
        ->first();
        return view('frontend/user/profile-edit',compact("sellerInfo","seller"));
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
        $data= Seller::find($request->seller_id);
        $data->first_name=$request->fname;
        $data->last_name=$request->lname;
        $data->email=$request->email;
        $data->mobile=$request->mobile;
        
        $data->update();

        $info =SellerInfo::find($request->sellerinfo_id);
        $info->seller_id=$request->seller_id;
        $info->address=$request->address;
        $info->city=$request->city;
        $info->province=$request->province;
        $info->district=$request->district;
        $info->company_name=$request->company_name;
        $info->company_address=$request->company_address;
        $info->landline=$request->landline;
        $info->secondary_email=$request->secondary_email;

        $info->update();

        Session::put('success','Profile Details has been updated successfully');
        return redirect()->route('seller');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $seller_id=$request->seller_id;
        $data=Seller::find($seller_id);
        $data->delete();
        Session::put('success','Seller has been removed successfully');
        return back();
    }
    public function getChangePassword($id)
    {   
        $id1 = Crypt::decryptString($id);
        $seller= Seller::find($id1);

        return view('frontend/user/change-password',compact("seller"));
    }
    public function PostChangePassword(Request $request)
    {   
        $seller= Seller::find($request->id);
        if(!hash::check($request->current_password,$seller->password)){
            Session::put('error','Current password didnt matched');
            return back();
        }
        else{
            if(!hash::check($request->password,$seller->password)){
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
                    $seller->password=Hash::make($request->password);

                    $seller->update();
                    Mail::to($request->email)->send(new PasswordChangedSuccessful($seller));
                    Session::forget('seller');
                    Session::put('success','password Changed Successfull');
                    return redirect()->route('user-login');
                }
            }
            else{
                Session::put('error','Current password and new password could not be same');
                return back();
            }
        }
    }
    public function changeStatus(Request $request)
    {   
        $data= Seller::find($request->id);
        $data->status = $request->value;
        $data->save();
        return response()->json(['data'=>'Status changed Successfully.']);

    }
}
