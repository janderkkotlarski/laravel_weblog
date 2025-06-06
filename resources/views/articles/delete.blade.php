@extends('layouts.app')

@section('title')
	Verwijder {{ $article->name }}
@endsection

@section('content')
	
			
    <x-button type="submit">Verwijderen</x-button>

@endsection