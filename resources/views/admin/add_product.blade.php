@extends('admin_layout')
@section('admin_content')
    <div class="add-product-form">
        <h2>Thêm Sản Phẩm</h2>
        <span >
            <?php 
              $message = session()->get('message'); // Sử dụng session() thay vì Session::
              if ($message) {
                  echo $message;
                  session()->forget('message'); // Sử dụng session() thay vì Session:: và sử dụng forget() thay vì put()
              }
            ?>
          </span>
        <form action="{{URL::to('/save-product')}}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            <label for="product_name">Tên sản phẩm:</label><br>
            <input type="text" id="product_name" name="product_name"><br>
            
            <label for="product_price">Giá sản phẩm:</label><br>
            <input type="text" id="product_price" name="product_price"><br>
            
            <label for="product_img">Hình ảnh:</label><br>
            <input type="file" id="product_img" name="product_img"><br>

            
            <label for="product_video">Video:</label><br>
            <input type="file" id="product_video" name="product_video"><br>
            
            <label for="product_desc">Mô tả sản phẩm:</label><br>
            <textarea id="product_desc" name="product_desc"></textarea><br>

            <label for="product_status">Dòng sản phẩm:</label><br>
            <select id="product_status" name="product_category">
                @foreach ($cate_product as $key => $cate)
                    <option value="{{$cate->category_name}}">{{$cate->category_name}}</option>
                @endforeach
            </select><br><br>
            
            <label for="product_status">Trạng thái sản phẩm:</label><br>
            <select id="product_status" name="product_status">
                <option value="0">Ngừng bán</option>
                <option value="1">Đang bán</option>
            </select><br><br>

            <button type="submit" name="add_category">Thêm</button>
        </form>
       
    </div>
   
@endsection