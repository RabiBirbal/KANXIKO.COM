<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Notifications\Notifiable;

class BuyerInfo extends Model
{
    use HasFactory, Notifiable;

    protected $fillable=[
        'first_name',
        'last_name',
        'password',
        'email',
        'email_verification_code',
        'is_verified',
        'contact',
        'address',
        'province',
        'district',
        'points',
        'refer_code',
        'refer_id'
    ];
    
    function refer(){
        return $this->hasOne(BuyerInfo::class);
    }
}