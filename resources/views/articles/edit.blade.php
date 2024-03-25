@extends('layouts.master')

@section('title', 'ویرایش مقاله')

@section('content')

    <div class="container">
        <form action="{{ route('articles.update', ['id' => $article->id]) }}" method="post">
            @csrf
            <h2>ویرایش مقاله</h2>

            <div class="mb-3 mt-3">
                <label class="form-label">عنوان:</label>
                <input type="text" class="form-control" placeholder="عنوان مقاله را وارد نمایید" name="title"
                    value="{{ $article->title }}" />
                @error('title')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-3 mt-3">
                <label class="form-label">دسته بندی:</label>
                <select class="form-control" name="category_id">
                    @foreach ($categories as $category)
                        <option value={{ $category->id }}
                            {{ $category->id == $article->category_id ? 'selected' : '' }}>
                            {{ $category->categoryName }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">متن:</label>
                <input type="text" class="form-control" placeholder="متن را وارد نمایید" name="textPost"
                    value="{{ $article->textPost }}" />
                @error('textPost')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <button type="submit" class="btn btn-light">ثبت</button>
        </form>
    </div>
    @endsection
