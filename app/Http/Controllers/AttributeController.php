<?php

namespace App\Http\Controllers;

use App\Models\AttributeTranslation;
use App\Models\Attribute;
use App\Models\AttributeValue;
use Illuminate\Http\Request;

class AttributeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $attributes = Attribute::get();
        return view('admin.products.attribute.index', compact('attributes'));
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
        // return $request;
        $attribute=new Attribute;
        $attribute->name=$request->name;
        $attribute->save();
        // $attribute_translation=AttributeTranslation::firstOrNew(['lang'=>env('DEFAULT_LANGAUGE'),'attribute_id'=>$attribute->id]);
        // $attribute_translation->name=$request->name;
        // $attribute_translation->save();

        return redirect()->route('attributes.index')->with('Attribute has been inserted succesfulu')->success();

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // dd($id);
        $data['attributee']=Attribute::findOrFail($id);
        $data['all_attribute_value']=AttributeValue::with('attribute')->where('attribute_id',$id)->get();
        // return $data;
        return view('admin.products.attribute.attribute_value.index',$data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function myedit(Request $request, $id, $name)
    {
        // dd([$name]);
        //
    }
    public function edit(Request $request, $id, $name)
    {
        dd([$id]);
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

    public function store_attribute_value(Request $request){
        // return $request;
        $attribute_value=new AttributeValue();
        $attribute_value->attribute_id=$request->attribute_id;
        $attribute_value->value=ucfirst($request->value);
        $attribute_value->save();
        // return $this->show($request->attribute_id);
        return redirect()->route('attributes.show',$request->attribute_id);

    }
}
