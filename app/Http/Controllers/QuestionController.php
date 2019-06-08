<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Question;
use App\Comment;
use App\User;

class QuestionController extends Controller
{

	public function index(Request $request)
	{
		$key = '%'.$request->get('search').'%';
		$sort = $request->get('sort');

		if ($sort == 'asc') {
			$question = Question::where('title', 'like', $key)->orderBy('created_at', 'ASC')->paginate(5);
			return view('question.index', compact('question', 'sort'));
		} 
		else {
			$question = Question::where('title', 'like', $key)->orderBy('created_at', 'DESC')->paginate(5);

			return view('question.index', compact('question', 'sort'));
		}
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
		$question->user_id = $request->user()->id;
		$question->save();

		return redirect('question/'. $question->id);
	}

	public function detail(Request $request, $id)
	{
		$question = Question::find($id);
		$question->user()->associate($request->user());

		return view('question.detail', compact('question'));
	}

	public function yquest(Request $request)
	{
		$user = $request->user()->id;
		$question = Question::where('user_id', '=', $user)->paginate(5);

		return view('question.yquest', compact('question'));
	}
}
