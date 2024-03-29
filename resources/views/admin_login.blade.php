<!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>

<head>
    <title>Trang Admin Category Bootstrap Responsive Website Template | Login :: w3layouts</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="Visitors Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template,
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
    <!-- <meta name="csrf-token" content="{{ csrf_token() }}"> -->
    <script type="application/x-javascript">
    addEventListener("load", function() {
        setTimeout(hideURLbar, 0);
    }, false);

    function hideURLbar() {
        window.scrollTo(0, 1);
    }
    </script>
    <link rel="stylesheet" href="{{('public/backend/css/bootstrap.min.css')}}">
    <!-- //bootstrap-css -->
    <link href="{{asset('public/backend/css/style.css')}}" rel='stylesheet' type='text/css' />
    <link href="{{asset('public/backend/css/style-responsive.css')}}" rel="stylesheet" />
    <link
        href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic'
        rel='stylesheet' type='text/css'>
    <!-- font-awesome icons -->
    <link rel="stylesheet" href="{{('public/backend/css/font.css')}}" type="text/css" />
    <link href="{{asset('public/backend/css/font-awesome.css')}}" rel="stylesheet">
    <!-- //font-awesome icons -->
    <script src="{{asset('public/backend/js/jquery2.0.3.min.js')}}"></script>
</head>

<body>
    <div class="log-w3">
        <div class="w3layouts-main">
            <h2>Sign In Now</h2>
            <?php

$mess = Session::get('message');
if ($mess) {
    echo $mess;
    Session::put('message', null);
}
?>

            <form action="{{URL::to('/admin_dashboard')}}" method="post">
                @csrf
                @if($errors->has('g-recaptcha-response'))
                <span class="invalid-feedback" style="display:block">
                    <strong>{{$errors->first('g-recaptcha-response')}}</strong>
                </span>

                @endif

                <input type="text" class="ggg" name="admin_email" placeholder="E-MAIL">
                <input type="password" class="ggg" name="admin_password" placeholder="PASSWORD" required="">
                <span><input type="checkbox" />Remember Me</span>
                <h6><a href="#">Forgot Password?</a></h6>
                <div class="clearfix"></div>
                <input type="submit" value="Sign In" name="login">

                <div class="g-recaptcha" data-sitekey="{{env('CAPTCHA_KEY')}}"></div>

            </form>
            <div style="margin-left: 30px;" class="flex items-center justify-end mt-4">
                <a href="{{ URL::to('/auth/google/redirect')}}">
                    <img src="https://developers.google.com/identity/images/btn_google_signin_dark_normal_web.png">
                </a>
            </div>

            <div style="margin-left: 30px;" class="flex items-center justify-end mt-4">
                <a href="{{URL::to('/auth/github/redirect')}}">
                    <img width="100px" height="50px"
                        src="https://wiki.matbao.net/wp-content/uploads/2019/09/github-la-gi-1-1200x700.jpg">
                </a>
            </div>

            <p>Don't Have an Account ?<a href="registration.html">Create an account</a></p>
        </div>
    </div>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <script src="{{asset('public/backend/js/bootstrap.js')}}"></script>
    <script src="{{asset('public/backend/js/jquery.dcjqaccordion.2.7.js')}}"></script>
    <script src="{{asset('public/backend/js/scripts.js')}}"></script>
    <script src="{{asset('public/backend/js/jquery.slimscroll.js')}}"></script>
    <script src="{{asset('public/backend/js/jquery.nicescroll.js')}}"></script>
    <!--[if lte IE 8]><script language="javascript" type="text/javascript" src="js/flot-chart/excanvas.min.js"></script><![endif]-->
    <script src="{{('public/backend/js/jquery.scrollTo.js')}}"></script>
</body>

</html>