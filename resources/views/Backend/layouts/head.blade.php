<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title','Welcome')</title>

    <link rel="stylesheet" href="{{URL::to('/css/app.css')}}">


    <!-- Font Awesome -->
    <link href="{{URL::to('lib/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
    <!-- NProgress -->
    <link href="{{URL::to('lib/nprogress/nprogress.css')}}" rel="stylesheet">

    <!-- Date time picker -->
    <link href="{{URL::to('lib/bootstrap-datetimepicker/datetimepicker.css')}}" rel="stylesheet">

@yield('my-css')

<!-- Custom Theme Style -->
    <link href="{{URL::to('css/custom.min.css')}}" rel="stylesheet">

</head>

<body class="nav-md">
