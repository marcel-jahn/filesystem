@extends('main.master')

@section('title', 'Your Files')

@section('content')
	
	<div class="col-md-12">
		@include('filemanager.partials.upload-widget')
	</div>
	<div class="col-md-12">
	@if($files)
		<ul>
		@foreach($files as $file)
			<li><a href="{{ $file->getUrl() }}">{{ $file->name }}</a></li>
		@endforeach
		</ul>

	@endif
	</div>
@stop