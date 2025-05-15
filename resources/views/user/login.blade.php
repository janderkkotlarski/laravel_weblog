@extends('layouts.app')

@section('title')
	Log In
@endsection

@section('content')

<x-form action="{{ route('authenticate') }}" method="POST">
		<label for="name">Gebruikersnaam</label>
		<br>
		
		<input type="text" id="name" name="name" required>			
		<br><br>

		<label for="password">Wachtwoord</label>
		<br>
		<input type="password" id="password" name="password" required>
		<br>

		@error('name')
			{{ $message }}
			<br>
		@enderror
		<br>

		<x-button type="submit">Inloggen</x-button>
</x-form>

@endsection