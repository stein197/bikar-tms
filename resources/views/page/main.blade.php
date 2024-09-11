<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>@yield('title')</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    </head>
    <body>
        @auth
            <header>
                <nav class="navbar navbar-expand-lg navbar-light bg-light">
                    <div class="container d-flex justify-items">
                        <a class="navbar-brand" href="#">Tasks</a>
                        <div>
                            <span class="code">{{ auth()->user()->name }}</span>
                            <a class="link" href="/logout">Logout</a>
                        </div>
                    </div>
                </nav>
            </header>
        @endauth
        @yield('content')
    </body>
</html>
