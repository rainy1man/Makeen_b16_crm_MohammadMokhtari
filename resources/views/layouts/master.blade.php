<html lang="en" dir="rtl">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <title>@yield('title')</title>
</head>

<body>

    <header>
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
    </header>

    @yield('content')

    <footer>

    </footer>

</body>

</html>
