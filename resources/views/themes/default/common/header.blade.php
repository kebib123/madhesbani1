<!DOCTYPE html>
<html lang="en">
<head prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb# website: http://ogp.me/ns/website#">
    <meta property="fb:pages" content="811420395646383"/>
    <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="keywords"
          content="@yield('meta_keyword')">
    <meta name="description"
          content="@yield('meta_description')">
    <meta name="google_verification" content="">
    <title> {{$setting->site_name}}- @yield('title') </title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('themes-assets/')}}/images/favicon.ico">
    <!-- bootstrap styles-->
    <link href="{{asset('themes-assets/css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- google font -->
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,700,600,800' rel='stylesheet' type='text/css'>
    <!-- ionicons font -->
    <link href="{{asset('themes-assets/css/font-awesome.css')}}" rel="stylesheet">
    <!-- animation styles -->
    <link rel="stylesheet" href="{{asset('themes-assets/css/animate.css')}}"/>
    <!-- custom styles -->
    <link href="{{asset('themes-assets/css/style.css')}}" rel="stylesheet">
    <!-- owl carousel styles-->
    <link rel="stylesheet" href="{{asset('themes-assets/css/owl.carousel.css')}}">
    <link rel="stylesheet" href="{{asset('themes-assets/css/owl.transitions.css')}}">
    <!-- prettyPhoto popup styles -->
    <link rel="stylesheet" href="{{asset('themes-assets/css/prettyPhoto.css')}}">

    <meta property="og:type" content="website"/>
    <meta property="og:title" content="@yield('title')"/>
    <meta property="og:url" content="{{url()->current()}}"/>
    <meta property="og:site_name" content="{{$setting->site_name}}"/>
    <meta property="og:description" content="@yield('brief')"/>

    @if (trim($__env->yieldContent('thumbnail')))
        <meta property="og:image"
              content="{{ asset( env('PUBLIC_PATH') . 'uploads/original/' ) }}/@yield('thumbnail')"/>
    @else
        <meta property="og:image" content="{{asset(env('PUBLIC_PATH').'/themes-assets')}}/images/logo.png"/>
    @endif
    <meta property="og:image:width" content="1000"/>
    <meta property="og:image:height" content="600"/>

    <meta name="twitter:image" content="{{ asset( env('PUBLIC_PATH') . 'uploads/original/' ) }}/@yield('thumbnail')"/>
    <meta name="twitter:url" content="{{url()->current()}}">
    <meta name="twitter:title" content="@yield('title')">
    <meta name="twitter:description" content="@yield('brief')">
    <meta name="twitter:card" content="summary_large_image"/>


    <!-- sharethis code -->
    <script type="text/javascript"
            src="//platform-api.sharethis.com/js/sharethis.js#property=5a44765c9d192f001374356b&product=inline-share-buttons"></script>
    <script src="{{asset('themes-assets/js/jquery.min.js')}}"></script>

    <!-- Start Alexa Certify Javascript -->
    <script type="text/javascript">
        _atrk_opts = {atrk_acct: "xp3Mn1QolK10uG", domain: "madheshvani.com", dynamic: true};
        (function () {
            var as = document.createElement('script');
            as.type = 'text/javascript';
            as.async = true;
            as.src = "https://d31qbv1cthcecs.cloudfront.net/atrk.js";
            var s = document.getElementsByTagName('script')[0];
            s.parentNode.insertBefore(as, s);
        })();
    </script>
    <noscript><img src="https://d5nxst8fruw4z.cloudfront.net/atrk.gif?account=xp3Mn1QolK10uG" style="display:none"
                   height="1" width="1" alt=""/></noscript>
    <!-- End Alexa Certify Javascript -->
