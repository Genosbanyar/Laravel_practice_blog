@extends('layout') @section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Add New Blog</div>
                    </div>
                    <form action="/posts" method="post">
                        @csrf
                        <div class="card-body">
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Title</label>
                                <input type="type" value="{{ old('name') }}" class="form-control" name="name"
                                    id="exampleFormControlInput1" placeholder="Enter title..." />
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlTextarea1" class="form-label">Content</label>
                                <textarea placeholder="Enter description" class="form-control" id="exampleFormControlTextarea1" rows="3"
                                    name="content">{{ old('content') }}</textarea>
                            </div>
                            <div class="form-group">
                                <select name="category_id" class="form-control">
                                    <option>Select Category</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">
                                Add
                            </button>
                            <a href="/posts" class="btn btn-danger">Back</a>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-2"></div>
        </div>
    </div>
@endsection
