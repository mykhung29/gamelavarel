<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Left Sidebar Menu</title>
    <link rel="stylesheet" href="{{asset('public/fontend/css/admin_layout.css')}}">
    <link rel="stylesheet" href="{{asset('public/fontend/css/add_category.css')}}">
    <link rel="stylesheet" href="{{asset('public/fontend/css/show_category.css')}}">
    <link rel="stylesheet" href="{{asset('public/fontend/css/add_product.css')}}">

</head>
<body>
    <div class="sidebar">
        <ul>
            <li><a class="title" href="#">Tổng quan</a></li>
            <li class="dropdown">
                <a class="title" href="#">Quản lí danh mục</a>
                <ul class="submenu">
                    <li><a  href="{{URL::to('/add-category-product')}}" >Thêm danh mục</a></li>
                    <li><a  href="{{URL::to('/show-category-product')}}">Liệt kê</a></li>
                </ul>
            </li>
            <li class="dropdown">
              <a class="title" href="#">Quản lí sản phẩm</a>
              <ul class="submenu">
                <li> <a href="{{URL::to('/add-product')}}" >Thêm sản phẩm</a> </li>
                <li> <a href="{{URL::to('/show-product')}}">Liệt kê</a></li>
                <li> <a href="{{URL::to('/manager-product')}}">Quan li nhap hang</a></li>
              </ul>
          </li>
        <li class="dropdown">
          <a class="title" href="#">Quản lí đơn hàng</a>
          <ul class="submenu">
              <li><a href="#">Danh mục 1</a></li>
              <li><a href="#">Danh mục 2</a></li>
              <li><a href="#">Danh mục 3</a></li>
          </ul>
      </li>
        <li><a  class="title" href="{{URL::to('/logout')}}">Đăng xuất</a></li>
        </ul>
    </div>
    <div class="content">
       @yield('admin_content')
    </div>
</body>
</html>
