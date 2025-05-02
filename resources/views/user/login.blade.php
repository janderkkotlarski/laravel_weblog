@extends('layouts.app')

@section('title')
	Log In
@endsection

@section('content')
<form action="{{ route('authenticate') }}" method="POST">
			@csrf
			<label for="name"><b>Gebruikersnaam</b></label>
			<input type="text" id="name" name="name" required>			
			<br>
			<label for="password"><b>Wachtwoord</b></label>
			<input type="password" id="password" name="password" required>
			<br>
			@error('name')
				{{ $message }}
				<br>
			@enderror
			<button type="submit">Inloggen</button>
	</form>
@endsection