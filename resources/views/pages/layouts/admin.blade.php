<!DOCTYPE html>
<html lang="ru-Ru">

<?
header('Expires: Sat, 03 Aug 2013 00:00:00 GMT');
header('Last-Modified: ' . gmdate( 'D, d M Y H:i:s') . ' GMT');
header('Cache-Control: no-store, no-cache, must-revalidate');
header('Cache-Control: post-check=0, pre-check=0', false);
header('Pragma: no-cache');
?>
<head>
    <title>
        Панель управления
    </title>
    <link rel="stylesheet" href="{{mix('css/app.css')}}">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="format-detection" content="telephone=yes">

    <link rel="stylesheet" href="{{url('vendor/range/nouislider.css')}}">
</head>

<body>
    <div id="app">
        <admin-menu
        :url="'{{ url('/admin') }}'">

        </admin-menu>
        @yield('content')
    </div>

</body>

<script defer="defer" src="{{asset('js/app.js')}}" type="text/javascript"></script>
