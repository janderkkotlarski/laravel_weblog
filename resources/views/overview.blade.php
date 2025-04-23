<!DOCTYPE html>
<html>
	<head>
		<title>App Name - @yield('title')</title>
	</head>
	<body>
		@include('partials.nav')
		@yield('content')

		<h1>Article Overview</h1>
		<table>
			<thead>
				<tr>
					<th>Name</th>
					<th>Time</th>
				</tr>
			</thead>
			<tbody>
				@foreach($articles as $article)
					<tr>
						<td>{{ $article->name }}</td>
						<td>{{ $article->created_at }}</td>
					</tr>
				@endforeach
			</tbody>
		</table>
	</body>
</html>



<?php 
// echo '<body><h1>Hello!</h1></body>';

/*

App Name - @yield('title')

@include('partials.nav')
		@yield('content')

@extends('layouts.app')

@section('title', 'Page Title')

@section('content')
		<p>This is the content for the page.</p>
@endsection

*/

