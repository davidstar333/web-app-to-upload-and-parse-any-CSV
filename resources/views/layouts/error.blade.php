<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>{{$settings->app_name}} | @if(isset($subpage)){{$subpage}} @else Error @endif</title>
  <meta name="title" content="{{$settings->meta_title}}" />
  <meta name="description" content="{{$settings->meta_description}}" />
  <meta name="keywords" content="{{$settings->meta_keywords}}" />
  <meta name="description" content="web app to upload and parse any csv" />
  <meta name="keywords" content="upload csv,parse csv" />
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="shortcut icon" href="{{asset('assets/favicon').'/'.$settings->fav_icon}}" type="image/x-icon">
  <link rel="stylesheet" href="{{ asset('assets/vendor/bootstrap-4.3.1-dist/css/bootstrap.min.css') }}" />
  <link rel="stylesheet" href="{{ asset('assets/vendor/fontawesome-free-5.7.2-web/css/all.css') }}" />
  <link rel="stylesheet" href="{{ asset('assets/css/styles-merged.css') }}" />
  <link rel="stylesheet" href="{{ asset('assets/css/style.min.css') }}" />
  <link rel="stylesheet" href="{{ asset('assets/fonts/icomoon/style.min.css') }}" />
  <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" />
  @yield('styles')
  <!--[if lt IE 9]>
      <script src="js/vendor/html5shiv.min.js"></script>
      <script src="js/vendor/respond.min.js"></script>
    <![endif]-->
</head>

