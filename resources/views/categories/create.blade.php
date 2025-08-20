@extends('layouts.app')

@section('title')
	Maak Nieuwe Categorie
@endsection

@section('content')
	<form action="{{ route('categories.store') }}" method="POST">
			@csrf
			<label for="name">Naam</label>
			<br>
			<textarea id="name" name="name" required></textarea>
			
			<br><br>			
			<x-button type="submit">Opslaan</x-button>
	</form>

	<x-errors />
@endsection