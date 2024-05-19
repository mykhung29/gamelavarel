@extends('layout')
@section('content')
    <div class="container-register">
       
        <form method="POST" action="{{URL::to('/create')}}">
            @csrf
            <h2>Register</h2>
            <div>
                <label for="name">Name: </label>
                <input id="name" type="text" name="name"  required autofocus>
            </div>

            <div >
                <label for="phone">Phone:</label>
                <input id="phone" type="text" name="phone"  required autofocus>
            </div>

            <div>
                <label for="email">Email:</label>
                <input id="email" type="email" name="email"  required>
            </div>

            <div>
                <label for="user">User:</label>
                <input id="user" type="text" name="user"  required>
            </div>

            <div class="hidden-pass">
                <label for="password">Password:</label>
                <input id="password-input" type="password" name="password" required>
                <i id="toggle-password" class='bx bx-hide' ></i>
            </div>

            <div class="hidden-pass">
                <label for="password_confirmation">Confirm Password:</label>
                <input id="password-input" type="password" name="password_confirmation" required>
                <i id="toggle-password" class='bx bx-hide' ></i>
            </div>

            <div>
                <button type="submit">Register</button>
            </div>
    </form>
    <span >
        <?php 
          $message = session()->get('message'); 
          if ($message) {
              echo $message;
              session()->forget('message');
          }
        ?>
      </span>
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