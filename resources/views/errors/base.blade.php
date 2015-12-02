<html>
	<head>
		<link href="/css/errors.css" rel="stylesheet" type="text/css">
		<!--<link href='http://fonts.googleapis.com/css?family=Lato:100' rel='stylesheet' type='text/css'>-->
		<title>@yield('title')</title>
	</head>
	<body>
		<div class="container">
			<div class="content">
				<div class="title">@yield('error_msg')</div>
				<strong><a href="/user/dashboard" style="text-decoration:none; color:#B16666;">Go back.</a></strong>
			</div>
		</div>
	</body>
</html>
