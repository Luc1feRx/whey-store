<?php

namespace App\Http\Controllers\Frontend;

use App\Helpers\Common;
use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\FavoriteProduct;
use App\Models\Flavor;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Post;
use App\Models\Product;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;

class HomeController extends Controller
{
    public function index(){
        $getProductFeatured = Product::with(['categories', 'images'])->where('is_featured_product', Product::ISFEATURED)->take(10)->get();
        $getLastestProduct = Product::orderBy('id', 'desc')->take(6)->get();
        $sliders = Slider::whereNull('deleted_at')->get();
        $brands = Brand::whereNull('deleted_at')->get();
        $posts = Post::whereNull('deleted_at')->where('status', 1)->take(10)->get();
        $getCategoryProduct = Category::with(['products'])->whereNull('deleted_at')->whereNull('parent_id')->get();
        $getProductReview = Product::with(['reviews'])
        ->withCount('reviews') // Đếm số lượng đánh giá
        ->where('is_featured_product', Product::ISFEATURED)
        ->orderByDesc('reviews_count') // Sắp xếp theo số lượng đánh giá giảm dần
        ->take(6)
        ->get();
        return view('frontend.home.home', [
            'sliders' => $sliders,
            'getProductFeatured' => $getProductFeatured,
            'brands' => $brands,
            'posts' => $posts,
            'getLastestProduct' => $getLastestProduct,
            'getCategoryProduct' => $getCategoryProduct,
            'getProductReview' => $getProductReview
        ]);
    }

    public function ChangeLang($lang){
        App::setLocale($lang);
        session()->put('locale', $lang);
        return redirect()->back();
    }

    public function category($slug, Request $request){
        $category = Category::where('slug_category', $slug)->first();
    
        $brandsWithProductsCount = Brand::whereNull('deleted_at')
        ->withCount([
            'products' => function ($query) use ($category) {
                $query->whereHas('categories', function ($q) use ($category) {
                    $q->where('categories.id', $category->id);
                });
            }
        ])
        ->get();
    
        $productsQuery = $category->products();
    
        if ($request->has('brand')) {
            $brand_ids = explode(',', $request->brand);
            $productsQuery->whereIn('brand_id', $brand_ids);
        }
    
        $products = $productsQuery->paginate(10);
    
        return view('frontend.category.category', [
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
                'products.weight as product_weight',
                'products.serving_size',
                'products.score',
                'products.origin',
                'products.main_ingredient',
                'brands.name as brand_name',
                'products.price',
                'products.status',
                'products.discount_price',
                'brands.thumbnail as brand_thumbnail',
                'products.thumbnail as product_thumbnail'
            ])
            ->first();

            if(Auth::check()){
                $isFavorite = FavoriteProduct::where('user_id', Auth::user()->id)
                ->where('product_id', $productDetail->id)
                ->exists();
            }

        return view('frontend.product-detail.product-detail', [
            'productDetail' => $productDetail,
            'isFavorite' => isset($isFavorite) ? $isFavorite : null
        ]);
    }

    public function searchProduct(Request $request){
        $brandsWithProductsCount = Brand::whereNull('deleted_at')
        ->withCount([
            'products'
        ])
        ->get();
        $products = Product::query();
        if($request->keyword){
            $searchKeyword = Common::escapeLike($request->keyword);
            $products->where(function ($q) use ($searchKeyword) {
                $q->where('products.name', 'LIKE', "%" . $searchKeyword . "%")
                    ->orWhere('products.slug', 'LIKE', "%" . $searchKeyword . "%");
            });
        }
        $products = $products->orderBy('products.id', 'desc')->paginate(10);
    
        return view('frontend.home.search', [
            'products' => $products,
            'brands' => $brandsWithProductsCount
        ]);
    }

    public function trackOrder(Request $request){
        $getOrder = Order::leftJoin('vouchers', 'vouchers.id', '=', 'orders.discount_id')
            ->where('orders.phone', $request->phone)
            ->where('orders.email', $request->email)
            ->select([
                'orders.id as order_id',
                'orders.address',
                'orders.phone',
                'orders.email',
                'orders.user_name',
                'orders.transaction_code',
                'orders.created_at',
                'orders.payment_method',
                'orders.order_total',
                'vouchers.percentage'
            ])
            ->first();
        return view('frontend.track-order.track-order', [
            'order' => isset($order) ? $order : [],
        ]);
    }
    
}
