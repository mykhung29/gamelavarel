@extends('admin_layout')
@section('admin_content')
    <div class="add-category-form">

     
        <h2>Thêm mới số lượng sản phẩm trong kho</h2>
        <form action="{{URL::to('/store-inventory')}}" method="POST">
            {{ csrf_field() }}

            <label for="product_id">Mã sản phẩm:</label><br>
            <select name="product_id">
                @foreach ($product as $id_product)
                <option value="{{ $id_product->product_id }}" >{{$id_product->product_id}}</option>
                @endforeach
               
              </select>
              
            
            <label for="quantity">Số lượng:</label><br>
            <input type="text" id="quantity" name="quantity"><br><br>
            
            <button type="submit">Thêm vào kho</button>
        </form>
    </div>
@endsection
