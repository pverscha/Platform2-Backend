{{-- This view defines all content for the HTML head-tag and should be present at each page. --}}

<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Platform - @yield('title')</title>

<!-- Material Design Lite stylesheets -->
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.blue-red.min.css" />

<!-- Material Design Lite script -->
<script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>

<!-- jQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script src="{{ URL::asset('js/app.js') }}"></script>

<!-- Own style -->
<link rel="stylesheet" href="{{ URL::asset('css/backend/app.css') }}">
<!-- All supported icons -->
<link rel="stylesheet" href="{{ URL::asset('css/icons.css') }}">
<link rel="stylesheet" href="{{ URL::asset('css/icon-font.css') }}">

@yield('custom-header')
