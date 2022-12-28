<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class addtocart extends Model
{
    use HasFactory;
    protected $table='addtocarts';
    protected $fillable=[
        'user_id',
        'product_id',
        'quantity'
    ];
    public function product(){
        return $this->belongsTo(Products::class, 'product_id','id');
    }
}
