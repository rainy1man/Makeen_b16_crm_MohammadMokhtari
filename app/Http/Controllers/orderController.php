<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderRequests\CreateOrderRequest;
use App\Http\Requests\OrderRequests\EditOrderRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = DB::table('orders')->get();
        return view('orders.index', ["orders" => $orders]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('orders.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateOrderRequest $request)
    {
        DB::table('orders')->insert([
            "customerName" => $request->customerName,
            "orderNumber" => $request->orderNumber,
            "price" => $request->price,
            "paymentStatus" => $request->paymentStatus,
            "phoneNumber" => $request->phoneNumber,
            "address" => $request->address,
            "exp" => $request->exp,
        ]);
        return redirect()->route('orders.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $order = DB::table('orders')->where('id', $id)->first();
        return view('orders.edit', ["order" => $order]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EditOrderRequest $request, string $id)
    {
        DB::table('orders')->where('id', $id)->update([
            "customerName" => $request->customerName,
            "orderNumber" => $request->orderNumber,
            "price" => $request->price,
            "paymentStatus" => $request->paymentStatus,
            "phoneNumber" => $request->phoneNumber,
            "address" => $request->address,
            "exp" => $request->exp,
        ]);
        return redirect()->route('orders.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DB::table('orders')->where('id', $id)->delete();
        return redirect()->route('orders.index');
    }
}
