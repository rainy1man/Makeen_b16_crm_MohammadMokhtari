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
                <li class="nav-item"><a class="nav-link" href="{{ route('categories.index') }}">دسته بندی</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('products.index') }}">محصولات</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('orders.index') }}">سفارشات</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('users.index') }}">کاربران</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('articles.index') }}">مجله</a></li>
            </ul>
        </div>
    </nav>

    <div class="container">
        <form action="{{ route('products.store') }}" method="post">
            @csrf
            <h2>ثبت محصول جدید</h2>

            <div class="mb-3 mt-3">
                <label class="form-label">نام محصول:</label>
                <input type="text" class="form-control" placeholder="نام محصول را وارد نمایید" name="productName"
                    value="{{ old('productName') }}" />
                @error('productName')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-3 mt-3">
                <label class="form-label">برند</label>
                <input type="text" class="form-control" placeholder="برند را وارد نمایید" name="brand"
                    value="{{ old('brand') }}" />
                @error('brand')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-3 mt-3">
                <label class="form-label">رایحه:</label>
                <select class="form-control" name="scent">
                    <option value="خنک">خنک</option>
                    <option value="گرم">گرم</option>
                    <option value="ملایم">ملایم</option>
                    <option value="تلخ">تلخ</option>
                    <option value="شیرین">شیرین</option>
                    <option value="ترش">ترش</option>
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">مناسب:</label>
                <select class="form-control" name="gender">
                    <option value="آقایان">آقایان</option>
                    <option value="بانوان">بانوان</option>
                    <option value="آقایان/بانوان">آقایان/بانوان</option>
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">قیمت:</label>
                <input type="text" class="form-control" placeholder="قیمت را وارد نمایید" name="price"
                    value="{{ old('price') }}" />
                @error('price')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-3 mt-3">
                <label class="form-label">توضیحات:</label>
                <input type="text" class="form-control" placeholder="توضیحات را وارد نمایید" name="exp"
                    value="{{ old('exp') }}" />
                    @error('exp')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <button type="submit" class="btn btn-light">ثبت</button>
        </form>
    </div>

</body>

</html>
