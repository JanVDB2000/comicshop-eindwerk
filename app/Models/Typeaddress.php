<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Typeaddress extends Model
{
    use HasFactory;
    protected $fillable = ['name'];

    public function addresses(){
        return $this->belongsToMany(Address::class, 'address_typeaddress');
    }

}
