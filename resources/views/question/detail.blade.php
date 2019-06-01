@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <b>Question
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
                            <input type="text" name="comment" class="form-control">
                            <input type="hidden" name="question_id" value="{{ $question->id }}">
                        </div>

                        <div class="form-group">
                            <input type="submit" value="Add Comment" class="btn btn-warning">
                        </div>
                        
                    </form>

                    <hr>

                    @foreach ($question->comments as $comment)
                        <div class="display-comment">
                            <b>{{ $comment->user->name }}</b> | {{ $comment->created_at }}
                            <p>{{ $comment->body }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
