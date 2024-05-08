@extends('layout')
@section('content')


<div class="place-container">
    <div class="control">
      <a href="{{ URL::to('/show_info') }}" class="btn btn-primary">Infomation</a>
      <a href="{{ URL::to('/edit_place') }}" class="btn btn-primary">Address</a>
    </div>  

    <div class="add-show">
      <div class="container-checkout">
        <h2>Address</h2>
        @foreach ($order_place as $place)
                <div class="place-ship">
                  <p>{{$place ->name}}<br>{{$place ->phone}}<br>{{$place ->address}}</p>
                  <a href="{{ URL::to('/delete_place/'.$place ->id) }}"><i class='bx bx-trash'></i></a>
                
                </div>
        @endforeach
    </div>

    <div class="container-checkout">
        <h2>Add address ship</h2>
        <form action="{{URL::to('/add-place-ship')}}" method="POST">
            {{ csrf_field() }}
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>
  
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
  
            <label for="phone">Số điện thoại:</label>
            <input type="text" id="phone" name="phone" required>
  
            <label for="address">Address:</label>
            <input type="text" id="address" name="address" required>
  
            <label for="note">Ghi chú:</label>
            <textarea id="note" name="note" rows="4" cols="40"></textarea>
  
          <button type="submit" >Add</button>
        </form>
    </div>

    </div>
</div>

@endsection    