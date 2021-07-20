@extends('themes.default.common.master')
@section('title', $news_type->news_type)
@section('meta_keyword', $news_type->meta_keyword)
@section('meta_description', $news_type->meta_description)
@section('content')
    <!-- wrapper start -->
    <div class="wrapper"><!-- bage header start -->
        <div class="row ">
            <div class="container clearfix">
                <div class="bg_breadcomns">

                    <div class="page-header ">
                        <h1>{{$news_type->news_type}}</h1>
                        <ol class="breadcrumb">
                            <li><a href="{{url('/')}}">मुख्य पृष्ठ</a>
                            </li>
                            <li class="active">{{$news_type->news_type}}</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- bage header end -->
        <!-- data start -->

        <div class="bg_white">
            <div class="row ">
                <div class="col-lg-16 clearfix pt-30">
                    <!-- left sec start -->
                    <div class="col-md-11 col-sm-11">
                        <div class="left_col pading_r">

                            <div class="clearfix"></div>
                            @foreach($news as $value)
                                <div class="list_nw list_nw sec-topic clearfix row  ">

                                    <a href="{{route('news.newsdetail',[$type_title,$value->uri])}}">
                                        <div class="col-sm-6">

                                            @if($value->news_thumbnail)
                                                <img src="{{ asset('/uploads/medium/' . $value->news_thumbnail) }}"
                                                     class="list_news_innerpage">
                                            @else
                                                <img src="{{ asset('themes-assets') }}/images/default.png"
                                                     class="list_news_innerpage">
                                            @endif
                                        </div>
                                    </a>
                                    <div class="col-sm-10">
                                        <div class="brief_con">

                                            <div class="sec-info">
                                                <h2>
                                                    <a href="{{route('news.newsdetail',[$type_title,$value->uri])}}">
                                                        {{$value->news_title}} </a></h2>


                                            </div>
                                            {{--                                        <div class="hours"><i class="fa fa-clock-o"></i>5 hours ago</div>--}}
                                            <div class="hours"><i
                                                    class="fa fa-clock-o"></i>{{ time_elapsed_string($value->created_at) }}
                                            </div>

                                            <p class="newslist">
                                                {!! $value->news_excerpt !!}
                                            </p>

                                        </div>

                                    </div>
                                </div>
                            @endforeach

                            <nav>
                                <div class="pagination pagination-centered">
                                    <nav>
                                        <ul class="pagination">
                                            {{$news->links()}}

                                        </ul>
                                    </nav>
                                </div>
                            </nav>
                        </div>
                    </div>
                    <!-- left sec end -->
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
                            @if(advertisement(9))
                                <div class="sid_bar adds  "><img
                                        src="{{ asset( env('PUBLIC_PATH') . '/uploads/advertisement/' . advertisement(9)->add_image ) }}"
                                        class="img-responsive"></div>
                            @endif
                        <!--ad-->
                            @if(advertisement(10))
                                <div class="sid_bar adds  "><img
                                        src="{{ asset( env('PUBLIC_PATH') . '/uploads/advertisement/' . advertisement(10)->add_image ) }}"
                                        class="img-responsive"></div>
                            @endif<!--ad-->

                            <!--ad-->
                            @if(advertisement(11))
                                <div class="sid_bar adds  "><img
                                        src="{{ asset( env('PUBLIC_PATH') . '/uploads/advertisement/' . advertisement(11)->add_image ) }}"
                                        class="img-responsive"></div>
                            @endif  <!--ad-->

                            <!--ad-->
                            @if(advertisement(12))
                                <div class="sid_bar adds  "><img
                                        src="{{ asset( env('PUBLIC_PATH') . '/uploads/advertisement/' . advertisement(12)->add_image ) }}"
                                        class="img-responsive"></div>
                            @endif   <!--ad-->
                            <!--ad-->

                            <!--ad-->
                            @if(advertisement(13))
                                <div class="sid_bar adds  "><img
                                        src="{{ asset( env('PUBLIC_PATH') . '/uploads/advertisement/' . advertisement(13)->add_image ) }}"
                                        class="img-responsive"></div>
                            @endif


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- wrapper end -->
    <div class="clearfix"></div>
@endsection
