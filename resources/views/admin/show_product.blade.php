@extends('admin_layout')
@section('admin_content')

<div class="show_category">
    <h2>Liệt Kê Danh Mục</h2>

<table>
    <thead>
        <tr>
            <th>Tên Sản Phẩm</th>
            <th>Giá</th>
            <th>Hình ảnh</th>
            <th>Video</th>
            <th>Mô tả</th>
            <th>Trạng Thái</th>
            <th class="actions">Tùy chỉnh</th>
            
        </tr>
    </thead>
    <tbody>
        @foreach ($all_product as $key => $product)
             <tr>
                <td>{{$product ->product_name}}</td>
                <td>{{$product ->product_price}}</td>
                {{-- <td><img src="public\img_upload\product\{{$product ->product_img}}" alt=""></td> --}}
                <td><img src="https://media.licdn.com/dms/image/D4E0BAQG-i2j7Q2WFIA/company-logo_200_200/0/1694593112031/img_logo?e=2147483647&v=beta&t=o1304VK0Zbh3CBA-8_LNYNZZCNrQjMIBS-nwKrAMzbY" alt=""></td>
                <td>{{$product ->product_video}}</td>
                <td>{{$product ->product_desc}}</td>
                <td>
                    <?php
                            if($product ->product_status == 0){                    
                    ?>                          
                    <button><a href="{{URL::to('/active-product/'.$product->product_id)}}"  rel="noopener noreferrer"> Ngừng bán</a></button>
                    <?php
                        }else { 
                    ?>          
                    <button><a href="{{URL::to('/unactive-product/'.$product->product_id)}}"  rel="noopener noreferrer"> Đang bán</a></button>
                          
                    <?php
                        };
                    ?>
                </td>
                <td>
                    <button><a href="{{URL::to('/edit-product/'.$product->product_id)}}"  rel="noopener noreferrer">Sửa</a></button>
                    {{-- <button>Xóa</button> --}}
                    <button><a href="{{URL::to('/delete-product/'.$product->product_id)}}"  rel="noopener noreferrer"> Xóa</a></button>

                </td>
            </tr>
        @endforeach
       
       
    </tbody>
</table>
        <span>
            <?php 
            $message = session()->get('message'); // Sử dụng session() thay vì Session::
            if ($message) {
                echo $message;
                session()->forget('message'); // Sử dụng session() thay vì Session:: và sử dụng forget() thay vì put()
            }
            ?>
        </span>
</div>


@endsection