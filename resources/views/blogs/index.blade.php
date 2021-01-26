@extends('layouts.guest')
    @section('content')
    <div class="container">
        <a class = 'btn btn-success' href="{{ route('blogs.create') }}">Create</a>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Title</th>
                        <th scope="col">Content</th>
                        <th >Image</th>
                        <th scope="col">Edit</th>
                        <th scope="col">Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($blogs as $blog)
                        <tr>
                            <th scope="row">{{ $blog->id }}</th>
                            <td>{{ $blog->title }}</td>
                            <td>{{ $blog->content }}</td>
                            @if ($blog->blogImages->isNotEmpty())
                                <td style="height: 10%; width: 10%;"><img src="{{ asset($blog->blogImages[0]->path) }}" ></td>
                            @endif
                        </tr>
                    @endforeach
            </table>
        </div>
    @endsection
