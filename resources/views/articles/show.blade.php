@extends('layouts.app')

@section('title')
	Artikel	van {{ $article->user->name }} om {{ $article->created_at }}:
@endsection

@section('content')
	<button disabled><h1>{{ $article->name }}</h1></button>
	<br><br>

	<b>{{ $article->entry }}</b>
	<br><br><br>

	@foreach($article->files as $file)
		&nbsp
		{{ $file->file_path }}

		{{ asset($file->file_path) }}
		<img src="{{ asset($file->file_path) }}" alt="{{ $file->name }}">
		<br>
	@endforeach


	@foreach($article->comments as $comment)
		&nbsp
		Commentaar van {{ $comment->user->name }} om {{ $comment->created_at }}:
		<br>
		<b>{{ $comment->entry }}</b>
		<br><br>
	@endforeach	

	<br>

	@auth
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

