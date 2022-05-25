<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table='orders';
    protected $fillable=[
        'av_product_id',
        'user_id',
        'quantity',
        'total'
    ];

    public function available_product()
    {
        return $this->hasOne(AvailableProduct::class,'id','av_product_id');
    }

    public function user()
    {
        return $this->belongsTo(BuyerInfo::class);
    }
}