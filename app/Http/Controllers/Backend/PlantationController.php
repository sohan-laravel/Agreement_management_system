<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Plantation;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Str;
use Image;

class PlantationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $plantation = Plantation::orderBy('id', 'desc')->get();
        return view('backend.plantation.index', compact('plantation'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.plantation.create');
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

            'image'  => 'required|image',
        ]);

        $plantation = new Plantation();

        $plantation->name = $request->name;
        $plantation->link = $request->link;
        $plantation->slug = Str::slug($request->name, '-');


        if ($request->hasFile('image')) {
            //insert that image
            $plantationImage = $request->file('image');
            $imgName = rand(1111, 9999) . date('.d-m-y.') . '.' . $plantationImage->getClientOriginalExtension();
            $location = public_path('frontend/images/PlantationImage/' . $imgName);
            Image::make($plantationImage)->save($location);


            $plantation->image = $imgName;
        }

        $plantation->save();

        Toastr::success('Plantation Successfully Created', 'Success');

        return redirect()->route('admin.plantation.index');
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
        $plantation = Plantation::find($id);

        return view('backend.plantation.edit', compact('plantation'));
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

        $plantation = Plantation::find($id);

        $plantation->name = $request->name;
        $plantation->link = $request->link;
        $plantation->slug = Str::slug($request->name, '-');


        if ($request->image > 0) {

            if (file_exists(public_path('frontend/images/PlantationImage/' . $plantation->image))) {
                unlink(public_path('frontend/images/PlantationImage/' . $plantation->image));
            }

            //insert that image
            $plantationImage = $request->file('image');
            $imgName = rand(1111, 9999) . date('.d-m-y.') . '.' . $plantationImage->getClientOriginalExtension();
            $location = public_path('frontend/images/PlantationImage/' . $imgName);
            Image::make($plantationImage)->save($location);


            $plantation->image = $imgName;
        }

        $plantation->save();

        Toastr::success('Plantation Successfully Updated', 'Success');

        return redirect()->route('admin.plantation.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $plantation = Plantation::find($id);

        if (!is_null($plantation)) {

            if (file_exists(public_path('frontend/images/PlantationImage/' . $plantation->image))) {
                unlink(public_path('frontend/images/PlantationImage/' . $plantation->image));
            }

            $plantation->delete();
        }

        Toastr::success('Plantation Successfully Deleted', 'Success');

        return back();
    }

    public function inactive(Request $request)
    {
        $plantation = Plantation::findOrFail($request->id);
        $plantation->status = $request->status;

        // if ($slider->status === 0) {
        //     return 0;
        // }

        $plantation->save();
        //Toastr::success('Status Successfully Changed', 'Success');
        return 1;
    }
}
