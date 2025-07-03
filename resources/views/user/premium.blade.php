@extends('layouts.app')

@section('title')
	Premium content
@endsection

@section('content')
	<form action="{{ route('user.edit') }}" method="POST">
			@csrf
			<select id="payment" name="payment" multiple>				
				<option value="{{ true }}">Betaal</option>
				<option value="{{ false }}">Niet</option>
			</select>		
			
			<x-button type="submit">Opslaan</x-button>
	</form>
@endsection