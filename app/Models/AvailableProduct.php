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
        'images',
        'category',
        'subcategory',
        'seller_id',
        'description',
        'price',
        'status',
        'trending'
    ];
    
    function seller(){
        return $this->belongsTo(Seller::class);
    }
}
