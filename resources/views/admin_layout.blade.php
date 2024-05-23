<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashbroad</title>
    <link rel="stylesheet" href="{{asset('public/fontend/css/admin_layout.css')}}">
    <link rel="stylesheet" href="{{asset('public/fontend/css/add_category.css')}}">
    <link rel="stylesheet" href="{{asset('public/fontend/css/show_category.css')}}">
    <link rel="stylesheet" href="{{asset('public/fontend/css/add_product.css')}}">
    <link rel="stylesheet" href="{{asset('public/fontend/css/add_user.css')}}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
    <div class="sidebar">
        <ul>
            <li><a class="title" href="#"style="
                padding: 10px;
                border-radius: 5px;
            ">Tổng quan</a></li>
            <li class="dropdown">
                <a class="title" href="{{URL::to('/show-category-product')}}">Quản lí danh mục</a>
            </li>

            <li class="dropdown">
                <a class="title" href="{{URL::to('/show-type')}}">Quản lí thể loại</a>
            </li>

            <li class="dropdown">
              <a class="title" href="{{URL::to('/show-product')}}">Quản lí sản phẩm</a>
            </li>

            <li class="dropdown">
                <a class="title" href="{{URL::to('/show-voucher')}}">Quản lí voucher</a>
            </li>

            <li class="dropdown">
              <a class="title" href="{{URL::to('/show-orders')}}">Quản lí đơn hàng</a>
            </li>

            <li class="dropdown">
                <a class="title" href="{{URL::to('/show-user')}}">Quản lí tài khoản</a>
            </li>

            <li><a  class="title" href="{{URL::to('/logout')}}">Đăng xuất</a></li>
        </ul>
    </div>
    <div class="content">
       @yield('admin_content')
    </div>
</body>
</html>