<body class="{{$index}}">

  <!-- Fixed navbar -->
  <nav class="navbar navbar-default probootstrap-navbar">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse"
          aria-expanded="false" aria-controls="navbar">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="/" title="Logo">
          <img src="{{asset('assets/logo').'/'.$settings->logo}}" width="220" height="42" style="margin-top: -10px;" alt="logo">
        </a>
      </div>

      <div id="navbar-collapse" class="navbar-collapse collapse">
        <ul class="nav navbar-nav navbar-right">
          <li><a href="#" data-nav-section="home">Home</a></li>
          <li><a href="#" data-nav-section="pricing">Pricing</a></li>
          <li><a href="#" data-nav-section="reviews">Reviews</a></li>
          <li><a href="#" data-nav-section="contact">Contact</a></li>
        </ul>
      </div>
    </div>
  </nav>

  @yield('content')

  <footer class="probootstrap-footer">
    <div class="container text-center">
      <div class="row">
        <div class="col-md-12">
          &copy; 2019 All Rights Reserved.
        </div>
      </div>
    </div>
  </footer>

  <a id="qodef-back-to-top" href="#" class="on" style="display: none">
      <span class="qodef-icon-stack">
        <i class="qodef-icon-font-awesome fa fa-chevron-up "></i>
      </span>
  </a>

  <div id="signup-modal" class="modal fade" role="dialog">
    <div class="modal-dialog">

      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h3 class="modal-title">Sign up</h3>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-sm-12">
              <form  method="POST" id="signup-form" action="{{ route('register') }}" accept-charset="utf-8" class="myform form" role="form">
                @csrf
                <div class="row">
                  <div class="col-xs-6 col-md-6">
                    <input type="text" name="f_name" id="f_name" value="" class="form-control input-lg" placeholder="First Name" required autofocus />
                  </div>
                  <div class="col-xs-6 col-md-6">
                    <input type="text" name="l_name" id="l_name" value="" class="form-control input-lg" placeholder="Last Name" required />
                  </div>
                </div>
                <input type="email" name="email" id="email" value="" class="form-control input-lg" placeholder="Your Email" required />
                <span class="invalid-feedback pb20 hide" role="alert" id="up-email-alert"></span>
                @if ($errors->has('email'))
                    <span class="invalid-feedback pb20" role="alert">
                        {{ $errors->first('email') }}
                    </span>
                @endif
                <input type="password" name="password" id="password" value="" class="form-control input-lg" placeholder="Password" required />
                <input type="password" name="password_confirmation" id="password-confirm" value="" class="form-control input-lg" placeholder="Confirm Password" required />
                <span class="invalid-feedback pb20 hide" role="alert" id="up-pwd-alert"></span>
                @if ($errors->has('password'))
                    <span class="invalid-feedback pb20" role="alert">
                        {{ $errors->first('password') }}
                    </span>
                @endif
                <label>Birth Date</label>
                <div class="row">
                  <div class="col-xs-4 col-md-4">
                    <select name="month" class="form-control input-lg">
                      <option value="">Month</option>
                      <option value="01">Jan</option>
                      <option value="02">Feb</option>
                      <option value="03">Mar</option>
                      <option value="04">Apr</option>
                      <option value="05">May</option>
                      <option value="06">Jun</option>
                      <option value="07">Jul</option>
                      <option value="08">Aug</option>
                      <option value="09">Sep</option>
                      <option value="10">Oct</option>
                      <option value="11">Nov</option>
                      <option value="12">Dec</option>
                    </select>
                  </div>
                  <div class="col-xs-4 col-md-4">
                    <select name="day" class="form-control input-lg">
                      <option value="">Day</option>
                      <option value="01">1</option>
                      <option value="02">2</option>
                      <option value="03">3</option>
                      <option value="04">4</option>
                      <option value="05">5</option>
                      <option value="06">6</option>
                      <option value="07">7</option>
                      <option value="08">8</option>
                      <option value="09">9</option>
                      <option value="10">10</option>
                      <option value="11">11</option>
                      <option value="12">12</option>
                      <option value="13">13</option>
                      <option value="14">14</option>
                      <option value="15">15</option>
                      <option value="16">16</option>
                      <option value="17">17</option>
                      <option value="18">18</option>
                      <option value="19">19</option>
                      <option value="21">21</option>
                      <option value="22">22</option>
                      <option value="23">23</option>
                      <option value="24">24</option>
                      <option value="25">25</option>
                      <option value="26">26</option>
                      <option value="27">27</option>
                      <option value="28">28</option>
                      <option value="29">29</option>
                      <option value="30">30</option>
                      <option value="31">31</option>
                    </select>
                  </div>
                  <div class="col-xs-4 col-md-4">
                    <select name="year" class="form-control input-lg">
                      <option value="">Year</option>
                      @for($i=1950; $i < 2019; $i++)
                        <option value="{{$i}}">{{$i}}</option>
                      @endfor
                    </select>
                  </div>
                </div>
                <label>Gender : </label>
                <label class="radio-inline">
                  <input type="radio" name="gender" value="M" id=male />Male
                </label>
                <label class="radio-inline">
                  <input type="radio" name="gender" value="F" id=female />Female
                </label>
                <br />
                <span class="help-block">By clicking Create my account, you agree to our Terms and that you have read our Data Use
                  Policy, including our Cookie Use.</span>
                <button class="btn btn-lg btn-primary btn-block signup-btn mb20" type="submit">
                    <span class="signup-btn-text">Create my account</span><div class="spinner-border alert-white center hide" id="signup-spinner"></div>
                </button>
                <p class="text-center mb10">Already have an account? <a href="#" id="to-signin">Sign in here</a>.</p>
              </form>
            </div>
          </div>
        </div>
      </div>
  
    </div>
  </div>
  <input type="hidden" name="signin_show" id="signin_show" value="{{ $errors->has('email') ? 'show' : 'hide' }}" />
  <div id="signin-modal" class="modal fade" role="dialog">
    <div class="modal-dialog">

      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h3 class="modal-title">Sign in</h3>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-sm-12">
              <form  method="POST" action="{{ route('login') }}" id="signin-form" accept-charset="utf-8" class="myform form" role="form">
                <input type="hidden" name="_token" id="_token" value="{{csrf_token()}}" />
                <label for="email">Email:</label>
                <input type="email" name="email" id="email" class="form-control input-lg{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="Your Email" value="{{ old('email') }}" required autofocus />
                <span class="invalid-feedback pb20 hide" role="alert" id="in-email-alert"></span>
                @if ($errors->has('email'))
                    <span class="invalid-feedback pb20" role="alert">
                        {{ $errors->first('email') }}
                    </span>
                @endif
                <label class="left" for="password">Password: </label>
                @if (Route::has('password.request'))
                    <a class="btn btn-link forgot-pwd right" href="{{ route('password.request') }}">
                        {{ __('Forgot Your Password?') }}
                    </a>
                @endif
                <div class="clear"></div>
                <input type="password" name="password" id="password" value="" class="form-control input-lg mb20{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="Password" required />
                <span class="invalid-feedback pb20 hide" role="alert" id="in-pwd-alert"></span>
                @if ($errors->has('password'))
                    <span class="invalid-feedback pb20" role="alert">
                        {{ $errors->first('password') }}
                    </span>
                @endif
                <input type="checkbox" name="remember_me" id="remember_me" /> <label for="remember_me">Remember me</label>
                <br />
                <br />
                <button class="btn btn-lg btn-primary btn-block signin-btn mb20" type="button">
                    <span class="signin-btn-text">Sign in</span><div class="spinner-border alert-white hide center" id="signin-spinner"></div>
                </button>
                <p class="text-center mb10">Don't have an account? <a href="#" id="to-signup">Sign up here</a>.</p>
              </form>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>

  <script src="{{ asset('assets/js/scripts.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/bootstrap-4.3.1-dist/js/bootstrap.min.js') }}"></script>
  <script src="{{ asset('assets/js/script.js') }}"></script>
  @yield('scripts')
</body>

</html>