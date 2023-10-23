<?php

namespace App\Http\Controllers\Backend;

use App\Helpers\UploadImage;
use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Post;
use App\Models\Slider;
use App\Models\Voucher;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DestroyController extends Controller
{
    const PENDING = 0;
    /**
     * @var request
     */
    protected $request;

    public function __construct(
        Request $request
    )
    {
        $this->request = $request;
    }

    /*
    *--------------------------------------------------------------------------
    * Destroy Record Model
    * @param Request $request
    * @return Return \Illuminate\Support\Facades\View
    *--------------------------------------------------------------------------
    */
    public function destroy(Request $request)
    {
        $id = $this->request->get('id');
        $model = $this->request->get('model');
        $thumbnail = $this->request->get('thumbnail');
        switch ($model) {
            case 'category':
                $model = Category::class;
                break;
            case 'brand':
                $model = Brand::class;
                break;
            case 'slider':
                $model = Slider::class;
                break;
            case 'post':
                $model = Post::class;
                break;
            case 'voucher':
                $model = Voucher::class;
                break;
            default:
                # code...
                break;
        }
        if ($this->request->has('checkAll')) {
            return $this->destroyModel($id, $model, true, $thumbnail);
        }
        return $this->destroyModel($id, $model, false, $thumbnail);
    }

    /*
    *--------------------------------------------------------------------------
    * Function Excuse Destroy Model
    * @param Request $request
    * @return Return \Illuminate\Support\Facades\View
    *--------------------------------------------------------------------------
    */
    public function destroyModel($id, $model, $checkAll = false, $imagePath = null)
    {
        $model = ucfirst($model);
        try {
            if ($checkAll) {
                $arr_id = explode(',', $id);
            } else {
                $arr_id = [$id];
            }

            if ($model == Voucher::class) {
                $datas = $model::whereIn('id', $arr_id)->delete();
            } else {
                $datas = $model::whereIn('id', $arr_id)->update([
                    'deleted_at' => Carbon::now()
                ]);
                $deleteThumb = UploadImage::handleRemoveFile($imagePath);
            }
            $msg = 'Xóa thành công';
            return response()->json(array('status' => true, 'msg' => $msg));
        } catch (\Exception $e) {
            return $this->renderJsonResponse($e->getMessage());
        }
    }
}
