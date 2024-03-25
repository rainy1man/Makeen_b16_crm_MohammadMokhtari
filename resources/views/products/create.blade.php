@extends('layouts.master')

@section('title', 'محصول جدید')

@section('content')

    <div class="container">
        <form action="{{ route('products.store') }}" method="post">
            @csrf
            <h2>ثبت محصول جدید</h2>

            <div class="mb-3 mt-3">
                <label class="form-label">نام محصول:</label>
                <input type="text" class="form-control" placeholder="نام محصول را وارد نمایید" name="productName"
                    value="{{ old('productName') }}" />
                @error('productName')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-3 mt-3">
                <label class="form-label">برند</label>
                <input type="text" class="form-control" placeholder="برند را وارد نمایید" name="brand"
                    value="{{ old('brand') }}" />
                @error('brand')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-3 mt-3">
                <label class="form-label">رایحه:</label>
                <select class="form-control" name="scent">
                    <option value="خنک">خنک</option>
                    <option value="گرم">گرم</option>
                    <option value="ملایم">ملایم</option>
                    <option value="تلخ">تلخ</option>
                    <option value="شیرین">شیرین</option>
                    <option value="ترش">ترش</option>
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">مناسب:</label>
                <select class="form-control" name="gender">
                    <option value="آقایان">آقایان</option>
                    <option value="بانوان">بانوان</option>
                    <option value="آقایان/بانوان">آقایان/بانوان</option>
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">قیمت:</label>
                <input type="text" class="form-control" placeholder="قیمت را وارد نمایید" name="price"
                    value="{{ old('price') }}" />
                @error('price')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-3 mt-3">
                <label class="form-label">توضیحات:</label>
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
