@extends('layout')
@section('content')
<div class="check-out">
    <div class="cart">
        <h2>Shopping Cart</h2>
        <table class="cart-items">
            <thead>
                <tr>
                    <th>Product</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Image</th>
                    <th>Edit</th>
                </tr>
            </thead>
            <tbody>
                <form action="{{URL::to('/checkout')}}" method="POST">
                    {{ csrf_field() }}
                    @foreach ($cart as $product)
                        <tr>
                            <td>{{$product ->product_name}}</td>
                            <td>${{$product ->product_price}}</td>
                            <td>
                                <input type="hidden" value="{{$product->id}}" name="id_product_update">
                                <input type="number" name="quantity" min="1" max="100" value="{{$product->quantity}}" />
                            </td>
                            <td>
                                <img src="{{ asset('public/img_upload/product/' .$product ->image) }}" alt="" width="80px">
                            </td>
                            <td>
                                <button><a href="{{URL::to('/delete-product-cart/'.$product->id)}}"  rel="noopener noreferrer">Delete</a></button>
                            </td>
                        </tr>
                    @endforeach
            </tbody>
        </table>
        <div class="voucher">
            <input type="text" name="voucher" placeholder="Enter your voucher code">
            <button type="submit" name="apply">Apply</button>
        </div>
        <div class="total"> Total: ${{ $total }} <br>
                            Total-voucher: ${{ $total_voucher }}
            <button type="submit" name="checkout">Checkout</button>
            <button type="submit" name="update">Update</button>

        </div>
    </div>
                <div class="container-checkout">
                    <h2>Address</h2>
                    <a href="{{ URL::to('/edit_place') }}" >Address Manager</a>
                @foreach ($order_place as $place)
                        <div class="place-ship">
                            <input type="radio" id="address1" name="address" value="{{$place ->id}}">
                            <label for="address1">{{$place ->name}}<br>{{$place ->phone}}<br>{{$place ->address}}</label><br>
                        </div>
                @endforeach
                </div>
                
            </form>
</div>
    
@endsection    