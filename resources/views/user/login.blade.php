@extends('layouts.app')

@section('title')
	Log In
@endsection

@section('content')
<form action="{{ route('authenticate') }}" method="POST">
			@csrf
			<label for="name">Gebruikersnaam</label>
			<br>
			<input type="text" id="name" name="name" required>			
			<br>
			<label for="password">Wachtwoord</label>
			<br>
			<input type="password" id="password" name="password" required>
			<br>
			@error('name')
				{{ $message }}
				<br>
			@enderror
			<button type="submit">Inloggen</button>
	</form>
@endsection