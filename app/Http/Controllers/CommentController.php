<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use App\Question;

class CommentController extends Controller
{
	public function store(Request $request)
	{
		$comment = new Comment;

		$comment->body = $request->get('comment');
		$comment->user()->associate($request->user());
		$question = Question::find($request->get('question_id'));
		$question->comments()->save($comment);

		return back();
	}

	public function replyStore(Request $request)
	{
		$reply = new Comment;
		$reply->body = $request->get('comment');
		$reply->user()->associate($request->user());
		$reply->parent_id = $request->get('comment_id');
		$question = Question::find($request->get('question_id'));

		$question->comments()->save($reply);

		return back();
	}
}
