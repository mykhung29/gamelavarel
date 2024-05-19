@extends('layout')
@section('content')
    <div class="container-reset-pass">
        <h2>Reset your password</h2>
       <form action="{{URL::to('/reset-pass')}}" method="post">
            @csrf
            <input type="hidden"  name="token" value="{{$token}}" readonly>
            <input type="password" name="password" placeholder="Enter your new password">
            <input type="password" name="confirm_password" placeholder="Confirm your new password">
            <button type="submit">Submit</button>
       </form>
    </div>
@endsection        