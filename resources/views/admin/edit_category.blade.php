@extends('admin_layout')
@section('admin_content')
    <div class="add-category-form">

        @foreach ($edit_caterogy as $key => $edit)

        <h2>Cập nhật Danh Mục Sản Phẩm</h2>

        <form action="{{URL::to('/update-category-product/'.$edit->category_id)}}" method="post">
            {{ csrf_field() }}
            <label>Tên Danh Mục:</label>
            <input type="text"  name="category_name" required value="{{$edit->category_name}}">

            <label>Mô Tả:</label>
            <textarea  name="category_description" rows="4" required>{{$edit->category_desc}}</textarea>

            <button type="submit" name="edit_category">Cập nhật</button>
        </form>

        @endforeach

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