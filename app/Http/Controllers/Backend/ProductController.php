<?php

namespace App\Http\Controllers\Backend;

use App\Helpers\Common;
use App\Helpers\UploadImage;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Flavor;
use App\Models\Product;
use App\Models\ProductImage;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ProductController extends Controller
{
    const PAGE = 20;
    public function index(Request $request){
        $products = Product::with(['categories', 'flavors'])
            ->join('brands', 'brands.id', 'products.brand_id');
        if($request->keyword){
            $searchKeyword = Common::escapeLike($request->keyword);
            $products->where(function ($q) use ($searchKeyword) {
                $q->where('products.name', 'LIKE', "%" . $searchKeyword . "%")
                    ->orWhere('products.slug', 'LIKE', "%" . $searchKeyword . "%");
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

    public function store(ProductRequest $request){
        try {
            DB::beginTransaction();
            $product = new Product;
            $product->name = $request->name;
            $product->slug = $request->slug;
            $product->weight = $request->weight;
            $product->short_description = $request->short_description;
            $product->serving_size = $request->serving_size;
            $product->score = $request->score;
            $product->origin = $request->origin;
            $product->main_ingredient = $request->main_ingredient;
            $product->brand_id = $request->brand_id;
            $product->price = $request->price;
            $product->percent = $request->percent;
            $product->discount_price = $request->price - (($request->price * $request->percent) / 100);
            if($request->hasFile('thumbnail')){
                $thumbnail_upload = UploadImage::handleUploadFile('thumbnail', 'img/product/', $request);
                $product->thumbnail = $thumbnail_upload;
            }
            $product->status = $request->status;
            $product->is_featured_product = $request->is_featured_product ?? 0;
            $product->description = $request->description;
            $product->save();

            // Lấy danh sách các danh mục được chọn từ request
            $selectedCategories = $request->input('category_id', []); // category_id là tên field trong form

            // Sử dụng attach để thêm các danh mục vào sản phẩm
            $product->categories()->attach($selectedCategories);

            // Lấy danh sách các danh mục được chọn từ request
            $selectedFlavors= $request->input('flavor_id', []); // category_id là tên field trong form

            // Sử dụng attach để thêm các danh mục vào sản phẩm
            $product->flavors()->attach($selectedFlavors);

            if ($request->hasFile('image')) {
                $images = $request->file('image');
    
                foreach ($images as $image) {
                    // Xử lý và lưu từng ảnh
                    $imagePath = $this->storeImage($image, 'product_images');
    
                    // Tạo và lưu bản ghi ảnh vào bảng product_images
                    $productImage = new ProductImage;
                    $productImage->product_id = $product->id;
                    $productImage->image = $imagePath;
                    $productImage->save();
                }
            }

            DB::commit();
            return redirect()->route('admin.posts.index')->with(['success' => 'Thêm tin tức thành công']);
        } catch (Exception $e) {
            Log::error('[Controllercontroller][store] error ' . $e->getMessage());
            DB::rollBack();
            return redirect()->back()->with(['error' => 'Thêm tin tức thất bại']);
        }
    }

    function storeImage($image, $path)
    {
        $filename = time() . '_' . $image->getClientOriginalName();
        $imagePath = $image->storeAs($path, $filename, 'public');
        return $imagePath;
    }
}
