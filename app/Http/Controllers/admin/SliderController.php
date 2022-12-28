<?php

namespace App\Http\Controllers\Admin;
use App\Models\SliderModel;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sliders=SliderModel::all();
        return view('admin.slider.index',compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
     return view('admin.slider.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request);
        // $request->validate([
        //     'title'=>'required',
        //     'description'=>'required',
        //     'us_image'=>'required|image|mimes:jpeg,png,jpg,gif,svg',
        //     'status'=>'nullable'
        // ]);
        // dd($request);
        $slider=new SliderModel();
        if($request->file('image')){
            $file=$request->file('image');
            $fileName=date('dmYHi').$file->getClientOriginalName();
            $file->move('uploads/slider/', $fileName);
        $slider['image']=$fileName;
        
        }

       $slider->status=$request->status==true?'1':'0';
       $slider->title=$request->title;
       $slider->description=$request->description;
       $slider->save();
      

        // $validateRequest['status']=$request->status==true?'1':'0';
        // SliderModel::create([
        //     'title'=>$validateRequest['title'],
        //     'description'=>$validateRequest->description,
        //     'image'=>$validateRequest['image'],
        //     'status'=>$validateRequest['status']
        // ]);
        return redirect()->route('slider.index')->with('success', 'success fullyu added');
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
