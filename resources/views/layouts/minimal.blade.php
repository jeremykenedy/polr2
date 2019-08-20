<!--
          _____                   _______                   _____            _____
         /\    \                 /::\    \                 /\    \          /\    \
        /::\    \               /::::\    \               /::\____\        /::\    \
       /::::\    \             /::::::\    \             /:::/    /       /::::\    \
      /::::::\    \           /::::::::\    \           /:::/    /       /::::::\    \
     /:::/\:::\    \         /:::/~~\:::\    \         /:::/    /       /:::/\:::\    \
    /:::/__\:::\    \       /:::/    \:::\    \       /:::/    /       /:::/__\:::\    \
   /::::\   \:::\    \     /:::/    / \:::\    \     /:::/    /       /::::\   \:::\    \
  /::::::\   \:::\    \   /:::/____/   \:::\____\   /:::/    /       /::::::\   \:::\    \
 /:::/\:::\   \:::\____\ |:::|    |     |:::|    | /:::/    /       /:::/\:::\   \:::\____\
/:::/  \:::\   \:::|    ||:::|____|     |:::|    |/:::/____/       /:::/  \:::\   \:::|    |
\::/    \:::\  /:::|____| \:::\    \   /:::/    / \:::\    \       \::/   |::::\  /:::|____|
 \/_____/\:::\/:::/    /   \:::\    \ /:::/    /   \:::\    \       \/____|:::::\/:::/    /
          \::::::/    /     \:::\    /:::/    /     \:::\    \            |:::::::::/    /
           \::::/    /       \:::\__/:::/    /       \:::\    \           |::|\::::/    /
            \::/____/         \::::::::/    /         \:::\    \          |::| \::/____/
             ~~                \::::::/    /           \:::\    \         |::|  ~|
                                \::::/    /             \:::\    \        |::|   |
                                 \::/____/               \:::\____\       \::|   |
                                  ~~                      \::/    /        \:|   |
                                                           \/____/          \|___|

Polr, a minimalist URL shortening platform.
Copyright (C) 2013-2019 Chaoyi Zha

This program is free software; you can redistribute it and/or
modify it under the terms of the GNU General Public License
as published by the Free Software Foundation; either version 2
of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.
-->

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" ng-app="polr">
    <head>
        <meta charset="utf-8">
        @include('partials.analytics')
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        {{-- CSRF Token --}}
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', trans('polr.title')) }} @if (trim($__env->yieldContent('title')))@yield('title')@endif</title>
        @if (trim($__env->yieldContent('template_description')))
            <meta name="description" content="@yield('template_description')">
        @endif
        <link rel="shortcut icon" href="/favicon.ico">

        {{-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries --}}
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

        {{-- Styles --}}
        <link href="{{ mix('css/app.css') }}" rel="stylesheet">
        @yield('css')

        {{-- Scripts --}}
        <script>
            window.Laravel = {!! json_encode([
                'csrfToken' => csrf_token(),
            ]) !!};
        </script>
    </head>
    <body class="bg-white">
        <div id="app">
            <main>
                @yield('content')
            </main>
        </div>
        <script src="{{ mix('js/app.js') }}"></script>
        @stack('js')
    </body>
</html>
