<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    @yield('head')
    @sectionMissing('head')
        <head>
            @yield('head_start')
            
            <x-laravel-users::meta :page="$page" />

            @yield('head_end')
        </head>
    @endif

    @yield('body')
    @sectionMissing('body')
        <body>
            @yield('body_start')
            
            @yield('body_end')
        </body>
    @endif
</html>
