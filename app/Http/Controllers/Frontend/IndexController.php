<?php

namespace App\Http\Controllers\Frontend;

use App\About;
use App\Http\Controllers\Controller;
use App\Model\Category;
use App\Plantation;
use App\Plantationright;
use App\Product;
use App\Slider;
use App\Topbar;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        $categories = Category::orderBy('id', 'desc')->get();
        $slider = Slider::where('status', 1)->orderBy('id', 'desc')->get();
        $product = Product::where('status', 1)->orderBy('id', 'desc')->get();
        $about = About::where('status', 1)->orderBy('id', 'desc')->get();
        $plantation = Plantation::where('status', 1)->orderBy('id', 'desc')->get();
        $plantationright = Plantationright::where('status', 1)->orderBy('id', 'desc')->get();
        $topbar = Topbar::orderBy('id', 'desc')->get();
        return view('frontend.index', compact('categories', 'slider', 'product', 'about', 'plantation', 'plantationright', 'topbar'));
    }

    public function contact()
    {
        return view('frontend.pages.contact');
    }

    public function test()
    {
        return view('frontend.pages.test');
    }
}
