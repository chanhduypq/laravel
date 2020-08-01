<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <title>@yield('title')</title>
        <link rel="stylesheet" href="{{ URL::asset('css/style.css') }}" />
        <link rel="stylesheet" href="{{ URL::asset('css/bootstrap/bootstrap.css') }}" />
    </head>
    <body>
        @include('layouts.school_manager.menu')
        <div class="container">
            <div class="col-12">
                @yield('content')
            </div>
        </div>

        <script type="text/javascript" src="{{ URL::asset('js/jquery-2.0.3.js') }}"></script>
        <script src="{{ URL::asset('js/bootstrap/bootstrap.bundle.js') }}"></script>
        <script src="{{ URL::asset('js/bootstrap/bootstrap.min.js') }}"></script>

        @yield('script')
        @yield('script_page')
    </body>
</html>