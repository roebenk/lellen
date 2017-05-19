@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Game history</div>
                <div class="panel-body">
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
        </div>
    </div>
</div>
@endsection
