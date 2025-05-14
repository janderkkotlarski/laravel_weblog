@extends('layouts.app')

@section('title')
	Jouw artikelen
@endsection

@section('content')
	@foreach(session()->all() as $label=>$part)
		<x-middle_row>{{ var_dump($label) }}</x-middle_row>	
		<x-middle_row>{{ var_dump($part) }}</x-middle_row>
	@endforeach	
	
@endsection