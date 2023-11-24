<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\GoodIssue;
use App\Models\Product;
use App\Models\ProductFlavor;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GoodIssueController extends Controller
{
    public function index(Request $request){
        $query = Product::query();

        if ($request->has('keyword')) {
            $keyword = $request->input('keyword');
            $query->where('name', 'like', '%' . $keyword . '%')
                ->orWhereHas('flavors', function ($q) use ($keyword) {
                    $q->where('name', 'like', '%' . $keyword . '%');
                });
        }
    
        $products = $query->with(['flavors' => function ($query) {
            $query->select('flavors.id', 'flavors.name', 'product_flavors.quantity', 'product_flavors.manufacturing_date', 'product_flavors.expiration_date');
        }])->paginate(5);

        return view('backend.import-export-good.good-issue', ['products' => $products]);
    }

    public function store(Request $request){
        // Chuyển đổi manufacturing_date sang đối tượng Carbon
        $manufacturingDate = Carbon::createFromFormat('d/m/Y', $request->manufacturing_date);

        // Chuyển đổi expiration_date sang đối tượng Carbon
        $expirationDate = Carbon::createFromFormat('d/m/Y', $request->expiration_date);

        // Sử dụng định dạng Y-m-d cho các trường ngày tháng
        $manufacturingDateFormatted = $manufacturingDate->format('Y-m-d');
        $expirationDateFormatted = $expirationDate->format('Y-m-d');
        $createGoodIssue = GoodIssue::updateOrCreate([
            'product_id' => $request->product_id,
            'flavor_id' => $request->flavor_id
        ], [                              
            'quantity' => DB::raw('quantity + ' . $request->quantity),
            'import_good_quantity' => DB::raw('import_good_quantity + ' . $request->quantity),
            'type' => 1,
            'manufacturing_date' => $manufacturingDateFormatted,
            'expiration_date' => $expirationDateFormatted
        ]);

        if($createGoodIssue){
            ProductFlavor::updateOrCreate([
                'product_id' => $request->product_id,
                'flavor_id' => $request->flavor_id
            ], [
                'quantity' => DB::raw('quantity + ' . $request->quantity),
                'manufacturing_date' => $manufacturingDateFormatted,
                'expiration_date' => $expirationDateFormatted
            ]);
        }
        return redirect()->route('admin.good-issues.index')->with(['success' => 'Nhập hàng thành công']);
    }

    // public function export(Request $request){
    //     $createGoodIssue = GoodIssue::updateOrCreate([
    //         'product_id' => $request->product_id,
    //         'flavor_id' => $request->flavor_id
    //     ], [                              
    //         'quantity' => DB::raw('quantity - ' . $request->quantity),
    //         'export_good_quantity' => DB::raw('export_good_quantity + ' . $request->quantity),
    //         'type' => 2,
    //     ]);

    //     if($createGoodIssue){
    //         ProductFlavor::updateOrCreate([
    //             'product_id' => $request->product_id,
    //             'flavor_id' => $request->flavor_id
    //         ], [
    //             'quantity' => DB::raw('quantity + ' . $request->quantity),
    //         ]);
    //     }
    //     return redirect()->route('admin.good-issues.index')->with(['success' => 'Nhập hàng thành công']);
    // }
}
