@extends('layout')
@section('content')
    <div class="container-detail">
        @foreach ($detail_product as $product)
        <form action="">
            <div class="product">
            <div class="info-prod">
                <img src="{{ asset('public/img_upload/product/' . $product->product_img) }}" alt="" >
                <div class="product-info">
                    <h2>{{$product ->product_name}}</h2>
                    <p>Thể loại: {{$product ->product_type}}</p>
                    <p>Giá: ${{$product ->product_price}}</p>
                    <p>  <label for="">Số lượng: </label>
                        <input type="number" value="1" min="1" max="100" /><br></p>
                    <div class="warranty-policy">
                        <h3>Chính sách bảo hành: </h3>
                        <li>Bảo hành lên đến 6 tháng.</li>
                        <li>1 đổi 1 với các lỗi từ nhà sản xuất.</li>
                        <li>Hỗ trợ trao đổi đĩa cũ sang mới.</li>
                        <li>Bảo đảm hàng chính hãng 100%.</li>
                    </div>
                    <input type="hidden" name="product_id" value="{{$product->product_id}}">
                    <input type="hidden" name="product_name" value="{{$product->product_name}}">
                    <input type="hidden" name="product_price" value="{{$product->product_price}}">
                    <input type="hidden" name="product_img" value="{{$product->product_img}}">
                    <input type="hidden" name="product_qty" value="1">
                  
                    <button class="button-28" role="button">Mua ngay</button>
    
                </div>
            </form>        
            </div>
            <div class="desproduct">
                <h3>Mô tả sản phẩm</h3>
                <p>{{$product ->product_desc}}</p>
                <h2>Video game play:</h2>
                <iframe width="560" height="315" src="https://www.youtube.com/watch?v=wrWyGaSWXBU" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

            </div>
            </div>
           
        @endforeach
       
    </div>
@endsection

<!-- HTML !-->


