<?php

namespace App\Exports;

use App\Models\GoodIssue;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class GoodExport implements FromCollection, WithHeadings, WithMapping
{
    protected $keyword;

    public function __construct($keyword)
    {
        $this->keyword = $keyword;
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return GoodIssue::join('products', 'products.id', '=', 'good_issues.product_id')
            ->join('flavors', 'flavors.id', '=', 'good_issues.flavor_id')
            ->where('products.name', 'like', '%' . $this->keyword . '%')
            ->orWhere('flavors.name', 'like', '%' . $this->keyword . '%')
            ->select(
                'products.name as product_name',
                'flavors.name as flavor_name',
                'good_issues.import_good_quantity',
                'good_issues.export_good_quantity',
                'good_issues.stock_good_quantity',
                'good_issues.type',
                'good_issues.created_at'
            )
            ->get();
    }

    public function map($row): array
    {
        return [
            $row->product_name,
            $row->flavor_name,
            $row->import_good_quantity == 0 ? '0' : $row->import_good_quantity,
            $row->export_good_quantity == 0 ? '0' :  $row->export_good_quantity,
            $row->stock_good_quantity == 0 ? '0' : $row->stock_good_quantity,
            ($row->type == 1) ? 'Nhập hàng' : 'Xuất hàng',
            $row->created_at->format('d/m/Y H:i:s'), // Định dạng ngày giờ
        ];
    }

    public function headings(): array
    {
        return [
            'Product Name',
            'Flavor Name',
            'Import Good Quantity',
            'Export Good Quantity',
            'Stock Good Quantity',
            'Type',
            'Created At',
        ];
    }
}
