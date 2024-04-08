@extends('layout')
@section('content')
    <div class="container-register">
       
        <form method="POST" action="{{URL::to('/create')}}">
            @csrf
            <div>
                <label for="name">Name</label>
                <input id="name" type="text" name="name"  required autofocus>
            </div>

            <div>
                <label for="phone">Phone</label>
                <input id="phone" type="text" name="phone"  required autofocus>
            </div>

            <div>
                <label for="email">Email</label>
                <input id="email" type="email" name="email"  required>
            </div>

            <div>
                <label for="password">Password</label>
                <input id="password" type="password" name="password" required>
            </div>

            <div>
                <label for="password_confirmation">Confirm Password</label>
                <input id="password_confirmation" type="password" name="password_confirmation" required>
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
@endsection    