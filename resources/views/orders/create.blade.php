<html lang="en" dir="rtl">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <title>سفارش جدید</title>
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
    <form action="/orders/create" method="post">
        @csrf
      <h2>ثبت سفارش جدید</h2>
      <div class="mb-3 mt-3">
        <label for="name" class="form-label">نام خریدار:</label>
        <input type="text" class="form-control" placeholder="نام خریدار را وارد نمایید" name="customerName" />
      </div>

      <div class="mb-3 mt-3">
        <label for="orderNumber" class="form-label">شماره سفارش:</label>
        <input type="text" class="form-control" placeholder="شماره سفارش را وارد نمایید" name="orderNumber" />
      </div>

      <div class="mb-3 mt-3">
        <label for="price" class="form-label">قیمت کل:</label>
        <input type="text" class="form-control" placeholder="قیمت را وارد نمایید" name="price" />
      </div>

      <div class="mb-3 mt-3">
        <label for="paymentStatus" class="form-label">وضعیت پرداخت:</label>
        <select class="form-control" name="paymentStatus">
          <option value="online">پرداخت آنلاین</option>
          <option value="cash">پرداخت نقدی</option>
        </select>
      </div>

      <div class="mb-3 mt-3">
        <label for="phoneNumber" class="form-label">شماره همراه:</label>
        <input type="text" class="form-control" placeholder="شماره همراه را وارد نمایید" name="phoneNumber" />
      </div>

      <div class="mb-3 mt-3">
        <label for="address" class="form-label">آدرس:</label>
        <input type="text" class="form-control" placeholder="آدرس را وارد نمایید" name="address" />
      </div>

      <div class="mb-3">
        <label for="exp" class="form-label">توضیحات:</label>
        <input type="text" class="form-control" placeholder="توضیحات را وارد نمایید" name="exp" />
      </div>
      <button type="submit" class="btn btn-light">ثبت</button>
    </form>
  </div>
</body>

</html>
