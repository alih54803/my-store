<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ProductImage;
use App\Models\Brands;
class Products extends Model
{
    use HasFactory;
    protected $table='products';
    protected $fillable=[
        'category_id',
        'name',
        'slug',
        'brand',
        'small_description',
        'description',
        'original_price',
        'selling_price',
        'quantity',
        'trendig',
        'status',
        'meta_title',
        'meta_keyword',
        'meta_description',
  
    ];

    public function category(){
        return $this->belongsTo(Category::class, 'category_id','id');
    }
    public function brands(){
        return $this->belongsTo(Brands::class);
    }
    public function productImages(){
        return $this->hasMany(ProductImage::class, 'product_id','id');
    }
}
