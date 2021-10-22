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
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">User Id</th>
                            <th scope="col">Body</th>
                            <th scope="col">Image Path</th>
                            <th scope="col">Created At</th>
                            <th scope="col">Updated At</th>
                            <th scope="col">View</th>
                            <th scope="col">Edit</th>
                            <th scope="col">Delete</th>
                        </tr>
                    </thead>
                    <tbody>

                        @if (count($posts)!=0)
                            @foreach ($posts as $post)
                                <tr>
                                    <th scope="row">{{ $post->id }}</th>
                                    <td>{{ $post->user_id }}</td>
                                    <td>
                                        {{ str_limit(strip_tags($post->body), 100) }}
                                    </td>
                                    <td>{{ $post->image_path }}</td>
                                    <td>{{ $post->created_at }}</td>
                                    <td>{{ $post->updated_at }}</td>
                                    <td><a href="{{ route('view.post', $post->id) }}" class="view-b">View</a></td>
                                    <td><a href="{{ route('edit.post', $post->id) }}" class="edit-b">Edit</a></td>
                                    <td><a href="{{ route('delete.post', $post->id) }}" class="del-b">Delete</a></td>
                                </tr>
                            @endforeach
                            
                        @endif
                    
                    </tbody>
                </table>
            </div>
        </main>

    </div>

@endsection