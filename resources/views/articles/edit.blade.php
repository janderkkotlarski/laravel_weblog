@extends('layouts.app')

@section('title')
	Verander {{ $article->name }}
@endsection

@section('content')
	<form action="{{ route('articles.update') }}" method="POST">
			@csrf
			<label for="name">Titel</label>
			<br>

			<textarea id="name" name="name" required>{{ $article->name }}</textarea>
			<br><br>
			<label for="entry">Tekst</label>
			<br>

			<textarea id="entry" name="entry" required>{{ $article->entry }}</textarea>
			<br><br>
			
			<x-button type="submit">Opslaan</x-button>
	</form>
@endsection
