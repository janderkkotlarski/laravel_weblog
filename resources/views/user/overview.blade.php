@extends('layouts.app')

@section('title')
	Jouw artikelen, {{ Auth::user()->name }}
@endsection

@section('content')
	<tr>
		<th>Naam</th>
		<th>Aanmaaktijd</th>
		<th>Bewerken</th>
		<th>Weghalen</th>
	</tr>

	@foreach($articles as $article)
		<tr>
			<td>						
				<x-button type="button" a_link="{{ route('articles.show', $article->id) }}">
					{{ $article->name }}
				</x-button>
			</td>
			<td>{{ $article->created_at }}</td>
			<td>
				<x-button type="button" a_link="{{ route('articles.edit', $article) }}">
					Verander
				</x-button>				
			</td>
			<td>
				<x-button type="button">
					Verwijder
				</x-button>
			</td>
		</tr>
	@endforeach		
@endsection