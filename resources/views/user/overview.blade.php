@extends('layouts.app')

@section('title')
	Jouw artikelen
@endsection

@section('content')
	@foreach(session()->all() as $label=>$part)
		<tr><td></td><td>
			{{ var_dump($label) }}
		</td><td></td></tr>
		<tr><td></td><td>
			{{ var_dump($part) }}
		</td><td></td></tr>
	@endforeach	
	
@endsection