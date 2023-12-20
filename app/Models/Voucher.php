<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Voucher extends Model
{
    use HasFactory, SoftDeletes;

    protected $guard = 'vouchers';

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    protected $casts = [
        'applicable_brands' => 'array',
    ];

    // Phương thức để kiểm tra xem một thương hiệu có được áp dụng không
    public function isApplicableToBrand($brandId) {
        return in_array($brandId, $this->applicable_brands);
    }
}
