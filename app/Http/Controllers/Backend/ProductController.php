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
use Illuminate\Support\Facades\Storage;

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
                    $imagePath = $this->storeImage($image, 'img/product_images');
    
                    // Tạo và lưu bản ghi ảnh vào bảng product_images
                    $productImage = new ProductImage;
                    $productImage->product_id = $product->id;
                    $productImage->image = $imagePath;
                    $productImage->save();
                }
            }

            DB::commit();
            return redirect()->route('admin.products.index')->with(['success' => 'Thêm sản phẩm thành công']);
        } catch (Exception $e) {
            Log::error('[Controllercontroller][store] error ' . $e->getMessage() . ' '. $e->getLine());
            DB::rollBack();
            return redirect()->back()->with(['error' => 'Thêm sản phẩm thất bại']);
        }
    }

    public function update(ProductRequest $request, $id)
    {
        try {
            DB::beginTransaction();
            $product = Product::findOrFail($id);
    
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
    
            // Handle the product's thumbnail
            if ($request->hasFile('thumbnail')) {
                if (!empty($product->thumbnail)) {
                    // Delete the existing thumbnail from storage
                    UploadImage::handleDeleteFileExist($product->thumbnail);
                }
                // Upload and update the new thumbnail
                $thumbnail_upload = UploadImage::handleUploadFile('thumbnail', 'img/product/', $request);
                $product->thumbnail = $thumbnail_upload;
            }
    
            // Update product status, featured flag, and description
            $product->status = $request->status;
            $product->is_featured_product = $request->is_featured_product ?? 0;
            $product->description = $request->description;
            $product->save();
    
            // Update categories
            if ($request->has('category_id')) {
                $selectedCategories = $request->input('category_id', []);
                $product->categories()->sync($selectedCategories);
            } else {
                // If no categories are provided in the request, remove all associated categories
                $product->categories()->detach();
            }
    
            // Update flavors
            if ($request->has('flavor_id')) {
                $selectedFlavors = $request->input('flavor_id', []);
                $product->flavors()->sync($selectedFlavors);
            } else {
                // If no flavors are provided in the request, remove all associated flavors
                $product->flavors()->detach();
            }
    

            if ($request->hasFile('image')) {
                $images = $request->file('image');
            
                foreach ($images as $image) {
                    // Check if the image already exists in storage
                    if (Storage::disk('public')->exists('img/product_images/' . $image->getClientOriginalName())) {
                        // The image with the same name already exists in storage
                        // You can choose to do something here (e.g., overwrite, skip, or display a message)
                        UploadImage::handleDeleteFileExist($image->image);
                    } else {
                        // The image doesn't exist, so you can proceed to store it
                        $imagePath = $this->storeImage($image, 'img/product_images');
            
                        // Create and save a record for each product image
                        $productImage = new ProductImage;
                        $productImage->product_id = $product->id;
                        $productImage->image = $imagePath;
                        $productImage->save();
                    }
                }
            }
    
            DB::commit();
            return redirect()->route('admin.products.index')->with(['success' => 'Cập nhật sản phẩm thành công']);
        } catch (Exception $e) {
            Log::error('[Controllercontroller][update] error ' . $e->getMessage() . ' '. $e->getLine());
            DB::rollBack();
            return redirect()->back()->with(['error' => 'Cập nhật sản phẩm thất bại']);
        }
    }

    public function edit($id) {
        $product = Product::with(['categories', 'flavors'])->where('products.id',$id)->first();
        $flavors = Flavor::orderBy('id','desc')->get();
        $brands = Brand::orderBy('id','desc')->get();
        $categories = Category::orderBy('id','desc')->get();
        return view('backend.product.edit', [
            'flavors' => $flavors,
            'brands' => $brands,
            'categories' => $categories,
            'product' => $product
        ]);
    }

    function storeImage($image, $path)
    {
        $filename = time() . '_' . $image->getClientOriginalName();
        $imagePath = $image->storeAs($path, $filename, 'public');
        return $imagePath;
    }

    public function getProductImage($productId){
        // Lấy sản phẩm dựa trên product_id
        $product = Product::find($productId);

        if ($product) {
            // Tìm tất cả các ảnh từ thư mục cụ thể và tạo đường dẫn URL cho chúng
            $images = [];
            foreach ($product->images as $img) {
                $imagePath =  $img->image;
                if (Storage::exists($imagePath)) {
                    $images[] = '/storage/'.$imagePath;
                }
            }

            return response()->json(['images' => $images]);
        } else {
            return response()->json(['images' => []]);
        }
    }
}
