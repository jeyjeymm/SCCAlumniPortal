<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Requests\ArticleCommentRequest;

use App\ArticleComment;
use App\Article;

use Auth;

class ArticleCommentsController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store($article_id, ArticleCommentRequest $request)
    {
        $article = Article::findOrFail($article_id);

        $comment = new ArticleComment($request->all());
        $comment->user()->associate(Auth::user());
        $comment->article()->associate($article);
        $comment->save();

        return redirect("articles/$article_id");
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($article_id, $comment_id)
    {
        
        $article = Article::findOrFail($article_id);

        $comment = $article->comments()->findOrFail($comment_id);

        return $comment;

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(ArticleCommentRequest $request, $article_id, $comment_id)
    {
        
        if (Auth::user()->role->id === 1) {
    
            $comment = ArticleComment::findOrFail($comment_id);

            $comment->update($request->all());

        }else{

            $comment = Auth::user()->article_comments()->findOrFail($comment_id);

            $comment->update($request->all());

        }

        return redirect('articles/'.$article_id);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($article_id, $comment_id)
    {
        ArticleComment::destroy($comment_id);

        return url('articles/'.$article_id);
    }
}
