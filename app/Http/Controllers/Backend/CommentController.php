<?php

namespace App\Http\Controllers\Backend;

use App\Helpers\Common;
use App\Http\Controllers\Controller;
use App\Models\Review;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index(Request $request){
        $reviews = Review::with('product:id,name','user:id,name')
        ->whereNull('deleted_at');

        if($request->keyword){
            $searchKeyword = Common::escapeLike($request->keyword);
            $reviews->where(function ($q) use ($searchKeyword) {
                $q->where('content', 'LIKE', "%" . $searchKeyword . "%")
                    ->orWhere('rating', 'LIKE', "%" . $searchKeyword . "%");
            });
        }
        
        $reviews = $reviews->orderBy('id', 'desc')->paginate(10);

        return view('backend.comment.index', [
            'reviews' => $reviews
        ]);
    }
}
