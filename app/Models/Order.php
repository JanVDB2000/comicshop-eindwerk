<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = ['user_id','code_m'];

    public function orderdetail(){
        return $this->belongsTo(OrderDetail::class);
    }
}
