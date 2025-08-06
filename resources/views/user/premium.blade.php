@extends('layouts.app')

@section('title')
	Premium content
@endsection

@section('content')
	@if($user->premium)
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
	@endif

	

	<tr>
		
		<td></td><td>
			<br>
			<form action="{{ route('user.update') }}" method="POST">
					@csrf

					<select id="payment" name="payment" multiple required>				
						<option value="1">Doekoes</option>
						<option value="0">Skeer</option>
					</select>
					
					<br>
					
					<x-button type="submit">Betaal nu</x-button>
			</form>
		</td>
	</tr>
@endsection