<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Cyberlink') }}</title>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- // -->
    <!-- Theme CSS -->
    <link rel="stylesheet" type="text/css"
        href="{{ asset(env('PUBLIC_PATH') . 'assets/skin/default_skin/css/theme.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset(env('PUBLIC_PATH') . 'assets/skin/default_skin/css/theme2.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset(env('PUBLIC_PATH') . 'assets/skin/default_skin/css/theme3.css') }}">

    <!-- Admin Forms CSS -->
    <link rel="stylesheet" type="text/css"
        href="{{ asset(env('PUBLIC_PATH') . 'assets/admin-tools/admin-forms/css/admin-forms.css') }}">

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset(env('PUBLIC_PATH') . 'assets/img/favicon.ico') }}">
    <!-- // -->

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body class="external-page external-alt sb-l-c sb-r-c bg-light">
    <div id="app">
        <!-- Start: Main -->
        <div id="main" class="animated fadeIn">
            <!-- Start: Content-Wrapper -->
            <section id="content_wrapper">

                <!-- Begin: Content -->
                <section id="content">

                    <div class="admin-form theme-info mw500" id="login">

                        <!-- Login Logo -->
                        <div class="row table-layout">
                            <?php /* ?> ?> ?><a href="#" title="Return to Dashboard">
                                <img src="{{ asset('theme-assets/images/adventure-logo.png') }}"
                                    title="AdminDesigns Logo" class="center-block img-responsive"
                                    style="max-width: 500px;">
                            </a> <?php */ ?>
                            <h3 class="text-center"> {{ config('app.name', 'Admin Login') }} </h3>
                        </div>

                        <!-- Error Message -->
                        @if (session('status'))
                            <div class="alert alert-success alert-dismissible">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                {{ session('status') }}
                            </div>
                        @endif

                        <!-- Login Panel/Form -->
                        <div class="panel mt30 mb25">

                            <!--  -->
                            <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                                {{ csrf_field() }}
                                <div class="panel-body bg-white p25 pb15" style="border-radius: 15px;">

                                    <!-- Social Login Buttons -->
                                    <div class="section row"> </div>

                                    <!-- Divider -->
                                    <div class="section-divider1 mv30">

                                    </div>

                                    <!-- Username Input -->
                                    <div class="section {{ $errors->has('email') ? ' has-error' : '' }}">
                                        <label for="username" class="field-label text-muted fs18 mb10">Username</label>
                                        <label for="username" class="field prepend-icon">
                                            <!--  <input type="text" name="username" id="username" class="gui-input" placeholder="Enter username"> -->
                                            <input id="email" type="email" class="form-control" name="email"
                                                value="{{ old('email') }}" required class="gui-input"
                                                placeholder="Enter username">
                                            <label for="username" class="field-icon">
                                                <i class="fa fa-user"></i>
                                            </label>
                                        </label>

                                        @if ($errors->has('email'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                        @endif
                                    </div>

                                    <!-- Password Input -->
                                    <div class="section {{ $errors->has('email') ? ' has-error' : '' }}">
                                        <label for="username" class="field-label text-muted fs18 mb10">Password</label>
                                        <label for="password" class="field prepend-icon">
                                            <input id="password" type="password" class="form-control" name="password"
                                                required class="gui-input" placeholder="Enter password">
                                            <label for="password" class="field-icon">
                                                <i class="fa fa-lock"></i>
                                            </label>
                                        </label>
                                        @if ($errors->has('password'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                        @endif
                                    </div>

                                    <!--PIN-->
                                    <div class="section">
                                        <label for="username" class="field-label text-muted fs18 mb10">PIN</label>
                                        <label for="username" class="field prepend-icon">
                                            <input id="pin" type="password" class="form-control" name="pin"
                                                required class="gui-input" placeholder="Enter PIN">
                                            <label for="pin" class="field-icon">
                                                <i class="fa fa-lock"></i>
                                            </label>
                                        </label>
                                        @if ($errors->has('pin'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('pin') }}</strong>
                                            </span>
                                        @endif
                                    </div>

                                    <!-- Recaptcha Input -->
                                    <input type="hidden" id="g_recaptcha_response" name="g_recaptcha_response" />

                                </div>

                                <div class="panel-footer clearfix">
                                    <button type="submit" class="button btn-primary mr10 pull-right">Login</button>
                                    <label class="switch ib switch-primary mt10">

                                        <!-- <a class="btn btn-link" href="{{-- route('password.request') --}}">
                Forgot Your Password?
              </a> -->
                                    </label>
                                </div>

                            </form>
                        </div>
                        <!-- End Login Panel/Form -->

                        <!-- Registration Links -->
                        <div class="login-links">
                            <p>
                                <a class="btn btn-link" href="http://cyberlink.com.np/" target="_blank">
                                    &copy; 2024 {{ env('APP_NAME') }}
                                </a>
                            </p>
                            <!-- <p>Haven't yet Registered?
              <a href="pages_login-alt.html" title="Sign In">Sign up here</a>
            </p> -->
                        </div>

                        <!-- Registration Links(alt) -->
                        <div class="login-links hidden">
                            <a href="pages_forgotpw(alt).html" class="active" title="Sign In">Sign In</a> |
                            <a href="pages_register(alt).html" class="" title="Register">Register</a>
                        </div>

                    </div>

                </section>
                <!-- End: Content -->

            </section>
            <!-- End: Content-Wrapper -->

        </div>
        <!-- End: Main -->
    </div>

    <!-- jQuery -->
    <script src="{{ asset(env('PUBLIC_PATH')) }}vendor/jquery/jquery-1.11.1.min.js"></script>
    <script src="{{ asset(env('PUBLIC_PATH')) }}vendor/jquery/jquery_ui/jquery-ui.min.js"></script>

    <!-- Theme Javascript -->
    <script src="{{ asset(env('PUBLIC_PATH')) }}assets/js/utility/utility.js"></script>
    <script src="{{ asset(env('PUBLIC_PATH')) }}assets/js/demo/demo.js"></script>
    <script src="{{ asset(env('PUBLIC_PATH')) }}assets/js/main.js"></script>

    <script src="https://www.google.com/recaptcha/api.js?render={{ env('SITE_KEY') }}"></script>
    <script>
        grecaptcha.ready(function() {
            grecaptcha.execute('<?php echo env('SITE_KEY'); ?>', {
                action: 'homepage'
            }).then(function(token) {
                document.getElementById('g_recaptcha_response').value = token;
            });
        });
    </script>
</body>

</html>
