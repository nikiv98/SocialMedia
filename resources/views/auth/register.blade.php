<!DOCTYPE html>
<html lang="en">
<head>
    @include('layouts.head')
</head>
<body>
    <header>
        @include('layouts.header')
    </header>

    <form action="{{ route('auth.create') }}" method="POST" class="w-25 p-3">
        @csrf
        <div class="form-group">
            <label for="exampleFormControlInput1">First Name</label>
            <input name="first_name" type="text" class="form-control form-control-sm" id="exampleFormControlInput1">
            <span class="text-danger">@error('first_name'){{ $message }}@enderror</span>
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">Last Name</label>
            <input name="last_name" type="text" class="form-control form-control-sm" id="exampleFormControlInput1">
            <span class="text-danger">@error('last_name'){{ $message }}@enderror</span>
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Email address</label>
          <input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
          <span class="text-danger">@error('email'){{ $message }}@enderror</span>
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Password</label>
          <input name="password" type="password" class="form-control" id="exampleInputPassword1">
          <span class="text-danger">@error('password'){{ $message }}@enderror</span>
        </div>
        <div class="form-group">
            <label for="exampleInputConfirmPassword1">Confirm Password</label>
            <input name="password_confirmation" type="password" class="form-control" id="exampleInputConfirmPassword1">
            <span class="text-danger">@error('password'){{ $message }}@enderror</span>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Create Account</button>
        </div>
      </form>

    <footer>
        @include('layouts.footer')
    </footer>
</body>
</html>