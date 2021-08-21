<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Plantationright;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Str;
use Image;

class PlantationrightController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $plantationright = Plantationright::orderBy('id', 'desc')->get();
        return view('backend.plantationright.index', compact('plantationright'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.plantationright.create');
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

        $plantationright = new Plantationright();

        $plantationright->name = $request->name;
        $plantationright->link = $request->link;
        $plantationright->slug = Str::slug($request->name, '-');


        if ($request->hasFile('image')) {
            //insert that image
            $plantationrightImage = $request->file('image');
            $imgName = rand(1111, 9999) . date('.d-m-y.') . '.' . $plantationrightImage->getClientOriginalExtension();
            $location = public_path('frontend/images/PlantationRightImage/' . $imgName);
            Image::make($plantationrightImage)->save($location);


            $plantationright->image = $imgName;
        }

        $plantationright->save();

        Toastr::success('Plantation Right Side Successfully Created', 'Success');

        return redirect()->route('admin.plantationright.index');
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
        $plantationright = Plantationright::find($id);

        return view('backend.plantationright.edit', compact('plantationright'));
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
        $plantationright = Plantationright::find($id);

        $plantationright->name = $request->name;
        $plantationright->link = $request->link;
        $plantationright->slug = Str::slug($request->name, '-');


        if ($request->image > 0) {

            if (file_exists(public_path('frontend/images/PlantationRightImage/' . $plantationright->image))) {
                unlink(public_path('frontend/images/PlantationRightImage/' . $plantationright->image));
            }

            //insert that image
            $plantationrightImage = $request->file('image');
            $imgName = rand(1111, 9999) . date('.d-m-y.') . '.' . $plantationrightImage->getClientOriginalExtension();
            $location = public_path('frontend/images/PlantationRightImage/' . $imgName);
            Image::make($plantationrightImage)->save($location);


            $plantationright->image = $imgName;
        }

        $plantationright->save();

        Toastr::success('Plantation Right Side Successfully Updated', 'Success');

        return redirect()->route('admin.plantationright.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $plantationright = Plantationright::find($id);

        if (!is_null($plantationright)) {

            if (file_exists(public_path('frontend/images/PlantationRightImage/' . $plantationright->image))) {
                unlink(public_path('frontend/images/PlantationRightImage/' . $plantationright->image));
            }

            $plantationright->delete();
        }

        Toastr::success('Plantation Right Side Successfully Deleted', 'Success');

        return back();
    }

    public function inactive(Request $request)
    {
        $plantationright = Plantationright::findOrFail($request->id);
        $plantationright->status = $request->status;

        // if ($plantationright->status === 0) {
        //     return 0;
        // }

        $plantationright->save();
        //Toastr::success('Status Successfully Changed', 'Success');
        return 1;
    }
}
