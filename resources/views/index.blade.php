@extends('layouts.app')

@section('content')
    <button type="button" class="btn btn-primary ">Publish</button>
    <h1 class="mx-auto" style="width: 200px;">Posts</h1>

    <div>
        @foreach ($posts as $post)
            <div>
                <span>
                    {{ $post->fname }}
                </span>
                <span>
                    {{ $post->lname }}
                </span>
                <span>
                    {{ $post->body }}
                </span>
            </div>
        @endforeach
    </div>
    
@endsection

