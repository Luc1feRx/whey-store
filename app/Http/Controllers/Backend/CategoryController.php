<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index (Request $request){
        $categories = Category::paginate(10);
        return view('backend.category.index', [
            'categories' => $categories
        ]);
    }

    public function create(){
        return view('backend.category.create');
    }
}
