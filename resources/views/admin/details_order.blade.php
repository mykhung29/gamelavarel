@extends('admin_layout')
@section('admin_content')

<div class="container-order-detail">
    <a href="{{ URL::to('/show-orders') }}" class="btn btn-primary">Back</a>
    <h1>Order Details</h1>
    <div class="order-details">
        @foreach($info as $item)
            <div class="order-info">
                <p><strong>User ID:</strong> <span id="order-id">{{ $item->id_user }}</span></p>
                <p><strong>User:</strong> <span id="user-name">{{ $item->name }}</span></p>
                <p><strong>Address:</strong> <span id="user-address">{{ $item->address }}</span></p>
                <p><strong>Phone:</strong> <span id="user-phone">{{ $item->phone }}</span></p>
                <p><strong>Note:</strong> <span id="order-note">{{ $item->note }}</span></p>
            </div>
        @endforeach
        <div class="products">
            <h2>Products in the order:</h2>
            @foreach($order_detail as $detail)
                <div class="product">
                    <img src="{{ asset('public/img_upload/product/' .$detail->image) }}" alt="" width="150px">
                    <div class="product-info">
                        <p><strong>Product Name:</strong> <span class="product-name">{{ $detail->product_name }}</span></p>
                        <p><strong>Quantity:</strong> <span class="product-quantity">{{$detail->quantity }}</span></p>
                        <p><strong>Price:</strong> <span class="product-price">${{ $detail->price }}</span></p>
                    </div>
                   
                </div>
            @endforeach
        </div>
        <div class="total">
            <p><strong>Total:</strong> <span id="total">{{ $total }}</span></p>
    </div>
</div>
@endsection