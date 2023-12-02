<?php

namespace App\Http\Controllers\Backend;

use App\Exports\GoodExport;
use App\Http\Controllers\Controller;
use App\Http\Requests\ExportGoodRequest;
use App\Models\GoodIssue;
use App\Models\Product;
use App\Models\ProductFlavor;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Maatwebsite\Excel\Facades\Excel;

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
        $createGoodIssue = GoodIssue::create([
            'product_id' => $request->product_id,
            'flavor_id' => $request->flavor_id,                         
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

    public function export(ExportGoodRequest $request){
        try {
            // Lấy dữ liệu đã được validate từ request
            $validatedData = $request->validated();
            
            // Lấy thông tin sản phẩm theo product_id và flavor_id từ request
            $getProductFlavor = ProductFlavor::where('product_id', $request->product_id)
                ->where('flavor_id', $request->flavor_id)
                ->first();
        
            // Kiểm tra nếu số lượng yêu cầu xuất lớn hơn số lượng sản phẩm
            if ($getProductFlavor->quantity < $request->quantity) {
                return redirect()->route('admin.good-issues.index')
                    ->with(['error' => 'Số lượng xuất không được lớn hơn số lượng sản phẩm']);
            }
        
            // Cập nhật thông tin xuất hàng và sản phẩm
            $createGoodIssue = GoodIssue::create(
                [
                    'product_id' => $request->product_id,
                    'flavor_id' => $request->flavor_id,         
                    'quantity' => DB::raw('quantity - ' . $request->quantity),
                    'export_good_quantity' => DB::raw('export_good_quantity + ' . $request->quantity),
                    'stock_good_quantity' => $getProductFlavor->quantity-$request->quantity,
                    'type' => 2,
                ]
            );
        
            if ($createGoodIssue) {
                ProductFlavor::updateOrCreate(
                    [
                        'product_id' => $request->product_id,
                        'flavor_id' => $request->flavor_id
                    ],
                    [
                        'quantity' => DB::raw('quantity - ' . $request->quantity),
                    ]
                );
            }
        
            return redirect()->route('admin.good-issues.index')
                ->with(['success' => 'Xuất hàng thành công']);
        } catch (\Illuminate\Validation\ValidationException $e) {
            // Nếu có lỗi validation, lấy thông báo lỗi và truyền vào view
            $errorMessage = $e->validator->errors()->first();
            Session::flash('error_message', $errorMessage);
        
            return back(); // hoặc redirect về trang cần hiển thị
        } catch (\Exception $e) {
            // Bắt các ngoại lệ khác nếu có và xử lý tương ứng
            return back()->withError($e->getMessage());
        }
    }

    public function listImportExportGood(Request $request){
        $query = GoodIssue::query()->join('products', function ($join) {
            $join->on('products.id', '=', 'good_issues.product_id');
        });

        if ($request->has('keyword')) {
            $keyword = $request->input('keyword');
            $query->where('products.name', 'like', '%' . $keyword . '%');
        }
    
        $query = $query->join('flavors', function ($join) {
            $join->on('flavors.id', '=', 'good_issues.flavor_id');
        })
        ->select([
            'products.id',
            'products.name as product_name',
            'flavors.name as flavor_name',
            'products.thumbnail',
            'good_issues.import_good_quantity',
            'good_issues.export_good_quantity',
            'good_issues.stock_good_quantity',
            DB::raw('CASE WHEN good_issues.type = 1 THEN "Nhập hàng" ELSE "Xuất hàng" END as good_issues_type'),
            'good_issues.created_at'
        ])
        ->paginate(5);
        return view('backend.import-export-good.list-import-export', [
            'products' => $query
        ]);
    }

    public function ExportGood(Request $request){
        return Excel::download(new GoodExport($request->keyword), 'export-good.xlsx');
    }
}
