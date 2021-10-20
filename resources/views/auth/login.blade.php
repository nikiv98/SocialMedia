@extends('layouts.app')
@section('content')
    
  @if (session('successMsg'))

    <div class="alert alert-success" role="alert">
      {{ session('successMsg') }}
    </div>
      
  @endif
  
    <form action="{{ route('auth.check') }}" method="POST" class="w-25 p-3">
        @csrf
        <div class="form-group">
          <label for="exampleInputEmail1">Email address</label>
          <input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
          <span class="text-danger">@error('email'){{ $message }}@enderror</span>
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Password</label>
          <input name="password" type="password" class="form-control" id="exampleInputPassword1">
          <span class="text-danger">@error('password'){{ $message }}@enderror</span>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Login</button>
        </div>
        <br>
        <a class="link" href="register">Create a new account</a>
    </form>

@endsection