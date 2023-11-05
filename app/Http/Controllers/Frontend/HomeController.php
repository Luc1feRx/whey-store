<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\Slider;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $rootCategories = Category::with('children')->whereNull('parent_id')->get();
        $getProductFeatured = Product::with(['categories'])->where('is_featured_product', Product::ISFEATURED)->get();
        $sliders = Slider::whereNull('deleted_at')->get();
        $brands = Brand::whereNull('deleted_at')->get();
        return view('frontend.home.home', [
            'rootCategories' => $rootCategories,
            'sliders' => $sliders,
            'getProductFeatured' => $getProductFeatured,
            'brands' => $brands
        ]);
    }
}
