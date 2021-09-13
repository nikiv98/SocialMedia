<!DOCTYPE html>
<html lang="en">
<head>
    @include('layouts.head')
</head>
<body>
    <header>
        @include('layouts.header')
    </header>

    <h1 class="mx-auto post-title">Your Posts</h1>

    <div>
        @foreach ($posts as $post)
            <div class="card container-index" >
                <div class="card-body size-style">
                  <h3 class="card-title">{{ $post->user->first_name }} {{ $post->user->last_name }}</h3>
                  <p class="card-text">{{ $post->body }}</p>
                  <p class="card-text date-style">{{ $post->created_at }}</p>
                  @if (isset(Auth::user()->id) && Auth::user()->id == $post->user_id)
                    <a href="{{ route('posts.edit', $post->id) }}"  class="post-opt p-edit">Edit</a>
                    <a href="{{ route('delete.post', $post->id) }}" class="post-opt p-del">Delete</a>
                  @endif
                </div>
              </div>
        @endforeach
    </div>
    
    <footer>
        @include('layouts.footer')
    </footer>
</body>
</html>