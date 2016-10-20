@extends('layouts.app')

@section('content')

<div class="container">
	<div class="panel panel-default">
		<div class="panel-body">

			<div class="row">
				<div class="col-md-6 col-md-offset-3">
			{!! Form::open(['action' => 'ProfileController@saveSettings']) !!}

					<div class="form-group">
			{!! Form::label('profile_image_url', 'input the image url for your profile picture') !!}
			{!! Form::text('profile_image_url', $user->profile_banner_url, ['class' => 'form-control']) !!}
					</div>

					<div class="form-group">
			{!! Form::label('profile_banner_url', 'input the image url for your banner') !!}
			{!! Form::text('profile_banner_url', $user->profile_banner_url, ['class' => 'form-control']) !!}
					</div>

					<div class="form-group">
			{!! Form::label('profile_banner_url', 'input the image url for your banner') !!}
			{!! Form::selectRange('age', 16, 99, $user->age, ['class' => 'form-control']) !!}
					</div>

				<div class="form-group">
					<button class="btn btn-info btn-block" type="submit">Save info</button>
				</div>

			{!! Form::close() !!}				
				</div>	
			</div>
		</div>
	</div>
</div>



@endsection