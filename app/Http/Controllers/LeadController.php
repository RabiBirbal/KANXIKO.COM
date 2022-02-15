<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Product;
use App\Models\Seller;
use App\Models\Lead;
use App\Models\Wallet;
use App\Models\Buyer;
use App\Models\User;
use Illuminate\Support\Facades\Crypt;

class LeadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   
        $admin=User::find(Session::get('admin')['id']);
        $product= Product::join('buyers', 'buyers.product_id', '=', 'products.id')
        ->get();
        $seller=Seller::find(Session::get('seller')['id']);
        return view('frontend/leads/buyleads',compact("product","seller","admin"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function viewLeads()
    {
        $admin=User::find(Session::get('admin')['id']);
        $lead= Lead::join('products', 'products.id', '=', 'leads.product_id')
        ->join('buyers', 'buyers.id', '=', 'leads.buyer_id')
        ->join('sellers', 'sellers.id', '=', 'leads.seller_id')
        ->get();
        return view('admin/leads/seller',compact("admin","lead"));
    }

    public function viewFreeLead()
    {
        $product= Product::join('buyers', 'buyers.product_id', '=', 'products.id')
        ->where('leads_category','Free')
        ->get();
        $seller=Seller::find(Session::get('seller')['id']);
        return view('frontend/leads/free-leads',compact("product","seller"));
    }

    public function viewPremiumLead()
    {
        $product= Product::join('buyers', 'buyers.product_id', '=', 'products.id')
        ->where('leads_category','Premium')
        ->get();
        $seller=Seller::find(Session::get('seller')['id']);
        return view('frontend/leads/premium-leads',compact("product","seller"));
    }

    public function viewRegularLead()
    {
        $product= Product::join('buyers', 'buyers.product_id', '=', 'products.id')
        ->where('leads_category','Regular')
        ->get();
        $seller=Seller::find(Session::get('seller')['id']);
        return view('frontend/leads/regular-leads',compact("product","seller"));
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
        $seller=Seller::find($request->seller_id);
        if($seller->wallet_points >= $request->lead_point){
            $data= new Lead;
            $data->product_id=$request->product_id;
            $data->seller_id=$request->seller_id;
            $data->buyer_id=$request->buyer_id;
            $data->enquiry_status="Lead Buy Successfully";
            $data->last_comment="Thank You";
            $data->save();

            $seller=Seller::find($request->seller_id);
            $seller->wallet_points=$seller->wallet_points - $request->lead_point;
            $seller->update();

            $product=Product::find($request->product_id);
            $product->availability=$request->availability - 1;
            $product->update();

            $wallet=new Wallet;
            $wallet->email=Session::get('seller')['email'];
            $wallet->action="Debited";
            $wallet->points=$request->lead_point;
            $wallet->remarks=$request->lead_point." points has been debited form your wallet";
            $wallet->lead_id=$data->id;

            $wallet->save();
            Session::put('success','Lead has been bought successfully.'.$request->lead_point. ' points has been debited from your wallet');
            return redirect()->route('user-product-details',Crypt::encryptString($request->product_id));
        }
        else{
            Session::put('error','You have not enough points to buy this lead. Please recharge your wallet.');
            return back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $seller=Seller::find(Session::get('seller')['id']);
        $lead= Buyer::join('products', 'products.id', '=', 'buyers.product_id')
        ->join('leads', 'leads.buyer_id', '=', 'buyers.id')
        ->where('seller_id',$seller->id)
        ->get();
        return view('frontend/leads/lead-manager',compact("seller","lead"));
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
       $data=Lead::find($id);
       $data->enquiry_status=$request->enquiry_status;
       $data->last_comment=$request->last_comment;

       $data->update();
       Session::put('success','Congratulation!! Updated Successfully');
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
