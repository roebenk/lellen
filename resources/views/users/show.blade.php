@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">

	        @if(!$user)

	    		<div class="alert alert-danger">
					No user with this ID found
	    		</div>

	    	@else
	            <div class="panel panel-default">
	                <div class="panel-heading">User info</div>
	                <div class="panel-body">

	                	<table class="table table-striped table-condensed">

		                	<tr>
		                		<th>Name</th>
		                		<td>{{ $user->name }}</td>
		                	</tr>
		                	<tr>
		                		<th>Email</th>
		                		<td>{{ $user->email }}</td>
		                	</tr>
		                	<tr>
		                		<th>ELO Rating</th>
		                		<td>{{ $user->elo_rating }}</td>
		                	</tr>
		                	<tr>
		                		<th>Games played</th>
		                		<td>{{ $user->wins + $user->losses }}</td>
		                	</tr>
		                	<tr>
		                		<th>Wins</th>
		                		<td>{{ $user->wins }}</td>
		                	</tr>
		                	<tr>
		                		<th>Losses</th>
		                		<td>{{ $user->losses }}</td>
		                	</tr>
		                	<tr>
		                		<th>Goals scored</th>
		                		<td>{{ $user->goals_for }}</td>
		                	</tr>
		                	<tr>
		                		<th>Goals conceided</th>
		                		<td>{{ $user->goals_against }}</td>
		                	</tr>
		                	<tr>
		                		<th>Goal difference</th>
		                		<td>{{ $user->getGoalsDifference() }}</td>
		                	</tr>

                		</table>
	                	<h2>Last 10 games played</h2>
	                	<div class="table-responsive">
	                    	<table class="table table-striped table-condensed">

	                            <tr>
	                                <th class="text-right">Team 1</th>
	                                <th class="text-right">&nbsp;</th>
	                                <th class="text-center">-</th>
	                                <th>&nbsp;</th>
	                                <th>Team 2</th>
	                                <th>Played on</th>
	                            </tr>

	                            @if(count($games) == 0) 
		                            <tr>
		                            	<td colspan="6" class="text-center"><em>No games played yet</em></td>
		                            </tr>
	                            @endif

	                            <?php $i = 1; ?>
	                            @foreach($games as $game)
	                            <?php // var_dump($game); continue; ?>
	                                <tr>
	                                    <td class="text-right"><a href="{{ url('users/' . $game->player_a1_id ) }}">{{ $users->get($game->player_a1_id)->name }}</a> &amp; <a href="{{ url('users/' . $game->player_a2_id ) }}">{{ $users->get($game->player_a2_id)->name }}</a></td>
	                                    <td class="text-right">{{ $game->score_a }}</td>
	                                    <td class="text-center">-</td>
	                                    <td>{{ $game->score_b }}</td>
	                                    <td><a href="{{ url('users/' . $game->player_b1_id ) }}">{{ $users->get($game->player_b1_id)->name }}</a> &amp; <a href="{{ url('users/' . $game->player_b2_id ) }}">{{ $users->get($game->player_b2_id)->name }}</a></td>
	                                    <td>{{ $game->created_at->format('d-m-Y \a\t H:i') }}</td>
	                                </tr>
	                            @endforeach

	                        </table>
	                    </div>

	                </div>
	            </div>

	        @endif
	        
        </div>
    </div>
</div>
@endsection
