<!DOCTYPE html>
<html lang="ru-Ru">

<?
header('Last-Modified: ' . gmdate( 'D, d M Y H:i:s') . ' GMT');
header('Cache-Control: no-store, no-cache, must-revalidate');
header('Cache-Control: post-check=0, pre-check=0', false);
header('Pragma: no-cache');
?>
<head>
    <title>
        ХТК
    </title>
    <link rel="stylesheet" href="{{mix('css/app.css')}}">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="format-detection" content="telephone=yes">

    <link rel="stylesheet" href="{{url('vendor/range/nouislider.css')}}">
</head>

<body>
    <div id="app">
        <header-main
        :url="'{{url('/')}}'">

        </header-main>
        @yield('content')
        <footer-main>

        </footer-main>
    </div>

</body>

<script defer="defer" src="{{asset('js/app.js')}}" type="text/javascript"></script>
<script src="https://kit.fontawesome.com/d3ae2cb64f.js" crossorigin="anonymous"></script>
