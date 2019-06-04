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
                		<form action="" method="get">
						<table class="table">
            				<tr>
            					<td>
            						<input type="text" name="search" class="form-control" placeholder="Search Question Here ..." style="width: 360px;">
            					</td>
            					<td colspan="3">
            						<table style="float: right;">
            							<tr>
            								<td>
            									<div style="margin-right: 28px;">
            										<button type="submit" value="submit" class="btn btn-info">Search</button>
	            									<a href="{{ url('question?page='. $question->currentPage()) }}" class="btn btn-danger">Reset</a>
            									</div>
            									</form>
            								</td>

            								<td>
            									<div style="margin-right: 20px;">
            										|
            									</div>
            								</td>

            								<td>
            									<form action="" method="get">
					    							<select name="sort" style="border-radius: 5px;">
					    								<option value="asc" {{ $sort == 'asc' ? 'selected' : '' }}>ASC</option>
					    								<option value="desc" {{ $sort == 'desc' ? 'selected' : '' }}>DESC</option>
					    							</select>
					    							<button type="submit" value="submit" class="btn btn-info">Submit</button>
					    						</form>
            								</td>
            							</tr>
            						</table>
            					</td>

            				</tr>
							@if (count($question) > 0)
								@foreach ($question as $quest)
									<tr>
										<td colspan="3">
											<h4>{{ $quest->title }}</h4>
										</td>

										<td align="right">
											<a href="{{ url('question/'.$quest->id) }}">Show Detail</a>
										</td>
									</tr>
								@endforeach
								<tr>
									<td colspan="4" align="center">
										<div class="pagination">{!! str_replace('/?', '?', $question->render()) !!}</div>
									</td>
								</tr>
							@else
								<tr>
									<td>
										There is No Question Available ...
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