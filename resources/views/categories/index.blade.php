@extends('layouts.master')

@section('title', 'دسته بندی‌ها')

@section('content')

    <div class="container mt-3">
        <h2>دسته بندی‌ها</h2>
        <button type="submit" class="btn btn-light"><a href="create">دسته بندی جدید</a></button>
        <br>
        <br>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>نام دسته بندی</th>
                    <th>توضیحات</th>
                    <th>حذف/ویرایش</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($categories as $category)
                    <tr>
                        <td>{{ $category->categoryName }}</td>
                        <td>{{ $category->description }}</td>
                        <td>
                            <a href="{{ route('categories.edit', ['id' => $category->id]) }}">ویرایش</a> /
                            <form action="{{ route('categories.delete', ['id' => $category->id]) }}" method="post">
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
