<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Flavor extends Model
{
    use HasFactory, SoftDeletes;

    protected $guard = 'flavors';

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    public function products()
    {
        return $this->belongsToMany(Product::class, 'product_flavors');
    }

    public function goodIssues()
    {
        return $this->hasMany(GoodIssue::class, );
    }
}
