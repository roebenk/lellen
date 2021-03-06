@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Rankings</div>

                <div class="panel-body">
                
                    <div class="row hidden-xs">
                
                        <div class="col-xs-4 stage" style="margin-top: 30px;">
                            <img src="https://d30y9cdsu7xlg0.cloudfront.net/png/17241-200.png" alt="..." class="img-circle">
                            <h1><a href="{{ url('users/' . $users[1]->id ) }}">{{ $users[1]->name  }}</a></h1>
                            <h2>{{ $users[1]->elo_rating }}<h2>
                            <table class="table table-condensed">
                                <thead>
                                    <tr>
                                        <th class="text-center"><h6>W</h6></th>
                                        <th class="text-center"><h6>L</h6></th>
                                        <th class="text-center"><h6>F</h6></th>
                                        <th class="text-center"><h6>A</h6></th>
                                        <th class="text-center"><h6>GD</h6></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><h6>{{ $users[1]->wins }}</h6></td>
                                        <td><h6>{{ $users[1]->losses }}</h6></td>
                                        <td><h6>{{ $users[1]->goals_for }}</h6></td>
                                        <td><h6>{{ $users[1]->goals_against }}</h6></td>
                                        <td><h6>{{ $users[1]->getGoalsDifference() }}</h6></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        
                            
                        <div class="col-xs-4 stage">
                            <img src="https://d30y9cdsu7xlg0.cloudfront.net/png/17241-200.png" alt="..." class="img-circle">
                            <h1><a href="{{ url('users/' . $users[0]->id ) }}">{{ $users[0]->name  }}</a></h1>
                            <h2>{{ $users[0]->elo_rating }}<h2>
                            <table class="table table-condensed">
                                <thead>
                                    <tr>
                                        <th class="text-center"><h6>W</h6></th>
                                        <th class="text-center"><h6>L</h6></th>
                                        <th class="text-center"><h6>F</h6></th>
                                        <th class="text-center"><h6>A</h6></th>
                                        <th class="text-center"><h6>GD</h6></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><h6>{{ $users[0]->wins }}</h6></td>
                                        <td><h6>{{ $users[0]->losses }}</h6></td>
                                        <td><h6>{{ $users[0]->goals_for }}</h6></td>
                                        <td><h6>{{ $users[0]->goals_against }}</h6></td>
                                        <td><h6>{{ $users[0]->getGoalsDifference() }}</h6></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        
                            
                        <div class="col-xs-4 stage" style="margin-top: 60px;">
                            <img src="https://d30y9cdsu7xlg0.cloudfront.net/png/17241-200.png" alt="..." class="img-circle">
                            <h1><a href="{{ url('users/' . $users[2]->id ) }}">{{ $users[2]->name  }}</a></h1>
                            <h2>{{ $users[2]->elo_rating }}<h2>
                            <table class="table table-condensed">
                                <thead>
                                    <tr>
                                        <th class="text-center"><h6>W</h6></th>
                                        <th class="text-center"><h6>L</h6></th>
                                        <th class="text-center"><h6>F</h6></th>
                                        <th class="text-center"><h6>A</h6></th>
                                        <th class="text-center"><h6>GD</h6></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><h6>{{ $users[2]->wins }}</h6></td>
                                        <td><h6>{{ $users[2]->losses }}</h6></td>
                                        <td><h6>{{ $users[2]->goals_for }}</h6></td>
                                        <td><h6>{{ $users[2]->goals_against }}</h6></td>
                                        <td><h6>{{ $users[2]->getGoalsDifference() }}</h6></td>
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
                                    <th>P</th>
                                    <th>W</th>
                                    <th>L</th>
                                    <th>F</th>
                                    <th>A</th>
                                    <th>GD</th>
                                    <th>Form</th>
                                </tr>
                            </thead>

                            <?php $amountOfUsers = sizeof($users); $i = 1; ?>
                            @foreach($users as $user)
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td><a href="{{ url('users/' . $user->id ) }}">{{ $user->name  }}</a></td>
                                    <td>{{ $user->elo_rating }}</td>
                                    <td>{{ $user->wins + $user->losses }}</td>
                                    <td>{{ $user->wins }}</td>
                                    <td>{{ $user->losses }}</td>
                                    <td>{{ $user->goals_for }}</td>
                                    <td>{{ $user->goals_against }}</td>
                                    <td>{{ $user->getGoalsDifference() }}</td>
                                    <td>
                                        @foreach($user->form() as $f)
                                            <div data-toggle="tooltip" title="{{ $f['game']->score_a . ' - ' . $f['game']->score_b }} | Played {{ $f['game']->created_at->diffForHumans() }}" style="width: 10px; height: 10px; display: inline-block; vertical-align: middle; background: {{ $f['win'] ? '#3c763d' : '#a94442' }}"></div>
                                        @endforeach
                                    </td>
                                </tr>
                            @endforeach

                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('extra-scripts')
<script>
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip(); 
});
</script>
@endsection