<!DOCTYPE html>
<!--[if IE 8]><html lang="en" class="ie8"><![endif]-->
<!--[if IE 9]><html lang="en" class="ie9"><![endif]-->
<!--[if !IE]><!--><html lang="en"><!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="{{$viewPort}}">
    <meta name="description" content="{{$description}}">
    <meta name="keywords" content="{{$keywords}}">
    <meta name="author" content="{{$author}}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Gow-Mac</title>
    <link rel="icon" type="image/png" href="{{ asset($icon) }}">
    <link href="{{url( '/css/app.css' )}}" rel="stylesheet">
    <script>window.Laravel = {!! json_encode(['csrfToken' => csrf_token()]) !!};</script>
</head>
<body>
<div id="app">
    <div class="wrapper">
        <nav-top
                :user-info="info.user"
                v-on:loading-page="findAndLoad"

        >
        </nav-top>
        <public-pages v-on:fetch-page="getPage" :info="location"></public-pages>




    </div>
</div>
@include('layouts.footer.footer-1', ['type' => 'main'])

<script src="{{ url('/js/pages/home.js') }}"></script>
<script src="{{ url('/js/vendor.js') }}"></script>
<script src="{{ url('/js/scripts.js') }}"></script>



</body>
</html>