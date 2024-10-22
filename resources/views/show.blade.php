@extends('layout')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <div class="card text-center">
                    <div class="card-header">
                        Featured
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">{{ $post->name }}</h5>
                        <p class="card-text">{{ $post->content }}</p>
                        <p class="fst-italic">Category: {{ $post->category->name }}</p>
                        <a href="/posts" class="btn btn-primary">Go Back</a>
                    </div>
                    <div class="card-footer text-body-secondary">
                        {{ $post->created_at->diffForHumans() }}
                    </div>
                </div>
            </div>
            <div class="col-md-2"></div>
        </div>
    </div>
@endsection
