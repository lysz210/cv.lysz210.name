<!DOCTYPE html>
<html lang="{{ App::currentLocale() }}">
	<head>
		<meta charset="utf-8">

		<!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame
		Remove this if you use the .htaccess -->
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

		<title>@yield('page-title')</title>
    @yield('head')
    </head>

	<body>
    @yield('body')
    </body>
</html>
