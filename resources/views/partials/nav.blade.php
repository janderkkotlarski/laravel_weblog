@guest
	<x-button type="button"><a href="{{ route('user.login') }}">Log In</a></x-button>
@endguest
<x-button type="button"><a href="{{ route('articles.overview') }}">Artikeloverzicht</a></x-button>
<x-button type="button"><a href="{{ route('articles.create') }}">Schrijf Nieuw Artikel</a></x-button>

@auth
	<form action="">
		<x-button type="button"><a href="{{ route('user.logout') }}">Log out</a></x-button>
	</form>
@endauth