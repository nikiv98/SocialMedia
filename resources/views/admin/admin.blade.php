<!DOCTYPE html>
<html lang="en">
<head>
   @include('layouts.head')
</head>
<body>
    <div class="sidebar">
        <div class="sidebar-brand">
            <h1>Admin Panel</h1>
        </div>

        <div class="sidebar-menu">
            <ul>
                <li>
                    <a href="" class="active"><span>Dashboard</span></a>
                </li>
                <li>
                    <a href="{{ route('admin.users') }}"><span>Users</span></a>
                </li>
                <li>
                    <a href="{{ route('posts.index') }}"><span>Exit Admin</span></a>
                </li>
            </ul>
        </div>
    </div>

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
</body>
</html>