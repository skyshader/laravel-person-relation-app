<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Relationship Builder</title>

        <!-- CSS And JavaScript -->
        <link rel="stylesheet" href="{{ elixir('css/app.css') }}">
        <link rel="stylesheet" href="/css/select2.min.css">
    </head>

    <body>

        <nav class="navbar navbar-default">
            <!-- Navbar Contents -->
        </nav>

        <div class="container-fluid">
            @yield('content')
        </div>

        <script src="https://code.jquery.com/jquery-2.2.0.min.js"></script>
        <script src="/js/bootstrap.min.js"></script>
        <script src="/js/select2.min.js"></script>
        <script src="/js/app.js"></script>
    </body>
</html>