@extends('layout')
@section('content')

        <div class="forgot_pass_container">
            <?php 
            $message = session()->get('message'); 
            if ($message) {
                echo $message;
                session()->forget('message');
            }
          ?>
            <form action="{{URL::to('/send-email')}}" method="POST">
                @csrf
                <h2>Forgot password</h2>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" required>
                </div>
                <button type="submit">Send</button>
            </form>
        </div>

@endsection    