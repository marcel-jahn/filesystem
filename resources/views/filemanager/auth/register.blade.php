@extends('main.master')

@section('title', 'Register')
    
@section('content')

	<!-- if there are login errors, show them here -->
    {!! $errors->first('email') !!}
    {!! $errors->first('password') !!}

	 <div class="">
        <!-- FORM STARTS HERE -->
        <form method="POST" action="/files/register" novalidate>

            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" id="name" class="form-control" name="name">
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" class="form-control" name="email">
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" class="form-control" name="password">
            </div>

            <div class="form-group">
                <label for="password_confirm">Confirm Password</label>
                <input type="password" id="password_confirm" class="form-control" name="password_confirmation">
            </div>
            {!! Form::token() !!}
            <div class="text-right form-group">
       			<button type="submit" class="btn btn-default ">Register!</button>
            </div>

        </form>

    </div>
@stop