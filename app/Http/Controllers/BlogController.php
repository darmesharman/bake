<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\BlogImage;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogs = Blog::all();


        return view('blogs.index', compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags = Tag::all();
        return view('blogs.create', compact('tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validateBlog($request);

        $blog = Blog::create([
            'title' => $request->input('title'),
            'content' => $request->input('content'),
            'user_id' => auth()->user()->id,
        ]);

        if ($request->hasfile('blog_image')) {
            $request->validate([
                'blog_image' => ['required', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'],
                'name' => ['string'],
            ]);
            $path = $request->file('blog_image')->store('images');
            $img = new BlogImage([
                'name' => $request->file('blog_image')->getClientOriginalName(),
                'path' => $path,
                'blog_id' => $blog->id,
                'blog' => true,
            ]);

            $img->save();
        }

        $blog->save();

        $blog->tags()->attach(request('tags'));

        return redirect()->route('blogs.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function show(Blog $blog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function edit(Blog $blog)
    {
        $tags = Tag::all();
        return view('blogs.edit', compact('blog', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Blog $blog)
    {
        $this->validateBlog($request);

        $blog->update([
            'title' => $request->input('title'),
            'content' => $request->input('content'),
        ]);
        if ($request->hasfile('blog_image')) {
            $request->validate([
                'blog_image' => ['required', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'],
                'name' => ['string'],
            ]);
            Storage::delete($blog->blogImage->path);
            $blogImage = BlogImage::where('path', $blog->blogImage->path);
            $blogImage->delete();

            $path = $request->file('blog_image')->store('images');
            $img = new BlogImage([
                'name' => $request->file('blog_image')->getClientOriginalName(),
                'path' => $path,
                'blog_id' => $blog->id,
                'blog' => true,
            ]);
            $img->save();
        }

        $blog->tags()->detach(Tag::all());
        $blog->tags()->attach(request('tags'));

        return redirect()->route('blogs.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy(Blog $blog)
    {
        Storage::delete($blog->blogImage->path);
        $blogImage = BlogImage::where('path', $blog->blogImage->path);
        $blogImage->delete();

        $blog->delete();

        return back();
    }

    protected function validateBlog(Request $request)
    {
        Validator::make($request->input(), [
            'title' => ['required', 'string', 'max:10240'],
            'content' => ['required', 'string', 'max:10240'],
            'blog_image' => ['image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'],
        ])->validate();
    }
}
