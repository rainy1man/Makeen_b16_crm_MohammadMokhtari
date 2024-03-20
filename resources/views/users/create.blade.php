<html lang="en" dir="rtl">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <title>کاربر جدید</title>
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

        <form action="{{ route('users.store') }}" method="post">
            @csrf
            <h2>ثبت کاربر جدید</h2>
            <div class="mb-3 mt-3">
                <label class="form-label">نام و نام خانوادگی:</label>
                <input type="text" class="form-control" placeholder="نام و نام خانوادگی را وارد نمایید"
                    name="name" value="{{ old('name') }}" />
                @error('name')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-3 mt-3">
                <label class="form-label">کد ملی</label>
                <input type="text" class="form-control" placeholder="کد ملی را وارد نمایید" name="codeMelli" value="{{ old('codeMelli') }}" />
                @error('codeMelli')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-3 mt-3">
                <label class="form-label">شماره همراه:</label>
                <input type="text" class="form-control" placeholder="شماره همراه را وارد نمایید" name="phoneNumber" value="{{ old('phoneNumber') }}" />
                @error('phoneNumber')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">تاریخ تولد:</label>
                <input type="date" class="form-control" placeholder="تاریخ تولد را وارد نمایید" name="birthDate" value="{{ old('birthDate') }}" />
            </div>

            <div class="mb-3">
                <label class="form-label">جنسیت:</label>
                <select class="form-control" name="gender">
                    <option value="مرد">مرد</option>
                    <option value="زن">زن</option>
                </select>
            </div>

            <div class="mb-3 mt-3">
                <label class="form-label">ایمیل:</label>
                <input type="text" class="form-control" placeholder="ایمیل را وارد نمایید" name="email"
                    value="{{ old('email') }}" />
                @error('email')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">رمز عبور:</label>
                <input type="password" class="form-control" placeholder="رمز عبور را وارد نمایید" name="password" />
                @error('password')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <button type="submit" class="btn btn-light">ثبت</button>
        </form>
    </div>
</body>

</html>
