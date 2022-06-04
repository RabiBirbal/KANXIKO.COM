<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Redeem extends Model
{
    use HasFactory;

    protected $table='redeems';
    protected $fillable=[
        'user_id',
        'redeem_product_id',
        'status'
    ];

    function redeemProduct(){
        return $this->hasOne(RedeemProduct::class,'id','redeem_product_id');
    }
    function user(){
        return $this->hasOne(RedeemProduct::class);
    }
}