@extends('admin_layout')
@section('admin_content')

<div class="show_category">
    <h2>Liệt Kê Danh Mục</h2>
    <span style="color: green; font-size: 25px;">
        <?php 
          $message = session()->get('message'); // Sử dụng session() thay vì Session::
          if ($message) {
              echo $message;
              session()->forget('message'); // Sử dụng session() thay vì Session:: và sử dụng forget() thay vì put()
          }
        ?>
      </span>
<table>
    <thead>
        <tr>
            <th>Tên Danh Mục</th>
            <th>Mô Tả</th>
            <th>Trạng Thái</th>
            <th class="actions">Tùy chỉnh</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($all_caterogy as $key => $cate)
             <tr>
                <td>{{$cate ->category_name}}</td>
                <td>{{$cate ->category_desc}}</td>
                <td>
                    <?php
                            if($cate ->category_status == 0){                    
                    ?>                          
                    <button><a href="{{URL::to('/active-category-product/'.$cate->category_id)}}"  rel="noopener noreferrer"> Đang Ẩn</a></button>
                    <?php
                        }else { 
                    ?>          
                    <button><a href="{{URL::to('/unactive-category-product/'.$cate->category_id)}}"  rel="noopener noreferrer"> Đang Hiện</a></button>
                          
                    <?php
                        };
                    ?>
                </td>
                <td>
                    <button><a href="{{URL::to('/edit-category-product/'.$cate->category_id)}}"  rel="noopener noreferrer">Sửa</a></button>
                    {{-- <button>Xóa</button> --}}
                    <button><a href="{{URL::to('/delete-category-product/'.$cate->category_id)}}"  rel="noopener noreferrer"> Xóa</a></button>

                </td>
            </tr>
        @endforeach
       
       
    </tbody>
</table>
</div>


@endsection