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

        $company->rating = $company->rating();
        $company->save();

        return back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function edit(Company $company, Comment $comment)
    {
        return view('comments.edit', compact('company', 'comment'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Company $company, Comment $comment)
    {
        $this->validateComment($request);

        $comment->update([
            'comment' => $request->input('comment'),
            'rating' => $request->input('rating'),
            'user_id' => Auth::user()->id,
            'company_id' => $company->id,
        ]);

        $comment->save();

        return redirect()->route('companies.show', $company);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company, Comment $comment)
    {
        $comment->delete();

        return back();
    }

    public function like(Company $company, Comment $comment)
    {
        $comment->like();

        return back();
    }

    protected function validateComment(Request $request)
    {
        Validator::make($request->input(), [
            'comment' => ['required', 'string', 'max:1024'],
            'rating' => ['string', 'required'],
        ])->validate();
    }
}
