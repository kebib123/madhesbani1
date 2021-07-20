@extends('themes.default.common.master')
@section('content')
    <div class="wrapper"><!-- bage header start -->
        <div class="row ">
            <div class="container clearfix">
                <div class="bg_breadcomns">
                    <div class="page-header ">
                        <h1>{{ $data->post_title }}</h1>
                        <ol class="breadcrumb">
                            <li><a href="{{url('/')}}">मुख्य पृष्ठ</a>
                            </li>
                            <li class="active">{{ $data->post_title }}</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- bage header end -->
        <div class="  col-lg-16  mb-50 ">
            <!-- data start -->
            <div class=" contact_us  ">
                <div class="container  clearfix  ">
                    <!-- left sec start -->
                    <div class=" mt-20  ">
                        <div class="col-sm-7  left_col pading_r">
                            <address>
                                <p class="clearfix"><i class="fa fa-map-marker"></i>
                                    {{$setting->address}}
                                </p>
                                <p class="clearfix"><i class="fa fa-phone"></i>{{$setting->phone}}</p>
                                <p class="clearfix"><i class="fa fa-envelope"></i> {{$setting->email_primary}}</p>
                            </address>
                        </div>
                        <div class="col-sm-8    adress">
                            <div class="map  mb-20">
                               {!! $data->post_excerpt !!}
                            </div>

                        </div>
                    </div>
                </div>
                <!-- left sec end -->

                <div class="pv-20"></div>
            </div>

        </div>
    </div>
    <!-- wrapper end -->
    <div class="clearfix"></div>
@stop
