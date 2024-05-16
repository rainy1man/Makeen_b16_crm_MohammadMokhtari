<?php

namespace App\Http\Controllers\apiControllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\OrderRequests\CreateOrderRequest;
use App\Http\Requests\OrderRequests\EditOrderRequest;
use App\Models\Order;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends ApiController
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request, string $id = null)
    {
        if ($request->user()->can('order.read')) {


            $orders = new Order();
            $orders = $orders->with([
                'user:id,first_name,last_name,phone_number,email',
                'products:id,product_name,price'
            ]);

            if (!$id) {
                if ($request->phone_number) {
                    $orders = $orders->whereHas('user', function (Builder $query) use($request) {
                        $query->where('phone_number', $request->phone_number);
                    });
                }
                $orders = $orders->orderByDesc('id')->paginate(25);
            } else {
                $orders = $orders->find($id);
            }

            return $this->success_response($orders);

        } else {
            if (!$id) {
                $orders = Order::where('user_id', $request->user()->id)->with(['products:id,product_name'])
                    ->orderby('id', 'desc')->paginate(5);
                return $this->success_response($orders);
            } else {
                return $this->unauthorized_response();
            }
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (!$request->user()->can('order.create')) {
            return $this->error_response();
        }

        $products = array_map(function ($product) {
            return is_array($product) ? (object) $product : $product;
        }, $request->input('products'));

        $total = 0;
        foreach ($products as $product) {
            $total += Product::find($product->id)->price * $product->quantity;
        }

        $orderData = $request->toArray();
        $orderData['totall_amount'] = $total;
        $order = Order::create($orderData);

        $warranty_expires_at = Carbon::now()->addDay();
        $warranty_starts_at = Carbon::now();

        foreach ($products as $product) {
            $order->products()->attach(
                $product->id,
                [
                    "quantity" => $product->quantity,
                    "expires_at" => $warranty_expires_at,
                    "started_at" => $warranty_starts_at
                ]
            );
        }
        return $this->success_response($order);
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
