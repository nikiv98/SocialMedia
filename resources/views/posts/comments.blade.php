<!DOCTYPE html>
<html lang="en">
<head>
    @include('layouts.head')
</head>
<body>
    <header>
        @include('layouts.header')
    </header>
    <h1 class="mx-auto post-title">Post Comments</h1>
    <div class="card container-index" >
        <div class="card-body size-style">
            <h3 class="card-title">{{ $post->user->first_name }} {{ $post->user->last_name }}</h3>
            <p class="card-text">{{ $post->body }}</p>
            <div>
                <img src="{{ asset('images/'. $post->image_path) }} " class="rounded mx-auto d-block .img-style">
            </div>
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
    
    <h2 class="mx-auto post-title">Comments</h2>
    
    <div>
        @if (Auth::user())
            
            <form action="{{ route('comments.store', $post->id) }}" method="POST" class="w-25 p-3">
                @csrf
                <label for="exampleFormControlTextarea1">Comment here</label>
                <textarea name="content" class="form-control" id="exampleFormControlTextarea1" rows="4"></textarea>
                @if ($errors->any())

                    <div class="alert alert-danger" role="alert">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach

                    </div>
                    
                @endif
                <button type="submit" class="btn btn-primary btn-comt">Comment</button>
            </form>
        @endif 
    </div>

    
    @foreach ($comments as $comment)
        <div class="comment-style">
            <span class="author-comm">{{ $comment->user->first_name }} {{ $comment->user->last_name }}</span>
            <p class="cont-txt">{{ $comment->content }}</p>
            <span class="create-date">{{ $comment->created_at->diffForHumans() }}</span>

            @if (isset(Auth::user()->id) && Auth::user()->id == $comment->user_id)
                <form action="{{ route('destroy.comment', $comment->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn-comm-del">Delete</button>
                </form>
            @endif

        </div>
    @endforeach
    <div class="row mb-5 pag-cont">
        {{ $comments->links() }}
    </div>  
    

    <footer>
        @include('layouts.footer')
    </footer>
    
</body>
</html>