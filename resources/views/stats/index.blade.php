@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Statistics</div>
                <div class="panel-body">
					<div class="panel panel-default">
						<div class="panel-body">
							<div class="row">
								<div class="col-sm-4">
									<div class="statistic">
										<div class="label">Games played</div>
										<div class="value">{{ $num_played }}</div>
									</div><!-- /.statistic -->
								</div><!-- /.col -->
								<div class="col-sm-4">
									<div class="statistic">
										<div class="label">Goals scored</div>
										<div class="value">{{ $num_goals }}</div>
									</div><!-- /.statistic -->
								</div><!-- /.col -->
							</div><!-- /.row -->
						</div><!-- /.panel-body -->
					</div><!-- /.panel -->
				</div>
			</div>
        </div>
    </div>
</div>
@endsection
