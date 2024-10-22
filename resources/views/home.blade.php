@extends('layout') 
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
        <h4>{{Auth::user()->name}}</h4>
            <div class="card">
                <div class="card-header">
                    <div class="card-title">
                        Blog List
                        <a href="logout" style="float:right" class="btn btn-warning">Logout</a>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Title</th>
                                <th>Content</th>
                                <th>Author</th>
                                <th>Action</th>
                                <th>Details</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($posts as $post)
                            <tr>
                                <td>{{$post->id}}</td>
                                <td>{{$post->name}}</td>
                                <td>{{substr($post->content,0,10)}}</td>
                                <td>{{Auth::user()->name}}</td>
                                <td><a class="btn btn-warning" href="/posts/{{$post->id}}/edit">Edit</a> | <form action="/posts/{{$post->id}}" class="d-inline" method="post">@csrf @method('DELETE')<button type="submit" class="btn btn-danger">Delete</button></form></td>
                                <td><a href="/posts/{{$post->id}}">View<a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="card-footer">
                    <a href="/posts/create" class="btn btn-primary">Add New Blog</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
