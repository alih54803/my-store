<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\orderItems;
class orders extends Model
{
    use HasFactory;
    protected $table = 'orders';
    protected $fillable = [
        'user_id',
        'fname',
        'lname',
        'email',
        'phone',
        'address',
        'city',
        'state',
        'country',
        'pincode',
        'total_price',
        'status',
        'message',
        'tracking_no',

    ];

    public function orderItems(){
        return $this->hasMany(orderItems::class,'order_id','id');
    }
    public function setCityAttribute($value)
    {
        $this->attributes['city'] = json_encode($value);
    }

    /**
     * Get the categories
     *
     */
    public function getCityAttribute($value)
    {
        return $this->attributes['city'] = json_decode($value);
    }
}
