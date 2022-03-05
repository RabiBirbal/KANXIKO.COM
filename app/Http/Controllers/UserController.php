<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use App\Mail\PasswordChangedSuccessful;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
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
        $user=User::orderBy('id','desc')->get();
        return view('admin/user/index',compact("user","admin"));
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
    public function getAddAdmin(){
        if(Session::has('admin')){
            $admin=User::find(Session::get('admin')['id']);
        }
        elseif(Session::has('buyer_department')){
            $admin=User::find(Session::get('buyer_department')['id']);
        }
        else{
            $admin=User::find(Session::get('seller_department')['id']);
        }
        return view('admin.user.admin-add',compact("admin"));
    }
    public function store(Request $request)
    {
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
                $data = new User;
                $data->name=$request->name;
                $data->email=$request->email;
                $data->mobile=$request->mobile;
                $data->address=$request->address;
                $data->password=Hash::make($request->password);
                $data->is_Admin=$request->role;
                $data->status="1";

                $data->save();
                Session::put('success','Staf has been added successfully.');
                return redirect()->route('user');
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
    public function getChangePassword($id)
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
        $user= User::find($id1);

        return view('admin/user/change-password',compact("user","admin"));
    }
    public function PostChangePassword(Request $request)
    {   
        $seller= User::find($request->id);
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
                        return redirect()->route('admin-login');
                      }
            }
            else{
                Session::put('error','Current password and new password coul not be same');
                return back();
            }
        }
    }

    public function edit(Request $request)
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
        $admin_id=$request->admin_id;
        $user=User::find($admin_id);
        return view('admin/user/user-edit',compact("user","admin"));
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
        $data= User::find($request->user_id);
        $data->name=$request->name;
        $data->email=$request->email;
        $data->mobile=$request->mobile;
        $data->address=$request->address;
        
        $data->save();
        Session::put('success','Customer Details has been updated successfully');
        return redirect()->route('user');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $data=User::find($request->user_id);
        $data->delete();
        Session::put('success','Admin has been removed successfully');
        return redirect()->route('user');
    }
    public function changeStatus(Request $request)
    {   
        $data= User::find($request->id);
        $data->status = $request->value;
        $data->save();
        return response()->json(['data'=>'Status changed Successfully.']);

    }
}
