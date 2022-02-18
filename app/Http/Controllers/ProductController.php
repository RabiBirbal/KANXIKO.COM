<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Subcategory;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Crypt;
use App\Models\Buyer;
use App\Models\Unverified_product;
use App\Models\User;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admin=User::find(Session::get('admin')['id']);
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
        $admin=User::find(Session::get('admin')['id']);
        $category=Category::orderby('name','asc')->get();
        $clothing=Category::where('name','Clothing')->first();
        $clothinglist=Subcategory::where('category_id',$clothing->id)->orderby('name','asc')->get();

        $furniture=Category::where('name','furniture')->first();
        $furniturelist=Subcategory::where('category_id',$furniture->id)->orderby('name','asc')->get();

        $waterfilter=Category::where('name','water-filter')->first();
        $waterfilterlist=Subcategory::where('category_id',$waterfilter->id)->orderby('name','asc')->get();

        $houseappliance=Category::where('name','house-appliances')->first();
        $houseappliancelist=Subcategory::where('category_id',$houseappliance->id)->orderby('name','asc')->get();

        $machinery=Category::where('name','machinery')->first();
        $machinerylist=Subcategory::where('category_id',$machinery->id)->orderby('name','asc')->get();

        $computer=Category::where('name','computer-accessories')->first();
        $computerlist=Subcategory::where('category_id',$computer->id)->orderby('name','asc')->get();

        $construction=Category::where('name','construction')->first();
        $constructionlist=Subcategory::where('category_id',$construction->id)->orderby('name','asc')->get();

        $mobile=Category::where('name','mobile-accessories')->first();
        $mobilelist=Subcategory::where('category_id',$mobile->id)->orderby('name','asc')->get();

        $service=Category::where('name','services')->first();
        $servicelist=Subcategory::where('category_id',$service->id)->orderby('name','asc')->get();

        $study=Category::where('name','study-abroad')->first();
        $studylist=Subcategory::where('category_id',$study->id)->orderby('name','asc')->get();

        $footwear=Category::where('name','footwear')->first();
        $footwearlist=Subcategory::where('category_id',$footwear->id)->orderby('name','asc')->get();

        $jewellary=Category::where('name','artificial-jewelry')->first();
        $jewellarylist=Subcategory::where('category_id',$jewellary->id)->orderby('name','asc')->get();

        $cosmetic=Category::where('name','cosmetic-products')->first();
        $cosmeticlist=Subcategory::where('category_id',$cosmetic->id)->orderby('name','asc')->get();

        $stationary=Category::where('name','books-and-stationary')->first();
        $stationarylist=Subcategory::where('category_id',$stationary->id)->orderby('name','asc')->get();

        $gift=Category::where('name','gift-items')->first();
        $giftlist=Subcategory::where('category_id',$gift->id)->orderby('name','asc')->get();

        $bakery=Category::where('name','bakery-products')->first();
        $bakerylist=Subcategory::where('category_id',$bakery->id)->orderby('name','asc')->get();

        $montessori=Category::where('name','montessori-products-and-toys')->first();
        $montessorilist=Subcategory::where('category_id',$montessori->id)->orderby('name','asc')->get();

        $watch=Category::where('name','watch-and-sunglasses')->first();
        $watchlist=Subcategory::where('category_id',$watch->id)->orderby('name','asc')->get();

        $decoration=Category::where('name','decoration-products')->first();
        $decorationlist=Subcategory::where('category_id',$decoration->id)->orderby('name','asc')->get();

        $tours=Category::where('name','tours-and-travels')->first();
        $tourslist=Subcategory::where('category_id',$tours->id)->orderby('name','asc')->get();

        $sports=Category::where('name','sport-products')->first();
        $sportslist=Subcategory::where('category_id',$sports->id)->orderby('name','asc')->get();

        $logistic=Category::where('name','Logistic-and-Transportation')->first();
        $logisticlist=Subcategory::where('category_id',$logistic->id)->orderby('name','asc')->get();

        $music=Category::where('name','musical-instruments')->first();
        $musiclist=Subcategory::where('category_id',$music->id)->orderby('name','asc')->get();

        $cars=Category::where('name','cars-and-motorcycle-spare-parts')->first();
        $carslist=Subcategory::where('category_id',$cars->id)->orderby('name','asc')->get();

        $hardware=Category::where('name','hardware-and-sanitary-products')->first();
        $hardwarelist=Subcategory::where('category_id',$hardware->id)->orderby('name','asc')->get();

        $CA=Category::where('name','CA-Lawyer-Service')->first();
        $CAlist=Subcategory::where('category_id',$CA->id)->orderby('name','asc')->get();

        $aluminum=Category::where('name','Aluminum-and-Upvc-Products')->first();
        $aluminumList=Subcategory::where('category_id',$aluminum->id)->orderby('name','asc')->get();

        return view('admin/product/product-add',compact("category","clothinglist","furniturelist","waterfilterlist",
        "houseappliancelist","machinerylist","computerlist","constructionlist","mobilelist","servicelist","admin",
        "studylist","footwearlist","jewellarylist","cosmeticlist","stationarylist","giftlist","bakerylist","montessorilist",
        "watchlist","decorationlist","tourslist","sportslist","logisticlist","musiclist","carslist","hardwarelist","CAlist","aluminumList"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        if($request->lead_category == '0'){
            Session::put('error','Please select leads category');
            return back();
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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function show(Request $request)
    {
        $admin=User::find(Session::get('admin')['id']);
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
        $admin=User::find(Session::get('admin')['id']);
        $id=$request->product_id;
        $category=Category::all();
        $subcategory=Subcategory::all();
        $product= Product::join('buyers', 'buyers.product_id', '=', 'products.id')
        ->where('buyers.product_id',$id)
        ->first();
        return view('admin/product/product-edit',compact("product","category","subcategory","admin"));
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
