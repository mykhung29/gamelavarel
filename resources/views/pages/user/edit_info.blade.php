@extends('layout')
@section('content')
   <div class="edit-info-container">
    <div class="control">
        <a href="{{ URL::to('/show_info') }}" class="btn btn-primary">Infomation</a>
        <a href="{{ URL::to('/edit_place') }}" class="btn btn-primary">Address</a>
        <a href="{{ URL::to('/show_order') }}" class="btn btn-primary">My orders</a>
    </div>
        <div class="user-info">
            <img src="https://play-lh.googleusercontent.com/jA5PwYqtmoFS7StajBe2EawN4C8WDdltO68JcsrvYKSuhjcTap5QMETkloXSq5soqRBqFjuTAhh28AYrA6A" alt="Avatar" class="avatar">
            <div class="info">
                <h2 class="name">{{$info->name}}</h2>
                <p class="phone">{{$info->phone}}</p>
                <p class="email">{{$info->email}}</p>
                <a href="{{URL::to('/real_email/' . $info->email)}}"> <?php 
                    $message = session()->get('message_email'); 
                    if ($message) {
                        echo $message;
                        session()->forget('message_email');
                    }
                  ?>
                </a>

            </div>
        </div>

        <form class="update-form" action="{{URL::to('/edit_info')}}" method="POST">
            {{ csrf_field() }}
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" value="" required><br><br>
            <label for="phone">Phone:</label>
            <input type="tel" id="phone" name="phone" required><br><br>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required><br><br>
            <input type="submit" value="Update">
            <button id="show-form"  class="btn btn-primary">Đổi mật khẩu</button>

        </form>
        <div class="container-change-pass hidden">
            <form action="{{URL::to('/change_pass')}}" method="POST">
                {{ @csrf_field() }}
                <button id="hide-form" class="btn-hide">X</button>

                <h2>Đổi mật khẩu</h2>
                <div class="form-group">
                    <label for="current-password">Mật khẩu cũ</label>
                    <input type="password" id="current-password" name="current_password" required>
                </div>
                <div class="form-group">
                    <label for="new-password">Mật khẩu mới</label>
                    <input type="password" id="new-password" name="new_password" required>
                </div>
                <div class="form-group">
                    <label for="confirm-password">Xác nhận mật khẩu mới</label>
                    <input type="password" id="confirm-password" name="confirm_password" required>
                </div>
                <span >
                    <?php 
                      $message = session()->get('message'); 
                      if ($message) {
                          echo $message;
                          session()->forget('message');
                      }
                    ?>
                  </span>
                <button type="submit">Đổi mật khẩu</button>
            </form>
        </div>
    
   </div>
<script>
    document.getElementById("show-form").addEventListener("click", function () {
    document.querySelector(".container-change-pass").classList.remove("hidden");
});
    document.getElementById("hide-form").addEventListener("click", function () {
        document.querySelector(".container-change-pass").classList.add("hidden");
    });
</script>
@endsection       