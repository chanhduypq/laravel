<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <title>@yield('title')</title>
    </head>
    <body>
        <div class="container">
            <div class="col-12">
                @yield('content')
            </div>
        </div>
    </body>
</html>