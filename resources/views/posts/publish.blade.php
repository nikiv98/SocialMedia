<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ url('assets/css/bootstrap.min.css') }}">
</head>
<body>
    <header>
        @include("layouts.header")
    </header>

    <form action="{{ route('post.store') }}" method="POST" class="w-25 p-3">
        @csrf
        <div class="form-group">
          <label for="exampleFormControlInput1">First Name</label>
          <input name="fname" type="text" class="form-control form-control-sm" id="exampleFormControlInput1">
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">Last Name</label>
            <input name="lname" type="text" class="form-control form-control-sm" id="exampleFormControlInput1">
          </div>
        <div class="form-group">
          <label for="exampleFormControlTextarea1">Write your Post</label>
          <textarea name="body" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Post</button>
      </form>

      <footer>
            @include('layouts.footer')
      </footer>
</body>
</html>