@extends('layouts.guest')
    @section('content')
        <div class="container">
            @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <h1>Edit Blog</h1>
        <form action="{{ route('blogs.update', $blog) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <textarea name="title">{{ $blog->title }}</textarea>
            <br>
            <select class="form-control" name="tags[]" multiple>
                @foreach ($tags as $tag)
                    <option value="{{ $tag->id }}">
                        {{ $tag->name }}
                    </option>
                @endforeach
            </select>
            <br>
            <br>
            <input
                type="file"
                name="blog_image"
                accept="image/*"
            >
            @if (!$blog->blogImage->path)
            @else
                <img src="{{ asset($blog->blogImage->path) }}" style="height: 20%; width: 20%">
            @endif

            <br>
            <br>
            <textarea class="ckeditor form-control" name="content">{!! $blog->content !!}</textarea>
            <br>
            <button class="btn btn-success">Edit</button>
        </form>
        </div>
        <script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
        <script type="text/javascript">
            $(document).ready(function () {
                $('.ckeditor').ckeditor();
            });
        </script>
    @endsection
