@extends('layouts.app')

@section('title')
	Jouw artikelen, {{ Auth::user()->name }}
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
				<x-button type="button">
					<a href="{{ route('articles.show', $article->id) }}">{{ $article->name }}</a>
				</x-button>
			</td>
			<td>{{ $article->created_at }}</td>
			<td>
				<x-button type="button">
					<a href="{{ route('articles.show', $article->id) }}">{{ $article->name }}</a>
				</x-button>
			</td>
		</tr>
	@endforeach		
@endsection