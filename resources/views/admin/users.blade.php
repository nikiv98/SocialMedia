@extends('layouts.admin')
@section('content')

    <div class="main-content">
        <header class="admin-head">
            <h2>Users</h2>
            <div class="user-wrapper">
                <div>
                    <h4>{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</h4>
                </div>
            </div>
        </header>
        
        <main>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">ID</th>
                        <th scope="col">First Name</th>
                        <th scope="col">Last Name</th>
                        <th scope="col">Role</th>
                        <th scope="col">Email</th>
                        <th scope="col">Created At</th>
                        <th scope="col">Updated At</th>
                        <th scope="col">View</th>
                        <th scope="col">Edit</th>
                        <th scope="col">Delete</th>
                      </tr>
                    </thead>
                    <tbody>
    
                          @if (count($users)!=0)
                            @foreach ($users as $user)
                                <tr>
                                    <th scope="row">{{ $user->id }}</th>
                                    <td>{{ $user->first_name }}</td>
                                    <td>{{ $user->last_name }}</td>
                                    <td>{{ $user->is_admin }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->created_at }}</td>
                                    <td>{{ $user->updated_at }}</td>
                                    <td><a href="{{ route('view.user', $user->id) }}" class="view-b">View</a></td>
                                    <td><a href="{{ route('edit.user', $user->id) }}" class="edit-b">Edit</a></td>
                                    <td><a href="{{ route('user.delete', $user->id) }}" class="del-b">Delete</a></td>
                                </tr>
                            @endforeach
                              
                          @endif
                      
                    </tbody>
                </table>
            </div>
        </main>

    </div>
@endsection