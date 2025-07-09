@extends('layouts.app')

@section('title')
	Verander {{ $article->name }}
@endsection

@section('content')
	<form action="{{ route('articles.update', $article) }}" method="POST" enctype="multipart/form-data">
			@csrf
			@method('PATCH')
			<label for="name">Titel</label>
			<br>
			<textarea id="name" name="name" required>{{ $article->name }}</textarea>
			<br><br>
			<label for="entry">Tekst</label>
			<br>

			<textarea id="entry" name="entry" required>{{ $article->entry }}</textarea>
			<br><br>

			<select id="id" name="id[]" multiple>
				@foreach($categories as $category)
					<option value="{{ $category->id }}">{{ $category->name }}</option>
				@endforeach
			</select>

			<br><br>

			@if($user->premium)
				<input type="hidden" id="premium" name="premium" value=0>
				<input type="checkbox" id="premium" name="premium" value=1>
				<label for="premium">Premium?</label>
				
				<br><br>
			@endif


			<label for="file">Plaatje</label>
			<input type="file" name="fileToUpload" id="fileToUpload">
			<x-button type="submit">Opslaan</x-button>
			
	</form>
@endsection
