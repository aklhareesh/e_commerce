<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CartController extends Controller
{
    public function addToCart(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_id' => 'required|exists:users,id',
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
        ]);

        if ($validator->fails()) {
            return response()->json(['message' => 'Validation failed', 'errors' => $validator->errors()], 400);
        }

        $user = User::find($request->input('user_id'));
        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }
        $product = Product::find($request->input('product_id'));
        if (!$product) {
            return response()->json(['message' => 'Product not found'], 404);
        }

        $cartItem = new Cart();
        $cartItem->user_id = $request->input('user_id');
        $cartItem->product_id = $request->input('product_id');
        $cartItem->quantity = $request->input('quantity');
        $cartItem->save();

        return response()->json(['message' => 'Product added to cart successfully'], 201);

    }
}
