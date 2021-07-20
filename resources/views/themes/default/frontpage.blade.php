@extends('themes.default.common.master')
@section('content')
    <!-- wrapper start -->
    <div class="wrapper">
        <!--  -->
        <div class="container">
            {{--            <div class="myad_home  ">--}}
            {{--                <a href="https://indianepalfriendship.com/" target="_blank"><img--}}
            {{--                        src="https://madheshvani.com/assets/upload/images/6e3e223303e42337140ff083d3db0323.gif"--}}
            {{--                        class="img-responsive"></a>--}}
            {{--            </div>--}}
            @if( advertisement(1) )

                <div class="myad_home  ">
                    <a href="{{advertisement(1)->client_link}}" target="_blank"> <img
                            src="{{ asset( env('PUBLIC_PATH') . '/uploads/advertisement/' . advertisement(1)->add_image ) }}"
                            class="img-responsive">
                    </a>
                </div>
        @endif

        <!--ad-->
        </div>
        <!--  -->

        <!-- hot news start -->


        <div class="container">
            <div class="head_news_hig">
                @foreach($headline as $value)

                    <div class="col-lg-16">
                        <h1>
                            <a href="{{route('news.newsdetail',[get_newstype($value->news_type)->uri, $value->uri])}}">
                                {{$value->news_title}}
                            </a>
                        </h1>
                        <img src="{{ asset( env('PUBLIC_PATH') . '/uploads/medium/' . $value->news_thumbnail) }}"
                             class="mb-10 ">
                        <p>
                            {!! $value->news_excerpt !!}
                        </p>
                    </div>
                @endforeach

            </div>
        </div>

        <!-- hot news end -->


        <!--  -->
        <!--  -->


        <!--ad-->

        <div class="container">

            @if( advertisement(2) )

                <div class="myad_home  ">
                    <a href="{{advertisement(2)->client_link}}" target="_blank"> <img
                            src="{{ asset( env('PUBLIC_PATH') . '/uploads/advertisement/' . advertisement(2)->add_image ) }}"
                            class="img-responsive">
                    </a>
                </div>
        @endif<!--ad-->
        </div>


        <!--section start -->
        <div class="bg_white pt-50">
            <article class="   clearfix">
                <div class="row">
                    <div class="col-lg-11">
                        <div class=" ">
                            <div class=" ">


                                <div class="clearfix"></div>


                                <div class="iner col-lg-16">
                                    <h1><span class="border"><a
                                                href="{{ route('news.newstype',get_newstype(61)->uri) }}">{{ get_newstype(61)->news_type }}</a></span>
                                    </h1>
                                </div>
                                <div class="samachar">
                                    <!--end-->
                                    <div class="col-lg-8  iner">
                                        <div class="">
                                            <div class="science">
                                                @foreach($samachar->take(2) as $value)
                                                    <div class="sajhasamachar_news_listes clearfix">
                                                        <h2>
                                                            <a href="{{route('news.newsdetail',[get_newstype($value->news_type)->uri, $value->uri])}}"
                                                               rel="bookmark">
                                                                {{$value->news_title}}
                                                            </a></h2>
                                                        <img
                                                            src="{{ asset( env('PUBLIC_PATH') . '/uploads/medium/' . $value->news_thumbnail) }}"
                                                            class="img-responsive">
                                                        {!! $value->news_excerpt !!}
                                                    </div>
                                                @endforeach
                                            </div>
                                            @foreach($samachar->skip(2)->take(1) as $value)

                                                <div class="sajhasamachar_news_listes_img_ttl">
                                                    <img
                                                        src="{{ asset( env('PUBLIC_PATH') . '/uploads/medium/' . $value->news_thumbnail) }}"
                                                        class="img-responsive">
                                                    <h2>
                                                        <a href="{{route('news.newsdetail',[get_newstype($value->news_type)->uri, $value->uri])}}"
                                                           rel="bookmark">
                                                            {{$value->news_title}}
                                                        </a></h2>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                    <div class="col-lg-8  iner">
                                        <div class="  ">

                                            <div class=" ">
                                                @foreach($samachar->skip(3)->take(4) as $value)

                                                    <div class="sajhasamachar_news_listes clearfix">
                                                        <h2>
                                                            <a href="{{route('news.newsdetail',[get_newstype($value->news_type)->uri, $value->uri])}}"
                                                               rel="bookmark">
                                                                {{$value->news_title}}
                                                            </a></h2>
                                                        <img
                                                            src="{{ asset( env('PUBLIC_PATH') . '/uploads/medium/' . $value->news_thumbnail) }}"
                                                            class="img-responsive">
                                                        {!! $value->news_excerpt !!}
                                                    </div>
                                                @endforeach

                                            </div>
                                            @foreach($samachar->skip(7)->take(3) as $value)

                                                <div class="sajhasamachar_news_listes_img_ttl">
                                                    <h2>
                                                        <a href="{{route('news.newsdetail',[get_newstype($value->news_type)->uri, $value->uri])}}"
                                                           rel="bookmark">
                                                            {{$value->news_title}}
                                                        </a></h2>
                                                </div>
                                            @endforeach

                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="clearfix"></div>
                                <div class="ads_img_8   mb-30 col-lg-16 mt-10 ">
                                    <!--ad-->
                                    @if( advertisement(3) )

                                        <div class="myad_home  ">
                                            <a href="{{advertisement(3)->client_link}}" target="_blank"> <img
                                                    src="{{ asset( env('PUBLIC_PATH') . '/uploads/advertisement/' . advertisement(3)->add_image ) }}"
                                                    class="img-responsive">
                                            </a>
                                        </div>
                                @endif<!--ad-->
                                    <!--ad-->
                                </div>
                                <div class="clearfix"></div>
                                <!--end-->
                                <div class="col-lg-8  iner">
                                    <div class="  ">
                                        <h1><span class="border"><a
                                                    href="{{ route('news.newstype',get_newstype(62)->uri) }}">{{ get_newstype(62)->news_type }}</a></span>
                                        </h1>
                                        <div class="science">
                                            <div class="sajhasamachar_news_listes clearfix">
                                                <img
                                                    src="{{ asset( env('PUBLIC_PATH') . '/uploads/medium/' . $rajniti->first()->news_thumbnail) }}"
                                                    class="img-responsive">
                                                <h2>
                                                    <a href="{{route('news.newsdetail',[$rajniti->first()->newstype->first()->news_type, $rajniti->first()->uri])}}"
                                                       rel="bookmark">{{$rajniti->first()->news_title}}</a></h2>
                                                {!! $rajniti->first()->news_excerpt !!}
                                            </div>
                                        </div>
                                        @foreach($rajniti->skip(1)->take(3) as $value)
                                            <div class="sajhasamachar_news_listes_img_ttl">
                                                <img
                                                    src="{{ asset( env('PUBLIC_PATH') . '/uploads/medium/' . $value->news_thumbnail) }}"
                                                    class="img-responsive">
                                                <h2>
                                                    <a href="{{route('news.newsdetail',[get_newstype($value->news_type)->uri, $value->uri])}}"
                                                       rel="bookmark">{{$value->news_title}}</a></h2>
                                            </div>
                                        @endforeach

                                    </div>
                                </div>
                                <div class="col-lg-8  iner">
                                    <div class="  ">
                                        <h1><span class="border"><a
                                                    href="{{ route('news.newstype',get_newstype(62)->uri) }}">{{ get_newstype(62)->news_type }} </a></span>
                                        </h1>
                                        <div class="science">
                                            <div class="sajhasamachar_news_listes clearfix">
                                                <img
                                                    src="{{ asset( env('PUBLIC_PATH') . '/uploads/medium/' . $rajniti->first()->news_thumbnail) }}"
                                                    class="img-responsive">
                                                <h2>
                                                    <a href="{{route('news.newsdetail',[$rajniti->first()->newstype->first()->news_type, $rajniti->first()->uri])}}"
                                                       rel="bookmark">{{$rajniti->first()->news_title}}</a></h2>
                                                {!! $rajniti->first()->news_excerpt !!}
                                            </div>
                                        </div>
                                        @foreach($rajniti->skip(1)->take(3) as $value)
                                            <div class="sajhasamachar_news_listes_img_ttl">
                                                <img
                                                    src="{{ asset( env('PUBLIC_PATH') . '/uploads/medium/' . $value->news_thumbnail) }}"
                                                    class="img-responsive">
                                                <h2>
                                                    <a href="{{route('news.newsdetail',[get_newstype($value->news_type)->uri, $value->uri])}}"
                                                       rel="bookmark">{{$value->news_title}}</a></h2>
                                            </div>
                                        @endforeach

                                    </div>
                                </div>
                                <div class="clearfix"></div>
                                <div class="ads_img_8  clearfix mb-20 col-lg-16  ">
                                    <!--ad-->
                                    @if( advertisement(4) )

                                        <div class="myad_home  ">
                                            <a href="{{advertisement(4)->client_link}}" target="_blank"> <img
                                                    src="{{ asset( env('PUBLIC_PATH') . '/uploads/advertisement/' . advertisement(4)->add_image ) }}"
                                                    class="img-responsive">
                                            </a>
                                        </div>
                                @endif<!--ad-->
                                    <!--ad-->
                                </div>
                                <div class="clearfix"></div>
                                <!--end-->
                                <div class="col-lg-16  iner">
                                    <div class="    ">
                                        <h1>
                                            <span class="border"><a
                                                    href="{{ route('news.newstype',get_newstype(63)->uri) }}"> {{ get_newstype(63)->news_type }} </a>  </span>
                                        </h1>
                                    </div>
                                </div>
                                <div class="col-lg-8  iner">
                                    <div class="">
                                        <div class="science">
                                            <div class="sajhasamachar_news_listes clearfix ">
                                                <h2>
                                                    <a href="{{route('news.newsdetail',[$business->first()->newstype->first()->news_type, $business->first()->uri])}}"
                                                       rel="bookmark">{{$business->first()->news_title}}</a></h2>
                                                <img
                                                    src="{{ asset( env('PUBLIC_PATH') . '/uploads/medium/' . $business->first()->news_thumbnail) }}"
                                                    class="img-responsive">
                                                {!! $business->first()->news_excerpt !!}
                                            </div>
                                        </div>
                                        @foreach($business->skip(1)->take(3) as $value)

                                            <div class="sajhasamachar_news_listes_img_ttl">
                                                <img
                                                    src="{{ asset( env('PUBLIC_PATH') . '/uploads/medium/' . $value->news_thumbnail) }}"
                                                    class="img-responsive">
                                                <h2>
                                                    <a href="{{route('news.newsdetail',[get_newstype($value->news_type)->uri, $value->uri])}}"
                                                       rel="bookmark">{{$value->news_title}}</a></h2>
                                            </div>
                                        @endforeach

                                    </div>
                                </div>
                                <div class="col-lg-8  iner">
                                    <div class="  ">
                                        @foreach($business->skip(4)->take(4) as $value)
                                            <div class="sajhasamachar_news_listes clearfix">
                                                <h2>
                                                    <a href="{{route('news.newsdetail',[get_newstype($value->news_type)->uri, $value->uri])}}"
                                                       rel="bookmark">{{$value->news_title}}</a></h2>
                                                <img
                                                    src="{{ asset( env('PUBLIC_PATH') . '/uploads/medium/' . $value->news_thumbnail) }}"
                                                    class="img-responsive">
                                                {!! $value->news_excerpt !!}
                                            </div>
                                        @endforeach

                                    </div>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="ads_img_8  clearfix mb-20 col-lg-16  ">
                                <!--ad-->
                                <!--ad-->
                            </div>

                            <!--Recent videos start-->
                            <div class="recent-vid row">
                                <div class="col-lg-16">
                                    <div class=" iner">
                                        <div class="col-lg-16">
                                            <h1><span class="border"><a
                                                        href="https://www.youtube.com/watch?list=PLP04fWlRiUO1YEj8PwLJswqspSFyGfPww&v=yVOK7t6NOZY">मधेशवाणी टिभी</a></span>
                                            </h1>
                                        </div>
                                    </div>
                                    <div class=" ">
                                        <div class="col-lg-16">
                                            <iframe width="100%" height="450"
                                                    src="https://www.youtube.com/embed/videoseries?list=PLP04fWlRiUO1YEj8PwLJswqspSFyGfPww&autoplay=0&cc_load_policy=1"
                                                    frameborder="0" allow="autoplay; encrypted-media"
                                                    allowfullscreen></iframe>
                                        </div>

                                    </div>
                                    <hr>
                                </div>
                                <!--Recent videos end-->


                            </div>
                            <div class="clearfix"></div>
                            <div class="ads_img_8 clearfix mb-30 col-lg-16 mt-10 clearfix">
                                <!--ad-->
                                <!--ad-->
                            </div>
                            <div class="clearfix"></div>

                            <div class="mb-50 clearfix">
                                <div class="col-lg-16  iner">
                                    <h1><span class="border"><a
                                                href="{{ route('news.newstype',get_newstype(63)->uri) }}">{{ get_newstype(63)->news_type }}</a></span>
                                    </h1>
                                </div>
                                <div class="col-lg-8  ">
                                    <div class="iner science ">
                                        <div class=" science">
                                            <div class="sajhasamachar_news_listes clearfix">

                                                <h2>
                                                    <a href="{{route('news.newsdetail',[$business->first()->newstype->first()->news_type, $business->first()->uri])}}"
                                                       rel="bookmark">{{$business->first()->news_title}}</a></h2>
                                                <img
                                                    src="{{ asset( env('PUBLIC_PATH') . '/uploads/medium/' . $business->first()->news_thumbnail) }}"
                                                    class="img-responsive">
                                                {!! $business->first()->news_excerpt !!}


                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-8">
                                    <div class="iner">
                                        @foreach($business->skip(1)->take(2) as $value)
                                            <div class="sajhasamachar_news_listes clearfix">
                                                <h2>
                                                    <a href="{{route('news.newsdetail',[get_newstype($value->news_type)->uri, $value->uri])}}"
                                                       rel="bookmark">{{$value->news_title}}</a></h2>
                                                <img
                                                    src="{{ asset( env('PUBLIC_PATH') . '/uploads/medium/' . $value->news_thumbnail) }}"
                                                    class="img-responsive">
                                                {!! $value->news_excerpt !!}

                                            </div>
                                        @endforeach
                                        @foreach($business->skip(3)->take(1) as $value)
                                            <div class="sajhasamachar_news_listes_img_ttl">
                                                <img
                                                    src="{{ asset( env('PUBLIC_PATH') . '/uploads/medium/' . $value->news_thumbnail) }}"
                                                    class="img-responsive">
                                                <h2>
                                                    <a href="{{route('news.newsdetail',[get_newstype($value->news_type)->uri, $value->uri])}}"
                                                       rel="bookmark">{{$value->news_title}}</a></h2>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>


                            <div class="clearfix"></div>
                            <div class="ads_img_8  mb-20 col-lg-16  ">
                                <!--ad-->
                                <!--ad-->
                            </div>

                            <div class="clearfix"></div>
                            <div class="col-lg-8  iner">
                                <div class="  ">
                                    <h1><span class="border"><a
                                                href="{{ route('news.newstype',get_newstype(76)->uri) }}">{{ get_newstype(76)->news_type }}</a></span>
                                    </h1>
                                    <div class="science">
                                        <div class="sajhasamachar_news_listes clearfix">
                                            <h2>
                                                <a href="{{route('news.newsdetail',[$swastha->first()->newstype->first()->news_type, $swastha->first()->uri])}}"
                                                   rel="bookmark">{{$swastha->first()->news_title}}</a></h2>
                                        </div>
                                        @foreach($swastha->skip(1)->take(3) as $value)
                                            <div class="sajhasamachar_news_listes_img_ttl">
                                                <h2>
                                                    <a href="{{route('news.newsdetail',[get_newstype($value->news_type)->uri, $value->uri])}}"
                                                       rel="bookmark">{{$value->news_title}}</a></h2>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-8  iner">
                                <div class="   ">
                                    <h1><span class="border"><a
                                                href="{{ route('news.newstype',get_newstype(76)->uri) }}">{{ get_newstype(76)->news_type }}</a></span>
                                    </h1>
                                    @foreach($swastha->take(3) as $value)

                                        <div class="sajhasamachar_news_listes clearfix">
                                            <h2>
                                                <a href="{{route('news.newsdetail',[get_newstype($value->news_type)->uri, $value->uri])}}"
                                                   rel="bookmark">{{$value->news_title}}</a></h2>
                                            <img
                                                src="{{ asset( env('PUBLIC_PATH') . '/uploads/medium/' . $value->news_thumbnail) }}"
                                                class="img-responsive">
                                            {!! $value->news_excerpt !!}
                                        </div>
                                    @endforeach
                                    @foreach($swastha->skip(3)->take(1) as $value)

                                        <div class="sajhasamachar_news_listes_img_ttl">
                                            <img
                                                src="{{ asset( env('PUBLIC_PATH') . '/uploads/medium/' . $value->news_thumbnail) }}"
                                                class="img-responsive">
                                            <h2>
                                                <a href="{{route('news.newsdetail',[get_newstype($value->news_type)->uri, $value->uri])}}"
                                                   rel="bookmark">{{$value->news_title}}</a></h2>
                                        </div>
                                    @endforeach
                                    @foreach($swastha->skip(4)->take(1) as $value)

                                        <div class="sajhasamachar_news_listes_img_ttl">
                                            <h2>
                                                <a href="{{route('news.newsdetail',[get_newstype($value->news_type)->uri, $value->uri])}}"
                                                   rel="bookmark">{{$value->news_title}}</a></h2>
                                        </div>
                                    @endforeach
                                </div>
                            </div>


                            <div class="clearfix"></div>

                            <!--ad-->
                            <!--ad-->
                        </div>
                    </div>
                    <div class="col-lg-5  iner">
                        <div class="sid_bar">
                            <div class="bijay_inr_sidbar ">

                                <div class="sid_bar ">
                                    <h1><span class="border"><a href="https://madheshvani.com/epaper">ई-पेपर</a></span>
                                    </h1>
                                    <img src="http://www.adebooking.com/images/e_paper_Logo.png" class="img-responsive">
                                    <p class="text-center">
                                        <a href="assets/upload/images/PDF/0b980c36b94148d21cff7a70dd4e5c82.pdf"
                                           target="_blank">Click to Download</a>
                                    </p>
                                </div>

                                <!--// FM Program-->
                                <div class="sid_bar ">

                                    <h1><span class="border"> <a> मधेशवाणी रेडियो कार्यक्रम  </a> </span></h1>

                                    <audio controls>
                                        <source src="assets/upload/audios/7baf3ba59d9de4e586913e1c84d1504d.MP3"
                                                type="audio/mpeg">
                                        Your browser does not support the audio element.
                                    </audio>

                                    <div class="epaper_title">
                                        <p class="text-center"> गिरिश चन्द्र लाल, सर्वोच्च अदालतका पूर्वन्यायाधीश </p>
                                    </div>

                                </div>

                                <div class="sid_bar">
                                    <h1><span class="border"><a
                                                href="{{ route('news.newstype',get_newstype(63)->uri) }}">{{ get_newstype(63)->news_type }}</a></span>
                                    </h1>
                                    <div class="science">
                                        <div class="sajhasamachar_news_listes clearfix ">
                                            <h2>
                                                <a href="{{route('news.newsdetail',[$business->first()->newstype->first()->news_type, $business->first()->uri])}}"
                                                   rel="bookmark">{{$business->first()->news_title}}</a></h2>
                                            <p style="font-weight: bold; font-style: italic; color: #555;"></p>
                                            <img
                                                src="{{ asset( env('PUBLIC_PATH') . '/uploads/medium/' . $business->first()->news_thumbnail) }}"
                                                class="img-responsive">
                                            {!! $business->first()->news_excerpt !!}
                                        </div>
                                    </div>
                                    @foreach($business->skip(1)->take(2) as $value)
                                        <div class="sajhasamachar_news_listes_img_ttl">
                                            <img
                                                src="{{ asset( env('PUBLIC_PATH') . '/uploads/medium/' . $value->news_thumbnail) }}"
                                                class="img-responsive">
                                            <h3>
                                                <a href="{{route('news.newsdetail',[get_newstype($value->news_type)->uri, $value->uri])}}"
                                                   rel="bookmark">{{$value->news_title}}</a></h3>
                                            <p style="font-weight: bold; font-style: italic; color: #555;"></p>
                                        </div>
                                    @endforeach

                                </div>


                            {{--                                @if( advertisement(5) )--}}

                            {{--                                    <div class="myad_home  ">--}}
                            {{--                                        <a href="{{advertisement(5)->client_link}}" target="_blank"> <img--}}
                            {{--                                                src="{{ asset( env('PUBLIC_PATH') . '/uploads/advertisement/' . advertisement(5)->add_image ) }}"--}}
                            {{--                                                class="img-responsive">--}}
                            {{--                                        </a>--}}
                            {{--                                    </div>--}}
                            {{--                            @endif<!--ad-->--}}
                            <!--ad-->
                                @if(advertisement(5))
                                <div class="sid_bar adds"><img
                                        src="{{ asset( env('PUBLIC_PATH') . '/uploads/advertisement/' . advertisement(5)->add_image ) }}"
                                        class="img-responsive"></div>
                                @endif


                                <div class="sid_bar">
                                    <h1><span class="border"><a
                                                href="{{ route('news.newstype',get_newstype(87)->uri) }}"> {{ get_newstype(87)->news_type }}</a></span>
                                    </h1>

                                    @foreach($rojgar as $value)
                                        <div class="sajhasamachar_news_listes clearfix ">
                                            <h2>
                                                <a href="{{route('news.newsdetail',[get_newstype($value->news_type)->uri, $value->uri])}}"
                                                   rel="bookmark">{{$value->news_title}}</a></h2>
                                            <img
                                                src="{{ asset( env('PUBLIC_PATH') . '/uploads/medium/' . $value->news_thumbnail) }}"
                                                class="img-responsive">{!! $value->news_excerpt !!}
                                        </div>
                                    @endforeach


                                </div>


                                <!--ad-->
                                @if(advertisement(6))
                                <div class="sid_bar adds  "><img
                                        src="{{ asset( env('PUBLIC_PATH') . '/uploads/advertisement/' . advertisement(6)->add_image ) }}"
                                        class="img-responsive"></div>
                                @endif

                                <div class="sid_bar">
                                    <h1><span class="border"><a
                                                href="{{ route('news.newstype',get_newstype(83)->uri) }}">{{ get_newstype(83)->news_type }} </a></span>
                                    </h1>
                                    @foreach($corporate as $value)
                                        <div class="sajhasamachar_news_listes_img_ttl roundes_img">
                                            <img
                                                src="{{ asset( env('PUBLIC_PATH') . '/uploads/medium/' . $value->news_thumbnail) }}"
                                                class="img-responsive">
                                            <h4>
                                                <a href="{{route('news.newsdetail',[get_newstype($value->news_type)->uri, $value->uri])}}"
                                                   rel="bookmark">{{$value->news_title}}</a></h4>
                                            <p><strong></strong></p>

                                        </div>
                                    @endforeach

                                </div>


                                <!--ad-->
                                @if(advertisement(7))
                                <div class="sid_bar adds  "><img
                                        src="{{ asset( env('PUBLIC_PATH') . '/uploads/advertisement/' . advertisement(7)->add_image ) }}"
                                        class="img-responsive"></div>
                                @endif


                                <div class="sid_bar">

                                    <div class=" iner">
                                        <h1><span class="border"><a
                                                    href="{{ route('news.newstype',get_newstype(85)->uri) }}">{{ get_newstype(85)->news_type }}</a></span>
                                        </h1>
                                    </div>
                                    <!-- carousel start -->
                                    <div id="photofetures" class="owl-carousel">
                                        @foreach($share_bazar as $value)
                                            <div class="item im_news">
                                                <a href="{{route('news.newsdetail',[get_newstype($value->news_type)->uri, $value->uri])}}">
                                                    <h2>
                                                        <a href="{{route('news.newsdetail',[get_newstype($value->news_type)->uri, $value->uri])}}"
                                                           rel="bookmark">{{$value->news_title}}</a></h2>
                                                    <img
                                                        src="{{ asset( env('PUBLIC_PATH') . '/uploads/medium/' . $value->news_thumbnail) }}"
                                                        class="mb-10"> {!! $value->news_excerpt !!}
                                                </a>
                                                <div class="clearfix"></div>
                                            </div>
                                        @endforeach
                                    </div>

                                </div>


                                <!--ad-->
                                <!--ad-->


                                <!--ad-->
                                @if(advertisement(8))
                                <div class="sid_bar adds  "><img
                                        src="{{ asset( env('PUBLIC_PATH') . '/uploads/advertisement/' . advertisement(8)->add_image ) }}"
                                        class="img-responsive"></div>
                                @endif


                                <div class="sid_bar">
                                    <h1><span class="border"><a
                                                href="{{ route('news.newstype',get_newstype(67)->uri) }}">{{ get_newstype(67)->news_type }} </a></span>
                                    </h1>
                                    @foreach($manoranjan->take(3) as $value)
                                        <div class="sajhasamachar_news_listes clearfix ">
                                            <h2>
                                                <a href="{{route('news.newsdetail',[get_newstype($value->news_type)->uri, $value->uri])}}"
                                                   rel="bookmark">{{$value->news_title}}</a></h2>


                                            <img
                                                src="{{ asset( env('PUBLIC_PATH') . '/uploads/medium/' . $value->news_thumbnail) }}"
                                                class="img-responsive">{!! $value->news_excerpt !!}
                                        </div>
                                    @endforeach
                                </div>


                                <!--ad-->
                                <!--ad-->


                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="clearfix"></div>

                    <!--end-->

            </article>

        </div>
    </div>
    <!-- wrapper end -->
    <div class="clearfix"></div>

@stop
