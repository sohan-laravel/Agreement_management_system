<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Slider;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Str;
use Image;
use Symfony\Component\Console\Input\Input;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $slider = Slider::orderBy('id', 'desc')->get();
        return view('backend.slider.index', compact('slider'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.slider.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //return $request->all();

        $this->validate($request, [

            'name'  => 'required|max:255',
            'image'  => 'required|image',
        ]);

        $slider = new Slider();

        $slider->name = $request->name;
        $slider->slug = Str::slug($request->name, '-');


        if ($request->hasFile('image')) {
            //insert that image
            $sliderImage = $request->file('image');
            $img = rand(1111, 9999) . date('.d-m-y.') . '.' . $sliderImage->getClientOriginalExtension();
            $location = public_path('frontend/images/SliderImage/' . $img);
            Image::make($sliderImage)->save($location);


            $slider->image = $img;
        }

        $slider->save();

        Toastr::success('Slider Successfully Created', 'Success');

        return redirect()->route('admin.slider.index');
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
        $slider = Slider::find($id);

        return view('backend.slider.edit', compact('slider'));
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
        $this->validate($request, [

            'name'  => 'required|max:255',
        ]);

        $slider = Slider::find($id);

        $slider->name = $request->name;
        $slider->slug = Str::slug($request->name, '-');


        if ($request->image > 0) {

            if (file_exists(public_path('frontend/images/SliderImage/' . $slider->image))) {
                unlink(public_path('frontend/images/SliderImage/' . $slider->image));
            }

            //insert that image
            $sliderImage = $request->file('image');
            $img = rand(1111, 9999) . date('.d-m-y.') . '.' . $sliderImage->getClientOriginalExtension();
            $location = public_path('frontend/images/SliderImage/' . $img);
            Image::make($sliderImage)->save($location);


            $slider->image = $img;
        }

        $slider->save();

        Toastr::success('Slider Successfully Updated', 'Success');

        return redirect()->route('admin.slider.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $slider = Slider::find($id);

        if (!is_null($slider)) {

            if (file_exists(public_path('frontend/images/SliderImage/' . $slider->image))) {
                unlink(public_path('frontend/images/SliderImage/' . $slider->image));
            }

            $slider->delete();
        }

        Toastr::success('Slider Successfully Deleted', 'Success');

        return back();
    }


    public function inactive(Request $request)
    {
        $slider = Slider::findOrFail($request->id);
        $slider->status = $request->status;

        // if ($slider->status === 0) {
        //     return 0;
        // }

        $slider->save();
        //Toastr::success('Status Successfully Changed', 'Success');
        return 1;
    }
}
