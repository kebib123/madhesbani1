@extends('admin.master')
@section('title','News Edit')
@section('breadcrumb')
@endsection
@section('content')
    <!-- Begin: Content -->
    <section id="content">
        <!-- begin: .tray-center -->

        <div class="col-lg-9">
            <h3 style="text-left"> Edit News &nbsp;
                <a class="" href="{{ route('news.list', Request::segment(3) ) }}">List</a> |
                <a href="{{ route('news.create', Request::segment(3) ) }}"> Create Post</a> |
                <a href="{{route('news.newsdetail',[get_newstype($data->news_type)->uri, $data->uri])}}"
                   target="_blank"> Visit Web</a>
            </h3>
            <form class="form-horizontal" action="{{ url('admin/type/'.Request::segment(3) ,$data->id ) }}"
                  method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <input type="hidden" name="_method" value="PUT"/>
                <div class="panel-group accordion" id="accordion">
                    <div class="_form-group panel bs-component">
                        <input type="text" class="form-control" name="news_title" value="{{ $data->news_title }}"
                               placeholder="News Title">
                    </div>
                    <div class="_form-group panel">
                        <input type="text" class="form-control" name="sub_title" value="{{ $data->sub_title }}"
                               placeholder="Sub Title">
                    </div>
                    <div class="_form-group panel">
                        <div class="panel">
                            <div class="panel-body pn of-h">
                       <textarea class="my-editor" name="news_content" style="width: 100%;">
                         {{ $data->news_content }}
                       </textarea>
                            </div>
                        </div>
                    </div>
                    <!--  -->
                </div>

                <!--  -->
                <div class="panel-group accordion" id="accordion">
                    <div class="panel">
                        <div class="panel-heading">
                            <a class="accordion-toggle accordion-icon link-unstyled" data-toggle="collapse"
                               data-parent="#accordion" href="#accord1" aria-expanded="true">
                                News Brief
                            </a>
                        </div>
                        <div id="accord1" class="panel-collapse collapse in" name="news_excerpt" aria-expanded="true">
                            <div class="panel-body">
                                <textarea class="form-control" name="news_excerpt"
                                          rows="3">{{ $data->news_excerpt }}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <!--  -->

                <!--  -->
                <div class="panel-group accordion" id="accordion">
                    <div class="panel">
                        <div class="panel-heading">
                            <a class="accordion-toggle accordion-icon link-unstyled" data-toggle="collapse"
                               data-parent="#accordion" href="#accord2" aria-expanded="true">
                                SEO
                            </a>
                        </div>
                        <div id="accord2" class="panel-collapse collapse in" style="" aria-expanded="true">
                            <div class="panel-body">

                                <div class="form-group">
                                    <label class="col-lg-3 control-label">Supporting Title: <a class="qu"></a></label>
                                    <div class="col-lg-8">
                                        <input type="text" class="form-control" name="supporting_title"
                                               value="{{ $data->supporting_title }}"/>
                                    </div>
                                </div>

                                <!--  -->
                                <div class="form-group">
                                    <label class="col-lg-3 control-label">Focus Keyword: <a class="qu"></a></label>
                                    <div class="col-lg-8">
                                        <input type="text" class="form-control" name="meta_keyword"
                                               value="{{ $data->meta_keyword }}"/>
                                    </div>
                                </div>
                                <!--  -->
                                <!--  -->
                                <div class="form-group">
                                    <label class="col-lg-3 control-label">SEO Title: <a class="qu"></a></label>
                                    <div class="col-lg-8">
                                        <input type="text" class="form-control" name="seo_title"
                                               value="{{ $data->seo_title }}"/>
                                    </div>
                                </div>
                                <!--  -->
                                <!--  -->
                                <div class="form-group">
                                    <label class="col-lg-3 control-label">Meta description: <a class="qu"></a></label>
                                    <div class="col-lg-8">
                                        <textarea name="meta_description" class="form-control"
                                                  rows="2">{{ $data->meta_description }}</textarea>
                                        <br><span>The <code>meta</code> description will be limited to 300 chars.</span>
                                    </div>
                                </div>
                                <!--  -->

                            </div>
                        </div>
                    </div>
                </div>
                <!--  -->
            <?php /*?>
<!--  -->
                <div class="panel-group accordion" id="accordion">
                  <div class="panel">
                   <div class="panel-heading">
                    <a class="accordion-toggle accordion-icon link-unstyled" data-toggle="collapse" data-parent="#accordion" href="#accord3" aria-expanded="true">
                      Custom Link
                    </a>
                  </div>
                  <div id="accord3" class="panel-collapse collapse in" aria-expanded="true">
                    <div class="panel-body">
                      <div class="form-group">
                       <input type="text" name="custom_link" class="form-control" value="{{ $data->custom_link }}" />
                     </div>
                   </div>
                 </div>
                </div>
                </div>
                <!--  -->
                 <!--  -->
               <div class="panel-group accordion" id="accordion">
                <div class="panel">
                 <div class="panel-heading">
                  <a class="accordion-toggle accordion-icon link-unstyled" data-toggle="collapse" data-parent="#accordion" href="#accord_1" aria-expanded="true">
                    News Video
                  </a>
                </div>
                <div id="accord_1" class="panel-collapse collapse in" aria-expanded="true">
                &nbsp;  <input type="checkbox" name="video_status" value="1" {{ ($data->video_status)?"checked":"" }} /> Hide from detail
                  <div class="panel-body">
                   <textarea class="form-control" name="news_video" rows="2">{{ $data->news_video }}</textarea>
                 </div>
               </div>
             </div>
           </div>
           <!--  -->
<?php */?>
        </div>
        <!-- end: .tray-center -->
        <aside class="col-lg-3 ">
            <!-- menu quick links -->
            <div class="admin-form">
                <div class="sid_bvijay mb10">
                    <h4> Publish </h4>
                    <footer>
                        <div id="delete-action">
                        </div>
                        <div id="publishing-action">
                            <button type="submit" class="btn btn-primary btn-sm">Publish</button>
                        </div>
                        <div class="clearfix"></div>
                    </footer>
                    <div class="clearfix"></div>
                </div>
                <div class="sid_bvijay mb10">
                    <input type="text" class="form-control" id="date-picker" name="nepali_date"
                           value="{{ $data->nepali_date }}" placeholder="???????????? ??????????????? ???" readonly>

                    <select class="form-control" name="hour">
                        <option value="??????">??????</option>
                        <option value="??????" {{($data->hour == '??????')?'selected':''}}>??????</option>
                        <option value="??????" {{($data->hour == '??????')?'selected':''}}>??????</option>
                        <option value="??????" {{($data->hour == '??????')?'selected':''}}>??????</option>
                        <option value="??????" {{($data->hour == '??????')?'selected':''}}>??????</option>
                        <option value="??????" {{($data->hour == '??????')?'selected':''}}>??????</option>
                        <option value="??????" {{($data->hour == '??????')?'selected':''}}>??????</option>
                        <option value="??????" {{($data->hour == '??????')?'selected':''}}>??????</option>
                        <option value="??????" {{($data->hour == '??????')?'selected':''}}>??????</option>
                        <option value="??????" {{($data->hour == '??????')?'selected':''}}>??????</option>
                        <option value="??????" {{($data->hour == '??????')?'selected':''}}>??????</option>
                        <option value="??????" {{($data->hour == '??????')?'selected':''}}>??????</option>
                        <option value="??????" {{($data->hour == '??????')?'selected':''}}>??????</option>
                        <option value="??????" {{($data->hour == '??????')?'selected':''}}>??????</option>
                        <option value="??????" {{($data->hour == '??????')?'selected':''}}>??????</option>
                        <option value="??????" {{($data->hour == '??????')?'selected':''}}>??????</option>
                        <option value="??????" {{($data->hour == '??????')?'selected':''}}>??????</option>
                        <option value="??????" {{($data->hour == '??????')?'selected':''}}>??????</option>
                        <option value="??????" {{($data->hour == '??????')?'selected':''}}>??????</option>
                        <option value="??????" {{($data->hour == '??????')?'selected':''}}>??????</option>
                        <option value="??????" {{($data->hour == '??????')?'selected':''}}>??????</option>
                        <option value="??????" {{($data->hour == '??????')?'selected':''}}>??????</option>
                        <option value="??????" {{($data->hour == '??????')?'selected':''}}>??????</option>
                        <option value="??????" {{($data->hour == '??????')?'selected':''}}>??????</option>
                        >
                    </select>
                    <select class="form-control" name="minute">
                        <option value="??????">??????</option>
                        <option value="??????" {{($data->minute == '??????')?'selected':''}}>??????</option>
                        <option value="??????" {{($data->minute == '??????')?'selected':''}}>??????</option>
                        <option value="??????" {{($data->minute == '??????')?'selected':''}}>??????</option>
                        <option value="??????" {{($data->minute == '??????')?'selected':''}}>??????</option>
                        <option value="??????" {{($data->minute == '??????')?'selected':''}}>??????</option>
                        <option value="??????" {{($data->minute == '??????')?'selected':''}}>??????</option>
                        <option value="??????" {{($data->minute == '??????')?'selected':''}}>??????</option>
                        <option value="??????" {{($data->minute == '??????')?'selected':''}}>??????</option>
                        <option value="??????" {{($data->minute == '??????')?'selected':''}}>??????</option>
                        <option value="??????" {{($data->minute == '??????')?'selected':''}}>??????</option>
                        <option value="??????" {{($data->minute == '??????')?'selected':''}}>??????</option>
                        <option value="??????" {{($data->minute == '??????')?'selected':''}}>??????</option>
                        <option value="??????" {{($data->minute == '??????')?'selected':''}}>??????</option>
                        <option value="??????" {{($data->minute == '??????')?'selected':''}}>??????</option>
                        <option value="??????" {{($data->minute == '??????')?'selected':''}}>??????</option>
                        <option value="??????" {{($data->minute == '??????')?'selected':''}}>??????</option>
                        <option value="??????" {{($data->minute == '??????')?'selected':''}}>??????</option>
                        <option value="??????" {{($data->minute == '??????')?'selected':''}}>??????</option>
                        <option value="??????" {{($data->minute == '??????')?'selected':''}}>??????</option>
                        <option value="??????" {{($data->minute == '??????')?'selected':''}}>??????</option>
                        <option value="??????" {{($data->minute == '??????')?'selected':''}}>??????</option>
                        <option value="??????" {{($data->minute == '??????')?'selected':''}}>??????</option>
                        <option value="??????" {{($data->minute == '??????')?'selected':''}}>??????</option>
                        <option value="??????" {{($data->minute == '??????')?'selected':''}}>??????</option>
                        <option value="??????" {{($data->minute == '??????')?'selected':''}}>??????</option>
                        <option value="??????" {{($data->minute == '??????')?'selected':''}}>??????</option>
                        <option value="??????" {{($data->minute == '??????')?'selected':''}}>??????</option>
                        <option value="??????" {{($data->minute == '??????')?'selected':''}}>??????</option>
                        <option value="??????" {{($data->minute == '??????')?'selected':''}}>??????</option>
                        <option value="??????" {{($data->minute == '??????')?'selected':''}}>??????</option>
                        <option value="??????" {{($data->minute == '??????')?'selected':''}}>??????</option>
                        <option value="??????" {{($data->minute == '??????')?'selected':''}}>??????</option>
                        <option value="??????" {{($data->minute == '??????')?'selected':''}}>??????</option>
                        <option value="??????" {{($data->minute == '??????')?'selected':''}}>??????</option>
                        <option value="??????" {{($data->minute == '??????')?'selected':''}}>??????</option>
                        <option value="??????" {{($data->minute == '??????')?'selected':''}}>??????</option>
                        <option value="??????" {{($data->minute == '??????')?'selected':''}}>??????</option>
                        <option value="??????" {{($data->minute == '??????')?'selected':''}}>??????</option>
                        <option value="??????" {{($data->minute == '??????')?'selected':''}}>??????</option>
                        <option value="??????" {{($data->minute == '??????')?'selected':''}}>??????</option>
                        <option value="??????" {{($data->minute == '??????')?'selected':''}}>??????</option>
                        <option value="??????" {{($data->minute == '??????')?'selected':''}}>??????</option>
                        <option value="??????" {{($data->minute == '??????')?'selected':''}}>??????</option>
                        <option value="??????" {{($data->minute == '??????')?'selected':''}}>??????</option>
                        <option value="??????" {{($data->minute == '??????')?'selected':''}}>??????</option>
                        <option value="??????" {{($data->minute == '??????')?'selected':''}}>??????</option>
                        <option value="??????" {{($data->minute == '??????')?'selected':''}}>??????</option>
                        <option value="??????" {{($data->minute == '??????')?'selected':''}}??????
                        </option>
                        <option value="??????" {{($data->minute == '??????')?'selected':''}}>??????</option>
                        <option value="??????" {{($data->minute == '??????')?'selected':''}}>??????</option>
                        <option value="??????" {{($data->minute == '??????')?'selected':''}}>??????</option>
                        <option value="??????" {{($data->minute == '??????')?'selected':''}}>??????</option>
                        <option value="??????" {{($data->minute == '??????')?'selected':''}}>??????</option>
                        <option value="??????" {{($data->minute == '??????')?'selected':''}}>??????</option>
                        <option value="??????" {{($data->minute == '??????')?'selected':''}}>??????</option>
                        <option value="??????" {{($data->minute == '??????')?'selected':''}}>??????</option>
                        <option value="??????" {{($data->minute == '??????')?'selected':''}}>??????</option>
                        <option value="??????" {{($data->minute == '??????')?'selected':''}}>??????</option>
                        <option value="??????" {{($data->minute == '??????')?'selected':''}}>??????</option>
                    </select>

                </div>

                <div class="sid_bvijay mb10">
                    <h4> Meta Fields</h4>
                    <div class="hd_show_con">
                        <div class="tab-content mb15">
                            <ul class="ctgor">
                                <li>
                                    <div class="bs-component">
                                        <div class="radio-custom mb5">
                                            <input type="radio" id="radioExample3" name="is_specialnews"
                                                   value="0" {{ ($data->is_specialnews == 0)?"checked":"" }} />
                                            <label for="radioExample3">Default </label>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="bs-component">
                                        <div class="radio-custom mb5">
                                            <input type="radio" id="radioExample4" name="is_specialnews"
                                                   value="1" {{ ($data->is_specialnews == 1)?"checked":"" }} />
                                            <label for="radioExample4">Headline News</label>
                                        </div>
                                    </div>
                                </li>
                                <li>

                                    <div class="bs-component">
                                        <div class="radio-custom mb5">
                                            <input type="radio" id="radioExample5" name="is_specialnews"
                                                   value="2" {{ ($data->is_specialnews == 2)?"checked":"" }} />
                                            <label for="radioExample5">Breaking News</label>
                                        </div>
                                    </div>

                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!---->

                <div class="sid_bvijay mb10">
                    <h4> News Type </h4>
                    <div class="hd_show_con">
                        <div class="tab-content mb15">
                            <div id="tab1" class="tab-pane active">
                                @if($newtype->count() > 0)
                                    <ul class="ctgor">
                                        @foreach($newtype as $row)
                                            <li>
                                                <label class="option">
                                                    <input type="checkbox" name="news_type[]"
                                                           value="{{ $row->id }}" {{ (in_array($row->id,$check_newstype))?"checked":"" }} />
                                                    <span class="checkbox"></span> {{ $row->news_type }}
                                                </label>
                                            </li>
                                        @endforeach
                                    </ul>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>


                <div class="sid_bvijay mb10">
                    <input type="text" class="form-control" name="ordering" placeholder="Ordering"
                           value="{{ $data->ordering }}" readonly/>
                </div>

