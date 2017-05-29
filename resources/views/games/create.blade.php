@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Save game</div>
                <div class="panel-body">

                	@if (count($errors) > 0)
					    <div class="alert alert-danger">
					        <ul>
					            @foreach ($errors->all() as $error)
					                <li>{{ $error }}</li>
					            @endforeach
					        </ul>
					    </div>
					@endif


					<div class="row">
						<form role="form" method="POST" action="{{ url('games') }}">
                        	{{ csrf_field() }}
							<div class="col-md-4">
								<h3>Team 1</h3>
								<div class="form-group">
									<select name="player_a1" class="form-control">
										<option value="-1">Select player</option>
										<option value="guest">Guest player</option>
										@foreach($users as $user)
											<option value="{{ $user->id }}">{{ $user->name }}</option>
										@endforeach
									</select>
								</div>

								<div class="form-group">

									<select name="player_a2" class="form-control">
										<option value="-1">Select player</option>
										<option value="guest">Guest player</option>
										@foreach($users as $user)
											<option value="{{ $user->id }}">{{ $user->name }}</option>
										@endforeach
									</select>

								</div>

							</div>

							<div class="col-md-2">

								<div style="height: 80px; width: 100%" class="visible-md-block visible-lg-block"></div>

								<h3 class="visible-sm-block visible-xs-block">Score</h3>
								<div class="form-group">

									<select name="score_a" class="form-control">
										@for($i = 0; $i <= 10; $i++)
											<option value="{{ $i }}">{{ $i }}</option>
										@endfor
									</select>

								</div>

							</div>
							<div class="col-md-2">
								<div style="height: 80px; width: 100%" class="visible-md-block visible-lg-block"></div>
								<div class="form-group">

									<select name="score_b" class="form-control">
										@for($i = 0; $i <= 10; $i++)
											<option value="{{ $i }}">{{ $i }}</option>
										@endfor
									</select>

								</div>

							</div>

							<div class="col-md-4">
								<h3>Team 2</h3>
								<div class="form-group">
									<select name="player_b1" class="form-control">
										<option value="-1">Select player</option>
										<option value="guest">Guest player</option>
										@foreach($users as $user)
											<option value="{{ $user->id }}">{{ $user->name }}</option>
										@endforeach
									</select>
								</div>

								<div class="form-group">

									<select name="player_b2" class="form-control">
										<option value="-1">Select player</option>
										<option value="guest">Guest player</option>
										@foreach($users as $user)
											<option value="{{ $user->id }}">{{ $user->name }}</option>
										@endforeach
									</select>

								</div>

							</div>

							<input type="submit" class="btn btn-block btn-primary" value="Submit">

						</form>

					</div>

                    

						


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
