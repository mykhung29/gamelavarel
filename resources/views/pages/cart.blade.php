@extends('layout')
@section('content')
    <div class="cart">
        <h2>Shopping Cart</h2>
        <table class="cart-items">
        <thead>
            <tr>
            <th>Product</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Image</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($cart as $product)
                <tr>
                    <td>{{$product ->product_name}}</td>
                    <td>${{$product ->product_price}}</td>
                    <td>{{$product ->quantity}}</td>
                    <td>
                        <img src="{{ asset('public/img_upload/product/' .$product ->image) }}" alt="" width="80px">
                    </td>
                </tr>
            @endforeach
           
        </tbody>
        </table>
        <div class="total">
        Total: ${{ $total }}
        </div>
        <button>Checkout</button>
    </div>
@endsection    