@extends('layouts.master')

@section('title', 'سفارش جدید')

@section('content')

    <div class="container">
        <form action="{{ route('orders.store') }}" method="post">
            @csrf
            <h2>ثبت سفارش جدید</h2>
            <div class="mb-3 mt-3">
                <label for="name" class="form-label">نام خریدار:</label>
                <input type="text" class="form-control" placeholder="نام خریدار را وارد نمایید" name="customerName"
                    value="{{ old('customerName') }}" />
                @error('customerName')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-3 mt-3">
                <label for="orderNumber" class="form-label">شماره سفارش:</label>
                <input type="text" class="form-control" placeholder="شماره سفارش را وارد نمایید" name="orderNumber"
                    value="{{ old('orderNumber') }}" />
                @error('orderNumber')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-3 mt-3">
                <label for="price" class="form-label">قیمت کل:</label>
                <input type="text" class="form-control" placeholder="قیمت را وارد نمایید" name="price"
                    value="{{ old('price') }}" />
                @error('price')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-3 mt-3">
                <label for="paymentStatus" class="form-label">وضعیت پرداخت:</label>
                <select class="form-control" name="paymentStatus">
                    <option value="online">پرداخت آنلاین</option>
                    <option value="cash">پرداخت نقدی</option>
                </select>
            </div>

            <div class="mb-3 mt-3">
                <label for="phoneNumber" class="form-label">شماره همراه:</label>
                <input type="text" class="form-control" placeholder="شماره همراه را وارد نمایید" name="phoneNumber"
                    value="{{ old('phoneNumber') }}" />
                @error('phoneNumber')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-3 mt-3">
                <label for="address" class="form-label">آدرس:</label>
                <input type="text" class="form-control" placeholder="آدرس را وارد نمایید" name="address"
                    value="{{ old('address') }}" />
                @error('address')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-3">
                <label for="exp" class="form-label">توضیحات:</label>
                <input type="text" class="form-control" placeholder="توضیحات را وارد نمایید" name="exp"
                    value="{{ old('exp') }}" />
                    @error('exp')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <button type="submit" class="btn btn-light">ثبت</button>
        </form>
    </div>
    @endsection
