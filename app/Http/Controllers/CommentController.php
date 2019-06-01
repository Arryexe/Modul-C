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
}
