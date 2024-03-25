@extends('layouts.master')

@section('title', 'ویرایش سفارش')

@section('content')

    <div class="container">
        <form action="{{ route('orders.update', ['id' => $order->id]) }}" method="post">
            @csrf
            <h2>ویرایش سفارش</h2>

            <div class="mb-3 mt-3">
                <label for="name" class="form-label">نام خریدار:</label>
                <input type="text" class="form-control" placeholder="نام خریدار را وارد نمایید" name="customerName"
                    value="{{ $order->customerName }}" />
                @error('v')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-3 mt-3">
                <label for="orderNumber" class="form-label">شماره سفارش:</label>
                <input type="text" class="form-control" placeholder="شماره سفارش را وارد نمایید" name="orderNumber"
                    value="{{ $order->orderNumber }}" />
                @error('orderNumber')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-3 mt-3">
                <label for="price" class="form-label">قیمت کل:</label>
                <input type="text" class="form-control" placeholder="قیمت را وارد نمایید" name="price"
                    value="{{ $order->price }}" />
                @error('price')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-3 mt-3">
                <label for="paymentStatus" class="form-label">وضعیت پرداخت:</label>
                <select class="form-control" name="paymentStatus">
                    <option value="online" {{ $order->paymentStatus == 'online' ? 'selected' : '' }}>پرداخت آنلاین
                    </option>
                    <option value="cash" {{ $order->paymentStatus == 'cash' ? 'selected' : '' }}>پرداخت نقدی</option>
                </select>

            </div>

            <div class="mb-3 mt-3">
                <label for="phoneNumber" class="form-label">شماره همراه:</label>
                <input type="text" class="form-control" placeholder="شماره همراه را وارد نمایید" name="phoneNumber"
                    value="{{ $order->phoneNumber }}" />
                @error('phoneNumber')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-3 mt-3">
                <label for="address" class="form-label">آدرس:</label>
                <input type="text" class="form-control" placeholder="آدرس را وارد نمایید" name="address"
                    value="{{ $order->address }}" />
                @error('address')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-3">
                <label for="exp" class="form-label">توضیحات:</label>
                <input type="text" class="form-control" placeholder="توضیحات را وارد نمایید" name="exp"
                    value="{{ $order->exp }}" />
                @error('exp')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <button type="submit" class="btn btn-light">ثبت</button>
        </form>
    </div>
    @endsection
