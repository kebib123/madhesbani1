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
                           value="{{ $data->nepali_date }}" placeholder="२०७५ बैशाख १" readonly>

                    <select class="form-control" name="hour">
                        <option value="००">००</option>
                        <option value="०१" {{($data->hour == '०१')?'selected':''}}>०१</option>
                        <option value="०२" {{($data->hour == '०२')?'selected':''}}>०२</option>
                        <option value="०३" {{($data->hour == '०३')?'selected':''}}>०३</option>
                        <option value="०४" {{($data->hour == '०४')?'selected':''}}>०४</option>
                        <option value="०५" {{($data->hour == '०५')?'selected':''}}>०५</option>
                        <option value="०६" {{($data->hour == '०६')?'selected':''}}>०६</option>
                        <option value="०७" {{($data->hour == '०७')?'selected':''}}>०७</option>
                        <option value="०८" {{($data->hour == '०८')?'selected':''}}>०८</option>
                        <option value="०९" {{($data->hour == '०९')?'selected':''}}>०९</option>
                        <option value="१०" {{($data->hour == '१०')?'selected':''}}>१०</option>
                        <option value="११" {{($data->hour == '११')?'selected':''}}>११</option>
                        <option value="१२" {{($data->hour == '१२')?'selected':''}}>१२</option>
                        <option value="१३" {{($data->hour == '१३')?'selected':''}}>१३</option>
                        <option value="१४" {{($data->hour == '१४')?'selected':''}}>१४</option>
                        <option value="१५" {{($data->hour == '१५')?'selected':''}}>१५</option>
                        <option value="१६" {{($data->hour == '१६')?'selected':''}}>१६</option>
                        <option value="१७" {{($data->hour == '१७')?'selected':''}}>१७</option>
                        <option value="१८" {{($data->hour == '१८')?'selected':''}}>१८</option>
                        <option value="१९" {{($data->hour == '१९')?'selected':''}}>१९</option>
                        <option value="२०" {{($data->hour == '२०')?'selected':''}}>२०</option>
                        <option value="२१" {{($data->hour == '२१')?'selected':''}}>२१</option>
                        <option value="२२" {{($data->hour == '२२')?'selected':''}}>२२</option>
                        <option value="२३" {{($data->hour == '२३')?'selected':''}}>२३</option>
                        >
                    </select>
                    <select class="form-control" name="minute">
                        <option value="००">००</option>
                        <option value="०१" {{($data->minute == '०१')?'selected':''}}>०१</option>
                        <option value="०२" {{($data->minute == '०२')?'selected':''}}>०२</option>
                        <option value="०४" {{($data->minute == '०४')?'selected':''}}>०४</option>
                        <option value="०३" {{($data->minute == '०३')?'selected':''}}>०३</option>
                        <option value="०५" {{($data->minute == '०५')?'selected':''}}>०५</option>
                        <option value="०६" {{($data->minute == '०६')?'selected':''}}>०६</option>
                        <option value="०७" {{($data->minute == '०७')?'selected':''}}>०७</option>
                        <option value="०८" {{($data->minute == '०८')?'selected':''}}>०८</option>
                        <option value="०९" {{($data->minute == '०९')?'selected':''}}>०९</option>
                        <option value="१०" {{($data->minute == '१०')?'selected':''}}>१०</option>
                        <option value="११" {{($data->minute == '११')?'selected':''}}>११</option>
                        <option value="१२" {{($data->minute == '१२')?'selected':''}}>१२</option>
                        <option value="१३" {{($data->minute == '१३')?'selected':''}}>१३</option>
                        <option value="१४" {{($data->minute == '१४')?'selected':''}}>१४</option>
                        <option value="१५" {{($data->minute == '१५')?'selected':''}}>१५</option>
                        <option value="१६" {{($data->minute == '१६')?'selected':''}}>१६</option>
                        <option value="१७" {{($data->minute == '१७')?'selected':''}}>१७</option>
                        <option value="१८" {{($data->minute == '१८')?'selected':''}}>१८</option>
                        <option value="१९" {{($data->minute == '१९')?'selected':''}}>१९</option>
                        <option value="२०" {{($data->minute == '२०')?'selected':''}}>२०</option>
                        <option value="२१" {{($data->minute == '२१')?'selected':''}}>२१</option>
                        <option value="२२" {{($data->minute == '२२')?'selected':''}}>२२</option>
                        <option value="२३" {{($data->minute == '२३')?'selected':''}}>२३</option>
                        <option value="२४" {{($data->minute == '२४')?'selected':''}}>२४</option>
                        <option value="२५" {{($data->minute == '२५')?'selected':''}}>२५</option>
                        <option value="२६" {{($data->minute == '२६')?'selected':''}}>२६</option>
                        <option value="२७" {{($data->minute == '२७')?'selected':''}}>२७</option>
                        <option value="२८" {{($data->minute == '२८')?'selected':''}}>२८</option>
                        <option value="२९" {{($data->minute == '२९')?'selected':''}}>२९</option>
                        <option value="३०" {{($data->minute == '३०')?'selected':''}}>३०</option>
                        <option value="३१" {{($data->minute == '३१')?'selected':''}}>३१</option>
                        <option value="३२" {{($data->minute == '३२')?'selected':''}}>३२</option>
                        <option value="३३" {{($data->minute == '३३')?'selected':''}}>३३</option>
                        <option value="३४" {{($data->minute == '३४')?'selected':''}}>३४</option>
                        <option value="३५" {{($data->minute == '३५')?'selected':''}}>३५</option>
                        <option value="३६" {{($data->minute == '३६')?'selected':''}}>३६</option>
                        <option value="३७" {{($data->minute == '३७')?'selected':''}}>३७</option>
                        <option value="३८" {{($data->minute == '३८')?'selected':''}}>३८</option>
                        <option value="३९" {{($data->minute == '३९')?'selected':''}}>३९</option>
                        <option value="४०" {{($data->minute == '४०')?'selected':''}}>४०</option>
                        <option value="४१" {{($data->minute == '४१')?'selected':''}}>४१</option>
                        <option value="४२" {{($data->minute == '४२')?'selected':''}}>४२</option>
                        <option value="४३" {{($data->minute == '४३')?'selected':''}}>४३</option>
                        <option value="४४" {{($data->minute == '४४')?'selected':''}}>४४</option>
                        <option value="४५" {{($data->minute == '४५')?'selected':''}}>४५</option>
                        <option value="४६" {{($data->minute == '४६')?'selected':''}}>४६</option>
                        <option value="४७" {{($data->minute == '४७')?'selected':''}}>४७</option>
                        <option value="४८" {{($data->minute == '४८')?'selected':''}}४८
                        </option>
                        <option value="४९" {{($data->minute == '४९')?'selected':''}}>४९</option>
                        <option value="५०" {{($data->minute == '५०')?'selected':''}}>५०</option>
                        <option value="५१" {{($data->minute == '५१')?'selected':''}}>५१</option>
                        <option value="५२" {{($data->minute == '५२')?'selected':''}}>५२</option>
                        <option value="५३" {{($data->minute == '५३')?'selected':''}}>५३</option>
                        <option value="५४" {{($data->minute == '५४')?'selected':''}}>५४</option>
                        <option value="५५" {{($data->minute == '५५')?'selected':''}}>५५</option>
                        <option value="५६" {{($data->minute == '५६')?'selected':''}}>५६</option>
                        <option value="५७" {{($data->minute == '५७')?'selected':''}}>५७</option>
                        <option value="५८" {{($data->minute == '५८')?'selected':''}}>५८</option>
                        <option value="५९" {{($data->minute == '५९')?'selected':''}}>५९</option>
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
