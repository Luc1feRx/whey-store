<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Post;
use App\Models\Product;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class HomeController extends Controller
{
    public function index(){
        $getProductFeatured = Product::with(['categories'])->where('is_featured_product', Product::ISFEATURED)->take(10)->get();
        $getLastestProduct = Product::orderBy('id', 'desc')->take(6)->get();
        $sliders = Slider::whereNull('deleted_at')->get();
        $brands = Brand::whereNull('deleted_at')->get();
        $posts = Post::whereNull('deleted_at')->where('status', 1)->take(10)->get();
        $getCategoryProduct = Category::with(['products'])->whereNull('deleted_at')->whereNull('parent_id')->get();
        return view('frontend.home.home', [
            'sliders' => $sliders,
            'getProductFeatured' => $getProductFeatured,
            'brands' => $brands,
            'posts' => $posts,
            'getLastestProduct' => $getLastestProduct,
            'getCategoryProduct' => $getCategoryProduct
        ]);
    }

    public function ChangeLang($lang){
        App::setLocale($lang);
        session()->put('locale', $lang);
        return redirect()->back();
    }

    public function category($slug){
        $category = Category::with('products')->where('slug_category', $slug)->first();
        return view('frontend.category.category',[
            'category' => $category
        ]);
    }

    public function productDetail($slug){
        $productDetail = Product::with(['images', 'flavors'])->leftJoin('brands', 'brands.id', 'products.brand_id')
            ->where('products.slug', $slug)
            ->select([
                'products.id',
                'products.name as product_name',
                'products.short_description',
                'products.description',
                'products.view_counts',
                'products.is_featured_product',
                'products.slug',
                'products.weight',
                'products.serving_size',
                'products.score',
                'products.origin',
                'products.main_ingredient',
                'brands.name as brand_name',
                'products.price',
                'products.status',
                'products.discount_price',
                'brands.thumbnail as brand_thumbnail',
            ])
            ->first();

        return view('frontend.product-detail.product-detail', [
            'productDetail' => $productDetail
        ]);
    }
    
}
