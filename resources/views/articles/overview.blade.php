@extends('layouts.app')

@section('title')
	Artikeloverzicht
@endsection

@section('content')
	<x-middle_row>
		<form action="{{ route('articles.filter') }}" method="POST">
				@csrf
				<label for="entry">Categoriefilter</label>
				<br>
				<select id="id" name="id">
					<option value="0"></option>
					@foreach($categories as $category)
						<option value="{{ $category->id }}">{{ $category->name }}</option>
					@endforeach
				</select>
				<br>
				<x-button type="submit">Opslaan</x-button>
		</form>
		<br>
	</x-middle_row>

	<tr>
		<th>Naam</th>
		<th>Gebruikersnaam</th>
		<th>Aanmaaktijd</th>
	</tr>

	@foreach($articles as $article)
		<tr>
			<td>				
				<x-button type="button" a_link="{{ route('articles.show', $article->id) }}">										
					{{ $article->name }}
				</x-button>
			</td>
			<td>{{ $article->user->name }}</td>
			<td>{{ $article->created_at }}</td>
		</tr>
	@endforeach
@endsection
		

