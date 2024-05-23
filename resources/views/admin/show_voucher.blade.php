@extends('admin_layout')
@section('admin_content')

<div class="show_category show_product">
    <h2>Liệt Kê Sản Phẩm</h2>
    <span style="color: green; font-size: 25px;">
        <?php 
          $message = session()->get('message'); // Sử dụng session() thay vì Session::
          if ($message) {
              echo $message;
              session()->forget('message'); // Sử dụng session() thay vì Session:: và sử dụng forget() thay vì put()
          }
        ?>
      </span>
        <a href="{{URL::to('/add-product')}}" class="btn btn-primary" style="margin-bottom: 10px; ">Thêm voucher</a>
<table>
    <thead>
        <tr>
            <th>Mã</th>
            <th>Voucher</th>
            <th>Giảm giá</th>
            <th>Giảm tối đa</th>
            <th>Số lượng</th>
            <th>Mục giảm</th>
            <th>Ngày tạo</th>
            <th class="actions">Tùy chỉnh</th>
            
        </tr>
    </thead>
    <tbody>
        @foreach ($all_voucher as $voucher)
             <tr>
                <td>{{$voucher ->id	}}</td>
                <td>{{$voucher ->voucher}}</td>
                <td>{{$voucher ->discount_percentage}}</td>
                <td>{{$voucher ->max_discount}}</td>
                <td>{{$voucher ->discount_type}}</td>
                <td>{{$voucher ->quantity}}</td>
                <td>{{$voucher ->created_at}}</td>
              
                <td>
                    <button><a href="{{URL::to('/edit-product/'.$voucher ->id)}}"  rel="noopener noreferrer">Sửa</a></button>
                    <button><a href="{{URL::to('/delete-product/'.$voucher ->id)}}"  rel="noopener noreferrer"> Xóa</a></button>

                </td>
            </tr>
        @endforeach
       
       
    </tbody>
</table>
       
</div>


@endsection