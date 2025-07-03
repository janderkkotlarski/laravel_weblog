@extends('layouts.app')

@section('title')
	Schrijf Nieuw Artikel
@endsection

@section('content')
	<form action="{{ route('articles.store') }}" method="POST" enctype="multipart/form-data">
			@csrf
			<label for="name">Titel</label>
			<br>

			<textarea id="name" name="name" required></textarea>
			<br><br>
			<label for="entry">Tekst</label>
			<br>

			<textarea id="entry" name="entry" required></textarea>
			<br><br>

			<select id="id" name="id[]" multiple>
				@foreach($categories as $category)
					<option value="{{ $category->id }}">{{ $category->name }}</option>
				@endforeach
			</select>

			<label for="file">Plaatje</label>
			<input type="file" name="fileToUpload" id="fileToUpload">
			
			<x-button type="submit">Opslaan</x-button>
	</form>
@endsection
