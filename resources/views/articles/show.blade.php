@extends('layouts.app')

@section('title')
	Artikel	
@endsection

@section('content')	
	<table>
		<thead>
			<tr>
				<th><h1>{{ $article->name }}</h1></th>
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
	<br>
	<form action="{{ route('comments.store') }}" method="POST">
			@csrf
			<label for="entry"><b>Commentaar</b></label>
			<br>
			<input type="hidden" name="article_id" value="{{ $article->id }}">
			<textarea id="entry" name="entry" required></textarea>
			<br>
			<button type="submit">Opslaan</button>
	</form>
@endsection