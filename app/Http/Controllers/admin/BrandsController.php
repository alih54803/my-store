<?php

namespace App\Http\Controllers\Admin;
use App\Models\Brands;
use App\Models\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
class BrandsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        $data['brandss']=Brands::first();
        $data['brands']=Brands::get();
         $umer=['umer'=>$data];
         return $umer;
        return $data;
        return $data['brandss']['name'];
        // return array(
        //     "‘key1’",
        //     "‘key2’",
        //     "‘key3’",
        //      array(
        //         "‘key1’",
        //         "‘key2’",
        //         "‘key3’" => array(
        //             "‘key1’"
        //         )
        //     )
        // );
        // return ['g'=>'um    er','jj','k'=>'kjdfjk'];

        return  ['brands'=>$brands,'brandss'=>$brandss,array(1,2,4,5, $brands)];
        return ['4', '1'=> 5,'2'=>'umer'];
        return ['in'=>4, 5,'umer'];
            // return ;
        // return array('brands'=>$brands);
        //  $myarray=array(1,2,4,5, $brands);

        // return response()->json(array('brands'=>$brands));


        if(Gate::allows('isAdmin')){
            $brands=Brands::get();
            // return $brands;
            // $brands['brnd']=Brands::get();
            // return $brands;
            $categories=Category::where('status', '0')->get();
            return view('admin.brands.index', ['brands'=>$brands,'brandss'=>$brandss,array(1,2,4,5, $brands)]);
            // return view('admin.brands.index', compact('brands','categories'));
        }
        else{
            dd('you are not admin');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        $request->validate([
            'name'=>'required|string',
            'slug'=>'required|string',
            'status'=>'nullable'
        ]);
      //  $brand=new Brand()

        $brand=Brands::create([

            'name'=>$request->name,
            'slug'=>$request->slug,
            'status'=>$request->status==true?'1':'0',
            'category_id'=>$request->category_id
        ]);
        //dd($brand);
        // session()->flash('message', 'brand added successfull');
        // $this->dispatchBrowserEvent('close-modal');->
        return redirect('admin/brands');
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
    public function update(Request $request, $id)
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
}
