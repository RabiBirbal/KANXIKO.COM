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
        $admin=User::find(Session::get('admin')['id']);
        $product=Unverified_product::all();
        return view('admin/product/unverified-product',compact("product","admin"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function view()
    {   
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

        $jewellary=Category::where('name','artificial-jewellery')->first();
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

        return view('frontend/order/order-add',compact("category","clothinglist","furniturelist","waterfilterlist",
        "houseappliancelist","machinerylist","computerlist","constructionlist","mobilelist","servicelist",
        "studylist","footwearlist","jewellarylist","cosmeticlist","stationarylist","giftlist","bakerylist","montessorilist",
        "watchlist","decorationlist","tourslist","sportslist","logisticlist","musiclist","carslist","hardwarelist"));
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
        $admin=User::find(Session::get('admin')['id']);
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
            $buyer->buyer_district=$request->customer_district;
            $buyer->buyer_address=$request->customer_address;
            $buyer->buyer_province=$request->customer_province;
            $buyer->save();

            $unverified_product=Unverified_product::find($id);
            $unverified_product->delete();
            Mail::to($request->customer_email)->send(new OrderVerifiedSuccessfullMail($buyer));
            Session::put('success','Product has been verified successfully');
            return redirect()->route('product');
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
        $data->delete();
        Mail::to($data->buyer_email)->send(new OrderRejectedMail($data));
        Session::put('success','Product order has been removed successfully');
        return back();
    }
}
