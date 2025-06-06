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


	<tr>
		<td>
			<br>
			<x-button type="button" id="clicker">
				Klikken
			</x-button>

			<script>
				document.getElementById("clicker").addEventListener("click", showText);

				function showText() {
					clicker = document.getElementById("clicker");


	
						

						/*
						
						const attri = document.createAttribute("href");
						attri.value = "{{ route('user.login') }}";
						clicker.setAttributeNode(attri);

						*/

						inner = "{{ route('user.login') }}";



						clicker.innerHTML = "<a href='" + inner +  ;


					// clicker.classList.add("clicked");


					// document.getElement
				}
			</script>
		</td>
	</tr>
@endsection
		

