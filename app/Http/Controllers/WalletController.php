<?php

namespace App\Http\Controllers;

use App\Models\Lead;
use App\Models\SellerInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Wallet;
use App\Models\Seller;
use App\Models\User;
use App\Models\Product;

class WalletController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $admin=User::find(Session::get('admin')['id']);
        return view('admin/wallet/wallet',compact("admin"));
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
        $seller=Seller::where('email',$request->email)->first();
        if($seller){
            if($request->action = 'credited'){
                $data= new Wallet;
                $data->email=$request->email;
                $data->action=$request->action;
                $data->points=$request->point;
                $data->remarks=$request->remarks;
                $data->save();
                $seller->wallet_points=$seller->wallet_points+$request->point;
                $seller->update();
                Session::put('success','Point has been credited successfully');
                return redirect()->route('wallet_details');
            }
            else{
                if($request->point > $seller->wallet_points){
                    Session::put('error','Email that you entered has not enough points for debit');
                    return back();
                }
                else{
                    $data= new Wallet;
                    $data->email=$request->email;
                    $data->action=$request->action;
                    $data->points=$request->point;
                    $data->remarks=$request->remarks;
                    $data->save();
                    $seller->wallet_points=$seller->wallet_points-$request->point;
                    $seller->update();
                    Session::put('success','Point has been debited successfully');
                    return redirect()->route('wallet_details');
                }
            }
        }
        else{
            Session::put('error','Email that you entered is not availabe in our system');
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
        $admin=User::find(Session::get('admin')['id']);
        $wallet=Wallet::orderby('id','desc')->get();
        return view('admin/wallet/wallet-details',compact("wallet","admin"));
    }

    public function viewBalance()
    {
        $email=Session::get('seller')['email'];
        $wallet=Wallet::where('email',$email)->orderby('id','desc')->get();
        $seller=Seller::find(Session::get('seller')['id']);
        return view('frontend/wallet/mybalance',compact("wallet","seller"));
    }

    public function showCreditDetails(Request $request)
    {
        $seller=Seller::find(Session::get('seller')['id']);
        $wallet=Wallet::join('esewas', 'esewas.id', '=', 'wallets.esewa_id')
        ->first();
        return view('frontend/wallet/credited-payment-description',compact("wallet","seller"));
    }

    public function showDebitDetails(Request $request)
    {
        $seller=Seller::find(Session::get('seller')['id']);
        $wallet=Lead::join('products', 'products.id', '=', 'leads.product_id')
        ->join('buyers', 'buyers.id', '=', 'leads.buyer_id')
        ->join('wallets', 'wallets.lead_id', '=', 'leads.id')
        ->where('wallets.id',$request->wallet_id)
        ->first();
        return view('frontend/wallet/debit-payment-description',compact("wallet","seller"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $admin=User::find(Session::get('admin')['id']);
        $id=$request->wallet_id;
        $wallet=Wallet::find($id);
        return view('admin/wallet/wallet-edit',compact("wallet","admin"));
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
        $data= Wallet::find($request->id);
        $data->email=$request->email;
        $data->points=$request->point;
        $data->remarks=$request->remarks;
        
        $data->save();
        Session::put('success','Wallet Details has been updated successfully');
        return redirect()->route('wallet_details');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $id=$request->wallet_id;
        $data=Wallet::find($id);
        $data->delete();
        Session::put('success','Wallet has been removed successfully');
        return back();
    }
}
