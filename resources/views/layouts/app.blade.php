<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport"
					content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<title>@yield('title')</title>
		<style>
			body {
				color: #f0f0a0;
				background-color: #207070;
				padding: 7px;
				border: 14px;
				height: 30px;
			}
			td {
				text-align: center;
			}
			nav {
				background-color: #606060;
				border: 3px solid #303030;
				border-radius: 20px;	
				padding: 7px;
			}
			a {
				color: #f0a0a0;
			}
			nav a {				
				background-color: #404040;
				border: 3px solid #303030;
				border-radius: 20px;	
				padding: 7px;				
			}
		  
		</style>
	</head>
	<body>
		@include('partials.nav')

		<h1>@yield('title')</h1>

		@yield('content')
	</body>
</html>