@extends('layouts.app')

@section('title')
	Artikel {{ $article->name }}
@endsection

@section('content')
	<table>
		<thead>
			<tr>
				<th>Titel</th>
			</tr>
		</thead>
		<tbody>
				<tr>
					<td>{{ $article->name }}</td>					
				</tr>
		</tbody>
		<thead>
			<tr>
				<th>Tekst</th>
			</tr>
		</thead>
		<tbody>
				<tr>
					<td>{{ $article->entry }}</td>					
				</tr>
		</tbody>
	</table>
@endsection