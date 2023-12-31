<?php

namespace App\Http\Controllers\Backend;

use App\Helpers\Common;
use App\Http\Controllers\Controller;
use App\Http\Requests\VoucherRequest;
use App\Models\Brand;
use App\Models\Voucher;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class VoucherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $vouchers = Voucher::whereNull('deleted_at');

        if($request->keyword){
            $searchKeyword = Common::escapeLike($request->keyword);
            $vouchers->where(function ($q) use ($searchKeyword) {
                $q->where('name', 'LIKE', "%" . $searchKeyword . "%")
                    ->orWhere('voucher_sku', 'LIKE', "%" . $searchKeyword . "%");
            });
        }
        
        $vouchers = $vouchers->orderBy('id', 'desc')->paginate(10);

        if (!empty($request->keyword)) {
            $vouchers->appends(['keyword' => $request->keyword]);
        }
        return view('backend.voucher.index', [
            'vouchers' => $vouchers
        ]);
    }

    public function create(Request $request)
    {
        $brands = Brand::orderBy('id','desc')->get();
        return view('backend.voucher.create',[
            'brands' => $brands
        ]);
    }

    public function store(VoucherRequest $request)
    {
        try {
            DB::beginTransaction();
            $voucher = new Voucher;
            $voucher->name = $request->name;
            $voucher->voucher_sku = $request->voucher_sku;
            $voucher->quantity = $request->quantity;
            $voucher->status = $request->status;
            $voucher->reduced_amount = (int)str_replace('.', '', $request->reduced_amount);
            $voucher->min_purchase = (int)str_replace('.', '', $request->min_purchase);
            $voucher->description = $request->description;
            $voucher->save();
            DB::commit();
            return redirect()->route('admin.vouchers.index')->with(['success' => 'Thêm mã giảm giá thành công']);
        } catch (Exception $e) {
            Log::error('[VoucherController][store] error ' . $e->getMessage());
            DB::rollBack();
            return redirect()->back()->with(['error' => 'Thêm mã giảm giá thất bại']);
        }
    }

    public function edit(Request $request, $id)
    {
        $voucher = Voucher::findorFail($id);
        $brands = Brand::orderBy('id','desc')->get();
        return view('backend.voucher.edit',[
            'voucher' => $voucher
        ]);
    }

    public function update(VoucherRequest $request, $id)
    {
        try {
            DB::beginTransaction();
            $voucher = Voucher::findorFail($id);
            $voucher->name = $request->name;
            $voucher->voucher_sku = $request->voucher_sku;
            $voucher->quantity = $request->quantity;
            $voucher->status = $request->status;
            $voucher->reduced_amount = (int)str_replace('.', '', $request->reduced_amount);
            $voucher->min_purchase = (int)str_replace('.', '', $request->min_purchase);
            $voucher->description = $request->description;
            $voucher->save();
            DB::commit();
            return redirect()->route('admin.vouchers.index')->with(['success' => 'Sửa mã giảm giá thành công']);
        } catch (Exception $e) {
            Log::error('[VoucherController][update] error ' . $e->getMessage());
            DB::rollBack();
            return redirect()->back()->with(['error' => 'Sửa mã giảm giá thất bại']);
        }
    }
}
