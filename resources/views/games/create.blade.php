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

                    <form class="form-horizontal" role="form" method="POST" action="{{ url('games') }}">
                        {{ csrf_field() }}

	                    <div class="form-group">
						    <label class="control-label col-sm-3" for="email">Team 1 Player 1:</label>
							<div class="col-sm-9">
								<select name="player_a1" class="form-control">
									<option value="-1"></option>
									@foreach($users as $user)
										<option value="{{ $user->id }}">{{ $user->name }}</option>
									@endforeach
								</select>
							</div>

						</div>
						<div class="form-group">

							<label class="control-label col-sm-3" for="email">Team 1 Player 2:</label>
							<div class="col-sm-9">
								<select name="player_a2" class="form-control">
									<option value="-1"></option>
									@foreach($users as $user)
										<option value="{{ $user->id }}">{{ $user->name }}</option>
									@endforeach
								</select>
							</div>

						</div>
						<div class="form-group">

							<label class="control-label col-sm-3" for="email">Team 2 Player 1:</label>
							<div class="col-sm-9">
								<select name="player_b1" class="form-control">
									<option value="-1"></option>
									@foreach($users as $user)
										<option value="{{ $user->id }}">{{ $user->name }}</option>
									@endforeach
								</select>
							</div>

						</div>
						<div class="form-group">

							<label class="control-label col-sm-3" for="email">Team 2 Player 2:</label>
							<div class="col-sm-9">
								<select name="player_b2" class="form-control">
									<option value="-1"></option>
									@foreach($users as $user)
										<option value="{{ $user->id }}">{{ $user->name }}</option>
									@endforeach
								</select>
							</div>

						</div>

						<div class="form-group">

							<label class="control-label col-sm-3" for="email">Score Team 1</label>
							<div class="col-sm-9">
								<select name="score_a" class="form-control">
									@for($i = 0; $i <= 10; $i++)
										<option value="{{ $i }}">{{ $i }}</option>
									@endfor
								</select>
							</div>

						</div>

						<div class="form-group">

							<label class="control-label col-sm-3" for="email">Score Team 2</label>
							<div class="col-sm-9">
								<select name="score_b" class="form-control">
									@for($i = 0; $i <= 10; $i++)
										<option value="{{ $i }}">{{ $i }}</option>
									@endfor
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
@endsection
