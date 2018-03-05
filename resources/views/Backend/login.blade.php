<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Login to Admin Panel</title>

    <link rel="stylesheet" href="{{URL::to('/css/app.css')}}">
    <!-- Font Awesome -->
    <link href="{{URL::to('lib/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="{{URL::to('css/custom.min.css')}}" rel="stylesheet">

</head>

<body class="login">
<div>
    <div class="login_wrapper">
        <div class="animate form login_form">
            <section class="login_content">
                <form method="post" action="{{route('admin-login')}}">
                    <h1>Login</h1>
                    {{csrf_field()}}
                    <div>
                        <input type="text" class="form-control" placeholder="Email" name="email"/>
                    </div>
                    <div>
                        <input type="password" class="form-control" placeholder="Password" name="password"/>
                    </div>

                    <div>
                        <label class="pull-left" for="remember">
                            <input type="checkbox" name="remember_me" class="pull-left">
                            &nbsp; Remember Me
                        </label>
                    </div>

                    <div>
                        <button type="submit" class="btn btn-default submit pull-right" href="index.html">Log in
                        </button>
                    </div>
                    <div class="clearfix"></div>
                    <br>

                    <div class="separator">
                        <p class="change_link">New to site?
                            <a href="#signup" class="to_register"> Create Account </a>
                        </p>

                        <div class="clearfix"></div>
                        <br/>

                        <div>
                            <h1><i class="fa fa-lock"></i> It tranining Nepal</h1>
                            <p>©2018 All Rights Reserved. Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                Accusantium </p>
                        </div>
                    </div>
                </form>
            </section>
        </div>

    </div>
</div>
</body>
</html>
