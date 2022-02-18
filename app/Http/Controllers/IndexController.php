<?php

namespace App\Http\Controllers;

use App\Models\AvailableProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Banner;
use App\Models\Facebook;
use App\Models\User;
use App\Models\Category;
use App\Models\Subcategory;

class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $available_product = AvailableProduct::orderby('id','desc')->get();
        $banner=Banner::where('category','homepage')->orderby('id','desc')->get();
        $ads=Banner::where('category','homepage ads')->orderby('id','desc')->get();
        $facebook=Facebook::orderby('id','desc')->take(3)->get();

        $clothing=Category::where('name','Clothing')->first();
        $clothinglist=Subcategory::where('category_id',$clothing->id)->get();

        $furniture=Category::where('name','furniture')->first();
        $furniturelist=Subcategory::where('category_id',$furniture->id)->get();

        $waterfilter=Category::where('name','water-filter')->first();
        $waterfilterlist=Subcategory::where('category_id',$waterfilter->id)->get();

        $houseappliance=Category::where('name','house-appliances')->first();
        $houseappliancelist=Subcategory::where('category_id',$houseappliance->id)->get();

        $machinery=Category::where('name','machinery')->first();
        $machinerylist=Subcategory::where('category_id',$machinery->id)->get();

        $computer=Category::where('name','computer-accessories')->first();
        $computerlist=Subcategory::where('category_id',$computer->id)->get();

        $construction=Category::where('name','construction')->first();
        $constructionlist=Subcategory::where('category_id',$construction->id)->get();

        $mobile=Category::where('name','mobile-accessories')->first();
        $mobilelist=Subcategory::where('category_id',$mobile->id)->get();

        $service=Category::where('name','services')->first();
        $servicelist=Subcategory::where('category_id',$service->id)->get();

        $study=Category::where('name','study-abroad')->first();
        $studylist=Subcategory::where('category_id',$study->id)->get();

        $footwear=Category::where('name','footwear')->first();
        $footwearlist=Subcategory::where('category_id',$footwear->id)->get();

        $jewellary=Category::where('name','artificial-jewelry')->first();
        $jewellarylist=Subcategory::where('category_id',$jewellary->id)->get();

        $cosmetic=Category::where('name','cosmetic-products')->first();
        $cosmeticlist=Subcategory::where('category_id',$cosmetic->id)->get();

        $stationary=Category::where('name','books-and-stationary')->first();
        $stationarylist=Subcategory::where('category_id',$stationary->id)->get();

        $gift=Category::where('name','gift-items')->first();
        $giftlist=Subcategory::where('category_id',$gift->id)->get();

        $bakery=Category::where('name','bakery-products')->first();
        $bakerylist=Subcategory::where('category_id',$bakery->id)->get();

        $montessori=Category::where('name','montessori-products-and-toys')->first();
        $montessorilist=Subcategory::where('category_id',$montessori->id)->get();

        $watch=Category::where('name','watch-and-sunglasses')->first();
        $watchlist=Subcategory::where('category_id',$watch->id)->get();

        $decoration=Category::where('name','decoration-products')->first();
        $decorationlist=Subcategory::where('category_id',$decoration->id)->get();

        $tours=Category::where('name','tours-and-travels')->first();
        $tourslist=Subcategory::where('category_id',$tours->id)->get();

        $sports=Category::where('name','sport-products')->first();
        $sportslist=Subcategory::where('category_id',$sports->id)->get();

        $logistic=Category::where('name','Logistic-and-Transportation')->first();
        $logisticlist=Subcategory::where('category_id',$logistic->id)->get();

        $music=Category::where('name','musical-instruments')->first();
        $musiclist=Subcategory::where('category_id',$music->id)->get();

        $cars=Category::where('name','cars-and-motorcycle-spare-parts')->first();
        $carslist=Subcategory::where('category_id',$cars->id)->get();

        $hardware=Category::where('name','hardware-and-sanitary-products')->first();
        $hardwarelist=Subcategory::where('category_id',$hardware->id)->get();

        return view('frontend/index',compact("available_product","banner","ads","facebook","clothinglist","furniturelist","waterfilterlist",
        "houseappliancelist","machinerylist","computerlist","constructionlist","mobilelist","servicelist",
        "studylist","footwearlist","jewellarylist","cosmeticlist","stationarylist","giftlist","bakerylist","montessorilist",
        "watchlist","decorationlist","tourslist","sportslist","logisticlist","musiclist","carslist","hardwarelist"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function embedFacebook()
    {
        $admin=User::find(Session::get('admin')['id']);
        $facebook=Facebook::all();
        return view('admin/facebook/embed-facebook',compact("facebook","admin"));
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
    public function store(Request $request)
    {
        $data = new Facebook;
        $data->embed_facebook_link = $request->facebook;

        $data->save();
        Session::put('success','Embed Facebook Link has been added successfully');
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
        $id=$request->facebook_id;
        $facebook = Facebook::find($id);
        $facebook->delete();
        Session::put('success','Embed Facebook Link deleted successfully');
        return back();
    }
}
