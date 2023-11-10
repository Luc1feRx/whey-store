<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\FavoriteProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserFavouriteController extends Controller
{
    public function addToFavorites($productId) {
        if(!Auth::check()){
            return null; 
        }
        $favourite = FavoriteProduct::create([
            'user_id' => Auth::user()->id,
            'product_id' => $productId,
        ]);
    
        return redirect()->back()->with('success', __('message.favourite.success'));
    }

    public function index() {
        return view('frontend.favourite.user-favourite');
    }
}
