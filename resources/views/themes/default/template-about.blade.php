@extends('themes.default.common.master')
@section('content')

    <div class="wrapper">
        <div class="bg_white pv-30 ">
            <div class="container clearfix">
                <div class="row ">

                    <!-- left sec start -->
                    <div class="col-lg-11">

                        <div style="padding-right: 25px; ">
                            <div class="iner">
                                <h1><span class="border"><a>{{$data->post_title}}</a></span>
                                </h1>

                            </div>
                            @if($data->page_thumbnail)
                            <img src="{{ asset( env('PUBLIC_PATH') .'/uploads/medium/' . $data->page_thumbnail)}}"
                                 class="img-responsive mb-30">
                            @endif
                            <p>
                                {!! $data->post_content !!}
                            </p>


                        </div>
                        <!-- left sec end -->

                    </div>
                    <!-- right sec start -->
                    <div class="col-sm-5 right-sec_bijay">
                        <div class="bijay_inr_sidbar">


                            <div class="sid_bar iner ">
                                <h1><span class="border"><a>ट्रेन्डिङ</a></span>
                                </h1>
                                @foreach($article->take(5) as $value)
                                    <div class="sajhasamachar_news_listes counter_div clearfix">
                                        <!--  <img src="https://madheshvani.com/assets/upload/images/thumbnail/325625762cc3ac28948dcc0b99839419.jpg" class="img-responsive" > -->
                                        <h2>
                                            <a href="{{route('news.newsdetail',[get_newstype($value->news_type)->uri, $value->uri])}}"
                                               rel="bookmark">{{$value->news_title}}</a></h2>
                                    </div>
                                @endforeach

                            </div>


                            <!--ad-->
                            @if(advertisement(15))
                                <div class="sid_bar adds  "><img
                                        src="{{ asset( env('PUBLIC_PATH') . '/uploads/advertisement/' . advertisement(15)->add_image ) }}"
                                        class="img-responsive"></div>
                            @endif
                        <!--ad-->
                            @if(advertisement(16))
                                <div class="sid_bar adds  "><img
                                        src="{{ asset( env('PUBLIC_PATH') . '/uploads/advertisement/' . advertisement(16)->add_image ) }}"
                                        class="img-responsive"></div>
                            @endif<!--ad-->

                            <!--ad-->
                            @if(advertisement(17))
                                <div class="sid_bar adds  "><img
                                        src="{{ asset( env('PUBLIC_PATH') . '/uploads/advertisement/' . advertisement(17)->add_image ) }}"
                                        class="img-responsive"></div>
                            @endif  <!--ad-->

                            <!--ad-->
                            @if(advertisement(18))
                                <div class="sid_bar adds  "><img
                                        src="{{ asset( env('PUBLIC_PATH') . '/uploads/advertisement/' . advertisement(18)->add_image ) }}"
                                        class="img-responsive"></div>
                            @endif   <!--ad-->
                            <!--ad-->

                            <!--ad-->
                            @if(advertisement(19))
                                <div class="sid_bar adds  "><img
                                        src="{{ asset( env('PUBLIC_PATH') . '/uploads/advertisement/' . advertisement(19)->add_image ) }}"
                                        class="img-responsive"></div>
                            @endif




                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div><br/><br/>

    <!-- wrapper end -->
    <div class="clearfix"></div>
@stop
