<html lang="en">
<head>
{!! Html::style('login_css/vendor/bootstrap/css/bootstrap.min.css') !!}
{!! Html::style('login_css/fonts/font-awesome-4.7.0/css/font-awesome.min.css') !!}
{!! Html::style('login_css/fonts/Linearicons-Free-v1.0.0/icon-font.min.css') !!}
{!! Html::style('login_css/vendor/css-hamburgers/hamburgers.min.css') !!}
{!! Html::style('login_css/vendor/animsition/css/animsition.min.css') !!}
{!! Html::style('login_css/vendor/select2/select2.min.css') !!}
{!! Html::style('login_css/vendor/daterangepicker/daterangepicker.css') !!}
{!! Html::style('login_css/css/util.css') !!}
{!! Html::style('login_css/css/main.css') !!}
</head>
<body>

 <div class="limiter">
        <div class="container-login100" style="background-image: url('login_css/images/bg-01.jpg');">
            <div class="wrap-login100 p-t-30 p-b-50">
                <span class="login100-form-title p-b-41">
                    Account Login
                </span>              
                    <form method="POST" class="login100-form validate-form p-b-33 p-t-5" action="{{ route('login') }}">
                        @csrf

                            <div class="wrap-input100 validate-input">
                                <input id="email" type="email" class="input100 @error('email') is-invalid @enderror" name="email" placeholder="E-Mail Address" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                        <div class="wrap-input100 validate-input">                          
                                <input id="password" type="password" class="input100 @error('password') is-invalid @enderror" name="password"  placeholder="Password" required autocomplete="current-password">
                                    
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        
                        </div>

                   

                    
                            <div class="container-login100-form-btn m-t-32">
                                <button type="submit" class="login100-form-btn">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                            <div class="container-login100-form-btn m-t-32">
                                  @if (Route::has('register'))
                                           <a class="btn btn-link" href="{{ route('register') }}">New Register</a>
                                 @endif
                              
                            </div>
                       
                    </form>
                </div>
           
    </div>
</div>
 <div id="dropDownSelect1"></div>
    {!! Html::script('login_css/vendor/jquery/jquery-3.2.1.min.js') !!}
    {!! Html::script('login_css/vendor/animsition/js/animsition.min.js') !!}
    {!! Html::script('login_css/vendor/bootstrap/js/popper.js') !!}
    {!! Html::script('login_css/vendor/bootstrap/js/bootstrap.min.js') !!}
    {!! Html::script('login_css/vendor/select2/select2.min.js') !!}
    {!! Html::script('login_css/vendor/daterangepicker/moment.min.js') !!}
    {!! Html::script('login_css/vendor/daterangepicker/daterangepicker.js') !!}
    {!! Html::script('login_css/vendor/countdowntime/countdowntime.js') !!}
    {!! Html::script('login_css/js/main.js') !!}

</body>

</html>

