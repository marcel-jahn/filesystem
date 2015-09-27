@extends('main.master')

@section('title', 'kayden files')

@section('title-lead', 'Share your private Files')

@section('content')

			<!-- if there are login errors, show them here -->
    {!! $errors->first('email') !!}
    {!! $errors->first('password') !!}
    <div id="login-form">
		{!! Form::open(array('url' => 'files/login')) !!}

			<h2><span class="entypo-login"></span> Login</h2>
	    	<button class="submit"><span class="entypo-lock"></span></button>
		    <span class="entypo-user inputUserIcon"></span>
		    {!! Form::text('email', Input::old('email'), array('placeholder' => 'user@mail.de', 'class' => 'user ')) !!}
		    <span class="entypo-key inputPassIcon"></span>
		    {!! Form::password('password', ['class' => ' pass', 'placeholder' => 'password']) !!}
		

		{!! Form::close() !!}

	</div>
	<p class="text-right">
			<button class="btn btn-default"><a href="/files/register">Register</a></button>
		</p>
@stop