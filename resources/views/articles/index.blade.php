@extends('layouts.master')

@section('title', 'مقالات')

@section('content')

    <div class="container mt-3">
        <h2>مقالات</h2>
        <button type="submit" class="btn btn-light">
            <a href="create">مقاله جدید</a>
        </button>
        <br />
        <br />
        <table class="table table-bordered">

            <thead>
                <tr>
                    <th>عنوان مقاله</th>
                    <th>دسته بندی</th>
                    <th>متن مقاله</th>
                    <th>حذف/ویرایش</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($articles as $article)
                    <tr>
                        <td>{{ $article->title }}</td>
                        <td>{{ $article->categoryName }}</td>
                        <td>{{ $article->textPost }}</td>
                        <td>
                            <button>
                                <a href="{{ route('articles.edit', ['id' => $article->id]) }}">ویرایش</a>
                            </button>

                            <form action="{{ route('articles.delete', ['id' => $article->id]) }}" method="post">
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
