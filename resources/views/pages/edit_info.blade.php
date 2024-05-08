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
            </div>
        </div>

        <form class="update-form" action="{{URL::to('/edit_info')}}" method="POST">
            {{ csrf_field() }}
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required><br><br>
            <label for="phone">Phone:</label>
            <input type="tel" id="phone" name="phone" required><br><br>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required><br><br>
            <input type="submit" value="Update">
        </form>
   </div>

@endsection       