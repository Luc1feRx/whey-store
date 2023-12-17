<?php

namespace App\Models;

use App\Traits\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes, Filterable;

    protected $guard = 'products';

    CONST HIDDEN = 0;
    CONST DISPLAY = 1;

    CONST ISFEATURED = 1;

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];


    public function categories()
    {
        return $this->belongsToMany(Category::class, 'product_categories', 'product_id', 'category_id');
    }

    public function flavors()
    {
        return $this->belongsToMany(Flavor::class, 'product_flavors', 'product_id', 'flavor_id');
    }

    public function images()
    {
        return $this->hasMany(ProductImage::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function goodIssues()
    {
        return $this->hasMany(GoodIssue::class, 'product_id');
    }

    public function flavors_products()
    {
        return $this->belongsToMany(Flavor::class, 'product_flavors', 'product_id', 'flavor_id')
            ->withPivot('quantity'); // Lấy cột quantity trong bảng trung gian
    }

    /**
     * check status
     * @return array
     */

     public static function checkStatus() {
        return [
            self::HIDDEN => 'Ẩn',
            self::DISPLAY => 'Hiển thị'
        ];
    }
}
