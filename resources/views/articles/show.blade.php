@extends('layouts.app')

@section('title')
	Artikel	door {{ $article->user->name }}
@endsection

@section('content')
	<button disabled><h1>{{ $article->name }}</h1></button>
	<br><br>

	<b> {{ $article->entry }} </b>
	<br><br><br>

	@foreach($article->comments as $comment)
		&nbsp
		Commentaar door {{ $comment->user->name }}:
		<br>
		{{ $comment->entry }}
		<br><br>
	@endforeach	

	<br>

	@auth
		<br>
		<h1>{{ Auth::user()->name }} LOGGED IN!</h1>
		<br>
	

	<form action="{{ route('comments.store') }}" method="POST">
		@csrf
		<label for="entry">Commentaar</label>

		<input type="hidden" name="user_id" value="{{ Auth::id() }}">
		<input type="hidden" name="article_id" value="{{ $article->id }}">

		<br>
		
		<textarea id="entry" name="entry" required></textarea>	
		<br><br>
		
		<x-button type="submit">Opslaan</x-button>
	</form>

	@endauth
@endsection

