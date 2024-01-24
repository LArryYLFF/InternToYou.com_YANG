@extends('layout.app')

@section('title', 'Edit Article')

@section('style')
    <style>

    </style>
@endsection

@section('content')
    <div class="container">
        <div class="card mb-3 mt-4">
            <div class="card-body">
                @include('common.error')
                @include('common.success')
                <form method="post" action="{{ route('blog.update', $blog) }}">
                    @method('PUT')
                    @csrf
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Title</label>
                        <input name="title" type="text" class="form-control" value="{{ $blog->title }}" id="exampleFormControlInput1">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Category</label>
                        <select name="category_id" class="form-control" id="exampleFormControlSelect1">
                            <option>Please select category.</option>
                            @foreach(categories() as $id => $name)
                                <option {{ $blog->category_id == $id ? 'selected' : '' }} value="{{ $id }}">{{ $name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Content</label>
                        <textarea name="content" class="form-control" id="exampleFormControlTextarea1" rows="10">{{ $blog->content }}</textarea>
                    </div>
                    <button type="submit" class="btn btn-primary w-25 offset-4">Publish</button>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('script')

@endsection
