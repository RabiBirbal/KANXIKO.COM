<?php

namespace App\Http\Controllers;

use App\Models\Redeem;
use App\Models\RedeemProduct;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class RedeemProductController extends Controller
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
        $products = RedeemProduct::orderby('created_at','desc')->get();

        return view('admin.redeem-product.index',compact("admin","products"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
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

        return view('admin.redeem-product.create',compact("admin"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = new RedeemProduct;
        $data->name = $request->name;
        $data->brand=$request->brand;
        $data->point = $request->points;
        $data->quantity = $request->quantity;
        $data->description = $request->description;
        if($request->status){
            $data->status = "on";
        }
        else{
            $data->status = "off";
        }
        if($request->hasfile('image')){
            $file=$request->file('image');
            $filename=$file->getClientOriginalName(); //getting image extension
            // $filename=time().'.'.$extension;
            $file->move('upload/images/',$filename);
            $data->thumbnail=$filename;
        }

        // multiple file
        if($request->hasFile('images'))
        {
            $names = [];
            foreach($request->file('images') as $image)
            {
                $filename = $image->getClientOriginalName();
                $image->move('upload/images/', $filename);
                array_push($names, $filename);          

            }
            $data->images = json_encode($names);
        }

        $data->save();
        Session::put('success','Product has been added successfully.');
        return back();        
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


    public function view()
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

        $redeems = Redeem::with('redeemProduct')->orderby('created_at','desc')->get();
        return view('admin.redeem-product.redeem',compact("admin","redeems"));
    }


    public function changeStatus($id)
    {
        $redeem = Redeem::find($id);
        if($redeem->status == 'Pending'){
            $redeem->status = "Delivered";
        }
        elseif($redeem->status == 'Delivered'){
            $redeem->status = "Pending";
        }
        $redeem->update();

        Session::put('success','Status changed successfully.');
        return back();
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
        $product = RedeemProduct::find($id);
        return view('admin.redeem-product.edit',compact("admin","product"));
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
        $data = RedeemProduct::find($request->id);
        $data->name = $request->name;
        $data->brand=$request->brand;
        $data->point = $request->points;
        $data->quantity = $request->quantity;
        $data->description = $request->description;
        if($request->status){
            $data->status = "on";
        }
        else{
            $data->status = "off";
        }
        if($request->hasfile('image')){
            $file=$request->file('image');
            $filename=$file->getClientOriginalName(); //getting image extension
            // $filename=time().'.'.$extension;
            $file->move('upload/images/',$filename);
            $data->thumbnail=$filename;
        }

        // multiple file
        if($request->hasFile('images'))
        {
            $names = [];
            foreach($request->file('images') as $image)
            {
                $filename = $image->getClientOriginalName();
                $image->move('upload/images/', $filename);
                array_push($names, $filename);          

            }
            $data->images = json_encode($names);
        }

        $data->update();
        Session::put('success','Product has been updated successfully.');
        return back();  
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
