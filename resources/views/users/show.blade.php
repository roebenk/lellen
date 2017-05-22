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


		                	
	                	<h2>Info</h2>
	                	<pre>
	                	{{ print_r($user) }}
	                	</pre>
	                	<h2>Last 10 games played</h2>
	                	<table class="table table-striped">

	                        <tr>
	                            <th>Player 1A</th>
	                            <th>Player 2A</th>
	                            <th class="text-right">Score A</th>
	                            <th class="text-center">-</th>
	                            <th>Score B</th>
	                            <th>Player 1B</th>
	                            <th>Player 2B</th>
	                            <th>Played on</th>
	                        </tr>
	                        <?php $i = 1; ?>
	                        @foreach($games as $game)
	                            <tr>
	                                <td>{{ $users->get($game->player_a1_id)->name }}</td>
	                                <td>{{ $users->get($game->player_a2_id)->name }}</td>
	                                <td class="text-right">{{ $game->score_a }}</td>
	                                <td class="text-center">-</td>
	                                <td>{{ $game->score_b }}</td>
	                                <td>{{ $users->get($game->player_b1_id)->name }}</td>
	                                <td>{{ $users->get($game->player_b2_id)->name }}</td>
	                                <td>{{ $game->created_at->format('d-m-Y \a\t H:i') }}</td>
	                            </tr>
	                        @endforeach

	                    </table>

	                </div>
	            </div>

	        @endif
	        
        </div>
    </div>
</div>
@endsection
