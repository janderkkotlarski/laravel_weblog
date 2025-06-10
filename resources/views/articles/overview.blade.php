@extends('layouts.app')

@section('title')
	Artikeloverzicht
@endsection

@section('content')
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
		

