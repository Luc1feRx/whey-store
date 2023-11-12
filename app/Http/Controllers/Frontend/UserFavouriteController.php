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
    
        return redirect()->route('home.favouriteList')->with('success', __('message.favourite.success'));
    }

    public function index() {
        $productFavourite = FavoriteProduct::join('products', 'user_favourite.product_id', 'products.id')
            ->select([
                'products.id',
                'user_favourite.user_id',
                'products.name',
                'products.discount_price',
                'products.thumbnail',
                'products.slug'
            ])->get();
        return view('frontend.favourite.user-favourite', [
            'productFavourite' => $productFavourite
        ]);
    }
    public function removeFromFavorites($productId)
    {
        $userId = auth()->user()->id;

            // Xóa khỏi danh sách ưa thích
            FavoriteProduct::where('user_id', $userId)->where('product_id', $productId)->delete();

            return redirect()->back()->with('success', __('message.favourite.remove.success'));
    }
}
