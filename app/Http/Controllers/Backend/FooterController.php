<?php

namespace App\Http\Controllers\Backend;

use App\Footer;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Str;
use Image;

class FooterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $footer = Footer::orderBy('id', 'desc')->get();
        return view('backend.footer.index', compact('footer'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.footer.create');
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

            'number'  => 'required|numeric|digits:11',
        ]);

        $footer = new Footer();

        $footer->number = $request->number;
        $footer->facebook = $request->facebook;
        $footer->twitter = $request->twitter;
        $footer->email = $request->email;
        $footer->youtube = $request->youtube;


        $footer->save();

        Toastr::success('Footer Successfully Created', 'Success');

        return redirect()->route('admin.footer.index');
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
        $footer = Footer::find($id);

        return view('backend.footer.edit', compact('footer'));
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

            'number'  => 'required|numeric|digits:11',
        ]);

        $footer = Footer::find($id);

        $footer->number = $request->number;
        $footer->facebook = $request->facebook;
        $footer->twitter = $request->twitter;
        $footer->email = $request->email;
        $footer->youtube = $request->youtube;


        $footer->save();

        Toastr::success('Footer Successfully Updated', 'Success');

        return redirect()->route('admin.footer.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $footer = Footer::find($id);

        if (!is_null($footer)) {

            $footer->delete();
        }

        Toastr::success('Footer Successfully Deleted', 'Success');

        return back();
    }

    public function inactive(Request $request)
    {
        $footer = Footer::findOrFail($request->id);
        $footer->status = $request->status;

        // if ($footer->status === 0) {
        //     return 0;
        // }

        $footer->save();
        //Toastr::success('Status Successfully Changed', 'Success');
        return 1;
    }
}
