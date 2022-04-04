<?php

namespace App\Http\Controllers\Order;

use App\Models\Screencast\Playlist;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\Order\CartResource;

class CartController extends Controller
{
   public function index()
   {
      return CartResource::collection(Auth::user()->carts()->with('playlist', 'user')->latest()->get());
   }

   public function store(Playlist $playlist)
   {
      if (!Auth::user()->alreadyInCart($playlist)) {
         Auth::user()->addToCart($playlist);

         return response()->json([
            'message' => 'Playlist added to cart.',
         ]);
      } else {
         return response()->json([
            'message' => 'You already have this playlist in your cart.',
         ], 422);
      }
   }
}