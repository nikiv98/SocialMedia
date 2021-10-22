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
            <form action=" {{ route('update.post', $post->id) }} " method="POST" class="w-25 p-3" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="exampleFormControlTextarea1" class="wrt_post">Edit Post</label>
                    <textarea name="body" class="form-control" id="exampleFormControlTextarea1" rows="6">{{ $post->body }} </textarea>
                    
                    <div class="img-style">
                        <img src="{{ asset('images/'. $post->image_path) }} " >
                    </div>
                    <div class="custom-file">
                        <input type="file" name="image" class="custom-file-input insert-img" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
                        <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                    </div>
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
        </main>
    </div>
    
@endsection