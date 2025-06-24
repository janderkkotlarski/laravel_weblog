@extends('layouts.app')

@section('title')
	Categorieoverzicht
@endsection

@section('content')
	<tr>
		<th>Naam</th>
        <th>Artikelnummers</th>
		<th>Aanmaaktijd</th>
	</tr>

	@foreach($categories as $category)
		<tr>
			<td>{{ $category->name }}</td>
            <td>
				@foreach($category->articles as $article)
					[{{ $article->id }}]
				@endforeach
			</td>
            <td>{{ $category->created_at }}</td>
		</tr>
	@endforeach
@endsection