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
				<a href="{{ route('articles.show', $article->id) }}">	
					<x-button type="button">										
						{{ $article->name }}
					</x-button>
				</a>
			</td>
			<td>{{ $article->user->name }}</td>
			<td>{{ $article->created_at }}</td>
		</tr>
	@endforeach	
@endsection
		

