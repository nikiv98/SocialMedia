<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Contacts</title>
    <link rel="stylesheet" href="{{ url('assets/css/bootstrap.min.css') }}">
</head>
<body>
    <header>
        @include('layouts.header')
    </header>
    <form action="{{ route('contact.store') }}" method="POST" class="w-25 p-3">
        @csrf
        <div class="form-group">
          <label for="exampleFormControlInput1">First Name</label>
          <input name="first_name" type="text" class="form-control form-control-sm" id="exampleFormControlInput1">
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">Last Name</label>
            <input name="last_name" type="text" class="form-control form-control-sm" id="exampleFormControlInput1">
          </div>
        <div class="form-group">
          <label for="exampleFormControlTextarea1">Title</label>
          <input name="title" class="form-control form-control-sm" id="exampleFormControlInput1">
        </div>
        <div class="form-group">
            <label for="exampleFormControlTextarea1">Write your Information</label>
            <textarea name="information" class="form-control" id="exampleFormControlTextarea1" rows="4"></textarea>
          </div>
        <button type="submit" class="btn btn-primary">Submit Contact</button>
      </form>
    <footer>
        @include('layouts.footer')
    </footer>
</body>
</html>