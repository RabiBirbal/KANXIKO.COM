<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use App\Models\PasswordReset;
use App\Models\Seller;
use Illuminate\Support\Facades\Mail;
use App\Mail\ForgetPasswordMail;
use Illuminate\Support\Facades\Hash;
use App\Mail\PasswordChangedSuccessful;
use Illuminate\Support\Facades\Validator;

class ForgetPasswordController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('layout/forget-password');
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
        $seller=Seller::where('email',$request->email)->first();
        if(!$seller){
            Session::put('error','The email address that you entered is not valid. Please check the email address.');
            return back();
        }
        else{
            $data= new PasswordReset;
            $data->email=$request->email;
            $data->token=Str::random(40);
            $data->status="1";

            $data->save();
            Mail::to($request->email)->send(new ForgetPasswordMail($data));
            Session::put('success','Password reset link has been sent to your email address');
            return back();
        }
    }

     public function resetPassword($token){
        $resetPassword=PasswordReset::where('token',$token)->first();
        if(!$resetPassword){
            Session::put('error','Invalid URL');
            return redirect()->route('user-login');
        }
        else{
            if($resetPassword->status == 0){
                Session::put('error','Sorry!! Reset link is expire.');
                return redirect()->route('user-login');
            }
            else{
                return view('layout/reset-password',compact("resetPassword"));
            }
        }
     }

     public function changePassword(Request $request){
        $seller = Seller::where('email',$request->email)->first();
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

            $data=PasswordReset::find($request->id);
            $data->status="0";
            $data->update();
            Mail::to($request->email)->send(new PasswordChangedSuccessful($seller));
            Session::put('success','Password has been changed successfully');
            return redirect()->route('user-login');
        }
     }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
