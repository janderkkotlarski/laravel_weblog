@extends('layouts.app')

@section('title')
	Verwijder {{ $article->name }}?
@endsection

@section('content')			
    <x-button type="submit" a_link="{{ route('articles.destroy', $article) }}">
        Verwijderen
    </x-button>
@endsection