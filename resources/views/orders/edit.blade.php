<html lang="en" dir="rtl">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <title>ویرایش سفارش</title>
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
        <form action="{{ route('orders.update', ['id' => $order->id]) }}" method="post">
            @csrf
            <h2>ویرایش سفارش</h2>

            <div class="mb-3 mt-3">
                <label for="name" class="form-label">نام خریدار:</label>
                <input type="text" class="form-control" placeholder="نام خریدار را وارد نمایید" name="customerName"
                    value="{{ $order->customerName }}" />
                @error('v')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-3 mt-3">
                <label for="orderNumber" class="form-label">شماره سفارش:</label>
                <input type="text" class="form-control" placeholder="شماره سفارش را وارد نمایید" name="orderNumber"
                    value="{{ $order->orderNumber }}" />
                @error('orderNumber')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-3 mt-3">
                <label for="price" class="form-label">قیمت کل:</label>
                <input type="text" class="form-control" placeholder="قیمت را وارد نمایید" name="price"
                    value="{{ $order->price }}" />
                @error('price')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-3 mt-3">
                <label for="paymentStatus" class="form-label">وضعیت پرداخت:</label>
                <select class="form-control" name="paymentStatus">
                    <option value="online" {{ $order->paymentStatus == 'online' ? 'selected' : '' }}>پرداخت آنلاین
                    </option>
                    <option value="cash" {{ $order->paymentStatus == 'cash' ? 'selected' : '' }}>پرداخت نقدی</option>
                </select>

            </div>

            <div class="mb-3 mt-3">
                <label for="phoneNumber" class="form-label">شماره همراه:</label>
                <input type="text" class="form-control" placeholder="شماره همراه را وارد نمایید" name="phoneNumber"
                    value="{{ $order->phoneNumber }}" />
                @error('phoneNumber')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-3 mt-3">
                <label for="address" class="form-label">آدرس:</label>
                <input type="text" class="form-control" placeholder="آدرس را وارد نمایید" name="address"
                    value="{{ $order->address }}" />
                @error('address')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-3">
                <label for="exp" class="form-label">توضیحات:</label>
                <input type="text" class="form-control" placeholder="توضیحات را وارد نمایید" name="exp"
                    value="{{ $order->exp }}" />
                @error('exp')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <button type="submit" class="btn btn-light">ثبت</button>
        </form>
    </div>
</body>

</html>
