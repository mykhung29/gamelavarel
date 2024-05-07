@extends('layout')
@section('content')
   
<span >
    <?php 
      $message = session()->get('message'); 
      if ($message) {
          echo $message;
          session()->forget('message');
      }
    ?>
  </span>
    <div class="container-login">
        <form action="{{URL::to('/login-check')}}" method="post">
            @csrf
            <h2>Đăng nhập</h2>
            <input type="text" name="email" placeholder="Email">
            <div class="hidden-pass">
                <input id="password-input" type="password" name="password" placeholder="Mật khẩu">
                <i id="toggle-password" class='bx bx-hide' ></i>
            </div>
          
            <div class="remember-password">
                <input type="checkbox" name="remember" id="remember">
                <label for="remember">Nhớ mật khẩu</label>
            </div>
            <button type="submit">Đăng nhập</button>
        </form>
       <div class="footer-login">
        <div class="forgot-password">
            <a href="">Quên mật khẩu ?</a>
        </div>
       
        <div class="register">
            <a href="{{URL::to('/register')}}">Đăng kí</a>
        </div>
        </div>
       
    </div>
    <script>
        document.getElementById('toggle-password').addEventListener('click', function() {
            const passwordInput = document.getElementById('password-input');
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
            } else {
                passwordInput.type = 'password';
            }
        });
    </script>
@endsection    