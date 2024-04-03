@extends('layout')
@section('content')
    <div class="container-detail">
        @foreach ($detail_product as $product)
        <a href="">
            <div class="product">
            <img src="{{ asset('public/img_upload/product/' . $product->product_img) }}" alt="" width="100px">
            <div class="product-info">
                <h2>{{$product ->product_name}}</h2>
                <p>Mô tả sản phẩm: {{$product ->product_desc}}</p>
                <p>Giá: ${{$product ->product_price}}</p>
                <p>Số lượng: 10</p>
                <button>Mua ngay</button>
            </div>
            </div>
        @endforeach
       
    </div>
@endsection