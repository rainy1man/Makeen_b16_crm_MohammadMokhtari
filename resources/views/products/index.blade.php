@extends('layouts.master')

@section('title', 'محصولات')

@section('content')

    <div class="container mt-3">
        <h2>محصولات</h2>
        <button type="submit" class="btn btn-light">
            <a href="create">محصول جدید</a>
        </button>
        <br />
        <br />
        <table class="table table-bordered">

            <thead>
                <tr>
                    <th>نام محصول</th>
                    <th>نام برند</th>
                    <th>رایحه</th>
                    <th>جنسیت</th>
                    <th>قیمت</th>
                    <th>توضیحات</th>
                    <th>حذف/ویرایش</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($products as $product)
                    <tr>
                        <td>{{ $product->productName }}</td>
                        <td>{{ $product->brand }}</td>
                        <td>{{ $product->scent }}</td>
                        <td>{{ $product->gender }}</td>
                        <td>{{ $product->price }}</td>
                        <td>{{ $product->exp }}</td>
                        <td>
                            <button>
                                <a href="{{ route('products.edit', ['id' => $product->id]) }}">ویرایش</a>
                            </button>
                            <form action="{{ route('products.delete', ['id' => $product->id]) }}" method="post">
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
