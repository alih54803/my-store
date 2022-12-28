<?php

namespace App\Http\Controllers\Frontend;

use App\Models\SliderModel;
use App\Models\Brands;
use App\Models\Category;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Notifications\TestNotification;
use Illuminate\Http\Request;
use Notification;
use Illuminate\Support\Facades\DB;
use AmrShawky\LaravelCurrency\Facade\Currency;

class FrontendController extends Controller
{
    public function __construct()
    {
        // $this->middleware(['auth','verified']);
    }

    public function index()
    {
        $sliders = SliderModel::where('status', '0')->get();

        return view('frontend.index', compact('sliders'));
    }
    public function convert(Request $request)
    {
        $from = $request->currency_from;
        $to = $request->currency_to;
        $amount = $request->amount;
        $converted = Currency::convert()
            ->from($from) //currncy you are converting
            ->to($to)     // currency you are converting to
            ->amount(100) // amount in USD you converting to EUR
            ->get();
        return $converted;
        return view('frontend.cuurency', compact('converted'));
    }
    public function category()
    {

        $categories = Category::where('status', '1')->get();
        return view('frontend.collections.category.index', compact('categories'));
    }

    public function brands()
    {
        $brands = Brands::where('status', '1')->get();
        return view('frontend.brands.index', compact('brands'));
    }

    public function products(Request $request, $category_slug)
    {
        // dd($category_slug);
        $category = Category::where('slug', $category_slug)->first();
        if ($category) {
            if ($request->get('sort') == 'price_asc') {
                // dd('ass');
                $products = $category->products()->orderBy('selling_price', 'asc')->where('status', '0')->get();
            } elseif ($request->get('sort') == 'price_desc') {
                $products = $category->products()->orderBy('selling_price', 'desc')->where('status', '0')->get();
            } else {
                $products = $category->products()->get();
            }
            return view('frontend.collections.products.index', compact('category', 'products'));
        } else {
            return redirect()->back();
        }
    }
    public function productDetail($category_slug, $product_slug)
    {
        // echo $category_slug.'/and/'.$product_slug;

        $category = Category::where('slug', $category_slug)->first();
        if ($category) {
            $product = $category->products()->where('slug', $product_slug)->where('status', '0')->first();
            if ($product) {
                return view('frontend.collections.products.view', compact('product', 'category'));
            } else {
                return redirect()->back();
            }
        } else {
            return redirect()->back();
        }

        return view('frontend.collections.products.view');
    }
    public function productDetailwithAjax($category_slug, $product_slug)
    {
        $category = Category::where('slug', $category_slug)->first();
        if ($category) {
            $product = $category->products()->where('slug', $product_slug)->where('status', '0')->first();
            if ($product) {
                return view('frontend.ajaxcollections.products.view', compact('product', 'category'));
            } else {
                return redirect()->back();
            }
        } else {

            return redirect()->back();
        }
        return view('frontend.ajaxcollections.products.view');
    }

    public function productswithajax(Request $request, $category_slug)
    {
        $category = Category::where('slug', $category_slug)->first();
        if ($category) {
            if ($request->get('sort') == 'price_asc') {
                $products = $category->products()->orderBy('selling_price', 'asc')->where('status', '0')->get();
            } elseif ($request->get('sort') == 'price_desc') {
                $products = $category->products()->orderBy('selling_price', 'desc')->where('status', '0')->get();
            } else {
                $products = $category->products()->get();
            }
            return view('frontend.ajaxcollections.products.index', compact('category', 'products'));
        } else {
            return redirect()->back();
        }
    }


    public function practice()
    {
        // $orders=DB::table('orders')->pluck('price','name');
        // foreach($orders as ){

        // }
        //         $query = DB::table('users')->select('name');

        // $users = $query->addSelect('age')->get();

        // return DB::table('orders')
        //    ->select(DB::raw('count(*) as order_count, status'))
        //    ->where('status','<>',1)
        //    ->groupBy('status')
        //    ->get();

        ///or
        // return DB::table('orders')
        //    ->selectRaw('count(*) as order_count, status')
        //    ->where('status','<>',1)
        //    ->groupBy('status')
        //    ->get();
        //// or
        // return DB::table('orders')->where('status','<>',1)->count();

        // return  DB::table('orders')
        // ->select(DB::raw('count(*) as order_count'),'city', 'state')
        // ->groupByRaw('city, state')
        // ->get();

        // return DB::table('orders')
        // ->selectRaw('total_price *? as price_with_tax',[.98])->where('status','<>',1)
        // ->get();


        /////joining

        // return DB::table('users')
        // ->innerJoin('orders','users.id','=','orders.user_id')
        // ->select('users.*','orders.total_price')->get();

        //         $first=DB::table('users')
        //                 ->whereNull('lname')->get();
        // return $first;
        //                 return DB::table('users')
        //                 ->whereNull('lname')
        //                 ->union($first)
        //                 ->get();


        // return    DB::table('users')
        //         ->where('name','=','null')
        //         ->orWhere(function($qury){
        //             $qury->where('name','umerfarooq')
        //             ->where('email','umer@umer.com');
        //         })
        //         ->get();

        ////select * from users where votes > 100 or (name = 'Abigail' and votes > 50)

        //  return    DB::table('users')
        //             ->whereColumn('name','lname')///first and last name shoudl same
        //             ->get();

        // return DB::table('users')
        //            ->whereExists(function ($query) {
        //                $query->select(DB::raw(1))
        //                      ->from('orders')
        //                      ->whereColumn('orders.user_id', 'users.id');
        //            })
        //            ->get();
        // return DB::table('orders')
        //     ->groupBy('user_id')
        //     ->having('total_price', '>', 10)
        //     ->get();


    }

    public function sendNotification()
    {
        $user = User::find(2);
        // return $user;
        $details = [
            'greeting' => 'Hi Artisan',
            'body' => 'This is my first notification from ItSolutionStuff.com',
            'thanks' => 'Thank you for using ItSolutionStuff.com tuto!',
            'actionText' => 'View My Site',
            'actionURL' => url('/'),
            'order_id' => 10
        ];

        Notification::send($user, new TestNotification($details));
        dd('notification done');
    }
}
