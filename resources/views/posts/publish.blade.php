@extends('layouts.app')
@section('content')

  @if (Auth::user())
    <form action="{{ route('post.store') }}" method="POST" enctype="multipart/form-data" class="w-25 p-3">
      @csrf
      <div class="form-group">
        <label for="exampleFormControlTextarea1" class="wrt_post">Write your Post</label>

        @if (Auth::check() && Auth::user()->is_admin)
          <select name="select" class="custom-select" id="validationCustom04" >
            <option selected value="">{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</option>

            @foreach ($users as $user)
              <option value="{{ $user->id }} ">{{ $user->first_name }} {{ $user->last_name }}</option>
            @endforeach

          </select>
        @endif

        <textarea name="body" class="form-control" id="exampleFormControlTextarea1" rows="6"></textarea>
        <input type="file" name="image" class="insert-img">
      </div>
      <button type="submit" class="btn btn-primary btn-publish">Post</button>
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
      
@endsection