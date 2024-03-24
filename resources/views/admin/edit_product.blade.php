@extends('admin_layout')
@section('admin_content')
    <div class="add-category-form">
        <h2>Thêm Sản Phẩm</h2>
        @foreach ($edit_product as $product)
            
       
        <form action="{{URL::to('/update-product/'.$product->product_id)}}" method="post">
            {{ csrf_field() }}  
            <label for="product_name">Tên sản phẩm:</label><br>
            <input type="text" id="product_name" name="product_name" value="{{$product->product_name}}"><br>
            
            <label for="product_price">Giá sản phẩm:</label><br>
            <input type="text" id="product_price" name="product_price" value="{{$product->product_price}}"><br>
            
            <label for="product_img">Hình ảnh:</label><br>
            <input type="file" id="product_img" name="product_img" value="{{$product->product_img}}"><br>

            
            <label for="product_video">Video:</label><br>
            <input type="file" id="product_video" name="product_video" value="{{$product->product_video}}"><br>
            
            <label for="product_desc">Mô tả sản phẩm:</label><br>
            <textarea id="product_desc" name="product_desc">{{$product->product_desc}}</textarea><br>
            @endforeach
            <label for="product_status">Dòng sản phẩm:</label><br>
            <select id="product_status" name="product_category">
             @foreach ($edit_category as $cate)
                    <option value="{{$cate->category_name}}">{{$cate->category_name}}</option>
             @endforeach
            </select><br><br>
            

            <button type="submit" name="edit_product">Thêm</button>
        </form>
      
        <span>
            <?php 
              $message = session()->get('message'); // Sử dụng session() thay vì Session::
              if ($message) {
                  echo $message;
                  session()->forget('message'); // Sử dụng session() thay vì Session:: và sử dụng forget() thay vì put()
              }
            ?>
          </span>
    </div>
   
@endsection