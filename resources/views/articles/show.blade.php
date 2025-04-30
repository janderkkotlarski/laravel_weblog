@extends('layouts.app')

@section('title')
	Artikel {{ $article->name }}
@endsection

@section('content')
	<table>
		<thead>
			<tr>
				<th>{{ $article->name }}</th>
			</tr>

			<tr>
				<th>{{ $article->entry }}</th>
			</tr>
		</thead>
		<tbody>
			@foreach($article->comments as $comment)			
			<tr>
				<td>&nbsp</td>
			</tr>
			<tr>
				<td>
						{{ $comment->entry }}
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>
	<form action="{{ route('comments.store') }}" method="POST">
			@csrf
			<label id="article_id" name="article_id" value="$article->id">{{ $article->id }}:</label>
			<br>
			<label for="entry">Tekst:</label>
			<textarea id="entry" name="entry" required></textarea>
			<br>
			<button type="submit" id="article_id" name="article_id" value="$article->id">Opslaan</button>
	</form>
@endsection