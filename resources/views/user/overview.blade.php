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
				<x-button type="button" a_link="{{ route('articles.delete', $article) }}">
					Verwijder
				</x-button>
			</td>
		</tr>
	@endforeach
	
	<tr><td><br><br></td></tr>

	<tr>
		<td></td>
		<td>				
			<x-button type="button" a_link="{{ route('categories.create') }}">
				Maak Nieuwe Categorie
			</x-button>
		</td>
	</tr>

	@if ($errors->any())
		<tr>
			<td></td>
			<td>				
				@foreach ($errors->all() as $error)
                	<li>{{ $error }}</li>
            	@endforeach
			</td>
		</tr>
	@endif
@endsection