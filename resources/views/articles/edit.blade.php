users<html lang="en" dir="rtl">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <title>ویرایش مقاله</title>
</head>

<body>

    <nav class="navbar navbar-expand-sm bg-light container">
        <div class="container-fluid">
            <ul class="navbar-nav">
                <li class="nav-item"><a class="nav-link" href="../login.php">ورود</a></li>
                <li class="nav-item"><a class="nav-link" href="../register.php">ثبت نام</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('categories.index') }}">دسته بندی</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('products.index') }}">محصولات</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('orders.index') }}">سفارشات</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('users.index') }}">کاربران</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('articles.index') }}">مجله</a></li>
            </ul>
        </div>
    </nav>

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
</body>

</html>
<html>

<head>
