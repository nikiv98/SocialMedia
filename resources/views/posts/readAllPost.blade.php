@extends('layouts.app')
@section('content')

    <h1 class="mx-auto post-title">Full Post</h1>
    <div class="card container-index" >
        <div class="card-body size-style">
            <h3 class="card-title">{{ $post->user->first_name }} {{ $post->user->last_name }}</h3>
            <p class="card-text">{{ $post->body }}</p>
            <div class="date-style">
                <p class="card-text "><span class="read-all-post">Posted at:</span> {{ $post->created_at }}</p>
                <p class="card-text "><span class="read-all-post">Last update:</span> {{ $post->updated_at }}</p>
            </div>
            <a href="{{ route('posts.index') }}" class="re-back"><-Return back</a>

            @if (isset(Auth::user()->id) && Auth::user()->id == $post->user_id)
                <div class="user-read-all">
                    <a href="{{ route('posts.edit', $post->id) }}"  class=" p-edit ">Edit</a>
                    <a href="{{ route('delete.post', $post->id) }}" class=" p-del ">Delete</a>
                </div>
            @endif
        </div>
    </div>    
    
@endsection