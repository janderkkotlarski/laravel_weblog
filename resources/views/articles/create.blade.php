@extends('layouts.app')

@section('title')
	Schrijf Nieuw Artikel
@endsection

@section('content')
	<form action="{{ route('articles.store') }}" method="POST" enctype="multipart/form-data">
		<x-article_form :$categories :$user/>
	</form>	

	<x-errors />
@endsection