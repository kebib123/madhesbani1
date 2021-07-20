<!-- Footer start -->
<footer id="footer">
    <div class="footer-widgets footer-widgets-two">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="border_right">
                        <div class="widget widget-menu-2">
                            <h3 class="ftr_ttl">हाम्रो बारेमा</h3>
                            <p class=" ">
                               {!! $about->post_excerpt !!} </p>
                            <ul>
                                <li><a href="{{url(geturl($about->uri))}}">हाम्रो बारेमा</a></li>
                                <li><a href="{{url(geturl($contact->uri))}}">सम्पर्क</a></li>

                                <li><a href="{{url(geturl($ad->uri))}}">विज्ञापनको लागि</a></li>
                            </ul>

                        </div>
                    </div>
                </div>
                <div class="col-sm-6 hidden-xs">
                    <div class="border_right widget widget-menu-2">
                        <div class="fb-page" data-href="https://www.facebook.com/madheshvani/" data-small-header="false"
                             data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true">
                            <blockquote cite="https://www.facebook.com/madheshvani/" class="fb-xfbml-parse-ignore"><a
                                    href="https://www.facebook.com/madheshvani/">Madhesh Vani</a></blockquote>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4  hidden-xs">
                    <div class="widget widget-menu-2">
                        <address>
                            <h3 class="ftr_ttl">Madhesh Media House</h3>
                            <p class="clearfix"><i class="fa fa-map-marker mt-20"></i>{{$setting->address}}</p>
                            <p class="clearfix"><i class="fa fa-phone"></i>{{$setting->phone}}</p>
                            <p class="clearfix"><i class="fa fa-envelope"></i>{{$setting->email_primary}}</p>
                        </address>


                        <div class="  mt-10">
                            <ul class="social-icons ">
                                <li class="social-icons-facebook"><a href="{{$setting->facebook_link}}"
                                                                     target="_blank" title="Facebook"><i
                                            class="fa fa-facebook"></i></a></li>
                                <li class="social-icons-twitter"><a href=" {{$setting->twitter_link}}"
                                                                    target="_blank" title="Twitter"><i
                                            class="fa fa-twitter"></i></a></li>
                                <li class="social-icons-youtube"><a href="{{$setting->youtube_link}}"
                                                                    target="_blank" title="Youtube"><i
                                            class="fa fa-youtube"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div>
    </div>
    <div class="footer-menu footer-style-two">
        <div class="container">
            <div class="  text-center pv-15  ">
                <p>
                {{$setting->copyright_text}}
                </p>


                <p class="text-center"><a href="http://cyberlink.com.np/" target="_blank">

                        <img src="https://cyberlink.com.np/wp-content/themes/cyberlink/images/logo.jpg">
                    </a>


                </p>


            </div>

        </div>
    </div>
</footer>
<!-- Footer end -->
<!-- jQuery -->
<script type="text/javascript">
    $(document).ready(function () {
        $('.navbar-inverse .navbar-nav li a').click(function () {
            $('.navbar-inverse .navbar-nav li a').removeClass("active");
            $(this).addClass("active");
        });
    });


</script>
<!--jQuery easing-->
<script src="{{asset('themes-assets/js/jquery.easing.1.3.js')}}"></script>
<!-- bootstrab js -->
<script src="{{asset('themes-assets/js/bootstrap.js')}}"></script>
<!--wow animation-->
<script src="{{asset('themes-assets/js/wow.min.js')}}"></script>
<!-- time and date -->
<script src="{{asset('themes-assets/js/moment.min.js')}}"></script>
<!--news ticker-->
<script src="{{asset('themes-assets/js/jquery.ticker.js')}}"></script>
<!-- owl carousel -->
<script src="{{asset('themes-assets/js/owl.carousel.js')}}"></script>
<!-- prettyPhoto popup -->
<script type="text/javascript" src="{{asset('themes-assets/js/jquery.prettyPhoto.js')}}"></script>
<!-- calendar-->
<script src="{{asset('themes-assets/js/jquery.pickmeup.js')}}"></script>
<!-- go to top -->
<script src="{{asset('themes-assets/js/jquery.scrollUp.js')}}"></script>
<!-- scroll bar -->
<!--masonry-->
<script src="{{asset('themes-assets/js/masonry.pkgd.js')}}"></script>
<!--media queries to js-->
<script src="{{asset('themes-assets/js/enquire.js')}}"></script>
<!--custom functions-->
<script src="{{asset('themes-assets/js/custom.js')}}"></script>


<!--Subscribe-->
</body>
</html>
