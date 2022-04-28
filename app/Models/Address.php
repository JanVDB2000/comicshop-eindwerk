<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;
    protected $fillable = ['firstName', 'lastName', 'address_1','country','state','zip','user_id'];

    public function TypeAdres(){
        return $this->belongsToMany(Typeaddress::class, 'address_typeaddress');
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
}