{{--                <div class="sid_bvijay mb10">--}}
{{--                    <select name="author" class="form-control input-sm">--}}
{{--                        <option disabled selected> Choose Author</option>--}}
{{--                        @foreach($authors as $row)--}}
{{--                            <option--}}
{{--                                value="{{ $row->id }}" {{ ($row->id == $data->author)?"selected":""}} >{{ ucfirst($row->name) }}</option>--}}
{{--                        @endforeach--}}
{{--                    </select>--}}
{{--                </div>--}}

{{--                @if($content_writers->count() > 0)--}}
{{--                    <div class="sid_bvijay mb10">--}}
{{--                        <h4> Post By</h4>--}}
{{--                        <div class="hd_show_con">--}}
{{--                            <div class=" mb15">--}}
{{--                                <div class="form-group">--}}
{{--                                    <select name="content_writer" class="form-control input-sm">--}}
{{--                                        <option disabled selected> Choose Content Writer</option>--}}
{{--                                        @foreach($content_writers as $row)--}}
{{--                                            <option--}}
{{--                                                value="{{ $row->id }}" {{ ($row->id == $data->content_writer)?"selected":"" }} >{{ ucfirst($row->name) }}</option>--}}
{{--                                        @endforeach--}}
{{--                                    </select>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                @endif--}}


