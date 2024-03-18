users<html lang="en" dir="rtl">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <title>ویرایش محصول</title>
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
    <form action="/products/edit/{{ $product->id }}" method="post">
        @csrf
      <h2>ویرایش محصول</h2>

      <div class="mb-3 mt-3">
        <label class="form-label">نام محصول:</label>
        <input type="text" class="form-control" placeholder="نام محصول را وارد نمایید" name="productName" value="{{ $product->productName}}" />
      </div>

      <div class="mb-3 mt-3">
        <label class="form-label">برند</label>
        <input type="text" class="form-control" placeholder="برند را وارد نمایید" name="brand" value="{{ $product->brand }}" />
      </div>

      <div class="mb-3 mt-3">
        <label class="form-label">رایحه:</label>
        <select class="form-control" name="scent">
          <option value="خنک" {{ $product->scent == "خنک" ? "selected" : ""}}>خنک</option>
          <option value="گرم" {{ $product->scent == "گرم" ? "selected" : ""}}>گرم</option>
          <option value="ملایم" {{ $product->scent == "ملایم" ? "selected" : ""}}>ملایم</option>
          <option value="تلخ" {{ $product->scent == "تلخ" ? "selected" : ""}}>تلخ</option>
          <option value="شیرین" {{ $product->scent == "شیرین" ? "selected" : ""}}>شیرین</option>
          <option value="ترش" {{ $product->scent == "ترش" ? "selected" : ""}}>ترش</option>
        </select>
      </div>

      <div class="mb-3">
        <label class="form-label">مناسب:</label>
        <select class="form-control" name="gender">
          <option value="آقایان" {{ $product->gender == "آقایان" ? "selected" : ""}}>آقایان</option>
          <option value="بانوان" {{ $product->gender == "بانوان" ? "selected" : ""}}>بانوان</option>
          <option value="آقایان/بانوان" {{ $product->gender == "آقایان/بانوان" ? "selected" : ""}}>آقایان/بانوان</option>
        </select>
      </div>

      <div class="mb-3">
        <label class="form-label">قیمت:</label>
        <input type="text" class="form-control" placeholder="قیمت را وارد نمایید" name="price" value="{{ $product->price }}" />
      </div>

      <div class="mb-3 mt-3">
        <label class="form-label">توضیحات:</label>
        <input type="text" class="form-control" placeholder="توضیحات را وارد نمایید" name="exp" value="{{ $product->exp }}" />
      </div>

      <button type="submit" class="btn btn-light">ثبت</button>
    </form>
  </div>
</body>

</html>
<html>

<head>
