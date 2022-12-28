<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function categories(){
        // $categories=Category::get();
        // $categorywithProducts=$categories->products;

        // $products=Products::where('status','0')->with('category')->get();
        // $category=Category::where('status','0')->with('products')->get();
        // $category=Category::where('status','0')->first();
        // $category->products;

        // $category=DB::table('categories')->where('name','bedroom')->get();
        // $category=DB::table('categories')->where('status','0')->value('id');

        // $category=DB::table('categories')->find('2');

        // $category=DB::table('categories')->pluck('slug','name');
        // $category=DB::table('categories')->where('status','0')->
        //             chunkById(2,function($categosry){
        //                 foreach($categosry as $cat){
        //                     DB::table('categories')
        //                     ->where('id',$cat->id)
        //                     ->update(['status'=>'1']);
        //                 }
        //             });


        // $category=DB::table('categories')->count();
        $category=DB::table('categories')->max();




        return response($category);
    }
}
