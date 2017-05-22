@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
				
					<div class="row">
				
						<div class="col-xs-4 stage">
							<img src="https://d30y9cdsu7xlg0.cloudfront.net/png/17241-200.png" alt="..." class="img-circle">
							<h1>{{ $users[1]->name }}</h1>
							<h2>{{ $users[1]->rating }} / {{ $users[1]->elo_rating }}<h2>
							<table class="table table-condensed">
								<thead>
									<tr>
										<th class="text-center"><h6>W</h6></th>
										<th class="text-center"><h6>L</h6></th>
										<th class="text-center"><h6>F</h6></th>
										<th class="text-center"><h6>A</h6></th>
										<th class="text-center"><h6>D</h6></th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td><h6>{{ $users[1]->wins }}</h6></td>
										<td><h6>{{ $users[1]->losses }}</h6></td>
										<td><h6>{{ $users[1]->goals_for }}</h6></td>
										<td><h6>{{ $users[1]->goals_against }}</h6></td>
										<td><h6>{{ $users[1]->goals_difference }}</h6></td>
									</tr>
								</tbody>
							</table>
						</div>
						
							
						<div class="col-xs-4 stage">
							<img src="https://d30y9cdsu7xlg0.cloudfront.net/png/17241-200.png" alt="..." class="img-circle">
							<h1>{{ $users[0]->name }}</h1>
							<h2>{{ $users[0]->rating }} / {{ $users[0]->elo_rating }}<h2>
							<table class="table table-condensed">
								<thead>
									<tr>
										<th class="text-center"><h6>W</h6></th>
										<th class="text-center"><h6>L</h6></th>
										<th class="text-center"><h6>F</h6></th>
										<th class="text-center"><h6>A</h6></th>
										<th class="text-center"><h6>D</h6></th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td><h6>{{ $users[0]->wins }}</h6></td>
										<td><h6>{{ $users[0]->losses }}</h6></td>
										<td><h6>{{ $users[0]->goals_for }}</h6></td>
										<td><h6>{{ $users[0]->goals_against }}</h6></td>
										<td><h6>{{ $users[0]->goals_difference }}</h6></td>
									</tr>
								</tbody>
							</table>
						</div>
						
							
						<div class="col-xs-4 stage">
							<img src="https://d30y9cdsu7xlg0.cloudfront.net/png/17241-200.png" alt="..." class="img-circle">
							<h1>{{ $users[2]->name }}</h1>
							<h2>{{ $users[2]->rating }} / {{ $users[2]->elo_rating }}<h2>
							<table class="table table-condensed">
								<thead>
									<tr>
										<th class="text-center"><h6>W</h6></th>
										<th class="text-center"><h6>L</h6></th>
										<th class="text-center"><h6>F</h6></th>
										<th class="text-center"><h6>A</h6></th>
										<th class="text-center"><h6>D</h6></th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td><h6>{{ $users[2]->wins }}</h6></td>
										<td><h6>{{ $users[2]->losses }}</h6></td>
										<td><h6>{{ $users[2]->goals_for }}</h6></td>
										<td><h6>{{ $users[2]->goals_against }}</h6></td>
										<td><h6>{{ $users[2]->goals_difference }}</h6></td>
									</tr>
								</tbody>
							</table>
						</div>
					
					</div>
                    
					<div class="table-responsive">
						<table class="table table-condensed table-striped">
							<thead>
								<tr>
									<th style="width: 30px">#</th>
									<th>Name</th>
									<th>Rating</th>
									<th>ELO Rating</th>
									<th>Wins</th>
									<th>Losses</th>
									<th>For</th>
									<th>Against</th>
									<th>Difference</th>
								</tr>
							</thead>

							<?php $amountOfUsers = sizeof($users); ?>
							@for ($i = 3; $i < $amountOfUsers; $i++)
								<tr>
									<td>{{ $i + 1 }}</td>
									<td>{{ $users[$i]->name }}</td>
									<td>{{ $users[$i]->rating }}</td>
									<td>{{ $users[$i]->elo_rating }}</td>
									<td>{{ $users[$i]->wins }}</td>
									<td>{{ $users[$i]->losses }}</td>
									<td>{{ $users[$i]->goals_for }}</td>
									<td>{{ $users[$i]->goals_against }}</td>
									<td>{{ $users[$i]->goals_difference }}</td>
								</tr>
							@endfor

						</table>
					</div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
