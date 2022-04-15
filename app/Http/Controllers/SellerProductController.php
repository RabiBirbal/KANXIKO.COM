<?php

namespace App\Http\Controllers;

use App\Models\AvailableProduct;
use App\Models\Category;
use App\Models\Seller;
use App\Models\Subcategory;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class SellerProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product = "";
        $category['a']=Category::orderby('name','asc')->get();
        $category['b']=[];
        foreach($category['a'] as $c){
            $category['b'][]=Subcategory::where('category_id',$c->id)->orderby('name','asc')->get();
        };
        $seller= Seller::find(session()->get('seller')['id']);
        return view('frontend.product.product-add',compact("seller","category","product"));
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
        // 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $seller= Seller::find(session()->get('seller')['id']);
        $product = AvailableProduct::where('seller_id',$seller->id)->get();
        return view('frontend.product.product-list',compact("product","seller"));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = AvailableProduct::find($id);
        $category['a']=Category::orderby('name','asc')->get();
        $category['b']=[];
        foreach($category['a'] as $c){
            $category['b'][]=Subcategory::where('category_id',$c->id)->orderby('name','asc')->get();
        };
        $seller= Seller::find(session()->get('seller')['id']);
        return view('frontend.product.product-add',compact("seller","category","product"));
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
        $data->category=str_replace('-', ' ',$request->category);
        $data->subcategory=$request->subcategory;
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
            return back();
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
