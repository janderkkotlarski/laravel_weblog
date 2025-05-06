@extends('layouts.app')

@section('title')
	Artikeloverzicht
@endsection



@section('content')
	<table>
		<thead>
			<tr>
				<th>Naam</th>
				<th>Aanmaaktijd</th>
			</tr>
		</thead>
		<tbody>
			@foreach($articles as $article)
				<tr>
					<td>						
						<a href="{{ route('articles.show', $article->id) }}">{{ $article->name }}</a>						
					<td>{{ $article->created_at }}</td>
				</tr>
			@endforeach
		</tbody>
	</table>

	
	@foreach(session()->all() as $part)
		<h1>{{ var_dump($part) }}</h1>
	@endforeach

	

	{{ var_dump(session()->all()) }}
		

	

@endsection
		

