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

							@foreach ($question as $quest)
								<tr>
									<td>
										<h4>{{ $quest->title }}</h4>
										<p style="font-size: 12px">From : </p>
									</td>

									<td align="right">
										<a href="#">Show Detail</a>
									</td>
								</tr>
							@endforeach
						</table>
                	</div>
               	</div>
			</div>
		</div>
	</div>

@endsection