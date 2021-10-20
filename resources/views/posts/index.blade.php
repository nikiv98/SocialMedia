@extends('layouts.app')
@section('content')

  <h1 class="mx-auto post-title">Posts</h1>
  <div>
    @if (session('success'))
      <div class="alert alert-success" role="alert">
        {{ session('success') }}
      </div>
    @endif

    @foreach ($posts as $post)
      <div class="card container-index" >
        <div class="card-body size-style">
          <h3 class="card-title">{{ $post->user->first_name }} {{ $post->user->last_name }}</h3>
            <p class="card-text">
              {{ str_limit(strip_tags($post->body), 100) }}

              @if (strlen(strip_tags($post->body)) > 100) 
                <a href="{{ route('posts.readAllPost', $post->id) }}">Read All</a>
              @endif
            </p>
            <div>

              @if ($post->image_path != NULL)
                <img src="{{ asset('images/'. $post->image_path) }} " class="rounded mx-auto d-block .img-style">
              @endif

            </div>
            <p class="card-text date-style">{{ $post->created_at->diffForHumans() }}</p>
            <a href="{{ route('posts.comments', $post->id) }}" class="post-comt">Comments</a>

            @if (isset(Auth::user()->id) && Auth::user()->id == $post->user_id)
              <a href="{{ route('posts.edit', $post->id) }}"  class="post-opt p-edit">Edit</a>
              <a href="{{ route('delete.post', $post->id) }}" class="post-opt p-del">Delete</a>
            @endif
                
        </div>
      </div>
    @endforeach
  </div>
    
@endsection

