<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class OrderController extends Controller
{
    public function placeOrder(Request $request)
    {
        $validatedData = $request->validate([
            'user_id' => 'required|exists:users,id',
        ]);
        $user = User::find($validatedData['user_id']);
        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }
        $order = new Order([
            'user_id' => $user->id,
            'order_date' => now(),
        ]);
        $order->save();
        return response()->json(['message' => 'Order placed successfully'], 201);


    }
    public function viewOrderHistory(Request $request)
    {
        $user_id = $request->input('user_id');
        $query = Order::query();
        if ($user_id) {
            $query->where('user_id', $user_id);
        }
        $orders = $query->get();
        return response()->json($orders, 200);

    }
    public function orderList()
    {
        $orders = Order::all();
        return response()->json($orders);

    }
    public function update(Request $request, $id)
    {
        $order = Order::find($id);
        if (!$order) {
            return response()->json(['message' => 'Order not found'], 404);
        }
        $validator = Validator::make($request->all(), [
            'user_id' => 'required',
            'order_date' => 'required',
            'status'=> 'required'

        ]);
        if ($validator->fails()) {
            return response()->json(['message' => 'Validation failed', 'errors' => $validator->errors()], 400);
        }
        $order->update([
            'user_id' => $request->input('user_id'),
            'order_date' => $request->input('order_date'),
            'status'=> $request->input('status')
        ]);
        return response()->json(['message' => 'Order updated successfully', 'product' => $order]);
    }

}
