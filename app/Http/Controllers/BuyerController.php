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
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;

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

                $data->save();
                Mail::to($request->email)->send(new BuyerEmailVerificationMail($data));
                Session::put('success','Registration has been done successfully.');
                return redirect()->route('index');
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
                $buyer->is_verified="1";
                $buyer->update();

                Session::put('success','Email has been verified successfully.');
                return redirect()->route('index');
            }
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
    public function destroy($id)
    {
        //
    }
}
