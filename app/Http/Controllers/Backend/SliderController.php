<?php

namespace App\Http\Controllers\Backend;

use App\Helpers\Common;
use App\Helpers\UploadImage;
use App\Http\Controllers\Controller;
use App\Http\Requests\SliderRequest;
use App\Models\Slider;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class SliderController extends Controller
{
    public function index(Request $request){
        $sliders = Slider::whereNull('deleted_at');

        if($request->keyword){
            $searchKeyword = Common::escapeLike($request->keyword);
            $sliders->where(function ($q) use ($searchKeyword) {
                $q->where('name', 'LIKE', "%" . $searchKeyword . "%")
                    ->orWhere('slug', 'LIKE', "%" . $searchKeyword . "%");
            });
        }
        
        $sliders = $sliders->orderBy('id', 'desc')->paginate(10);
        return view('backend.slider.index', [
            'sliders' => $sliders
        ]);
    }

    public function create(){
        return view('backend.slider.create');
    }

    public function store(SliderRequest $request){
        try {
            DB::beginTransaction();
            $slider = new Slider;
            $slider->name = $request->name;
            $slider->slug = $request->slug;
            $thumbnail_upload = UploadImage::handleUploadFile('thumbnail', 'img/slider/', $request);
            $slider->thumbnail = $thumbnail_upload;
            $slider->save();
            DB::commit();
            return redirect()->route('admin.sliders.index')->with(['success' => 'Thêm slider thành công']);
        } catch (Exception $e) {
            Log::error('[SliderController][store] error ' . $e->getMessage());
            DB::rollBack();
            return redirect()->back()->with(['error' => 'Thêm slider thất bại']);
        }
    }

    public function edit($id){
        $slider = Slider::find($id);
        return view('backend.slider.edit', [
            'slider' => $slider
        ]);
    }
    public function update(SliderRequest $request,$id){
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
