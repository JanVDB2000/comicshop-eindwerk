<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = ['user_id','TC_code','shipping','billing'];

    public function orderdetail(){
        return $this->belongsTo(OrderDetail::class);
    }
}
