@extends('layouts.app')

@section('title')
	Schrijf Nieuw Artikel
@endsection

@section('content')
	<form action="{{ route('articles.store') }}" method="POST">
			@csrf
			<label for="name">Titel</label>
			<br>

			<textarea id="name" name="name" required></textarea>
			<br><br>
			<label for="entry">Tekst</label>
			<br>

			<textarea id="entry" name="entry" required></textarea>
			<br><br>
			
			<x-button type="submit">Opslaan</x-button>
	</form>
@endsection
