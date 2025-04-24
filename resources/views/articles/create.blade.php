<!DOCTYPE html>
<html>
	<head>
		<title>Schrijf Nieuw Artikel</title>
	</head>
	<body>
		@include('partials.nav')
		@yield('content')

		<h1>Schrijf Nieuw Artikel</h1>
		<form action="{{ route('articles.store') }}" method="POST">
				@csrf
				<label for="name">Naam:</label>
				<input type="text" id="name" name="name" required>
				<br>
				<label for="entry">Tekst:</label>
				<textarea id="entry" name="entry"></textarea>
				<br>
				<button type="submit">Opslaan</button>
		</form>
	</body>
</html>