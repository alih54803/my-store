<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
class WishlistController extends Controller
{
//     public function index(){
// // echo 'umer';
//         return view('frontend.wishlist.index');
//     }
    public function wishlist(){
        // echo 'umer';
                return view('frontend.wishlist.show');
            }
}
