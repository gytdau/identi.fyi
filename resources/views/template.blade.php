<!DOCTYPE html>
<html>
    <head>
	
        <link rel="stylesheet" href="https://bootswatch.com/flatly/bootstrap.min.css">
        <link rel="stylesheet" href="/shadows.css">
		
		@yield('head')
		
    </head>
    <body class="@yield('body-class')">
        <div class="container">
            @yield('content')
        </div>
    </body>
</html>