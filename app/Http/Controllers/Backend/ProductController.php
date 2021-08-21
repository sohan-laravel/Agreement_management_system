<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Str;
use Image;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product = Product::orderBy('id', 'desc')->get();
        return view('backend.product.index', compact('product'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.product.create');
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
            'price'  => 'required',
            'image'  => 'required|image',
        ]);

        $product = new Product();

        $product->name = $request->name;
        $product->price = $request->price;
        $product->slug = Str::slug($request->name, '-');


        if ($request->hasFile('image')) {
            //insert that image
            $productImage = $request->file('image');
            $imgName = rand(1111, 9999) . date('.d-m-y.') . '.' . $productImage->getClientOriginalExtension();
            $location = public_path('frontend/images/ProductImage/' . $imgName);
            Image::make($productImage)->save($location);


            $product->image = $imgName;
        }

        $product->save();

        Toastr::success('Product Successfully Created', 'Success');

        return redirect()->route('admin.product.index');
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
        $product = Product::find($id);

        return view('backend.product.edit', compact('product'));
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
            'price'  => 'required',
        ]);

        $product = Product::find($id);

        $product->name = $request->name;
        $product->price = $request->price;
        $product->slug = Str::slug($request->name, '-');


        if ($request->image > 0) {

            if (file_exists(public_path('frontend/images/ProductImage/' . $product->image))) {
                unlink(public_path('frontend/images/ProductImage/' . $product->image));
            }

            //insert that image
            $productImage = $request->file('image');
            $imgName = rand(1111, 9999) . date('.d-m-y.') . '.' . $productImage->getClientOriginalExtension();
            $location = public_path('frontend/images/ProductImage/' . $imgName);
            Image::make($productImage)->save($location);


            $product->image = $imgName;
        }

        $product->save();

        Toastr::success('Product Successfully Updated', 'Success');

        return redirect()->route('admin.product.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);

        if (!is_null($product)) {

            if (file_exists(public_path('frontend/images/ProductImage/' . $product->image))) {
                unlink(public_path('frontend/images/ProductImage/' . $product->image));
            }

            $product->delete();
        }

        Toastr::success('product Successfully Deleted', 'Success');

        return back();
    }

    public function inactive(Request $request)
    {
        $product = Product::findOrFail($request->id);
        $product->status = $request->status;

        // if ($product->status === 0) {
        //     return 0;
        // }

        $product->save();
        //Toastr::success('Status Successfully Changed', 'Success');
        return 1;
    }
}
