@extends('admin_layout')
@section('admin_content')
        <div class="add-category-form">
            <h2>Thêm Danh Mục Sản Phẩm</h2>

            <form action="{{URL::to('/save-category-product')}}" method="post">
                {{ csrf_field() }}
                <label>Tên Danh Mục:</label>
                <input type="text"  name="category_name" required>

                <label>Mô Tả:</label>
                <textarea  name="category_description" rows="4" required></textarea>

                <label>Loại Danh Mục:</label>
                <select  name="category_type">
                    <option value="0">Ẩn</option>
                    <option value="1">Hiện</option>
            
                </select>

                <button type="submit" name="add_category">Thêm</button>
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