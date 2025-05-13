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
				font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', sans-serif;
				color: #f0d0b0;
				background-color: #206060;
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
			textarea, input, button {
				color: #d0f0b0;
				background-color: #404040;
				border-radius: 20px;
				padding: 10px;
			}
			button h1 {
				color: #b0d0f0;
				margin: 20px;				
			}
			label {
				font-weight: bold;
			}		  
		</style>
	</head>
	<body>
		<table>
			<tbody>
				<tr><td></td><td>
					@include('partials.nav')
				</td><td></td></tr>

				<tr><td></td><td>
					<h1>@yield('title')</h1>
				</td><td></td></tr>
			
				<tr><td></td><td>
					@yield('content')
				</td><td></td></tr>
			</tbody>
		</table>
	</body>
</html>