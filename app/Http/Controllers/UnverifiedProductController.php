<?php

namespace App\Http\Controllers;

use App\Mail\OrderRejectedMail;
use App\Mail\OrderSuccessfullMail;
use App\Mail\OrderVerifiedSuccessfullMail;
use App\Mail\EmailVerification;
use App\Mail\EmailVerificationMail;
use Illuminate\Http\Request;
use App\Models\Unverified_product;
use App\Models\Buyer;
use App\Models\Product;
use Illuminate\Support\Facades\Session;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\User;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class UnverifiedProductController extends Controller
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
        $product=Unverified_product::orderby('id','desc')->get();
        return view('admin/product/unverified-product',compact("product","admin"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function view()
    {   
        $category['a']=Category::orderby('name','asc')->get();
        $category['b']=[];
        foreach($category['a'] as $c){
            $category['b'][]=Subcategory::where('category_id',$c->id)->orderby('name','asc')->get();
        };
        
        return view('frontend/order/order-add',compact("category"));
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
    public function step1(Request $request)
    {
        if($request->category != '0'){
            if($request->subcategory != '0'){
                $data= new Unverified_product;
                $data->name=$request->product_name;
                $data->quantity=$request->quantity;
                $data->size=$request->size;
                $data->color=$request->color;
                $data->category=$request->category;
                $data->subcategory=$request->subcategory;
                $data->budget=$request->budget;
                $data->description=$request->description;
                $data->terms_condition=$request->terms_condition;
                $data->buyer_name="null";
                $data->buyer_email="null";
                $data->buyer_contact="null";
                $data->buyer_district="null";
                $data->buyer_address="null";
                $data->buyer_province="null";
                $data->is_verified="0";
                $data->email_verification_code=Str::random(40);
                if($request->hasfile('product-img')){
                    $file=$request->file('product-img');
                    $extension=$file->getClientOriginalExtension(); //getting image extension
                    $filename=time().'.'.$extension;
                    $file->move('upload/images/',$filename);
                    $data->product_image=$filename;
                }
                else{
                    // return $request;
                    $data->product_image='';
                }
                $data->save();
                Session::put('product',$data->id);
                Session::put('success','Please provide us your personal details for further process.');
                return redirect()->route('buyer-form');
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

    public function store(Request $request)
    {
        $buyer=Unverified_product::find(Session::get('product'));
        $buyer->buyer_name=$request->name;
        $buyer->buyer_email=$request->email;
        $buyer->buyer_contact=$request->contact;
        $buyer->buyer_district=$request->district;
        $buyer->buyer_address=$request->address;
        $buyer->buyer_province=$request->province;
        $buyer->save();
        Mail::to($request->email)->send(new EmailVerification($buyer));
        Session::put('success','Please verify your email by clicking in the link sent to your email.');
        Session::forget('product');
        return redirect()->route('index');
    }

    public function verify_buyer_email($verification_code){
        $buyer=Unverified_product::where('email_verification_code',$verification_code)->first();
        if(!$buyer){
            Session::put('error','Invalid URL');
            return redirect()->route('index');
        }
        else{
            if($buyer->is_verified == '0'){
                $buyer->is_verified="1";
                $buyer->update();
                Session::put('success','Email Verified Successfully and your order has been placed successfully.');
                Mail::to($buyer->buyer_email)->send(new OrderSuccessfullMail($buyer));
                return redirect()->route('index');
            }
            else{
                Session::put('error','Email already Verified');
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
    public function show($id)
    {   
        $id1 = Crypt::decryptString($id);
        if(Session::has('admin')){
            $admin=User::find(Session::get('admin')['id']);
        }
        elseif(Session::has('buyer_department')){
            $admin=User::find(Session::get('buyer_department')['id']);
        }
        else{
            $admin=User::find(Session::get('seller_department')['id']);
        }
        $productlist=Unverified_product::find($id1);
        return view('admin/product/unverified-product-show',compact("productlist","admin"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function verify(Request $request, $id)
    {
        $data= new Product;
        if($request->leads_category != '0'){
            if($request->customer_province != '0'){
                if($request->customer_district != '0'){
                    $data->name=$request->name;
                    $data->quantity=$request->quantity;
                    $data->size=$request->size;
                    $data->color=$request->color;
                    $data->category=$request->category;
                    $data->subcategory=$request->subcategory;
                    $data->budget=$request->budget;
                    $data->description=$request->description;
                    $data->product_image=$request->product_image;
                    $data->leads_category=$request->leads_category;
                    $data->availability=$request->availability;
                    $data->terms_condition="on";
                    $data->points=$request->point;
                    $data->save();

                    $buyer= new Buyer;
                    $buyer->product_id=$data->id;
                    $buyer->buyer_name=$request->customer_name;
                    $buyer->buyer_email=$request->customer_email;
                    $buyer->buyer_contact=$request->customer_contact;
                    $buyer->buyer_district=$request->district;
                    $buyer->buyer_address=$request->customer_address;
                    $buyer->buyer_province=$request->province;
                    $buyer->save();

                    $unverified_product=Unverified_product::find($id);
                    $unverified_product->delete();
                    Mail::to($request->customer_email)->send(new OrderVerifiedSuccessfullMail($buyer));
                    Session::put('success','Product has been verified successfully');
                    return redirect()->route('product');
                }
                else{
                    Session::put('error','Please select District');
                    return back();
                }
            }
            else{
                Session::put('error','Please select Province');
                return back();
            }
            }
            else{
                Session::put('error','Please select leads category');
                return back();
        }
    }

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
        $id=$request->id;
        $data=Unverified_product::find($id);
        if($data->email){
            $data->delete();
            Mail::to($data->buyer_email)->send(new OrderRejectedMail($data));
            Session::put('success','Product order has been removed successfully');
            return back();
        }
        else{
            $data->delete();
            Session::put('success','Product order has been removed successfully');
            return back();
        }
    }
}
