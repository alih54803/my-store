<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use App\Models\Brands;
use App\Models\Products;

use App\Http\Requests\ProductFormRequest;
use App\Http\Controllers\Controller;
use App\Models\AttributeValue;

use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //   echo 'umer farooq produc index';
        // $brands=Brands::all();
        $products = Products::all();


        return view('admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::where('parent_id', 0)->with('childrenCategories')->get();
        // return $categories;
        $brands = Brands::all();

        return view('admin.products.p_create', compact('categories', 'brands'));
        // return view('admin.products.create', compact('categories', 'brands'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store_product(Request $request)
    {
        return $request;
        dd('umer');
        $validatedData = $request->validated();
        // dd($validatedData);

        $category = Category::findOrFail($validatedData['category_id']);

        $category->products;



        $product = $category->products()->create([
            'category_id' => $validatedData['category_id'],
            'name' => $validatedData['name'],
            'slug' => $validatedData['slug'],
            'brand' => $validatedData['brand'],
            'small_description' => $validatedData['small_description'],
            'description' => $validatedData['description'],
            'original_price' => $validatedData['original_price'],
            'selling_price' => $validatedData['selling_price'],
            'quantity' => $validatedData['quantity'],
            'trending' => $request->trending == true ? '1' : '0',
            'status' => $request->status == true ? '1' : '0',
            'meta_title' => $validatedData['meta_title'],
            'meta_keyword' => $validatedData['meta_keyword'],
            'meta_description' => $validatedData['meta_description'],
        ]);
        if ($request->hasFile('image')) {
            $uploadPath = 'uploads/products/';
            foreach ($request->file('image') as $imageFile) {
                $fileName = date('dmyHi') . $imageFile->getClientOriginalName();
                $imageFile->move('uploads/products/', $fileName);

                $product->productImages()->create([
                    'product_id' => $product->id,
                    'image' => $fileName
                ]);
            }
        }
        $collection = collect($data);
        $choice_options = array();
        $str = '';
        $item = array();
        foreach ($collection['choice_no'] as $key => $no) {
            $str = 'choice_options_' . $no;
            $item['attribute_id'] = $no;
            $attribute_data = array();
            foreach ($collection[$str] as $key => $value) {
                array_push($attribute_data, $value);
            }
            unset($collection[$str]);
            $item['attribute_value'] = $attribute_data;
            array_push($choice_options, $item);
        }

        return redirect('admin/products')->with('success', 'successfully  added ');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update()
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function products_add_more_choice_option(Request $request)
    {
        // dd($request->attribute_id);
        $all_attributes=AttributeValue::with('attribute')->where('attribute_id',$request->attribute_id)->get();
        $html='';
        foreach($all_attributes as $row){
            // $html.=view('frontend.optionList',['row'=>$row]);
            // or
            $html.= '<option value="' .$row->value. '">' .$row->value. '</option>';
        }
        // echo json_encode($html);

        return response()->json($html);
    }
}
