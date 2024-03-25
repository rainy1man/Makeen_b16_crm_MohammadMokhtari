@extends('layouts.master')

@section('title', 'ویرایش دسته بندی')

@section('content')

    <div class="container">
        <form action="{{ route('categories.update', ['id' => $category->id]) }}" method="post">
            @csrf
            <h2>ویرایش دسته بندی</h2>
            <div class="mb-3 mt-3">
                <label for="name" class="form-label">نام دسته بندی:</label>
                <input type="text" class="form-control" placeholder="نام دسته بندی را وارد نمایید"
                    name="categoryName" value="{{ $category->categoryName }}" />
                @error('categoryName')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-3 mt-3">
                <label for="orderNumber" class="form-label">توضیحات:</label>
                <input type="text" class="form-control" placeholder="توضیحات را وارد نمایید" name="description"
                    value="{{ $category->description }}" />
                @error('description')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <button type="submit" class="btn btn-light">ثبت</button>
        </form>
    </div>
    @endsection
