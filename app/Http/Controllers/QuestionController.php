<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Question;
use App\Comment;

class QuestionController extends Controller
{

	public function index()
	{
		$question = Question::paginate(5);

		return view('question.index', compact('question'));
	}

	public function create()
	{
		return view('home');
	}

	public function store(Request $request)
	{
		$question = new Question;

		$question->title = $request->get('qtitle');
		$question->content = $request->get('qcontent');
		$question->askTime = date('Y-m-d H:i:s');
		$question->save();

		return redirect('question/'. $question->id);
	}

	public function detail(Request $request, $id)
	{
		$question = Question::find($id);
		$question->user()->associate($request->user());

		return view('question.detail', compact('question'));
	}
}
