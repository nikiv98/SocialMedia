@extends('layouts.app')
@section('content')
  @guest
    <form action="{{ route('contact.store') }}" method="POST" class="w-25 p-3">
      @csrf

      <div class="form-group">
        <label for="exampleFormControlInput1">First Name</label>
        <input name="first_name" type="text" class="form-control form-control-sm" id="exampleFormControlInput1">
      </div>
      <div class="form-group">
        <label for="exampleFormControlInput1">Last Name</label>
        <input name="last_name" type="text" class="form-control form-control-sm" id="exampleFormControlInput1">
      </div>
      <div class="form-group">
        <label for="exampleFormControlTextarea1">Title</label>
        <input name="title" class="form-control form-control-sm" id="exampleFormControlInput1">
      </div>
      <div class="form-group">
        <label for="exampleFormControlTextarea1">Write your Information</label>
        <textarea name="information" class="form-control" id="exampleFormControlTextarea1" rows="4"></textarea>
      </div>
        <button type="submit" class="btn btn-primary">Submit Contact</button>
    </form>

    @if ($errors->any())
      <div class="alert alert-danger" role="alert">
          invalid information
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

  @endguest

  @if (Auth::user())
    <form action="{{ route('contact.store') }}" method="POST" class="w-25 p-3">
      @csrf
      <div class="form-group">
        <label for="exampleFormControlTextarea1">Title</label>
        <input name="title" class="form-control form-control-sm" id="exampleFormControlInput1">
      </div>
      <div class="form-group">
        <label for="exampleFormControlTextarea1">Write your Information</label>
        <textarea name="information" class="form-control" id="exampleFormControlTextarea1" rows="4"></textarea>
      </div>
      <button type="submit" class="btn btn-primary">Submit Contact</button>
    </form>

    @if ($errors->any())
      <div class="alert alert-danger" role="alert">
          invalid information
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
