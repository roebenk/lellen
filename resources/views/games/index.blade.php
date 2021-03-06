@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Game history</div>
                <div class="panel-body">

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
                                <tr>
                                    <td class="text-right">
                                        <a href="{{ url('users/' . $game->player_a1_id ) }}">{{ $users->get($game->player_a1_id)->name }}</a> &amp;
                                        <a href="{{ url('users/' . $game->player_a2_id ) }}">{{ $users->get($game->player_a2_id)->name }}</a>
                                    </td>
                                    <td class="text-right">{{ $game->score_a }}</td>
                                    <td class="text-center">-</td>
                                    <td>{{ $game->score_b }}</td>
                                    <td><a href="{{ url('users/' . $game->player_b1_id ) }}">{{ $users->get($game->player_b1_id)->name }}</a> &amp; <a href="{{ url('users/' . $game->player_b2_id ) }}">{{ $users->get($game->player_b2_id)->name }}</a></td>
                                    <td>{{ $game->created_at->tz('Europe/Amsterdam')->format('d-m-Y \a\t H:i') }}</td>
                                </tr>
                            @endforeach

                        </table>

                        {!! $games->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
