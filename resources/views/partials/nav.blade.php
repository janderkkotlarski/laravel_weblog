<x-button type="button" a_link="{{ route('articles.overview') }}">Artikeloverzicht</x-button>

@guest
	<x-button type="button" a_link="{{ route('user.login') }}">Log In</x-button>
@endguest

@auth
	<x-button type="button" a_link="{{ route('user.overview') }}">Jouw Artikelen, {{ Auth::user()->name }}</x-button>

	<x-button type="button" a_link="{{ route('articles.create') }}">Schrijf Nieuw Artikel</x-button>

	<form action="/logout" method="POST">
		@csrf
		<br>
		<x-button type="submit">Log out</x-button>
	</form>
@endauth