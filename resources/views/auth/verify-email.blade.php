@extends('layouts.app')
@section('content')
    <div class="card verify-card">
        <div class="card-header">
          Verificaton request
        </div>
        <div class="card-body">
          <h5 class="card-title">Verify email</h5>
          <p class="card-text">Please verify your email address by clicking the link in the mail we just sent you. Thanks!</p>
          
          @if (session('success'))
            <span class="alert-text">{{ session('success') }}</span>
          @endif

          <form action="{{ route('verification.request') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-primary">Request a new link</button>
          </form>
        </div>
    </div>
@endsection