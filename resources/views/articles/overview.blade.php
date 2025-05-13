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
				<button type="button">
					<a href="{{ route('articles.show', $article->id) }}">{{ $article->name }}</a>
				</button>
			</td>
			<td>{{ $article->user->name }}
			<td>{{ $article->created_at }}</td>
		</tr>
	@endforeach


	
	@foreach(session()->all() as $part)
		<tr><td></td><td>
			{{ var_dump($part) }}
		</td><td></td></tr>
	@endforeach	

@endsection
		

