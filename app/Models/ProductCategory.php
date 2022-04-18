<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    use HasFactory;
    protected $fillable = ['comment_id', 'user_id', 'photo_id', 'body','is_active'];

    public function products(){
        return $this->hasMany(Product::class);
    }
}
