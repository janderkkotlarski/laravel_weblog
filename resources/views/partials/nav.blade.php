@guest
	<button type="button"><a href="{{ route('user.login') }}">Log In</a></button>
@endguest
<button type="button"><a href="{{ route('articles.overview') }}">Artikeloverzicht</a></button>
<button type="button"><a href="{{ route('articles.create') }}">Schrijf Nieuw Artikel</a></button>

@auth
	<form action="">
	<button type="button"><a href="{{ route('user.logout') }}">Log In</a></button>
@endauth