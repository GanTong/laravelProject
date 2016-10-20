@extends('layouts.app')

@section('content')

 <link href="{!! asset('css/style.css') !!}" media="all" rel="stylesheet" type="text/css" />

 <link href='https://fonts.googleapis.com/css?family=Oswald:700' rel='stylesheet' type='text/css' />


<div class="profile-header" @if($user->profile_banner_url != "") style="background-image: url('{{ $user->profile_banner_url }}');" 

@endif>


	<div class="profile-header-wrapper">

	@if($user->profile_image_url !="")

		<img src="{{$user->profile_image_url}}" class="img-thumbnail img-responsive" width="250" >

	@endif

	<h1>{{$user->name}}</h1>

	</div>


</div>


@endsection