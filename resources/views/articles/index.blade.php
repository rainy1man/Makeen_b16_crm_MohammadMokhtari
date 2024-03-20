<html lang="en" dir="rtl">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <title>محصولات</title>
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
                        <td>{{ $article->category_id }}</td>
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
</body>

</html>
