@extends('layouts.admin')
@section('content')
    <div class="main-content">
        <header class="admin-head">
            <h2>Posts</h2>
            <div class="user-wrapper">
                <div>
                    <h4>{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</h4>
                </div>
            </div>
        </header>
        <main>
            <div class="card text-center">
                <div class="card-header">
                    <h5 class="card-title">{{ $post->user->first_name }} {{ $post->user->last_name }}</h5>
                </div>
                <div class="card-body">
                  <p class="card-text">{{ $post->body }}</p>
                  @if ($post->image_path != NULL)
                    <img src="{{ asset('images/'. $post->image_path) }} " class="rounded mx-auto d-block .img-style">
                  @endif
                  <a href="{{ route('edit.post', $post->id) }}" class="edit-b">Edit</a>
                  <a href="{{ route('delete.post', $post->id) }}" class="del-b">Delete</a>

                </div>
                <div class="card-footer text-muted">
                    <p><span class="read-all-post">Posted at:</span> {{ $post->created_at }}</p>
                    <p><span class="read-all-post">Last update:</span> {{ $post->updated_at }}</p>
                </div>
              </div>
        </main>
    </div>

@endsection