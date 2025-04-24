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
					<td>{{ $article->name }}</td>
					<td>{{ $article->created_at }}</td>
				</tr>
			@endforeach
		</tbody>
	</table>
@endsection


		

