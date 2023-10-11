<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $guard = "categories";

    protected $fillable = [
        'name_category',
        'slug_category',
        'parent_id',
        'thumbnail'
    ];

    // Định nghĩa mối quan hệ để lấy danh mục cha
    public function parentCategory()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }
}
