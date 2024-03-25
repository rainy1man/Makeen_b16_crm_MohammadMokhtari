@extends('layouts.master')

@section('title', 'ویرایش محصول')

@section('content')

    <div class="container">
        <form action="{{ route('products.update', ['id' => $product->id]) }}" method="post">
            @csrf
            <h2>ویرایش محصول</h2>

            <div class="mb-3 mt-3">
                <label class="form-label">نام محصول:</label>
                <input type="text" class="form-control" placeholder="نام محصول را وارد نمایید" name="productName"
                    value="{{ $product->productName }}" />
                @error('productName')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-3 mt-3">
                <label class="form-label">برند</label>
                <input type="text" class="form-control" placeholder="برند را وارد نمایید" name="brand"
                    value="{{ $product->brand }}" />
                @error('brand')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-3 mt-3">
                <label class="form-label">رایحه:</label>
                <select class="form-control" name="scent">
                    <option value="خنک" {{ $product->scent == 'خنک' ? 'selected' : '' }}>خنک</option>
                    <option value="گرم" {{ $product->scent == 'گرم' ? 'selected' : '' }}>گرم</option>
                    <option value="ملایم" {{ $product->scent == 'ملایم' ? 'selected' : '' }}>ملایم</option>
                    <option value="تلخ" {{ $product->scent == 'تلخ' ? 'selected' : '' }}>تلخ</option>
                    <option value="شیرین" {{ $product->scent == 'شیرین' ? 'selected' : '' }}>شیرین</option>
                    <option value="ترش" {{ $product->scent == 'ترش' ? 'selected' : '' }}>ترش</option>
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">مناسب:</label>
                <select class="form-control" name="gender">
                    <option value="آقایان" {{ $product->gender == 'آقایان' ? 'selected' : '' }}>آقایان</option>
                    <option value="بانوان" {{ $product->gender == 'بانوان' ? 'selected' : '' }}>بانوان</option>
                    <option value="آقایان/بانوان" {{ $product->gender == 'آقایان/بانوان' ? 'selected' : '' }}>
                        آقایان/بانوان</option>
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">قیمت:</label>
                <input type="text" class="form-control" placeholder="قیمت را وارد نمایید" name="price"
                    value="{{ $product->price }}" />
                @error('price')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-3 mt-3">
                <label class="form-label">توضیحات:</label>
                <input type="text" class="form-control" placeholder="توضیحات را وارد نمایید" name="exp"
                    value="{{ $product->exp }}" />
                @error('exp')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <button type="submit" class="btn btn-light">ثبت</button>
        </form>
    </div>
    @endsection
