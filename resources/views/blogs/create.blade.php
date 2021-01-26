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
                <input
                    type="file"
                    name="blog_images[]"
                    accept="image/*"
                    required
                    multiple
                >
                <br>
                <br>
                <textarea name="content"></textarea>
                <br>
                <button class="btn btn-success">CREATE</button>
            </form>
        </div>
    @endsection
