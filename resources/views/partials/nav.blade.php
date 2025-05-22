@guest
	<a href="{{ route('user.login') }}"><x-button type="button">Log In</x-button></a>
@endguest



<a href="{{ route('articles.overview') }}"><x-button type="button" :a_link="{{ 'Hello' }}">Artikeloverzicht</x-button></a>

@auth
	<a href="{{ route('user.overview') }}">
		<x-button type="button">Jouw Artikelen, {{ Auth::user()->name }}</x-button>
	</a>
	
	<a href="{{ route('articles.create') }}">
		<x-button type="button">Schrijf Nieuw Artikel</x-button>
	</a>
	
	<form action="/logout" method="POST">
		@csrf
		<br>
		<x-button type="submit">Log out</x-button>
	</form>
@endauth