@extends('layouts.master')

@section('title', 'سفارشات')

@section('content')

    <div class="container mt-3">
        <h2>سفارشات</h2>
        <button type="submit" class="btn btn-light"><a href="create">سفارش جدید</a></button>
        <br>
        <br>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>نام خریدار</th>
                    <th>شماره سفارش</th>
                    <th>قیمت فاکتور</th>
                    <th>وضعیت پرداخت</th>
                    <th>شماره همراه</th>
                    <th>آدرس</th>
                    <th>توضیحات</th>
                    <th>حذف/ویرایش</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($orders as $order)
                    <tr>
                        <td>{{ $order->customerName }}</td>
                        <td>{{ $order->orderNumber }}</td>
                        <td>{{ $order->price }}</td>
                        <td>{{ $order->paymentStatus }}</td>
                        <td>{{ $order->phoneNumber }}</td>
                        <td>{{ $order->address }}</td>
                        <td>{{ $order->exp }}</td>
                        <td>
                            <a href="{{ route('orders.edit', ['id' => $order->id]) }}">ویرایش</a> /
                            <form action="{{ route('orders.delete', ['id' => $order->id]) }}" method="post">
                                @csrf
                                @method('delete')
                                <input type="submit" value="delete">
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @endsection
