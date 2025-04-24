<!DOCTYPE html>
<html>
	<head>
		<title>@yield('title')</title>
	</head>
	<body>
		@include('partials.nav')

		<h1>@yield('title')</h1>

		@yield('content')
	</body>
</html>