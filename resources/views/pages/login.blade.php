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
            <input type="password" name="password" placeholder="Mật khẩu">
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
@endsection    