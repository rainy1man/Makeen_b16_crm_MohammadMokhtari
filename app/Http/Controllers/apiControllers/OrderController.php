<?php

namespace App\Http\Controllers\apiControllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequests\CreateProductRequest;
use App\Http\Requests\ProductRequests\EditProductRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = DB::table('orders')->orderBy('id', 'desc')->paginate(5);
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
    public function store(CreateProductRequest $request)
    {
        $order = DB::table('orders')->insert($request->toArray());
        return response()->json($order);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $order)
    {
        $order = DB::table('orders')->where('id', $order)->first();
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
    public function update(EditProductRequest $request, string $order)
    {
    $order = DB::table('orders')->where('id', $order)->update($request->toArray());
    return response()->json($order);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $order)
    {
        $order = DB::table('orders')->where('id', $order)->delete();
        return response()->json($order);
    }
}
