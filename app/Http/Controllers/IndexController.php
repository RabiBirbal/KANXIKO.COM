<?php

namespace App\Http\Controllers;

use App\Models\AvailableProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Banner;
use App\Models\BuyerInfo;
use App\Models\Facebook;
use App\Models\User;
use App\Models\Category;
use App\Models\Product;
use App\Models\Subcategory;use Illuminate\Support\Facades\Hash;

class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Session::has('buyer')){
            $buyer=BuyerInfo::find(Session::get('buyer')['id']);
        }
        else{
            $buyer="";
        }
        $available_product = AvailableProduct::orderby('id','desc')->get();
        $banner=Banner::where('category','homepage')->orderby('id','desc')->get();
        $ads=Banner::where('category','homepage ads')->orderby('id','desc')->get();
        $facebook=Facebook::orderby('id','desc')->take(3)->get();
        $houseAppliance=AvailableProduct::where('category','House-Appliances')->orderby('id','desc')->get()->take(4);
        $furniture=AvailableProduct::where('category','furniture')->orderby('id','desc')->get()->take(4);
        $clothing=AvailableProduct::where('category','clothing')->orderby('id','desc')->get()->take(4);
        $bag=AvailableProduct::where('category','Bags-and-Suitcase')->orderby('id','desc')->get()->take(4);
        $footwear=AvailableProduct::where('category','Footwear')->orderby('id','desc')->get()->take(4);
        $category=Category::orderby('name','asc')->get();

        return view('frontend/index',compact("buyer","available_product","banner","ads","facebook","houseAppliance","furniture","clothing","bag","category","footwear"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function embedFacebook()
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
