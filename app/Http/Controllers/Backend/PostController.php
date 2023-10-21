<?php

namespace App\Http\Controllers\Backend;

use App\Helpers\Common;
use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $posts = Post::whereNull('deleted_at');

        if($request->keyword){
            $searchKeyword = Common::escapeLike($request->keyword);
            $posts->where(function ($q) use ($searchKeyword) {
                $q->where('name', 'LIKE', "%" . $searchKeyword . "%")
                    ->orWhere('slug', 'LIKE', "%" . $searchKeyword . "%");
            });
        }
        
        $posts = $posts->orderBy('id', 'desc')->paginate(10);
        return view('backend.post.index', [
            'posts' => $posts
        ]);
    }

    public function create(Request $request)
    {
        return view('backend.post.create');
    }
}
