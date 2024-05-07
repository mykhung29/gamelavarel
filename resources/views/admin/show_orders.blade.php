@extends('admin_layout')
@section('admin_content')
    <div class="container-orders">
        <h2>Thông tin đặt hàng</h2>
        <div class="table-container">
        <table class="order-table">
            <thead>
            <tr>
                <th>ID Đơn hàng</th>
                <th>ID Khách</th>
                <th>ID Điểm giao</th>
                <th>ID Sản phẩm</th>
            </tr>
            </thead>
            <tbody>
            @foreach($all_orders as $order)
            <tr>
                <td>{{$order->id_order}}</td>
                <td>{{$order->user_id}}</td>
                <td>{{$order->place_id}}</td>
                <td>
                    <form action="" method="get">
                        <ul>
                            @foreach(explode(',', $order->product_ids) as $product_id)
                            <li>{{$product_id}}</li>
                            {{-- <input type="hidden" value="{{$order->id}}" name=""> --}}
                            @endforeach
                        </ul>
                        {{-- <button>Chi tiết</button> --}}
                    </form>
               
                {{-- <a href="{{URL::to('/show-order-detail/'.$order->id_order)}}">Chi tiết</a> --}}
                <a href="{{URL::to('/show-order-detail/'.$order->id_order.'/'.$order->user_id.'/'.$order->place_id)}}">Chi tiết</a>                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
        </div>
    </div>
@endsection