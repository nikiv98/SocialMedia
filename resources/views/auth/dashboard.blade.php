<!DOCTYPE html>
<html lang="en">
<head>
    @include('layouts.head')
</head>
<body>
    <header>
        @include('layouts.header')
    </header>

        <h3 class="dash-prof">Welcome to your profile</h3>

        <h5 class="dash-prof">Change Password</h5>

        @if (session('errorMsg'))

            <div class="alert alert-danger" role="alert">
                {{ session('errorMsg') }}
            </div>
      
        @endif

        <form action="{{ route('change.password') }}" method="POST" class="w-25 p-3">
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

    <footer>
        @include('layouts.footer')
    </footer>
</body>
</html>