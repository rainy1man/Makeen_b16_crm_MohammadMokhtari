<?php

namespace App\Http\Controllers\apiControllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\OrderRequests\CreateOrderRequest;
use App\Http\Requests\OrderRequests\EditOrderRequest;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(string $id)
    {
        if (!$id) {
            $orders = Order::
                with([
                    'user:id,firstName,lastName,phoneNumber,email',
                    'products:id,productName,price',
                    'factor'
                ])
                ->orderBy('id', 'desc')
                ->paginate(5);
            return response()->json($orders);
        } else {
            $order = Order::with([
                'user:id,firstName,lastName,phoneNumber,email',
                'products:id,productName,price'
            ])->find($id);
            return response()->json($order);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $order = Order::create($request->toArray());
        // $order->slug = $order->id . '-' . '0001';
        // $order->save();
        $order->products()->attach($request->product_ids);
        return response()->json("ok");
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $order = Order::where('id', $id)->update($request->toArray());
        return response()->json($order);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $order = Order::destroy($id);
        return response()->json($order);
    }
}
