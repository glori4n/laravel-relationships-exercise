<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>

        <!-- CSS only -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
        <link rel="stylesheet" href="/css/style.css">

        <!-- jQuery CDN -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> 

    </head>
    <body>
        <a href="/" class="container"><small>Go Back to Relationships</small></a>
        <!-- Page Content -->
        @yield('content')

        <!-- Footer -->
        <footer style="text-align:center" class="mt-5">This snippet was made by © Glori4n (<a href="https://glori4n.net" target="new">https://glori4n.net</a>)</footer>
    </body>
</html>
