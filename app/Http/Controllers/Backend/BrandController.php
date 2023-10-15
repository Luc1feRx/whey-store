<?php

namespace App\Http\Controllers\Backend;

use App\Helpers\Common;
use App\Helpers\UploadImage;
use App\Http\Controllers\Controller;
use App\Http\Requests\BrandRequest;
use App\Models\Brand;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class BrandController extends Controller
{
    public function index(Request $request){
        $brands = Brand::whereNull('deleted_at');

        if($request->keyword){
            $searchKeyword = Common::escapeLike($request->keyword);
            $brands->where(function ($q) use ($searchKeyword) {
                $q->where('name', 'LIKE', "%" . $searchKeyword . "%")
                    ->orWhere('slug', 'LIKE', "%" . $searchKeyword . "%");
            });
        }
        
        $brands = $brands->orderBy('id', 'desc')->paginate(10);
        return view('backend.brand.index', [
            'brands' => $brands
        ]);
    }

    public function create(){
        return view('backend.brand.create');
    }

    public function store(BrandRequest $request){
        try {
            DB::beginTransaction();
            $brand = new Brand;
            $brand->name = $request->name;
            $brand->slug = $request->slug;
            $thumbnail_upload = UploadImage::handleUploadFile('thumbnail', 'img/brand/', $request);
            $brand->thumbnail = $thumbnail_upload;
            $brand->save();
            DB::commit();
            return redirect()->route('admin.brands.index')->with(['success' => 'Thêm thương hiệu thành công']);
        } catch (Exception $e) {
            Log::error('[BrandController][store] error ' . $e->getMessage());
            DB::rollBack();
            return redirect()->back()->with(['error' => 'Thêm thương hiệu thất bại']);
        }
    }

    public function edit($id){
        $brand = Brand::find($id);
        return view('backend.brand.edit', [
            'brand' => $brand
        ]);
    }
    public function update(BrandRequest $request,$id){
        try {
            DB::beginTransaction();
            $brand = Brand::findOrFail($id);
            $brand->name = $request->name;
            $brand->slug = $request->slug;
            $thumbnail_upload = '';
            if($request->hasFile('thumbnail')){
                $deletedExist = UploadImage::handleDeleteFileExist($brand->thumbnail);
                $thumbnail_upload = UploadImage::handleUploadFile('thumbnail', 'img/brand/', $request);
            }
            
            $brand->thumbnail = $thumbnail_upload;
            $brand->save();
            DB::commit();
            return redirect()->route('admin.brands.index')->with(['success' => 'Sửa thương hiệu thành công']);
        } catch (Exception $e) {
            Log::error('[brandController][store] error ' . $e->getMessage());
            DB::rollBack();
            return redirect()->back()->with(['error' => 'Sửa thương hiệu thất bại']);
        }
    }
}
