@extends('layouts.app')

@section('title')
	Artikeloverzicht
@endsection

@section('content')
	<x-middle_row>
		<form action="{{ route('articles.overview') }}" method="GET">
				@csrf
				<label for="entry">Categoriefilter</label>
				<br>
				<select id="category_id" name="category_id">
					<option value="0"></option>
					@foreach($categories as $category)
						<option value="{{ $category->id }}">{{ $category->name }}</option>
					@endforeach
				</select>
				<br>
				<x-button type="submit">Opslaan</x-button>

				@if($request->category_id != 0)
					<br><br>
					@foreach($categories as $category)
						@if($category->id == $request->category_id)
							<b>Categorie: {{ $category->name }}</b>
						@endif
					@endforeach
				@endif				
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
		

