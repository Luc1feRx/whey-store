<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\FavoriteProduct;
use App\Models\Flavor;
use App\Models\Post;
use App\Models\Product;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

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

    public function category($slug, Request $request){
        $category = Category::where('slug_category', $slug)->first();
        $products = $category->products()->paginate(2); // Đổi 15 thành số lượng sản phẩm bạn muốn hiển thị trên mỗi trang
        $brandsWithProductsCount = Brand::whereNull('deleted_at')
        ->withCount('products') // Tính số lượng sản phẩm cho mỗi thương hiệu
        ->get();

        if($request->brands){
            $selectedBrands = $request->input('brands');
            $category = Category::where('slug_category', $request->slug)->first();
            $products = $category->products()->paginate(2);
            if(count($selectedBrands) > 0){
                $filteredProducts = Product::whereIn('brand_id', $selectedBrands)->paginate(2);
                $filteredProductsView = view('frontend.category.productList')->with(['products' => $filteredProducts, 'category' => $category])->render();
                return response()->json(['html' => $filteredProductsView]);
            }
        }
        
        return view('frontend.category.category',[
            'category' => $category,
            'brands' => $brandsWithProductsCount,
            'slug' => $slug,
            'products' => $products
        ]);
    }

    public function productDetail($slug){
        $productDetail = Product::with(['images', 'flavors', 'reviews' => function ($query) {
            $query->with('user') // Chỉ lấy cột 'id' và 'name' từ bảng 'users'
                  ->orderBy('created_at', 'desc'); // Sắp xếp theo created_at giảm dần
        }])->leftJoin('brands', 'brands.id', 'products.brand_id')
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

            $isFavorite = FavoriteProduct::where('user_id', Auth::user()->id)
            ->where('product_id', $productDetail->id)
            ->exists();

        return view('frontend.product-detail.product-detail', [
            'productDetail' => $productDetail,
            'isFavorite' => $isFavorite
        ]);
    }

    // public function ajaxFilterBrand(Request $request) {
    //     // Retrieve selected brand IDs from the request
    //     $selectedBrands = $request->input('brands');

    //     $filteredProducts = Product::whereIn('brand_id', $selectedBrands)->paginate(2);

    //     $category = Category::with('products')->where('slug_category', $request->input('slug'))->first();
    
    //     // Perform filtering logic based on selected brands
    //     // Fetch and return the filtered data
    //     $filteredProductsView = View::make('frontend.category.test')->with(['filteredProducts' => $filteredProducts, 'category' => $category])->render();
    
    //     return response()->json(['html' => $filteredProductsView]);
    // }
    
}
