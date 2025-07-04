@extends('layouts.app')

@section('title')
	Premium content
@endsection

@section('content')	
	<form action="{{ route('user.edit') }}" method="POST">
			@csrf
			<select id="payment" name="payment" multiple required>				
				<option value="1">Doekoes</option>
				<option value="0">Skeer</option>
			</select>
			
			<br><br>
			
			<x-button type="submit">Betaal nu</x-button>
	</form>
@endsection