<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Company $company)
    {
        $this->validateComment($request);
        Comment::create([
            'comment' => $request->input('comment'),
            'rating' => $request->input('rating'),
            'user_id' => Auth::user()->id,
            'company_id' => $company->id,
        ]);

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function show(Comment $comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function edit(Comment $comment, $company)
    {
        return view('comments.edit', compact('comment', 'company'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comment $comment)
    {
        $this->validateComment($request);
        $company = $request->input('company');
        $comment->update([
            'comment' => $request->input('comment'),
            'rating' => $request->input('rating'),
            'user_id' => Auth::user()->id,
            'company_id' => $company,
        ]);

        $comment->save();

        return redirect(route('companies.show', $company));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment)
    {
        $comment->delete();

        return redirect()->back();
    }

    public function validateComment(Request $request)
    {
        Validator::make($request->input(), [
            'comment' => ['required', 'string', 'max:1024'],
            'rating' => ['string', 'required'],
        ])->validate();
    }

    protected function updateRating($comment)
    {
    }
}
