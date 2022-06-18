<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;
    protected $fillable = ['address_1','country','state','zip','user_id','order_id'];

    public function TypeAdres(){
        return $this->belongsToMany(Typeaddress::class, 'address_typeaddress');
    }

    public function users(){
        return $this->belongsToMany(User::class, 'user_address');
    }

    public function order(){
        return $this->belongsTo(Order::class);
    }

}
