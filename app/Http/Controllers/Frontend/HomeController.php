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
use App\Models\Review;
use App\Models\Slider;
use App\Models\Voucher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;

class HomeController extends Controller
{
    public function index(){
        $getProductFeatured = Product::with(['categories', 'images'])->where('is_featured_product', Product::ISFEATURED)->take(5)->get();
        $getLastestProduct = Product::orderBy('id', 'desc')->take(6)->get();
        $sliders = Slider::whereNull('deleted_at')->get();
        $brands = Brand::whereNull('deleted_at')->get();
        $posts = Post::whereNull('deleted_at')->where('status', 1)->take(10)->get();
        $getCategoryProduct = Category::with(['products'])->whereNull('deleted_at')->whereNull('parent_id')->get();
        $randomVouchers = Voucher::inRandomOrder()->where('status', 1)->limit(5)->get();
        $getProductReview = Product::with(['reviews'])
        ->withCount('reviews') // Đếm số lượng đánh giá
        ->where('is_featured_product', Product::ISFEATURED)
        ->orderByDesc('reviews_count') // Sắp xếp theo số lượng đánh giá giảm dần
        ->take(6)
        ->get();

        $getProductViewCount = Product::with(['reviews'])
        ->withCount('reviews') // Đếm số lượng đánh giá
        ->orderByDesc('reviews_count') // Sắp xếp theo số lượng đánh giá giảm dần
        ->take(5)
        ->get();
        return view('frontend.home.home', [
            'sliders' => $sliders,
            'getProductFeatured' => $getProductFeatured,
            'brands' => $brands,
            'posts' => $posts,
            'getLastestProduct' => $getLastestProduct,
            'getCategoryProduct' => $getCategoryProduct,
            'getProductReview' => $getProductReview,
            'randomVouchers' => $randomVouchers,
            'getProductViewCount' => $getProductViewCount
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

        // Lọc theo giá từ 'from'
        if ($request->has('from')) {
            $minPrice = $request->input('from');
            $productsQuery->where('price', '>=', $minPrice);
        }

        // Lọc theo giá đến 'to'
        if ($request->has('to')) {
            $maxPrice = $request->input('to');
            $productsQuery->where('price', '<=', $maxPrice);
        }
    
        $products = $productsQuery->paginate(10);
        return view('frontend.category.category', [
            'category' => $category,
            'brands' => $brandsWithProductsCount,
            'slug' => $slug,
            'products' => $products
        ]);
    }

    public function filter(Request $request, $categorySlug)
    {
        // Find the category by slug
        $category = Category::where('slug_category', $categorySlug)->first();

        // Start the query
        $query = Product::query();

        // If there is a category, constrain the query to products within that category
        if ($category) {
            $query->whereHas('categories', function ($q) use ($category) {
                $q->where('categories.id', $category->id);
            });
        }

        // If brands are selected, add that to the query
        if ($request->has('brands')) {
            $brandIds = $request->get('brands');
            $query->whereIn('brand_id', $brandIds);
        }

        // Apply other filters if needed
        $products = $query->paginate(10)->appends($request->except('page'));

        return response()->json([
            'view' => view('frontend.category.productList', compact('products'))->render(),
        ]);
    }


    public function productDetail($slug){
        $productDetail = Product::with(['images', 'flavors'  => function ($query) {
            $query->withPivot('quantity'); // 'quantity' là cột trong bảng trung gian 'product_flavors'
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


            $reviews = Review::with('user')
            ->where('product_id', $productDetail->id)
            ->orderBy('created_at', 'desc')
            ->paginate(10);

            $getProductByViewCount = Product::orderBy('view_counts', 'desc')->take(6)->get();

            $productDetail->view_counts = $productDetail->view_counts + 1;
            $productDetail->save();

            $randomVouchers = Voucher::inRandomOrder()->where('status', 1)->limit(5)->get();

            $totalComments = Review::where('product_id', $productDetail->id)->count();
            // Tính điểm trung bình rating
            $averageRating = Review::where('product_id', $productDetail->id)->avg('rating');
            // Định dạng điểm trung bình với 1 chữ số thập phân
            $averageRating = number_format($averageRating, 1);

            $productView = Product::withCount('reviews')->where('slug', $slug)->first();
            $reviewCount = $productView->reviews_count;

            if(Auth::check()){
                $isFavorite = FavoriteProduct::where('user_id', Auth::user()->id)
                ->where('product_id', $productDetail->id)
                ->exists();
            }

            // Tính toán số lượng rating cho mỗi mức từ 1 đến 5
            $ratings = [];
            for ($i = 1; $i <= 5; $i++) {
                $ratings[$i] = Review::where('product_id', $productDetail->id)->where('rating', $i)->count();
            }

            $product = Product::with('categories')->find($productDetail->id);
            $categoryIds = $product->categories->pluck('id');
            $relatedProducts = Product::whereHas('categories', function ($query) use ($categoryIds) {
                $query->whereIn('category_id', $categoryIds);
            })
            ->where('id', '!=', $productDetail->id) // Loại trừ sản phẩm hiện tại
            ->take(4) // Lấy 4 sản phẩm liên quan
            ->get();

            

        return view('frontend.product-detail.product-detail', [
            'productDetail' => $productDetail,
            'isFavorite' => isset($isFavorite) ? $isFavorite : null,
            'getProductByViewCount' => $getProductByViewCount,
            'randomVouchers' => $randomVouchers,
            'reviewCount' => $reviewCount,
            'totalComments' => $totalComments,
            'averageRating' => $averageRating,
            'ratings' => $ratings,
            'relatedProducts' => $relatedProducts,
            'reviews' => $reviews,
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


    public function checkFlavorStock(Request $request, $productId, $flavorId)
    {
        $quantity = DB::table('product_flavors')
                    ->where('product_id', $productId)
                    ->where('flavor_id', $flavorId)
                    ->value('quantity');

        return response()->json(['inStock' => $quantity > 0]);
    }
}
