@extends('themes.default.common.master')
@section('title', $data->news_title)
@section('news_excerpt', $data->news_excerpt)
@section('news_thumbnail', $data->news_thumbnail)
@section('seo_title', $data->seo_title)
@section('meta_keyword', $data->meta_keyword)
@section('meta_description', $data->meta_description)

@section('content')

    <div class="wrapper">
        <div class="bg_white">
            <div class="row ">
                <div class=" clearfix pt-20">
                    <!--  -->
                    <div class="col-lg-16">
                        <div class=" dtl_pgst clearfix col-lg-16">
                            <h1>{{ $data->news_title }}</h1>
                            <h2></h2>

                            <!--add-->
                            @if(advertisement(14))
                                <div class="mb-20 ">
                                    <div class=""><a href="{{advertisement(14)->client_link}}" target="_blank"><img
                                                src="{{ asset( env('PUBLIC_PATH') . '/uploads/advertisement/' . advertisement(14)->add_image ) }}"
                                                class="img-responsive"></a></div>
                                    <div class="clearfix"></div>
                                </div>
                        @endif
                        <!--  -->
                            <!--add-->
                            <span class="new_category "> समाचार </span>
                            <div class="clearfix"><br></div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="details_header">
                            <div class="sub-info-bordered mb-30">
                                <div class="pull-left">
                                    &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;

                                    <!--<i class="fa fa-eye"></i> &nbsp;&nbsp;&nbsp;12   &nbsp; पटक पढिएको--!
                                </div>

                                <div class="share pull-right">
                                    !-- Go to www.addthis.com/dashboard to customize your tools -->
                                    <!--  <div class="addthis_inline_share_toolbox"></div> -->
                                    <div class="sharethis-inline-share-buttons"></div>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-16">

                        <!-- left sec start -->
                        <div class="col-md-11 col-sm-11">
                            <div class="left_col  ">
                                <div class="sec-topic details_p  ">
                                    <div class="clearfix"></div>
                                    <div class="sec-info">
                                        @if($data->news_thumbnail)
                                            <img src="{{ asset('/uploads/medium/' . $data->news_thumbnail) }}"  class="img-responsive mb-20">
                                        @else
                                            <img src="{{ asset('themes-assets') }}/images/default.png" class="img-responsive mb-20" >
                                        @endif

                                    </div>
                                    <div class="col-lg-15 pull-right pv-30 mb-40">
                                        <div class="details_p">
                                            <!--ad-->
                                            <div style="    width: 100%;
                           float: left;
                           max-width: 250px;
                           margin-right: 20px; ">
                                            </div>
                                            <!--ad-->
                                            <p>
                                                {!! $data->news_content !!}

                                            </p>
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>
                                    <!--<div class="col-lg-13 pull-right mb-20">-->
                                    <!--   <div class="details_p">-->
                                    <!--      <div class="fb-page" data-href="https://www.facebook.com/madheshvani/" data-width="500" data-small-header="true" data-adapt-container-width="false" data-hide-cover="false" data-show-facepile="true">-->
                                    <!--         <blockquote cite="https://www.facebook.com/madheshvani/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/madheshvani/">madheshvani.com</a></blockquote>-->
                                    <!--      </div>-->
                                    <!--   </div>-->
                                    <!--</div>-->
                                    <div class="clearfix"></div>
                                    <div class="details_header">
                                        <div class="text-danger sub-info-bordered mb-30">
                                            <div class="share pull-right">
                                                <div class="sharethis-inline-share-buttons"></div>
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>
                                    <!--ad 3-->
                                    <!--ad-->
                                    <div style=" ">
                                    </div>
                                    <!--ad-->
                                    <!--ad-->
                                    <div style=" ">

                                    </div>
                                    <!--ad-->
                                    <!--ad-->
                                    <div style=" ">

                                    </div>
                                    <!--ad-->
                                    <!--ad-->
                                    <div style=" ">
                                    </div>
                                    <!--ad-->
                                    <!--ad-->
                                    <div style=" ">
                                    </div>
                                    <!--ad-->
                                    <!--ad 5-->
                                    <div class="mb-40">
                                        <div class="rel_bj_new">
                                            <div class="iner">
                                                <h1><span class="border"><a>सम्बन्धित शीर्षकहरु
</a></span>
                                                </h1>
                                            </div>
                                            <div class="row">
                                                @foreach($related_news->take(2) as $value)
                                                    <div class="col-md-8">
                                                        <div class="bijay_related_news">
                                                            <div class="image_frame">
                                                                <img
                                                                    src="{{ asset( env('PUBLIC_PATH') . '/uploads/medium/' . $value->news_thumbnail) }}"
                                                                    class="img-responsive"></div>
                                                            <div class="title_rel">
                                                                <h2>
                                                                    <a href="{{route('news.newsdetail',[get_newstype($value->news_type)->uri, $value->uri])}}"
                                                                       rel="bookmark">{{$value->news_title}}</a></h2>
                                                            </div>
                                                            <!--  <p class="newslist"> </p> -->
                                                        </div>
                                                    </div>
                                                @endforeach
                                                <div class="clearfix"></div>
                                                @foreach($related_news->skip(2)->take(2) as $value)
                                                    <div class="col-md-8">
                                                        <div class="bijay_related_news">
                                                            <div class="image_frame">
                                                                @if($value->news_thumbnail)
                                                                    <img src="{{ asset('/uploads/medium/' . $value->news_thumbnail) }}"  class="img-responsive">
                                                                @else
                                                                    <img src="{{ asset('themes-assets') }}/images/default.png" class="img-responsive" >
                                                                @endif
                                                            </div>
                                                            <div class="title_rel">
                                                                <h2>
                                                                    <a href="{{route('news.newsdetail',[get_newstype($value->news_type)->uri, $value->uri])}}"
                                                                       rel="bookmark">{{$value->news_title}}</a></h2>
                                                            </div>
                                                            <!--  <p class="newslist"> </p> -->
                                                        </div>
                                                    </div>
                                                    x                                                    @endforeach
                                                <div class="clearfix"></div>
                                                @foreach($related_news->skip(4)->take(2) as $value)
                                                    <div class="col-md-8">
                                                        <div class="bijay_related_news">
                                                            <div class="image_frame">
                                                                @if($value->news_thumbnail)
                                                                    <img src="{{ asset('/uploads/medium/' . $value->news_thumbnail) }}"  class="img-responsive">
                                                                @else
                                                                    <img src="{{ asset('themes-assets') }}/images/default.png" class="img-responsive" >
                                                                @endif
                                                            </div>
                                                            <div class="title_rel">
                                                                <h2>
                                                                    <a href="{{route('news.newsdetail',[get_newstype($value->news_type)->uri, $value->uri])}}"
                                                                       rel="bookmark">{{$value->news_title}}</a></h2>
                                                            </div>
                                                            <!--  <p class="newslist"> </p> -->
                                                        </div>
                                                    </div>
                                                @endforeach
                                                <div class="clearfix"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="clearfix   comment_bg mb-50">
                                        <h1><span class="border">तपाईको प्रतिक्रिया</span></h1>
                                        <div class="fb-comments"
                                             data-href="{{url()->current()}}"
                                             data-numposts="5" data-width="100%"></div>
                                    </div>
                                    <br><br>
                                </div>
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
        </div>
    </div>
    <!-- wrapper end -->
    <div class="clearfix"></div>

@endsection

