@extends('layouts.admin')
@section('content')

    <div class="main-content">
        <header class="admin-head">
            <h2>User Edit</h2>
            <div class="user-wrapper">
                <div>
                    <h4>{{ Auth::user()->first_name}} {{ Auth::user()->last_name }}</h4>
                </div>
            </div>
        </header>

        <main>
            
            <form action="{{ route('update.user', $user->id )}}" method="POST">
                @csrf
                <div class="form-group row">
                    <label for="colFormLabel" class="col-sm-2 col-form-label">First name</label>
                    <div class="col-sm-10">
                    <input type="text" class="form-control form-size" id="colFormLabel" name="first_name" value="{{ $user->first_name }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="colFormLabel" class="col-sm-2 col-form-label">Last name</label>
                    <div class="col-sm-10">
                    <input type="text" class="form-control form-size" id="colFormLabel" name="last_name" value="{{ $user->last_name }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="colFormLabel" class="col-sm-2 col-form-label">Role</label>
                    <div class="col-sm-10">
                    <input type="boolean" class="form-control form-size" id="colFormLabel" name="is_admin" value="{{ $user->is_admin }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="colFormLabel" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                    <input type="email" class="form-control form-size" id="colFormLabel" name="email" value="{{ $user->email }}">
                    </div>
                </div>
                <button type="submit" class="btn btn-primary user-edit">Edit User</button>
            </form>
        </main>
        
    </div>
@endsection