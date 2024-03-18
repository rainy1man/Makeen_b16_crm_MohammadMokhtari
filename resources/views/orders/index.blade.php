<html lang="en" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <title>سفارشات</title>
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

    <div class="container mt-3">
        <h2>سفارشات</h2>
        <button type="submit" class="btn btn-light"><a href="create">سفارش جدید</a></button>
        <br>
        <br>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>نام خریدار</th>
                    <th>شماره سفارش</th>
                    <th>قیمت فاکتور</th>
                    <th>وضعیت پرداخت</th>
                    <th>شماره همراه</th>
                    <th>آدرس</th>
                    <th>توضیحات</th>
                    <th>حذف/ویرایش</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($orders as $order)
                    <tr>
                        <td>{{ $order->customerName }}</td>
                        <td>{{ $order->orderNumber }}</td>
                        <td>{{ $order->price }}</td>
                        <td>{{ $order->paymentStatus }}</td>
                        <td>{{ $order->phoneNumber }}</td>
                        <td>{{ $order->address }}</td>
                        <td>{{ $order->exp }}</td>
                        <td>
                            <a href="/orders/edit/{{ $order->id }}">ویرایش</a> /
                            <form action="/orders/delete/{{ $order->id }}" method="post">
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
