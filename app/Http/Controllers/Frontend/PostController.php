<?php

namespace App\Http\Controllers\Frontend;

use App\Helpers\Common;
use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(Request $request){
        $listPost = Post::query();
        
        if($request->keyword){
            $searchKeyword = Common::escapeLike($request->keyword);
            $listPost->where(function ($q) use ($searchKeyword) {
                $q->where('name', 'LIKE', "%" . $searchKeyword . "%")
                    ->orWhere('slug', 'LIKE', "%" . $searchKeyword . "%");
            });
        }

        $listPost = $listPost->orderBy('id', 'desc')
            ->paginate(10);
        $feature_posts = Post::query()->where('is_featured', 1)->take(4)->get();

        return view('frontend.post.post-list', [
            'listPost' => $listPost,
            'feature_posts' => $feature_posts
        ]);
    }

    public function getDetailPost($slug){
        $post = Post::query()->where('slug', $slug)->first();
        $feature_posts = Post::query()->where('is_featured', 1)->take(4)->get();
        return view('frontend.post.post-single',[
            'post' => $post,
            'feature_posts' => $feature_posts
        ]);
    }
}
