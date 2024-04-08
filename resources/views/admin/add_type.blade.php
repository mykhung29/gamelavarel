@extends('admin_layout')
@section('admin_content')
        <div class="add-categorygame-form">
            <h2>Thêm Thể Loại</h2>

            <form action="{{URL::to('/save-type')}}" method="post">
                {{ csrf_field() }}
                <label>Tên Thể Loại:</label>
                <input type="text"  name="category_game_name" required>

                <label>Mô Tả:</label>
                <textarea  name="category_game_description" rows="4" required></textarea>


                <button type="submit" name="add_category_game">Thêm</button>
            </form>
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