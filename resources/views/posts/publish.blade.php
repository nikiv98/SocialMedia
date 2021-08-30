<!DOCTYPE html>
<html lang="en">
<head>
    @include('layouts.head')
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

      @if ($errors->any())
        <div class="alert alert-danger" role="alert">

              You cant have empty post
              
              @foreach ($errors->all as $error)
                {{ $error }}
              @endforeach
        </div>
        
      @endif

      @if (session('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
      @endif
      
      <footer>
            @include('layouts.footer')
      </footer>
</body>
</html>