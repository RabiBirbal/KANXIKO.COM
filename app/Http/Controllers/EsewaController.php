<?php

namespace App\Http\Controllers;

use App\Mail\PointsCreditedSucessfullMail;
use App\Models\Esewa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Mail;
use App\Models\Seller;
use App\Models\Wallet;
use App\Models\User;

class EsewaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $seller=Seller::find(Session::get('seller')['id']);
        return view('frontend.recharge-points.recharge-points',compact("seller"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function verifyPayment(Request $request){
        $status = $request->q;
        $amt = $request->amt;
        $oid = $request->oid;
        $refId = $request->refId;
        // dump($status,$amt,$oid,$refId);
        if($status == 'su'){
            $url = "https://esewa.com.np/epay/main";
            $data =[
                'amt'=> $amt,
                'rid'=> $refId,
                'pid'=> $oid,
                'scd'=> 'NP-ES-EMN'
            ];

                $curl = curl_init($url);
                curl_setopt($curl, CURLOPT_POST, true);
                curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
                curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
                $response = curl_exec($curl);
                curl_close($curl);

                if(strcmp($response,"Success") == true){
                    // $verified = true;
                    $data = new Esewa;
                    $data->amount=$amt;
                    $data->random_id=$oid;
                    $data->refId=$refId;
                    $data->save();

                    // $pdc=3;
                    // $psc=2;
                    // $txAmt=5;
                    // $points=$amt - $pdc -$psc - $txAmt;

                    $wallet=new Wallet;
                    $wallet->email=Session::get('seller')['email'];
                    $wallet->action="Credited";
                    $wallet->points=$amt;
                    $wallet->remarks=$amt. " point has been credited to your wallet.";
                    $wallet->esewa_id=$data->id;
                    $wallet->save();

                    $seller=Seller::find(Session::get('seller')['id']);
                    $seller->wallet_points=$seller->wallet_points+$amt;
                    $seller->update();

                    Mail::to(Session::get('seller')['email'])->send(new PointsCreditedSucessfullMail($wallet));
                    Session::put('success','Payment verification successfull.');
                    return redirect()->route('view-balance');
                    // dd("Verified Successfull");
                }
                else{
                    // $verified = false;
                    Session::put('error','Payment verification failed.');
                    return redirect()->route('recharge-points');
                    // dd("Verified Failed");
                }
                
        }
        else{
            Session::put('error','Payment failed.');
            return redirect()->route('recharge-points');
        }
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
        //
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
        $esewa=Esewa::join('wallets', 'wallets.esewa_id', '=', 'esewas.id')
        ->orderby('esewas.id','desc')
        ->get();
        return view('admin/wallet/esewa-details',compact("admin","esewa"));
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
    public function destroy($id)
    {
        //
    }
}
