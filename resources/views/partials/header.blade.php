<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        {{-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVOc6SRI6frO_UtZy2ZZHlbVONOXMV3Ww&callback=initMap" async defer></script> --}}
   
        <title>@yield('title', 'Dashboard')</title>
        <link rel="stylesheet" href="{{asset('css/app.css')}}">

        @vite('resources/css/app.css')
    </head>
    <body class="font-sans antialiased dark:bg-black dark:text-white/50" id="map">