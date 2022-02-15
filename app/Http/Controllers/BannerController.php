<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\User;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $admin=User::find(Session::get('admin')['id']);
        $banner=Banner::where('category','homepage')->get();
        $ads_banner=Banner::where('category','homepage ads')->get();
        return view('admin/banner/homepage/banner-add',compact("banner","ads_banner","admin"));
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
        $data= new Banner;
        $data->category=$request->category;
        if($request->hasfile('banner')){
            $file=$request->file('banner');
            $extension=$file->getClientOriginalExtension(); //getting image extension
            $filename=time().'.'.$extension;
            $file->move('upload/images/',$filename);
            $data->banner_image=$filename;
        }
        else{
            return $request;
            $data->banner_image='';
        }
        $data->save();
        Session::put('success','Banner has been added successfully');
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showUserDashboardBanner()
    {
        $admin=User::find(Session::get('admin')['id']);
        $banner=Banner::where('category','user dashboard')->get();
        return view('admin/banner/user_dashboard/banner-add',compact("banner","admin"));

    }
    public function show()
    {
        
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
    public function destroy(Request $request)
    {
        $id=$request->banner_id;
        $data=Banner::find($id);
        $data->delete();
        Session::put('success','Banner has been removed successfully');
        return back();
    }
}
