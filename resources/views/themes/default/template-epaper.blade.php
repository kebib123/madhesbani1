@extends('themes.default.common.master')
@section('content')
    <div class="wrapper">
        <div class="bg_white pv-30 ">
            <div class="container clearfix">
                <div class="row ">
                    <!-- left sec start -->
                    <div class="col-lg-16">
                        <div class="epaper_search">
                            <div class="col-lg-4 ">
                                <div class="iner">
                                    <h1><span class="border"><a>{{$data->post_title}} </a></span></h1>
                                </div>
                            </div>
                            <div class="col-lg-4 pull-right">
                            </div>
                            <div class="clearfix"></div>
                        </div>

                        <div class="epaper_main_wrap">
                            <div class="clearfix"></div>
                            @foreach($documents as $value)
                            <div class="col-lg-4">
                                <div class="epaper_wrap">
                                    <a href="{{asset('uploads/doc/'.$value->document)}}"
                                       target="_blank"><img
                                            src="{{ asset(env('PUBLIC_PATH').'uploads/medium/' . $value->doc_thumb) }}"
                                            class="img-responsive"></a>
                                    <div class="epaper_title">
                                        <h2><a href="{{asset('uploads/doc/'.$value->document)}}"
                                               target="_blank">{{$value->post_title}}</a>
                                        </h2>
                                    </div>
                                </div>
                            </div>
                            @endforeach

                            <div class="clearfix"></div>


                        </div>

                        <nav aria-label="Page navigation example">
                            <ul class="pagination">
                                {!! $documents->links() !!}
                          </ul>
                        </nav>
                    </div>


                </div>

            </div>
        </div>
    </div>
    <!-- wrapper end -->
    <div class="clearfix"></div>
@endsection
