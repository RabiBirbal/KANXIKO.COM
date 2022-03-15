<?php

namespace App\Http\Controllers;

use App\Models\AvailableProduct;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Crypt;
use App\Models\Buyer;
use App\Models\Unverified_product;
use App\Models\User;
use App\Models\BuyerInfo;

class ProductController extends Controller
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
        $product=Product::orderBy('id','desc')->get();
        return view('admin/product/product-details',compact("product","admin"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    
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
        $category['a']=Category::orderby('name','asc')->get();
        $category['b']=[];
        foreach($category['a'] as $c){
            $category['b'][]=Subcategory::where('category_id',$c->id)->orderby('name','asc')->get();
        };

        return view('admin/product/product-add',compact("category","admin"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {   
        if($request->category != '0'){
            if($request->subcategory != '0'){
                if($request->lead_category == '0'){
                    Session::put('error','Please select leads category');
                    return back()->withInput();
                }
                else{
                    $data= new Product;
                    $data->name=$request->name;
                    $data->quantity=$request->quantity;
                    $data->size=$request->size;
                    $data->color=$request->color;
                    $data->category=$request->category;
                    $data->subcategory=$request->subcategory;
                    $data->budget=$request->budget;
                    $data->description=$request->description;
                    $data->terms_condition="on";
                    $data->leads_category=$request->leads_category;
                    $data->points=$request->point;
                    $data->availability=$request->availability;
        
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
        
                    $buyer= new Buyer;
                    $buyer->product_id=$data->id;
                    $buyer->buyer_name=$request->customer_name;
                    $buyer->buyer_email=$request->customer_email;
                    $buyer->buyer_contact=$request->customer_contact;
                    $buyer->buyer_address=$request->customer_address;
                    $buyer->buyer_province=$request->province;
                    $buyer->buyer_district=$request->district;
                    
                    $buyer->save();
                    Session::put('success','Product Order has been completed successfully');
                    return redirect()->route('product');
                }
            }
            else{
                Session::put('error','Please choose the subcategory.');
                return back()->withInput();
            }
        }
        else{
            Session::put('error','Please choose the category.');
            return back()->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function show(Request $request)
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
        $id=$request->product_id;
        $productlist= Product::join('buyers', 'buyers.product_id', '=', 'products.id')
        ->where('buyers.product_id',$id)
        ->first();
        return view('admin/product/product-show',compact("productlist","admin"));
    }

    public function viewProductDetails($id)
    {
        $id1 = Crypt::decryptString($id);
        $product=Product::join('leads', 'leads.product_id', '=', 'products.id')
        ->join('buyers', 'buyers.product_id', '=', 'products.id')
        ->where('products.id',$id1)
        ->first();
        return view('frontend/product/product-detail',compact("product"));
    }
    public function viewProduct($name)
    {
        if(Session::has('buyer')){
            $buyer=BuyerInfo::find(Session::get('buyer')['id']);
        }
        else{
            $buyer=null;
        }
        $product=AvailableProduct::where('category',$name)->get();
        $category=Category::orderby('name','asc')->get();
        $cat=Category::where('name',$name)->first();
        return view('frontend/product/product-view',compact("buyer","product","name","category","cat"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function viewTerms()
    {
        return view('frontend/termsandcondition');
    }
    public function viewRegisterTerms()
    {
        return view('frontend/registration-terms-condition');
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
        $id=$request->product_id;
        $category['a']=Category::orderby('name','asc')->get();
        $category['b']=[];
        foreach($category['a'] as $c){
            $category['b'][]=Subcategory::where('category_id',$c->id)->orderby('name','asc')->get();
        };
        $product= Product::join('buyers', 'buyers.product_id', '=', 'products.id')
        ->where('buyers.product_id',$id)
        ->first();
        return view('admin/product/product-edit',compact("product","category","admin"));
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
        if($request->category != '0'){
            if($request->subcategory != '0'){
                if($request->lead_category == '0'){
                    Session::put('error','Please select leads category');
                    return back();
                }
                else{
                    $data= Product::find($request->product_id);
                    $data->name=$request->name;
                    $data->quantity=$request->quantity;
                    $data->size=$request->size;
                    $data->color=$request->color;
                    $data->category=$request->category;
                    $data->subcategory=$request->subcategory;
                    $data->budget=$request->budget;
                    $data->description=$request->description;
                    $data->leads_category=$request->leads_category;
                    $data->points=$request->points;
                    $data->availability=$request->availability;
                    if($request->hasfile('product-img')){
                        $file=$request->file('product-img');
                        $extension=$file->getClientOriginalExtension(); //getting image extension
                        $filename=time().'.'.$extension;
                        $file->move('upload/images/',$filename);
                        $data->product_image=$filename;
                    }
                    $data->update();

                    $buyer= Buyer::find($request->buyer_id);
                    $buyer->product_id=$data->id;
                    $buyer->buyer_name=$request->customer_name;
                    $buyer->buyer_email=$request->customer_email;
                    $buyer->buyer_contact=$request->customer_contact;
                    $buyer->buyer_address=$request->customer_address;
                    $buyer->update();
                    Session::put('success','Product order has been updated successfully');
                    return redirect()->route('product');
                }
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
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
    public function destroy(Request $request)
    {
        $id=$request->product_id;
        $data=Product::find($id);
        $data->delete();
        Session::put('success','Product order has been removed successfully');
        return back();
    }
}
