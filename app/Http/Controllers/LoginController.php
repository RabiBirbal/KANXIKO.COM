<?php

namespace App\Http\Controllers;

use App\Models\BuyerInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Seller;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin/login/login');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    function login(Request $req){
        $user= User::where(['email'=>$req->email])->first();
        // dd($user);
        // $pass=!hash::check($req->password,$user->password);
        // dd($pass);
        if(!$user || !hash::check($req->password,$user->password)){
            // return back()->with('fail','Email and Password did not matched');
            Session::put('error','Email and Password did not matched');
            return back();
            // return "Email and Password did not matched";
        }
        else{
            if($user->is_admin == 1){
                if($user->status == 1){
                    $req->session()->put('admin',$user);
                    Session::put('success','Login successfull');
                    return redirect()->route('user');
                }
                else{
                    Session::put('error','Sorry!! you are deactivated. Please inform the admin');
                    return back();
                }        
            }
        elseif($user->is_admin == 0){
            if($user->status == 1){
                $req->session()->put('buyer_department',$user);
                Session::put('success','Login successfull');
                return redirect()->route('seller');
            }
            else{
                Session::put('error','Sorry!! you are deactivated. Please inform the admin');
                return back();
            }
        }
        else{
            if($user->status == 1){
                $req->session()->put('seller_department',$user);
                Session::put('success','Login successfull');
                return redirect()->route('seller');
            }
            else{
                Session::put('error','Sorry!! you are deactivated. Please inform the admin');
                return back();
            }
        }
        }
    }

    public function userLogin()
    {
        return view('frontend/login/login');
    }

    function sellerLogin(Request $req){
        $seller= Seller::where(['email'=>$req->email])->first();
        // dd($user);
        // $pass=!hash::check($req->password,$user->password);
        // dd($pass);
        if(!$seller || !hash::check($req->password,$seller->password)){
            // return back()->with('fail','Email and Password did not matched');
            Session::put('error','Email and Password did not matched');
            return back();
            // return "Email and Password did not matched";
        }
        else{
            if($seller->email_verified_at == null){
                Session::put('error','Sorry!! your email is not verified yet');
                return redirect('verify/'.$seller->id);
            }
            else{
                if($seller->is_admin == 0){
                    if($seller->status == 1){
                        $req->session()->put('seller',$seller);
                        Session::put('success','Login successfull');
                        return redirect()->route('buy-leads');
                    }
                    else{
                        Session::put('error','Sorry!! you are deactivated. Please inform the admin');
                        return back();
                    }
            }
        else{
            Session::put('error','Sorry!! you are not seller');
            return back();
            // return "Sorry!! you are not admin";
        }
            }
        }
    }

    function buyerLogin(Request $req){
        $buyer= BuyerInfo::where(['email'=>$req->email])->first();
        // dd($user);
        // $pass=!hash::check($req->password,$user->password);
        // dd($pass);
        if(!$buyer || !hash::check($req->password,$buyer->password)){
            // return back()->with('fail','Email and Password did not matched');
            Session::put('error','Email and Password did not matched');
            return back();
            // return "Email and Password did not matched";
        }
        else{
            $req->session()->put('buyer',$buyer);
            Session::put('success','Login successfull');
            return redirect()->route('index');
        }
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
        //
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
