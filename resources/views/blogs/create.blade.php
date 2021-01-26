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
            <h1>Create Blog</h1>
            <form action="{{ route('blogs.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <textarea name="title"></textarea>
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
                    required
                >
                <br>
                <br>
                <textarea class="ckeditor form-control" name="content"></textarea>
                <br>
                <button class="btn btn-success">CREATE</button>
            </form>
        </div>
        <script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
        <script type="text/javascript">
            $(document).ready(function () {
                $('.ckeditor').ckeditor();
            });
        </script>
    @endsection
