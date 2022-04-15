<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AvailableProduct extends Model
{
    use HasFactory;

    protected $table='available_products';
    protected $fillable=[
        'name',
        'product_image',
        'category',
        'subcategory',
        'seller_id'
    ];
    
    function seller(){
        return $this->belongsTo(Seller::class);
    }
}
