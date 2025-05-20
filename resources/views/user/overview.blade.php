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
			<td>{{ $article->user->name }}</td>
			<td>{{ $article->created_at }}</td>
		</tr>
	@endforeach	

	@foreach(session()->all() as $label=>$part)
		<x-middle_row>{{ var_dump($label) }}</x-middle_row>	
		<x-middle_row>{{ var_dump($part) }}</x-middle_row>
	@endforeach	
	
@endsection