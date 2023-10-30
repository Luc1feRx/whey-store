<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    protected $guard = 'products';

    CONST HIDDEN = 0;
    CONST DISPLAY = 1;

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
}
