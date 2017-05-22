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
	                <div class="panel-heading">Edit user {{ $user->name }}</div>
	                <div class="panel-body">

	                	<form method="post" action="{{ url('users/' . $user->id) }}">

	                		{{ csrf_field() }}
    						<input type="hidden" name="_method" value="PUT">

	                		<div class="form-group">

	                			<label>Email</label>
	                			<input type="email" name="email" required="1" validate value="{{ $user->email }}" class="form-control">

	                		</div>

	                		<div class="form-group">

	                			<label>Password</label>
		                		<input type="password" name="password" placeholder="Leave empty to keep your password" class="form-control">

	                		</div>

	                		<div class="form-group">

	                			<label>Password (confirmation)</label>
		                		<input type="password" name="password_confirmation" placeholder="Leave empty to keep your password" class="form-control">

	                		</div>

	                		<input type="submit" class="btn btn-primary btn-block" value="Update">


	                	</form>

	                </div>
	            </div>

	        @endif
	        
        </div>
    </div>
</div>
@endsection
