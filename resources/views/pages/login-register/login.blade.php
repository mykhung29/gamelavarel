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
            <h2>Login</h2>
            <input type="text" name="user" placeholder="Email">
            <div class="hidden-pass">
                <input id="password-input" type="password" name="password" placeholder="Password">
                <i id="toggle-password" class='bx bx-hide' ></i>
            </div>
          
            <div class="remember-password">
                <input type="checkbox" name="remember" id="remember">
                <label for="remember">Remember me</label>
            </div>
            <button type="submit">Login</button>
        </form>
        <hr>
        <div class="or">
            
            <span>Or</span>
            <div class="icon-login">
                <a href="{{ url('auth/google') }}"><i class='bx bxl-google'></i></a>
                <a href="{{ url('auth/google') }}"><i class='bx bxl-facebook-circle'></i></a>
            </div>
           
        </div>
      
       <div class="footer-login">
        <div class="forgot-password">
            <a href="{{URL::to('/forgot_pass')}}">Forgot password ?</a>
        </div>
       
        <div class="register">
            <a href="{{URL::to('/register')}}">Register</a>
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