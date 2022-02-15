<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use curl_init;
use App\Models\Seller;

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
            $url = "https://uat.esewa.com.np/epay/main";
            $data =[
                'amt'=> $amt,
                'pdc'=> '2',
                'psc'=> '3',
                'txAmt'=> '5',
                'tAmt'=> '100',
                'pid'=>$refId,
                'scd'=> 'epay_payment',
                'su'=>'http://merchant.com.np/page/esewa_payment_success?q=su',
                'fu'=>'http://merchant.com.np/page/esewa_payment_failed?q=fu'
            ];

                $curl = curl_init($url);
                curl_setopt($curl, CURLOPT_POST, true);
                curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
                curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
                $response = curl_exec($curl);
                curl_close($curl);

                if(strpos($response,'Success')== 0){
                    // $verified = true;
                    Session::put('success','Payment verified successfull.');
                    return redirect()->route('view-balance');
                    // dd("Verified Successfull");
                }
                else{
                    // $verified = false;
                    Session::put('success','Payment verified failed.');
                    return redirect()->route('recharge-points');
                    // dd("Verified Failed");
                }
                
        }
        else{

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
    public function destroy($id)
    {
        //
    }
}
