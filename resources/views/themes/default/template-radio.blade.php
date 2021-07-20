@extends('themes.default.common.master')
@section('content')

    <div class="wrapper">
        <div class="bg_white pv-30 ">
            <div class="container clearfix">
                <div class="row ">

                    <!-- left sec start -->
                    <div class="col-lg-16">

                        <div class="epaper_search">
                            <div class="col-lg-6 ">
                                <div class="iner">
                                    <h1><span class="border"><a>{{$data->post_title}}</a></span></h1>
                                </div>
                            </div>
                            <div class="clearfix"></div>

                        </div>


                        <!-- radio new -->
                        <div class="row">


                            <div class="radio-player">

                                <!--  -->
                                @foreach($data_child as $value)
                                    <div class="col-lg-8">
                                        <div class="radio-wrap">
                                            <div class="radio-body">

                                                <!---->
                                                <div class="col-lg-6">
                                                    <div class="radio-image">

                                                        <img
                                                            src="{{ asset(env('PUBLIC_PATH').'uploads/medium/' . $value->page_thumbnail) }}"
                                                            class="img-responsive">

                                                        <h4>{{$value->post_title}}</h4>

                                                    </div>
                                                </div>
                                                <!---->
                                                <!---->
                                                <div class="col-lg-10">
                                                    <div class="radio-content">
                                                        <p>
                                                            {!! $value->post_content !!}
                                                        </p>
                                                    </div>

                                                </div>

                                                <!---->
                                                <div class="clearfix"></div>
                                            </div>

                                            <div class="radio-footer">
                                                <!---->
                                                <div class="col-lg-16 text-center">
                                                    <div class="controls">

                                                        <audio controls>
                                                            <source
                                                                src="{{asset('audio/'.$value->audio)}}"
                                                                type="audio/mpeg">
                                                            Your browser does not support the audio element.
                                                        </audio>
                                                        <a href="{{asset('audio/'.$value->audio)}}"
                                                           class="btn btn-info pull-right" download>Download</a>

                                                    </div>

                                                </div>
                                                <div class="clearfix"></div>
                                            </div>

                                            <!---->
                                        </div>

                                    </div>
                                @endforeach


                                <div class="clearfix"></div>


                                <!--  -->

                            </div>

                        </div>

                        <!-- radio new end-->


                        <div class="col-lg-4 pull-right">


                        </div>
                        <div class="clearfix"></div>
                    </div>

                    <div class="epaper_main_wrap">

                        <div class="clearfix"></div>

                        <!--  -->
                        <!--  -->

                        <div class="clearfix"></div>

                    </div>

                    <nav aria-label="Page navigation example">


                        <ul class="pagination">
                          {!! $data_child->links() !!}
                        </ul>
                    </nav>
                </div>

            </div>

        </div>
    </div>
    <style>
        /*radio*/

        .radio-wrap {
            background: #fff;
            margin-bottom: 30px;
            border: solid 1px #d8d8d8;
            border-radius: 5px !important;
        }

        .radio-player {
            margin: 10px 5px;
        }

        .radio-body {
            padding: 15px;
        }

        .radio-footer {
            background: #eee;
            padding: 10px;
        }

        .radio-footer .btn {
            border-radius: 20px !important;
            padding: 5px 30px;
            font-size: 17px;
        }

        .radio-image {
            text-align: center;
        }

        .radio-image h4 {
            margin: 10px 0;
            line-height: 20px;
        }
    </style>
    <style type="text/css">

        /*audio player*/

        .radio_img {
            position: relative;
            overflow: hidden;
        }

        .mediPlayer span {
            color: #fff;
            bottom: 0;
            background: #0000009c;
            padding: 2px 8px;
            position: absolute;
            right: 0;
            text-align: center;
        }

        .mediPlayer {
            position: absolute;
            bottom: 0;
            width: 100%;
            height: 100%;
            background: #0000008f;
        }

        .mediPlayer .control {
            opacity: 0;
            /* transition: opacity .2s linear; */
            pointer-events: none;
            cursor: pointer;
        }

        .mediPlayer .not-started .play,
        .mediPlayer .paused .play {
            opacity: 1;
        }

        .mediPlayer .playing .pause {
            opacity: 1;
        }

        .mediPlayer .playing .play {
            opacity: 0;
        }

        .mediPlayer .ended .stop {
            opacity: 1;
            pointer-events: none;
        }

        .mediPlayer .precache-bar .done {
            opacity: 0;
        }

        .mediPlayer .not-started .progress-bar,
        .mediPlayer .ended .progress-bar {
            display: none;
        }

        .mediPlayer .ended .progress-track {
            stroke-opacity: 1;
        }

        .mediPlayer .progress-bar,
        .mediPlayer .precache-bar {
            transition: stroke-dashoffset 500ms;
            stroke-dasharray: 298.1371428256714;
            stroke-dashoffset: 298.1371428256714;
        }
    </style>

    <script>
        $(document).ready(function () {
            $('.mediPlayer').mediaPlayer();
        });
    </script>
    <script src="{{asset('themes-assets/js/player.js')}}"></script>
    <!-- wrapper end -->
    <div class="clearfix"></div>
@stop
