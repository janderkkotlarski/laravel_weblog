@extends('layouts.app')

@section('title')
	Jouw artikelen
@endsection

@section('content')
	{{ var_dump($_COOKIE) }}
	<br>

	{{ var_dump(session()->all()) }}
@endsection