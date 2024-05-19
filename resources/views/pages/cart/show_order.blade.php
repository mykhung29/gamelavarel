@extends('layout')
@section('content')
    <div class="control">
        <a href="{{ URL::to('/show_info') }}" class="btn btn-primary">Infomation</a>
        <a href="{{ URL::to('/edit_place') }}" class="btn btn-primary">Address</a>
        <a href="{{ URL::to('/show_order') }}" class="btn btn-primary">My orders</a>
    </div>
    <div class="show-order-container">
        <h1>Danh sách đơn hàng</h1>
        @foreach($orders as $order)
        

        <div class="order">
            <div class="order-details">
                <h2>Đơn hàng {{$order->id_order}}</h2>
                <h3>{{$order->status_text}}</h3>
                <p>Address: {{ $order->address }}</p>
                <p>Ngày đặt hàng: 2024-05-08</p>
                @foreach(explode(',', $order->product_names) as $product_id)
                    <p> - {{$product_id}}</p>
                @endforeach
                @foreach(explode(',', $order->total_price) as $total_price)
                <p>Tổng tiền: ${{$total_price}}</p>
                @endforeach
               
            </div>
        </div>    
        @endforeach
       
    </div>
@endsection       