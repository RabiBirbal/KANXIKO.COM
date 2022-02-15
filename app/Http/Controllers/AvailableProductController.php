<?php

namespace App\Http\Controllers;

use App\Models\AvailableProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use Illuminate\Contracts\Session\Session as SessionSession;

class AvailableProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admin=User::find(Session::get('admin')['id']);
        $product = AvailableProduct::orderby('id','desc')->get();
        return view('admin/product/available-product',compact("admin","product"));
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
        $data = new AvailableProduct;
        $data->name = $request->name;
        if($request->hasfile('image')){
            $file=$request->file('image');
            $extension=$file->getClientOriginalExtension(); //getting image extension
            $filename=time().'.'.$extension;
            $file->move('upload/images/',$filename);
            $data->product_image=$filename;
        }
        else{
            return $request;
            $data->product_image='';
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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $admin=User::find(Session::get('admin')['id']);
        $data = AvailableProduct::find($request->id);
        return view('admin/product/available-product-edit',compact("data","admin"));
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
        $data = AvailableProduct::find($request->id);
        $data->name=$request->name;
        if($request->hasfile('image')){
            $file=$request->file('image');
            $extension=$file->getClientOriginalExtension(); //getting image extension
            $filename=time().'.'.$extension;
            $file->move('upload/images/',$filename);
            $data->product_image=$filename;
        }
        else{
            $data->update();
            Session::put('success','Product has been updated successfully.');
            return redirect()->route('available-product');
        }

        $data->update();
        Session::put('success','Product has been updated successfully.');
        return redirect()->route('available-product');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $data = AvailableProduct::find($request->id);
        $data->delete();

        Session::put('success','Product has been removed successfully.');
        return back();
    }
}
