@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
        	<div class="fullWidth eight columns">
		        <div class="projectFactsWrap blue">
		            <div class="item wow fadeInUpBig animated animated" style="visibility: visible;">
		                <i class="fa fa-futbol-o" aria-hidden="true"></i>
		                <p id="number1" class="number">{{ $num_played }}</p>
		                <span></span>
		                <p>Games played</p>
		            </div>
		            <div class="item wow fadeInUpBig animated animated" style="visibility: visible;">
		                <i class="fa fa-bullseye" aria-hidden="true"></i>

		                <p id="number2" class="number">{{ $num_goals }}</p>
		                <span></span>
		                <p>Goals scored</p>
		            </div>
		            <div class="item wow fadeInUpBig animated animated" style="visibility: visible;">
		                <i class="fa fa-pie-chart" aria-hidden="true"></i>

		                <p id="number3" class="number">{{ $avg_goals }}</p>
		                <span></span>
		                <p>Goals per game</p>
		            </div>
		        </div>
			</div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
        	<div class="fullWidth eight columns">
		        <div class="projectFactsWrap red">
		            <div class="item wow fadeInUpBig animated animated" style="visibility: visible;">
		                <i class="fa fa-users" aria-hidden="true"></i>
		                <p id="number4" class="number">{{ $num_users }}</p>
		                <span></span>
		                <p>Total users</p>
		            </div>
		            <div class="item wow fadeInUpBig animated animated" style="visibility: visible;">
		               	<i class="fa fa-user-times" aria-hidden="true"></i>
		                <p id="number5" class="number">{{ $goals_per_user }}</p>
		                <span></span>
		                <p>Goals per user</p>
		            </div>
		            <div class="item wow fadeInUpBig animated animated" style="visibility: visible;">
		                <i class="fa fa-trophy" aria-hidden="true"></i>

		                <p id="number6" class="number">{{ $avg_rating }}</p>
		                <span></span>
		                <p>Average rating</p>
		            </div>
		        </div>
			</div>
        </div>
    </div>
</div>
@endsection


@section('extra-scripts')
<script type="text/javascript">


	$.fn.jQuerySimpleCounter = function( options ) {
	    var settings = $.extend({
	        start:  0,
	        end:    100,
	        easing: 'swing',
	        duration: 3000,
	        complete: ''
	    }, options );

	    var thisElement = $(this);

	    $({count: settings.start}).animate({count: settings.end}, {
			duration: settings.duration,
			easing: settings.easing,
			step: function() {
				var mathCount = Math.ceil(this.count);
				thisElement.text(mathCount);
			},
			complete: settings.complete
		});
	};


$('#number1').jQuerySimpleCounter({end: {{ $num_played }}});
$('#number2').jQuerySimpleCounter({end: {{ $num_goals }}});
$('#number3').jQuerySimpleCounter({end: {{ $avg_goals }}});
$('#number4').jQuerySimpleCounter({end: {{ $num_users }}});
$('#number5').jQuerySimpleCounter({end: {{ $goals_per_user }}});
$('#number6').jQuerySimpleCounter({end: {{ $avg_rating }}});


</script>

@endsection