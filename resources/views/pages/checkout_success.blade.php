@extends('layout')
@section('content')
    <div class="container-success">
        <h1>Đặt hàng thành công!</h1>
        <p>Cảm ơn bạn đã đặt hàng. Đơn hàng của bạn đã được ghi nhận.</p>
        <a href="{{URL::to('/')}}">Quay lại trang chủ</a>

    </div>
@endsection        