@extends('layouts.app')

@section('title')
	Log In
@endsection

@section('content')
<form action="{{ route('login.authenticate') }}" method="POST">
			@csrf
			<label for="name"><b>Gebruikersnaam</b></label>
			<textarea id="name" name="name" required></textarea>
			<label for="password"><b>Wachtwoord</b></label>
			<textarea id="password" name="password" required></textarea>
			<button type="submit">Inloggen</button>
	</form>
@endsection