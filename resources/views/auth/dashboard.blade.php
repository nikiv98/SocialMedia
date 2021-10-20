@extends('layouts.app')
@section('content')
  <h3 class="dash-prof">Welcome to your profile</h3>
  <h5 class="dash-prof">Change Password</h5>

  @if (session('errorMsg'))

    <div class="alert alert-danger" role="alert">
      {{ session('errorMsg') }}
    </div>
      
  @endif

  <form action="{{ route('change.password') }}" method="POST" class="w-25 p-3" >
    @csrf
    
    <div class="form-group">
      <label for="exampleInputOldPass">Old password</label>
      <input type="password" class="form-control" id="exampleInputOldPass" name="oldPassword">
    </div>
    <div class="form-group">
      <label for="exampleInputPassword1">New Password</label>
      <input type="password" class="form-control" id="exampleInputPassword1" name="newPassword">
    </div>
    <div class="form-group">
        <label for="exampleInputPassword2">Confirm Password</label>
        <input type="password" class="form-control" id="exampleInputPassword2" name="newPassword_confirmation">
    </div>
    <button type="submit" class="btn btn-primary">Submit new password</button>
  </form>

  <form action="{{ route('profile.update') }}" method="POST" class="w-25 p-3" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
      <label for="exampleInputNewName">Edit First Name</label>
      <input type="text" class="form-control" id="exampleInputNewName" value="{{Auth::user()->first_name}}" name="newFirstName">
    </div>
    <div class="form-group">
      <label for="exampleInputNewName1">Edit Last Name</label>
      <input type="text" class="form-control" id="exampleInputNewName1" value="{{Auth::user()->last_name}}" name="newLastName">
    </div>
    <div class="form-group">
      <label for="exampleInputEmail">Edit Email</label>
      <input type="email" class="form-control" id="exampleInputEmail" value="{{Auth::user()->email}}" name="newEmail">
    </div>
    <button type="submit" class="btn btn-primary">Update Profile</button>
  </form>

@endsection