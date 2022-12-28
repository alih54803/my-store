<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App;
class Attribute extends Model
{
    use HasFactory;
    protected $with=['attribute_translation'];
    public function getTranslation($field ='',$lang=false){
        $lang=$lang==false ? App::getLocale():$lang;
        $attribute_translation=$this->attribute_translation->where('lang',$lang)->first();
        return $attribute_translation!=null?$attribute_translation->field:$this->field;
    }
    public function attribute_translation(){
        return $this->hasMany(AttributeTranslation::class);
    }
    public function attribute_values(){
        return $this->hasMany(AttributeValue::class);
    }
}
