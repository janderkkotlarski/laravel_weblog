@extends('layouts.app')

@section('title')
	Schrijf Nieuw Artikel
@endsection

@section('content')
	<form action="{{ route('articles.store') }}" method="POST">
			@csrf
			<label for="name">Titel:</label>
			<input type="text" id="name" name="name" required>
			<br>
			<label for="entry">Tekst:</label>
			<textarea id="entry" name="entry" required></textarea>
			<br>
			<button type="submit">Opslaan</button>
	</form>
@endsection
