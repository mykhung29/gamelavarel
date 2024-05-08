@extends('layout')
@section('content')
<style>
.edit-info-container .user-info {
    display: flex;
    align-items: center;
    margin-bottom: 20px;
}
.edit-info-container{
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
}
.edit-info-container .avatar {
    width: 100px;
    height: 100px;
    border-radius: 50%;
    margin-right: 20px;
}

.edit-info-container .name {
    margin: 0;
    font-size: 24px;
}

.edit-info-container .phone,
.edit-info-container .email {
    margin: 5px 0;
    font-size: 18px;
}

.edit-info-container .update-form {
    margin-top: 20px;
}

.edit-info-container label {
    font-weight: bold;
    
}

.edit-info-container input[type="text"],
.edit-info-container input[type="tel"],
.edit-info-container input[type="email"] {
    width: 250px;
    padding: 8px;
    margin-bottom: 10px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}

.edit-info-container input[type="submit"] {
    background-color: grey;
    color: white;
    padding: 10px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

.edit-info-container input[type="submit"]:hover {
    background-color: gray;
}
.edit-info-container .control{
    margin-bottom: 20px;
}
</style>

   <div class="edit-info-container">
    <div class="control">
        <a href="{{ URL::to('/show_info') }}" class="btn btn-primary">Infomation</a>
        <a href="{{ URL::to('/edit_place') }}" class="btn btn-primary">Address</a>
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