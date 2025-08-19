@extends('layouts.app')

@section('title')
	Verander {{ $article->name }}
@endsection

@section('content')
	<form action="{{ route('articles.update', $article) }}" method="POST" enctype="multipart/form-data">
		@method('PATCH')

		<x-article_form  :$categories :$user :$article/>			
	</form>

	<x-errors />
@endsection
