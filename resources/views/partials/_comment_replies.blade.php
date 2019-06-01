@foreach ($comments as $comment)
	<div class="display-comment">
		<b>{{ $comment->user->name }}</b>
		<p>{{ $comment->body }}</p>
		<a href="" id="reply"></a>
		<form action="{{ route('reply.add') }}" method="post">
			{{ csrf_field() }}
			<div class="form-group">
				<input type="text" name="comment" class="form-control" required>
				<input type="hidden" name="question_id" value="{{ $question_id }}">
				<input type="hidden" name="comment_id" value="{{ $comment->id }}">
			</div>

			<div class="form-group">
				<input type="submit" value="Reply" class="btn btn-warning">
			</div>
		</form>
		@include('partials._comment_replies', ['comments' => $comment->replies])
	</div>
@endforeach