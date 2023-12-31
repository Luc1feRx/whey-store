<?php

namespace App\Http\Controllers\Backend;

use App\Helpers\Common;
use App\Helpers\UploadImage;
use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class CategoryController extends Controller
{
    public function index (Request $request){
        $categories = Category::with('parentCategory')
            ->whereNull('deleted_at');

        if($request->keyword){
            $searchKeyword = Common::escapeLike($request->keyword);
            $categories->where(function ($q) use ($searchKeyword) {
                $q->where('name_category', 'LIKE', "%" . $searchKeyword . "%")
                    ->orWhere('slug_category', 'LIKE', "%" . $searchKeyword . "%");
            });
        }
        
        $categories = $categories->orderBy('id', 'desc')->paginate(10);

        if (!empty($request->keyword)) {
            $categories->appends(['keyword' => $request->keyword]);
        }
        return view('backend.category.index', [
            'categories' => $categories
        ]);
    }

    public function create(){
        $getParentCategory = Category::whereNull('parent_id')->orderBy('id', 'desc')->get();
        return view('backend.category.create', [
            'getParentCategory' => $getParentCategory
        ]);
    }

    public function store(CategoryRequest $request){
        try {
            DB::beginTransaction();
            $cate = new Category;
            $cate->name_category = $request->name_category;
            $cate->slug_category = $request->slug_category;
            $cate->parent_id = $request->parent_id;
            $thumbnail_upload = UploadImage::handleUploadFile('thumbnail', 'img/category/', $request);
            $cate->thumbnail = $thumbnail_upload;
            $cate->save();
            DB::commit();
            return redirect()->route('admin.categories.index')->with(['success' => 'Thêm danh mục thành công']);
        } catch (Exception $e) {
            Log::error('[CategoryController][store] error ' . $e->getMessage());
            DB::rollBack();
            return redirect()->back()->with(['error' => 'Thêm danh mục thất bại']);
        }
    }

    public function edit($id){
        $cate = Category::find($id);
        $getParentCategory = Category::whereNull('parent_id')->orderBy('id', 'desc')->get();
        return view('backend.category.edit', [
            'cate' => $cate,
            'getParentCategory' => $getParentCategory
        ]);
    }
    public function update(CategoryRequest $request,$id){
        try {
            DB::beginTransaction();
            $cate = Category::findOrFail($id);
            $cate->name_category = $request->name_category;
            $cate->slug_category = $request->slug_category;
            $cate->parent_id = $request->parent_id;
            if($request->hasFile('thumbnail')){
                if(!empty($cate->thumbnail)){
                    $deletedExist = UploadImage::handleDeleteFileExist($cate->thumbnail);
                }
                $thumbnail_upload = UploadImage::handleUploadFile('thumbnail', 'img/category/', $request);
            }
            $cate->thumbnail = $thumbnail_upload;
            $cate->save();
            DB::commit();
            return redirect()->route('admin.categories.index')->with(['success' => 'Sửa danh mục thành công']);
        } catch (Exception $e) {
            Log::error('[CategoryController][store] error ' . $e->getMessage());
            DB::rollBack();
            return redirect()->back()->with(['error' => 'Sửa danh mục thất bại']);
        }
    }
      
}
