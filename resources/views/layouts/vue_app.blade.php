<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        @include('includes/header_vue')
    </head>
    <body> 
    	<div id="app">   
        	@yield('content')
        </div>
    </body>
</html>

