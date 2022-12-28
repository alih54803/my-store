<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\crudsModel;
class crudControler extends Controller
{

    function __construct()
    {
         $this->middleware('permission:product-list|product-create|product-edit|product-delete', ['only' => ['index','show']]);
         $this->middleware('permission:product-create', ['only' => ['create','store']]);
         $this->middleware('permission:product-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:product-delete', ['only' => ['destroy']]);
    }
    //
// public function __construct(){
//     $this->middleware('auth');
// }
    public function index(){

//         $crud=crudsModel::all();
// return dd($crud);
//             return $crud;
// return response()->json($crud);
        // $pass_laptop_model=crudsModel::get();
        $myArr['pass_laptop_model']=crudsModel::get();
    // return $myArr;
        return view('admin.products.index', $myArr);
        //return view('myviews.list',['pass_crud_model'=>$pass_crud_model]);

    }

    public function create(){

        return view('admin.products.create');
    }
    public function store(Request $request){
        $request->validate([
            'us_name'=>'required',
            'us_detail'=>'required',
            'us_image'=>'required|image|mimes:jpeg,png,jpg,gif,svg'
        ]);

        $laptop=new crudsModel();
        //return $laptop;
        if($request->file('us_image')){
            $file=$request->file('us_image');
            $fileName=date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('public/Image'), $fileName);
            $laptop['image']=$fileName;

        }
       // $laptop->image=$request->file('us_image')->store('public/images');

       $laptop->name=$request->us_name;
       $laptop->detail=$request->us_detail;


               $laptop->save();


        return redirect()->route('laptop_route.index')->with('succesfully added');

    }
public function show($id){
    $laptopModel=crudsModel::where('id', $id)->first();
        return view('admin.products.show', compact('laptopModel'));
}
    public function edit($id){
        //dd($id);
        $laptopModel=crudsModel::where('id', $id)->first();
        //dd('umer');
        return view('admin.products.edit',compact('laptopModel'));
    }

    public function update(Request $request,$id){

        $request->validate([
            'us_name'=>'required',
            'us_detail'=>'required',
            'us_image'=>'required|image|mimes:jpeg,png,jpg,gif,svg'
        ]);
        $laptop=crudsModel::where('id', $id)->first();
       // $laptop=new ProductModel();
        if($request->file('us_image')){
            $file=$request->file('us_image');
            $fileName=date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('public/Image'), $fileName);
            $laptop['image']=$fileName;

        }
       // $laptop->image=$request->file('us_image')->store('public/images');

       $laptop->name=$request->us_name;
       $laptop->detail=$request->us_detail;


               $laptop->save();


        return redirect()->route('laptop_route.index')->with('succesfully added');

    }
    public function destroy($id){
        $laptopmodel = crudsModel::find($id);
        $laptopmodel->delete();
        return redirect()->route('laptop_route.index')->with('Success','successfully deleted');

    }

}
