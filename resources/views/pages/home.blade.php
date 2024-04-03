@extends('layout')
@section('content')
    <div class="container">
        @foreach ($all_product as $all)
        <a href="{{URL::to('/moreinfor/'.$all->product_id)}}">
            <div class="product-card">
                <img src="public\img_upload\product\{{$all ->product_img}}" alt="" width="150px">
                <h3>{{$all ->product_name}}</h3>
                <p>{{$all ->product_desc}}</p>
                <span>${{$all ->product_price}}</span>
                <button>Add to Cart</button>
            </div>
            </a>
        @endforeach
      
        <!-- Add more product cards here -->
    </div>
@endsection