@guest
	<x-button type="button"><a href="{{ route('user.login') }}">Log In</a></x-button>
@endguest

<x-button type="button"><a href="{{ route('articles.overview') }}">Artikeloverzicht</a></x-button>


@auth
	<x-button type="button"><a href="{{ route('user.overview') }}">Jouw Artikelen, {{ Auth::user()->name }}</a></x-button>

	<x-button type="button"><a href="{{ route('articles.create') }}">Schrijf Nieuw Artikel</a></x-button>
	
	<form action="/logout" method="POST">
		@csrf
		<br>
		<x-button type="submit">Log out</x-button>
	</form>
@endauth