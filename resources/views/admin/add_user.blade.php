@extends('admin_layout')
@section('admin_content')
    <div class="container-form-adduser">
        <h2>Thêm Tài Khoản Quản Trị</h2>
        <form action="process.php" method="POST">
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="password">Mật khẩu:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <div class="form-group">
                <label for="confirm_password">Xác nhận mật khẩu:</label>
                <input type="password" id="confirm_password" name="confirm_password" required>
            </div>
            <div class="form-group">
                <label for="phone">Số điện thoại:</label>
                <input type="tel" id="phone" name="phone" required>
            </div>
            <div class="form-group">
                <input type="submit" value="Thêm Tài Khoản">
            </div>
        </form>
    </div>
@endsection