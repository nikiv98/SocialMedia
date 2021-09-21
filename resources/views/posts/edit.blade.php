<!DOCTYPE html>
<html lang="en">
<head>
    @include('layouts.head')
</head>
<body>

    <header>
        @include('layouts.header')
    </header>
    
    @if (isset(Auth::user()->id) && Auth::user()->id == $post->user_id)
      <form action="{{ route('posts.update', $post->id) }}" method="POST" class="w-25 p-3">
        @csrf
        
        <div class="form-group">
          <label for="exampleFormControlTextarea1" class="wrt_post">Edit your Post</label>
          <textarea name="body" class="form-control" id="exampleFormControlTextarea1" rows="6">{{ $post->body }} </textarea>
          
          <div class="img-style">
            <img src="{{ asset('images/'. $post->image_path) }} " >
          </div>
          
          <input type="file" name="image" class="insert-img">
        </div>
        <button type="submit" class="btn btn-primary btn-publish">Edit Post</button>
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
    @endif

    <footer>
        @include('layouts.footer')
    </footer>
    
</body>
</html>