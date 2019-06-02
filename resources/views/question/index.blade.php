@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<div class="panel panel-default">
                	<div class="panel-heading">
						<h4>List of Available Question</h4>

						<div class="text-right" style="margin-top: -33px;">
							<a href="{{ url('home') }}">Create a Question</a>
						</div>
                	</div>

                	<div class="panel-body">
						<table class="table">
							@if (count($question) > 0)
								@foreach ($question as $quest)
									<tr>
										<td>
											<h4>{{ $quest->title }}</h4>
										</td>

										<td align="right">
											<a href="{{ url('question/'.$quest->id) }}">Show Detail</a>
										</td>
									</tr>
								@endforeach
								<tr>
									<td colspan="2" align="center">
										<div class="pagination">{!! str_replace('/?', '?', $question->render()) !!}</div>
									</td>
								</tr>
							@else
								<tr>
									<td>
										There is No Question Here ...
									</td>
								</tr>
							@endif
						</table>
                	</div>
               	</div>
			</div>
		</div>
	</div>

@endsection