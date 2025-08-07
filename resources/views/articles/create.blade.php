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

			<!-- TODO: kies duidelijke naamgeving, bijv. category_ids -->
			<select id="category_id" name="category_id[]" multiple>
				@foreach($categories as $category)
					<option value="{{ $category->id }}">{{ $category->name }}</option>
				@endforeach
			</select>

			<br><br>

			<input type="hidden" id="premium" name="premium" value=0>

			@if($user->premium)
				<input type="checkbox" id="premium" name="premium" value=1>
				<label for="premium">Premium?</label>
				
				<br><br>
			@endif			

			<label for="file">Plaatje</label>
			<input type="file" name="fileToUpload" id="fileToUpload">

			<input type="hidden" id="user_id" name="user_id" value="{{ Auth::id() }}">
			
			<x-button type="submit">Opslaan</x-button>
	</form>
@endsection
