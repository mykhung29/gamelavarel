@extends('admin_layout')
@section('admin_content')
    <div class="container-orders">
        <h2>Thông tin đặt hàng</h2>
        <form action="{{URL::to('/sort')}}" method="get">
            <select name="sort" onchange="this.form.submit()">
                <option value="">Sắp xếp theo...</option>
                <option value="id_order_asc">Đơn hàng mới</option>
                <option value="id_order_desc">Đơn hàng cũ</option>
            </select>
        </form>
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
                        <ul>
                            @foreach(explode(',', $order->product_ids) as $product_id)
                                 <li>{{$product_id}}</li>
                            @endforeach
                        </ul>
                <a href="{{URL::to('/show-order-detail/'.$order->id_order.'/'.$order->user_id.'/'.$order->place_id)}}">Chi tiết</a>                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
            @if ($all_orders->hasPages())
                <div class="page-number">
                    @if (!$all_orders->onFirstPage())
                        <a href="{{ $all_orders->previousPageUrl() }}"><<</a>
                    @endif
            
                    @for ($i = 1; $i <= $all_orders->lastPage(); $i++)
                        @if ($i == $all_orders->currentPage())
                            <span>{{ $i }}</span>
                        @else
                            <a href="{{ $all_orders->url($i) }}">{{ $i }}</a>
                        @endif
                    @endfor
            
                    @if ($all_orders->hasMorePages())
                        <a href="{{ $all_orders->nextPageUrl() }}">>></a>
                    @endif
                </div>
        @endif
        </div>
    </div>
@endsection