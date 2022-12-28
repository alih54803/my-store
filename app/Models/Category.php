<?php

namespace App\Models;

use App\Models\Products;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $table = 'categories';
    protected $fillable = [
        'name',
        'slug',
        'description',
        'image',
        'meta_title',
        'meta_keyword',
        'meta_description',
        'status'

    ];



    public function categories()
    {
        return $this->hasMany(Category::class, 'parent_id', 'id');
    }
    public function childrenCategories()
    {
        return $this->hasMany(Category::class, 'parent_id', 'id')->with('categories');
    }
    public function parentCategory()
    {
        return $this->belongs(Category::class, 'parent_id', 'id');
    }
    public function brands()
    {
        return $this->hasMany(Brands::class, 'category_id', 'id');
    }
    public function products()
    {
        return $this->hasMany(Products::class, 'category_id', 'id');
    }

    public function attributes(){
        return $this->belongsToMany(Attribute::class);
    }
}
