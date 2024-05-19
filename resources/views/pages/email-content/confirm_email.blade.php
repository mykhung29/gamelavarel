@extends('layout')
@section('content')
    <div class="confirm-email-container">
        <?php 
        $message = session()->get('message'); 
        if ($message) {
            echo $message;
            session()->forget('message');
        }
      ?>
        <h1>Enter your token</h1>
        <form action="{{URL::to('/confirm_email')}}" method="post">
            @csrf
            <input type="text" name="token" placeholder="Enter your token">
            <button type="submit">Submit</button>
        </form>
    </div>
@endsection