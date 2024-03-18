<html lang="en" dir="rtl">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <title>محصول جدید</title>
</head>

<body>

    <nav class="navbar navbar-expand-sm bg-light container">
        <div class="container-fluid">
            <ul class="navbar-nav">
                <li class="nav-item"><a class="nav-link" href="../login.php">ورود</a></li>
                <li class="nav-item"><a class="nav-link" href="../register.php">ثبت نام</a></li>
                <li class="nav-item"><a class="nav-link" href="../categories/index">دسته بندی</a></li>
                <li class="nav-item"><a class="nav-link" href="../products/index">محصولات</a></li>
                <li class="nav-item"><a class="nav-link" href="../orders/index">سفارشات</a></li>
                <li class="nav-item"><a class="nav-link" href="../users/index">کاربران</a></li>
                <li class="nav-item"><a class="nav-link" href="../articles/index">مجله</a></li>
            </ul>
        </div>
    </nav>

    <div class="container">
        <form action="/articles/create" method="post">
            @csrf
            <h2>ثبت مقاله جدید</h2>

            <div class="mb-3 mt-3">
                <label class="form-label">عنوان:</label>
                <input type="text" class="form-control" placeholder="عنوان را وارد نمایید" name="title" />
            </div>

            <div class="mb-3 mt-3">
                <label class="form-label">دسته بندی:</label>
                <select class="form-control" name="category">
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->categoryName }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">متن:</label>
                <input type="text" class="form-control" placeholder="متن را وارد نمایید" name="textPost" />
            </div>

            <button type="submit" class="btn btn-light">ثبت</button>
        </form>
    </div>

</body>

</html>
