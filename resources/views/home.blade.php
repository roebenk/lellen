@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    
                    <table class="table table-striped">

                        <tr>
                            <th style="width: 30px">#</th>
                            <th>Name</th>
                            <th>Rating</th>
                            <th>ELO Rating</th>
                        </tr>
                        <?php $i = 1; ?>
                        @foreach($users as $user)
                            <tr>
                                <td>{{ $i++ }}
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->rating }}</td>
                                <td>{{ $user->elo_rating }}</td>
                            </tr>
                        @endforeach

                    </table>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
