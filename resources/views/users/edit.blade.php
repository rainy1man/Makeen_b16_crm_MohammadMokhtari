<html lang="en" dir="rtl">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <title>ویرایش کاربر</title>
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
        <form action="/users/edit/{{ $user->id }}" method="post">
            @csrf
            <h2>ویرایش کاربر</h2>

            <div class="mb-3 mt-3">
                <label class="form-label">نام و نام خانوادگی:</label>
                <input type="text" class="form-control" placeholder="نام و نام خانوادگی را وارد نمایید"
                    name="name" value="{{ $user->name}}" />
            </div>

            <div class="mb-3 mt-3">
                <label class="form-label">کد ملی</label>
                <input type="text" class="form-control" placeholder="کد ملی را وارد نمایید" name="codeMelli"
                    value="{{ $user->codeMelli}}" />
            </div>

            <div class="mb-3 mt-3">
                <label class="form-label">شماره همراه:</label>
                <input type="text" class="form-control" placeholder="شماره همراه را وارد نمایید" name="phoneNumber"
                    value="{{ $user->phoneNumber}}" />
            </div>

            <div class="mb-3">
                <label class="form-label">تاریخ تولد:</label>
                <input type="text" class="form-control" placeholder="تاریخ تولد را وارد نمایید" name="birthDate"
                    value="{{ $user->birthDate}}" />
            </div>

            <div class="mb-3">
                <label class="form-label">جنسیت:</label>
                <select class="form-control" name="gender">
                    <option value="مرد" {{ $user->gender == "مرد" ? "selected" : ""}}>مرد</option>
                    <option value="زن" {{ $user->gender == "زن" ? "selected" : ""}}>زن</option>
                </select>
            </div>

            <div class="mb-3 mt-3">
                <label class="form-label">ایمیل:</label>
                <input type="text" class="form-control" placeholder="ایمیل را وارد نمایید" name="email"
                    value="{{ $user->email}}" />
            </div>

            <div class="mb-3">
                <label class="form-label">رمز عبور:</label>
                <input type="password" class="form-control" placeholder="رمز عبور را وارد نمایید" name="password"
                    value="{{ $user->password}}" />
            </div>

            <button type="submit" class="btn btn-light">ثبت</button>
        </form>
    </div>
</body>

</html>
