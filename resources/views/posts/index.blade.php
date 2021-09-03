@extends('layouts.app')

@section('content')
    <h1 class="mx-auto post-title">Posts</h1>

    <div>
        @foreach ($posts as $post)
            <div class="card container-index" >
                <div class="card-body size-style">
                  <h3 class="card-title">{{ $post->fname }} {{ $post->lname }}</h3>
                  <p class="card-text">{{ $post->body }}</p>
                  <p class="card-text date-style">{{ $post->created_at }}</p>
                </div>
              </div>
        @endforeach
    </div>
    
@endsection

