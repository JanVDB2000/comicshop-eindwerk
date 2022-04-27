<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;
    protected $fillable = ['firstName', 'lastName', 'address_1','address_2','country','state','zip'];

    public function TypeAdres(){
        return $this->belongsToMany(TypeAdres::class, 'addresses_type_adres');
    }
}
