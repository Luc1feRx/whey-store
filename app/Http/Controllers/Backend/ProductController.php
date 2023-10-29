<?php

namespace App\Http\Controllers\Backend;

use App\Helpers\Common;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Flavor;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    const PAGE = 20;
    public function index(Request $request){
        $products = Product::with(['categories', 'flavors'])
            ->join('brands', 'brands.id', 'products.brand_id');
        if($request->keyword){
            $searchKeyword = Common::escapeLike($request->keyword);
            $products->where(function ($q) use ($searchKeyword) {
                $q->where('name', 'LIKE', "%" . $searchKeyword . "%")
                    ->orWhere('slug', 'LIKE', "%" . $searchKeyword . "%");
            });
        }
        $products = $products->orderBy('id', 'desc')
            ->select([
                'products.id',
                'products.name as product_name',
                'brands.name as brand_name',
                'products.view_counts',
                'products.weight',
                'products.score',
                'products.origin',
                'products.discount_price',
                'products.thumbnail',
                'products.brand_id',
                'products.price',
                'products.status',
                'products.is_featured_product'
            ])
            ->paginate(self::PAGE);
        
        return view('backend.product.index', [
            'products' => $products
        ]);
    }

    public function create(){
        $flavors = Flavor::orderBy('id','desc')->get();
        $brands = Brand::orderBy('id','desc')->get();
        $categories = Category::orderBy('id','desc')->get();
        return view('backend.product.create', [
            'flavors' => $flavors,
            'brands' => $brands,
            'categories' => $categories
        ]);
    }

    public function store(Request $request){
        try {
            dd($request->file('image'));
            DB::beginTransaction();
            $product = new Product;
            $product->name = $request->name;
            $post->slug = $request->slug;
            $thumbnail_upload = UploadImage::handleUploadFile('thumbnail', 'img/post/', $request);
            $post->thumbnail = $thumbnail_upload;
            $post->status = $request->status;
            $post->is_featured = $request->is_featured ?? 0;
            $post->content = $request->content;
            $post->save();
            DB::commit();
            return redirect()->route('admin.posts.index')->with(['success' => 'Thêm tin tức thành công']);
        } catch (Exception $e) {
            Log::error('[PostController][store] error ' . $e->getMessage());
            DB::rollBack();
            return redirect()->back()->with(['error' => 'Thêm tin tức thất bại']);
        }
    }
}
