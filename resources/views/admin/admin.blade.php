@extends('layouts.admin')
@section('content')
    <div class="main-content">
        <header class="admin-head">
            <h2>Dashboard</h2>
            <div class="user-wrapper">
                <div>
                    <h4>{{ Auth::user()->first_name}} {{ Auth::user()->last_name }}</h4>
                </div>
            </div>
        </header>

        <main>
            <div class="cards">
                <div class="card-single">
                    <div>
                        <h1>{{ $users }}</h1>
                        <span>Users</span>
                    </div>
                </div>

                <div class="card-single">
                    <div>
                        <h1>{{ $posts }}</h1>
                        <span>Posts</span>
                    </div>
                </div>

                <div class="card-single">
                    <div>
                        <h1>{{ $comments }}</h1>
                        <span>Comments</span>
                    </div>
                </div>

                <div class="card-single">
                    <div>
                        <h1>{{ $contacts }}</h1>
                        <span>Contact submits</span>
                    </div>
                </div>
            </div>
        </main>
    </div>
@endsection