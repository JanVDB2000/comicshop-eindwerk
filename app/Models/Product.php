<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Kyslik\ColumnSortable\Sortable;
use Laravel\Sanctum\HasApiTokens;

class Product extends Model
{
    use HasApiTokens, HasFactory, Notifiable, Sortable;
    protected $fillable=['photo_id','product_category_id', 'brand_id','name','body','published_date','writer','penciled','item_number','price','slug'];

    public function keywords(){
        return $this->morphToMany(Keyword::class, 'keywordable');
    }
    public function photo(){
        return $this->belongsTo(Photo::class);
    }
    public function brand(){
        return $this->belongsTo(Brand::class);
    }
    public function reviews(){
        return $this->hasMany(Review::class);
    }
    public function productcategory(){
        return $this->belongsTo(ProductCategory::class, 'product_category_id');
    }
}
