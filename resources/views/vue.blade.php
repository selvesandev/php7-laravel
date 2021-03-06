<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{URL::to('/css/app.css')}}">
</head>
<body>
<div id="app">
    <nav-component></nav-component>

    <div class="container">
        <router-view></router-view>
    </div>

</div>
<script>
    var server = {
        _url: '{{URL::to('/')}}',
        _token: '{{csrf_token()}}'
    };
</script>

<script type="text/javascript" src="{{URL::to('/js/vuecomponent.js')}}"></script>
</body>
</html>