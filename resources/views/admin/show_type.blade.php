@extends('admin_layout')
@section('admin_content')

<div class="show_category">
    <h2>Liệt Kê Thể Loại</h2>
    <span style="color: green; font-size: 25px;">
        <?php 
          $message = session()->get('message'); // Sử dụng session() thay vì Session::
          if ($message) {
              echo $message;
              session()->forget('message'); // Sử dụng session() thay vì Session:: và sử dụng forget() thay vì put()
          }
        ?>
      </span>
      <a href="{{URL::to('/add-type')}}" class="btn btn-primary" style="margin-bottom: 10px; ">Thêm danh mục</a>

<table>
    <thead>
        <tr>
            <th>Tên Thể Loại</th>
            <th>Mô tả</th>
            <th>Thao Tác</th>
        </tr>
    </thead>
    <tbody>
        @foreach($all_category_game as $key => $category_game)
        <tr>
            <td>{{ $category_game->name }}</td>
            <td>{{ $category_game->description }}</td>
            <td>
                <a onclick="return confirm('Bạn có chắc chắn muốn xóa không?')" href="{{URL::to('/delete-type/'.$category_game->id)}}" class="active styling-edit" ui-toggle-class="">
                    <i class="fa fa-times text-danger text"></i>
                </a>
            </td>
        </tr>
        @endforeach
       
       
    </tbody>
</table>
</div>


@endsection