<?php

namespace App\Http\Controllers;

use App\Models\AvailableProduct;
use App\Models\Enquiry;
use App\Models\Unverified_product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use Illuminate\Support\Str;

class EnquiryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($name,$id)
    {
        $product = AvailableProduct::find($id);
        return view('frontend/order/enquiry',compact("product"));
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
        $data = new Unverified_product;
        $data->name=$request->product_name;
        $data->category=$request->category;
        $data->subcategory=$request->subcategory;
        $data->product_image=$request->product_image;
        $data->description=$request->description;
        $data->quantity= "1";
        $data->terms_condition=$request->terms;
        $data->buyer_name=$request->buyer_name;
        $data->buyer_email=$request->buyer_email;
        $data->buyer_address=$request->buyer_address;
        $data->buyer_contact=$request->phone;
        $data->buyer_district= "null";
        $data->buyer_province= "null";
        $data->is_verified='0';
        $data->terms_condition= "on";
        $data->email_verification_code=Str::random(40);

        $data->save();
        Session::put('success','Enquiry has been created successfully');
        return redirect()->route('index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $admin=User::find(Session::get('admin')['id']);
        $enquiry = Enquiry::orderby('id','desc')->get();
        return view('admin/order/enquiry-show',compact("enquiry","admin"));
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
        $data = Enquiry::find($request->id);
        $data->delete();
        Session::put('success','Enquiry has been removed successfully');
        return back();
    }
}