{{--                <div class="sid_ mb10">--}}
{{--                    <h4> Audio </h4>--}}
{{--                    <div class="hd_show_con">--}}
{{--                        <div id="xedit-demo">--}}
{{--                            @if($data->audio)--}}
{{--                                <span class="audioid{{$data->id}}">--}}
{{--              <a href="#{{$data->id}}" class="delete_audio">X</a>--}}
{{--                         <audio controls>--}}
{{--                                <source src="{{asset('audio/'.$data->audio)}}" type="audio/mpeg">--}}
{{--                            </audio>--}}
{{--                                    <hr>--}}
{{--              </span>--}}
{{--                            @endif--}}
{{--                            <input type="file" name="audio"/>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}


                <div class="sid_bvijay mb10">
                    <h4> Thumbnail </h4>
                    <div class="hd_show_con">

{{--                        <input type="checkbox" name="thumbnail_status"--}}
{{--                               value="1" {{ ($data->thumbnail_status)?"checked":"" }} /> Hide from detail--}}

                        @if($data->news_thumbnail)
                            @if(file_exists(public_path('uploads/medium/' .  $data->news_thumbnail)))
                                <span class="id{{$data->id}}">
  <img src="{{ asset( env('PUBLIC_PATH') . '/uploads/medium/' . $data->news_thumbnail ) }}"
       alt="{{ $data->news_title }}" class="img-responsive">
  <div id="xedit-demo">
    <a href="#{{$data->id}}" class="imagedelete">Remove Image</a>
 </div>
</span>
                            @endif
                        @endif
                        <div id="xedit-demo">
                            <input type="file" name="news_thumbnail"/>
                        </div>
                    </div>
                </div>

{{--                <div class="sid_bvijay mb10">--}}
{{--                    <h4> Caption </h4>--}}
{{--                    <div class="hd_show_con">--}}
{{--                        <div id="xedit-demo">--}}
{{--                            <input type="text" name="thumbnail_caption" class="form-control"--}}
{{--                                   value="{{ $data->thumbnail_caption }}"/>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}

            </div>
        </aside>

        </form>
    </section>
    <!-- End: Content -->

@endsection

@section('scripts')
    <script type="text/javascript">
        // Delete Thumb
        $('.imagedelete').on('click', function (e) {
            e.preventDefault();
            if (!confirm('Are you sure to delete?')) return false;
            var csrf = $('meta[name="csrf-token"]').attr('content');
            var str = $(this).attr('href');
            var id = str.slice(1);
            $.ajax({
                type: 'DELETE',
                url: "{{url('delete_news_thumbnail') . '/'}}" + id,
                data: {_token: csrf},
                success: function (data) {
                    $('span.id' + id).remove();
                },
                error: function (data) {
                    alert(data + 'Error!');
                }
            });
        });

        //delete audio
        $('.delete_audio').on('click', function (e) {
            e.preventDefault();
            if (!confirm('Are you sure to delete?')) return false;
            var csrf = $('meta[name="csrf-token"]').attr('content');
            var str = $(this).attr('href');
            var id = str.slice(1);
            $.ajax({
                type: 'delete',
                url: "{{url('delete_audio') . '/'}}" + id,
                data: {_token: csrf},
                success: function (data) {
                    $('span.audioid' + id).remove();
                },
                error: function (data) {
                    alert(data + 'Error!');
                }
            });
        });
    </script>
@endsection
