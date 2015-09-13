<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Requests\ThreadCommentRequest;

use App\Thread;
use App\ThreadComment;

use Auth;

class ThreadCommentsController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store($thread_id, ThreadCommentRequest $request)
    {
        $thread = Thread::findOrFail($thread_id);
        $comment = new ThreadComment($request->all());
        $comment->user()->associate(Auth::user());
        $comment->thread()->associate($thread);
        $comment->save();

        return redirect("threads/$thread_id");
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($thread_id, $comment_id)
    {

        $thread = Thread::findOrFail($thread_id);

        $comment = $thread->comments()->findOrFail($comment_id);

        return $comment;

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(ThreadCommentRequest $request, $thread_id, $comment_id)
    {
        
        if (Auth::user()->role->id === 1) {
    
            $comment = ThreadComment::findOrFail($comment_id);

            $comment->update($request->all());

        }else{

            $comment = Auth::user()->thread_comments()->findOrFail($comment_id);

            $comment->update($request->all());

        }

        return redirect('threads/'.$thread_id);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($thread_id, $comment_id)
    {
        ThreadComment::destroy($comment_id);

        return url('threads/'.$thread_id);
    }
}
