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
	<form action="{{ route('comments.store') }}" method="POST">
			@csrf
			<label id="article_id" name="article_id" value="$article->id">{{ $article->id }}:</label>
			<br>
			<label for="entry">Tekst:</label>
			<textarea id="entry" name="entry" required></textarea>
			<br>
			<button type="submit">Opslaan</button>
	</form>
@endsection