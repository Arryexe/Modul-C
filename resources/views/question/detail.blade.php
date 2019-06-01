@extends('layouts.app')

<style>
    .display-comment .display-comment {
        margin-left: 40px;
    }
</style>

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <b>Question
                        <div class="text-right" style="margin-top: -25px;">
                            <a href="{{ url('question') }}">Back to Question List</a>
                        </div>
                    <p style="font-size: 24px;">
                        {{ $question->title }}<br></p></b>
                        from : {{ $question->user->name }} | {{ $question->askTime }}

                    <br><br>
                    <p>{{ $question->content }}</p>
                </div>

                <div class="panel-body">
                    <b>Comments</b>

                    <h4>Add Comment</h4>
                    <form method="post" action="{{ route('comment.add') }}">
                    {{ csrf_field() }}

                        <div class="form-group">
                            <input type="text" name="comment" class="form-control" required>
                            <input type="hidden" name="question_id" value="{{ $question->id }}">
                        </div>

                        <div class="form-group">
                            <input type="submit" value="Add Comment" class="btn btn-warning">
                        </div>
                        
                    </form>

                    <hr>

                    <div class="display-comment">
                        @include('partials._comment_replies', ['comments' => $question->comments, 'question_id' => $question->id])
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