</head>
<body>
<div id="fb-root"></div>
<script>(function (d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s);
        js.id = id;
        js.src = 'https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.11';
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
</script>

<div class="wsmenucontainer clearfix">
    <div class="overlapblackbg"></div>
    <div class="wsmobileheader clearfix">
        <a id="wsnavtoggle" class="animated-arrow"><span></span></a>
        <a class="smallogo"><img src="{{asset(env('PUBLIC_PATH').'/themes-assets')}}/images/logo-small.png" alt="logo" width="87"></a>
        <a class="callusicon" href="tel: "><span class="fa fa-phone"></span></a>
    </div>
    <div class="headtoppart clearfix hidden-lg hidden-md">
        <div class="headerwp">
            <div class="headertopright">
                <a class="facebookicon" target="_blank" title="Facebook" href="{{$setting->facebook_link}}">
                    <i aria-hidden="true" class="fa fa-facebook"></i> <span class="mobiletext02">Facebook</span></a>
                <a class="twittericon" target="_blank" title="Twitter" href="{{$setting->twitter_link}}"><i
                        aria-hidden="true" class="fa fa-twitter"></i> <span class="mobiletext02">Twitter</span></a>
                <a class="youtube" target="_blank" title="youtube" href="{{$setting->youtube_link}}"><i
                        aria-hidden="true" class="fa fa-youtube"></i> <span class="mobiletext02">youtube</span></a>
                <a class="googleicon" target="_blank" title="Google" href="{{$setting->youtube_link}}"><i
                        aria-hidden="true" class="fa fa-google"></i> <span class="mobiletext02">Google</span></a>
            </div>
            <div class="headertopleft ">
                <ul class="header_top_links">
                    <!--   <li><a ><span id="time-date" class="time_date"></span></a></li> -->
                    <li><a href="https://madheshvani.com/contact">| सम्पर्क</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class=" container hidden-xs clearfix">
        <div class="pv-15">
            <div class="  row">
                <div class="col-md-7  ">
                    <a class="navbar-brand  " href="{{url('/')}}"><img
                            src="{{asset(env('PUBLIC_PATH').'/themes-assets')}}/images/logo.png" class="img-responsive"
                            alt="logo"></a>
                    <span class="hidden-xs slog">|  The Voice of Madhesh</span>
                    <div class="clearfix"></div>
                    <span id="time-date" class="time_date"> </span>
                </div>
                <div class="col-lg-8 pull-right">
                    <!--ad-->
                    <!--  <div class="myad_home  "><a href="https://www.facebook.com/seropherotravel/" target="_blank"><img src="https://madheshvani.com/assets/upload/images/5661118c4a5139bc65117e4a1b52330a.jpg" class="img-responsive" ></a></div>   -->
                    <!--ad-->


                    <div class="social_lg">
                        <div class="ennp">
                            <a href="http://www.madheshvani.com/en/">English</a>
                        </div>
                        <a class="facebookicon" target="_blank" title="Facebook"
                           href=" {{$setting->facebook_link}}">
                            <i aria-hidden="true" class="fa fa-facebook"></i> <span class="mobiletext02">Facebook</span></a>
                        <a class="twittericon" target="_blank" title="Twitter"
                           href="{{$setting->twitter_link}}"><i aria-hidden="true" class="fa fa-twitter"></i>
                            <span class="mobiletext02">Twitter</span></a>
                        <a class="youtube" target="_blank" title="youtube" href="{{$setting->youtube_link}}"><i
                                aria-hidden="true" class="fa fa-youtube"></i> <span class="mobiletext02">youtube</span></a>
                        <a class="googleicon" target="_blank" title="Google"
                           href="{{$setting->youtube_link}}"><i aria-hidden="true" class="fa fa-google"></i>
                            <span class="mobiletext02">Google</span></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="headerfull">
        <!--Main Menu HTML Code-->
        <div class="container wsmain">
            <nav class="wsmenu clearfix">
                @if($navigations->count() > 0)
                <ul class="mobile-sub wsmenu-list">
                    <li><a href="{{url('/')}}">
                            <i class="fa fa-home"></i></a>
                    </li>
                    @foreach($navigations as $row)
                        <li>
                            <a href="{{ route('news.newstype',$row->uri) }}">{{ $row->news_type }}</a>
                        </li>

                    @endforeach

                    <!--  <li><a href="">भिडियो स्टुडियो</a></li> -->
                    <li><a href="{{url(geturl($epaper->uri))}}">ई-पेपर</a></li>
                    <li><a href="{{ url(geturl($fm->uri)) }}">रेडियो कार्यक्रम</a></li>

                    <li>
                        <a> मधेश विशेष <span class="arrow"></span></a>
                        <ul class="wsmenu-submenu">

                            <li><a href="https://madheshvani.com/post_type/105/pressrelease">प्रेस बिज्ञप्ति</a></li>
                            <li style=""><a href="https://madheshvani.com/post_type/85/parwash"> प्रवास</a></li>
                            <li style=""><a href="https://madheshvani.com/post_type/74/international">विश्व</a></li>
                            <li style=""><a href="https://madheshvani.com/post_type/89/education">शिक्षा</a></li>
                            <li style=""><a href="https://madheshvani.com/post_type/88/health">स्वास्थ्य शैली</a></li>
                            <!-- <li style=""><a href="https://madheshvani.com/post_type/86/knowledge-science">सूचना-प्रबिधि</a></li>
                            <li><a href="https://madheshvani.com/post_type/83/arts-literature">साहित्य/विविध  </a></li> -->
                            <li><a href="https://madheshvani.com/fm_programs">रेडियो कार्यक्रम</a></li>
                            <li><a href="https://madheshvani.com/post_type/101/feature">फिचर</a></li>
                            <li><a href="https://madheshvani.com/post_type/108/madhesh-update">मधेश अपडेट </a></li>
                        </ul>
                    </li>
                </ul>
                    @endif
            </nav>
        </div>
        <!--Menu HTML Code-->
    </div>
    <!-- new menu -->
</div>
<div class="clearfix"></div>
<!-- wrapper start -->
