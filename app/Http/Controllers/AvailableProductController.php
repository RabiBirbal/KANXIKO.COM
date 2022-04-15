<?php

namespace App\Http\Controllers;

use App\Models\AvailableProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use App\Models\Category;
use App\Models\Subcategory;
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
        if(Session::has('admin')){
            $admin=User::find(Session::get('admin')['id']);
        }
        elseif(Session::has('buyer_department')){
            $admin=User::find(Session::get('buyer_department')['id']);
        }
        else{
            $admin=User::find(Session::get('seller_department')['id']);
        }
        $product = AvailableProduct::orderby('id','desc')->with('seller')->get();
        $category['a']=Category::orderby('name','asc')->get();
        $category['b']=[];
        foreach($category['a'] as $c){
            $category['b'][]=Subcategory::where('category_id',$c->id)->orderby('name','asc')->get();
        };
        return view('admin/product/available-product',compact("admin","product","category"));
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
        $data->category=str_replace('-', ' ',$request->category);
        $data->subcategory = $request->subcategory;
        if(Session::has('seller')){
            $data->seller_id =  Session::get('seller')['id'];
        }
        else{
            $data->seller_id  ="";
        }
        if($request->category != '0'){
            if($request->subcategory != '0'){
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
            else{
                Session::put('error','Please choose the subcategory.');
                return back();
            }
        }
        else{
            Session::put('error','Please choose the category.');
            return back();
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
        $data = AvailableProduct::find($request->id);
        $category['a']=Category::orderby('name','asc')->get();
        $category['b']=[];
        foreach($category['a'] as $c){
            $category['b'][]=Subcategory::where('category_id',$c->id)->orderby('name','asc')->get();
        };
        return view('admin/product/available-product-edit',compact("data","admin","category"));
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
