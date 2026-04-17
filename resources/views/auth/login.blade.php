<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <title>{{ config('app.name', 'Cyberlink') }}</title>
      <!---------------- Fav icon starts --------------------->
    	<link rel="icon" type="image/x-icon" href="{{asset('assets/favicon/favicon.ico')}}">
        <link rel="icon" type="image/png" sizes="32x32" href="{{asset('assets/favicon/favicon-32x32.png')}}">
        <link rel="icon" type="image/png" sizes="16x16" href="{{asset('assets/favicon/favicon-16x16.png')}}">
        <link rel="icon" type="image/png" sizes="192x192" href="{{asset('assets/favicon/android-chrome-192x192.png')}}">
        <link rel="icon" type="image/png" sizes="512x512" href="{{asset('assets/favicon/android-chrome-512x512.png')}}">
        <link rel="apple-touch-icon" href="{{asset('assets/favicon/apple-touch-icon.png')}}">
        <link rel="manifest" href="{{asset('assets/favicon/site.webmanifest')}}">
      <!--<link rel="shortcut icon" type="image/x-icon" href="{{asset('theme-assets/images/favicon.png')}}">-->
    <!---------------- Fav icon stops ----------------------->
      <link rel="stylesheet" href="{{asset('css/login.css')}}">
      <link href="{{ asset('css/app.css') }}" rel="stylesheet">
   </head>
   <body>
      <main class="d-flex align-items-center min-vh-100 py-3 py-md-0">
         <div class="container">
            <div class="card login-card">
               <div class="row no-gutters">
                  <div class="col-md-6">
                     <img src="{{ asset('theme-assets/assets/2.jpg') }}" alt="login" class="login-card-img">
                 
                  </div>

                  <div class="col-md-6">
                     <div class="card-body">
                        <div class="brand-wrapper">
                           <img src="{{  asset('theme-assets/logo.svg') }}" alt="logo" width="200">
                         
                        </div>
                          <!-- Error Message -->
                            @if(session('status'))
                                <div class="alert alert-warning alert-dismissible">
                                      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                {{session('status')}}
                                </div>
                            @endif
                        <p class="login-card-description">Sign into your account</p>
                         
                        <form class="needs-validation"  method="POST" action="{{ route('login') }}">
                            {{ csrf_field() }}
                           <div class="form-group">
                              <label for="email" class="sr-only">Username</label>
                              <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}"  placeholder="Username" required >
                               @if ($errors->has('email'))
                              <div class="invalid-tooltip">
                                {{ $errors->first('email') }}
                              </div>
                               @endif
                           </div>
                           <div class="form-group">
                              <label for="password" class="sr-only">Password</label>
                              <input type="password" name="password" id="password" class="form-control" placeholder="Password" required >
                              @if ($errors->has('password'))
                              <div class="invalid-tooltip">
                                {{ $errors->first('password') }}
                              </div>
                               @endif
                           </div>
                           <div class="form-group mb-4">
                              <label for="pin" class="sr-only">PIN</label>
                              <input type="number" name="pin" id="pin" class="form-control" placeholder="PIN" required>
                              @if ($errors->has('pin'))
                              <div class="invalid-tooltip">
                                {{ $errors->first('pin') }}
                              </div>
                               @endif
                           </div>
                             <!-- Recaptcha Input -->
                            <input type="hidden" id="g_recaptcha_response" name="g_recaptcha_response" />
                           <button id="login" class="btn btn-block login-btn mb-4" type="submit">Sign In</button>                
                        </form>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </main>
      <script src="https://www.google.com/recaptcha/api.js?render={{env('SITE_KEY')}}"></script>
    <script>
    grecaptcha.ready(function() {
        grecaptcha.execute('<?php echo env("SITE_KEY"); ?>', {action: 'homepage'}).then(function(token) {
          document.getElementById('g_recaptcha_response').value=token;
        });
    });
    </script>
   </body>
   
</html>