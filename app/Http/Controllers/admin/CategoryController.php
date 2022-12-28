<?php

namespace App\Http\Controllers\Admin;
use App\Http\Requests\CategoryFormRequest;
use App\Models\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request as HttpRequest;
// use GuzzleHttp\Psr7\Request;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Http\UploadedFile;
class CategoryController extends Controller
{

//     public function __construct(){
// $this->middleware('auth');
//     }
    public function index(){

        $categories=Category::orderBy('id','asc')->paginate(20);
        return view('admin.category.index',compact('categories'));

    }

    public function create(){
        $categories=Category::where('parent_id',0)->with('childrenCategories')->get();


        return view('admin.category.create',compact('categories'));
    }
    public function store(Request $request){
    // return $request;

        $category=new Category();

        $category->name=$request['name'];

        if($request->parent_id!='0'){
            $category->parent_id=$request->parent_id;

            $parent=Category::find($request->parent_id);
            // return $parent;
            $category->order_level=$parent->order_level + 1;
        }
        // if($request->slug!=null){
        //     $category->slug=preg_replace('/[^A-Za-z0-9\-]/','',str_replace('','-',$request->slug));
        // }else{
        //     $category->slug = preg_replace('/[^A-Za-z0-9\-]/', '', str_replace(' ', '-', $request->name)).'-'.Str::random(5);

        // }

        // $category->slug=Str::slug($validatedData['slug']);
        // $category->description=$validatedData['description'];

        // if($request->hasFile('image')){
        //     $file=$request->file('image');
        //     //$ext=$file->getClientOriginalExtention();
        //     //$filename=time().'.'.$ext;
        //     $filename=date('YmdHi').$file->getClientOriginalName();
        //    $file->move('uploads/category/',$filename);
        // //    $file->move(public_path('public/Image'),$filename);
        // //    $category->image=$filename;
        // $category['image']=$filename;
        // }
        // $category->meta_title=$validatedData['meta_title'];
        // $category->meta_keyword=$validatedData['meta_keyword'];
        // $category->meta_description=$validatedData['meta_description'];

        // $category->status=$request->status==true?'1':'0';
        $category->save();
        $category->attributes()->sync($request->filtering_attributes);

        return redirect()->route('categories.index')->with('message','category added successfully');
        // return redirect('admin/category')->with('message','category added successfully');
    }
}
