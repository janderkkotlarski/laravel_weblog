@extends('layouts.app')

@section('title')
	Artikel	door {{ $article->user->name }}
@endsection

@section('content')	
	<table>
		<thead>
			<tr>
				<th><button disabled><h1>{{ $article->name }}</h1></button></th>
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
			<label for="entry">Commentaar</label>
			<br>
			<input type="hidden" name="article_id" value="{{ $article->id }}">
			<textarea id="entry" name="entry" required></textarea>	
			<br>
			<button type="submit">Opslaan</button>
	</form>
@endsection