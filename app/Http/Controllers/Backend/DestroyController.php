<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
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
        switch ($model) {
            case 'category':
                $model = Category::class;
                break;
            default:
                # code...
                break;
        }
        if ($this->request->has('checkAll')) {
            return $this->destroyModel($id, $model, true);
        }
        return $this->destroyModel($id, $model);
    }

    /*
    *--------------------------------------------------------------------------
    * Function Excuse Destroy Model
    * @param Request $request
    * @return Return \Illuminate\Support\Facades\View
    *--------------------------------------------------------------------------
    */
    public function destroyModel($id, $model, $checkAll = false)
    {
        $model = ucfirst($model);
        try {
            if ($checkAll) {
                $arr_id = explode(',', $id);
            } else {
                $arr_id = [$id];
            }

            if ($model == Service::class) {
                $datas = $model::whereIn('id', $arr_id)->delete();
            } elseif ($model == User::class) {
                $datas = $model::whereIn('id', $arr_id)->update([
                    'status' => self::PENDING
                ]);
            } else {
                $datas = $model::whereIn('id', $arr_id)->update([
                    'deleted_at' => Carbon::now()
                ]);
            }
            $msg = 'Xóa thành công';
            return response()->json(array('status' => true, 'msg' => $msg));
        } catch (\Exception $e) {
            return $this->renderJsonResponse($e->getMessage());
        }
    }
}
