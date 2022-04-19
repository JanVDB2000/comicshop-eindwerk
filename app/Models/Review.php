<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use phpDocumentor\Reflection\Types\Nullable;

class Review extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'product_id', 'description', 'stars'];


    public function product(){
        return $this->belongsTo(Product::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function avgRating($id)
    {
        $stars = Review::whereid($id)->avg('stars');
        return $stars;
    }
}
