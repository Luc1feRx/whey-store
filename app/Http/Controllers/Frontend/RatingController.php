<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Review;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class RatingController extends Controller
{
    public function addCommentRating(Request $request){
        if ($request->ajax())
        {
            try {
                DB::beginTransaction();
                Review::create([
                    'user_id' => Auth::user()->id,
                    'product_id' => $request->product_id,
                    'content'=> $request->content,
                    'rating' => $request->rating
                ]);
                DB::commit();
                return response([
                    'msg' => trans('message.comment.success'),
                ]);
            } catch (Exception $e) {
                Log::error('[RatingController][addCommentRating] error ' . $e->getMessage() . ' '. $e->getLine());
                DB::rollBack();
            }
        }
    }
}
