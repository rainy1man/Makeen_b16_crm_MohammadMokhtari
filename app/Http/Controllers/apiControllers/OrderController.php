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
    public function index()
    {
        $orders = Order::with(['user', 'product'])->orderBy('id', 'desc')->paginate(5);
        return response()->json($orders);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateOrderRequest $request)
    {
        $order = Order::create($request->toArray());
        return response()->json($order);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $order)
    {
        $order = Order::with(['user', 'product'])->where('id', $order)->first();
        return response()->json($order);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EditOrderRequest $request, string $order)
    {
    $order = Order::where('id', $order)->update($request->toArray());
    return response()->json($order);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $order)
    {
        $order = Order::destroy($order);
        return response()->json($order);
    }
}
