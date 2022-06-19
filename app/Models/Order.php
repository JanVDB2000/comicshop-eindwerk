<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = ['user_id','TC_code'];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function orderdetails(){
        return $this->hasMany(OrderDetail::class);
    }

    public function addresses(){
        return $this->hasMany(Address::class);
    }

    public function ordersubtotaal(){
        $subtotaal = 0;

        foreach($this->orderdetails as $detail){
            $subtotaal += $detail->amount * $detail->price;
        }
        $subtotal = $subtotaal;

        number_format($subtotal,2,'.','');

        return $subtotaal;
    }

    /**searching/filtering**/
    public function scopeFilter($query, array $filters){
        //if(isset($filters['search']) == false
        if($filters['search'] ?? false){ //php 8
            $query
                ->whereHas('user',function ($q){
                    $q->where('name','like', '%' . request('search') . '%');
                })
                ->orWhere('TC_code','like', '%' . request('search') . '%');
        }
    }
}
