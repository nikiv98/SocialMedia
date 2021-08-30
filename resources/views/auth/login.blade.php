<!DOCTYPE html>
<html lang="en">
<head>
    @include('layouts.head')
</head>
<body>
    <header>
        @include('layouts.header')
    </header>

    <form class="w-25 p-3">
        @csrf
        <div class="form-group">
          <label for="exampleInputEmail1">Email address</label>
          <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Password</label>
          <input type="password" class="form-control" id="exampleInputPassword1">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Login</button>
        </div>
        <br>
        <a class="link" href="register">Create a new account</a>
      </form>

    <footer>
        @include('layouts.footer')
    </footer>
</body>
</html>