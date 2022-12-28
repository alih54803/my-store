<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class crudsModel extends Model
{
    use HasFactory;
    protected $table='cruds';
    protected $fillable=['id','image', 'name','detail'];
}
