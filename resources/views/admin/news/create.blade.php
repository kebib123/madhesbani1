@extends('admin.master')
@section('title','Post')

@section('breadcrumb')
@endsection

@section('content')
    <!-- Begin: Content -->
    <section id="content"  >
        <!-- begin: .tray-center -->

        <div class="col-lg-9">
            <h3 style="text-left"> Add New   &nbsp;
                <a class="" href="{{ route('news.list', Request::segment(3) ) }}">List</a></h3>
            <form class="form-horizontal" action="{{ route('news.store', Request::segment(3) ) }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="panel-group accordion" id="accordion">
                    <div class="_form-group panel bs-component">
                        <input type="text" class="form-control" name="news_title" placeholder="News Title" value="{{ old('news_title') }}" />
                    </div>
                    <div class="_form-group panel">
                        <input type="text" class="form-control" name="sub_title" placeholder="Sub Title" value="{{ old('sub_title') }}" />
                    </div>
                    <div class="_form-group panel">
                        <div class="panel">
                            <div class="panel-body pn of-h" >
                                <textarea class="my-editor" name="news_content" style="width: 100%;"> {{ old('news_content') }} </textarea>
                            </div>
                        </div>
                    </div>
                    <!--  -->
                </div>

                <!--  -->
                <div class="panel-group accordion" id="accordion">
                    <div class="panel">
                        <div class="panel-heading">
                            <a class="accordion-toggle accordion-icon link-unstyled" data-toggle="collapse" data-parent="#accordion" href="#accord1" aria-expanded="true">
                                News Brief
                            </a>
                        </div>
                        <div id="accord1" class="panel-collapse collapse in" name="news_excerpt" aria-expanded="true">
                            <div class="panel-body">
                                <textarea class="form-control" name="news_excerpt" rows="3"> {{ old('news_excerpt') }} </textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <!--  -->

                <!--  -->
                <div class="panel-group accordion" id="accordion">
                    <div class="panel">
                        <div class="panel-heading">
                            <a class="accordion-toggle accordion-icon link-unstyled" data-toggle="collapse" data-parent="#accordion" href="#accord2" aria-expanded="true">
                                SEO
                            </a>
                        </div>
                        <div id="accord2" class="panel-collapse collapse in" style="" aria-expanded="true">
                            <div class="panel-body">

                                <div class="form-group">
                                    <label class="col-lg-3 control-label">Supporting Title: <a class="qu"></a></label>
                                    <div class="col-lg-8">
                                        <input type="text" class="form-control" name="supporting_title" value="{{ old('supporting_title') }}" />
                                    </div>
                                </div>

                                <!--  -->
                                <div class="form-group">
                                    <label class="col-lg-3 control-label">Focus Keyword: <a class="qu"></a></label>
                                    <div class="col-lg-8">
                                        <input type="text" class="form-control" name="meta_keyword" value="{{ old('meta_keyword') }}" />
                                    </div>
                                </div>
                                <!--  -->
                                <!--  -->
                                <div class="form-group">
                                    <label class="col-lg-3 control-label">SEO Title: <a class="qu"></a></label>
                                    <div class="col-lg-8">
                                        <input type="text" class="form-control" name="seo_title" value="{{ old('seo_title') }}" />
                                    </div>
                                </div>
                                <!--  -->
                                <!--  -->
                                <div class="form-group">
                                    <label class="col-lg-3 control-label">Meta description: <a class="qu"></a></label>
                                    <div class="col-lg-8">
                                        <textarea name="meta_description" class="form-control" rows="2"> {{ old('meta_description') }} </textarea>
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
                       <input type="text" name="custom_link" class="form-control" value="{{ old('meta_description') }}" />
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
                   <!--&nbsp;  <input type="checkbox" name="video_status" value="1" /> Hide from detail-->
                  <div class="panel-body">
                   <textarea class="form-control" name="news_video" rows="2">{{ old('news_video') }}</textarea>
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
                    <h4> Publish</h4>
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
                    <input type="text" class="form-control" id="date-picker" name="nepali_date" placeholder="२०७५ बैशाख १" value="{{ old('nepali_date') }}"  readonly>

                    <select class="form-control" name="hour">
                        <option value="००">००</option>
                        <option value="०१">०१</option>
                        <option value="०२">०२</option>
                        <option value="०३">०३</option>
                        <option value="०४">०४</option>
                        <option value="०५">०५</option>
                        <option value="०६">०६</option>
                        <option value="०७">०७</option>
                        <option value="०८">०८</option>
                        <option value="०९">०९</option>
                        <option value="१०">१०</option>
                        <option value="११">११</option>
                        <option value="१२">१२</option>
                        <option value="१३">१३</option>
                        <option value="१४">१४</option>
                        <option value="१५">१५</option>
                        <option value="१६">१६</option>
                        <option value="१७">१७</option>
                        <option value="१८">१८</option>
                        <option value="१९">१९</option>
                        <option value="२०">२०</option>
                        <option value="२१">२१</option>
                        <option value="२२">२२</option>
                        <option value="२३">२३</option>
                    </select>
                    <select class="form-control" name="minute">
                        <option value="००">००</option>
                        <option value="०१">०१</option>
                        <option value="०२">०२</option>
                        <option value="०४">०४</option>
                        <option value="०३">०३</option>
                        <option value="०५">०५</option>
                        <option value="०६">०६</option>
                        <option value="०७">०७</option>
                        <option value="०८">०८</option>
                        <option value="०९">०९</option>
                        <option value="१०">१०</option>
                        <option value="११">११</option>
                        <option value="१२">१२</option>
                        <option value="१३">१३</option>
                        <option value="१४">१४</option>
                        <option value="१५">१५</option>
                        <option value="१६">१६</option>
                        <option value="१७">१७</option>
                        <option value="१८">१८</option>
                        <option value="१९">१९</option>
                        <option value="२०">२०</option>
                        <option value="२१">२१</option>
                        <option value="२२">२२</option>
                        <option value="२३">२३</option>
                        <option value="२४">२४</option>
                        <option value="२५">२५</option>
                        <option value="२६">२६</option>
                        <option value="२७">२७</option>
                        <option value="२८">२८</option>
                        <option value="२९">२९</option>
                        <option value="३०">३०</option>
                        <option value="३१">३१</option>
                        <option value="३२">३२</option>
                        <option value="३३">३३</option>
                        <option value="३४">३४</option>
                        <option value="३५">३५</option>
                        <option value="३६">३६</option>
                        <option value="३७">३७</option>
                        <option value="३८">३८</option>
                        <option value="३९">३९</option>
                        <option value="४०">४०</option>
                        <option value="४१">४१</option>
                        <option value="४२">४२</option>
                        <option value="४३">४३</option>
                        <option value="४४">४४</option>
                        <option value="४५">४५</option>
                        <option value="४६">४६</option>
                        <option value="४७">४७</option>
                        <option value="४८">४८</option>
                        <option value="४९">४९</option>
                        <option value="५०">५०</option>
                        <option value="५१">५१</option>
                        <option value="५२">५२</option>
                        <option value="५३">५३</option>
                        <option value="५४">५४</option>
                        <option value="५५">५५</option>
                        <option value="५६">५६</option>
                        <option value="५७">५७</option>
                        <option value="५८">५८</option>
                        <option value="५९">५९</option>
                    </select>

                </div>

            <?php /* ?>
<div class="sid_bvijay mb10">
 <h4> Meta Fields</h4>
 <div class="hd_show_con">
  <div class="tab-content mb15">
   <ul class="ctgor">
    <li>
     <label class="option">
       <input type="checkbox" name="is_headline" class="checkshow1" value="1">
       <span class="checkbox"></span>Headline</label>
     </li>

    <!--  -->
    <li>
     <label class="option">
       <input type="checkbox" name="is_breaking_news" class="checkshow" value="1">
       <span class="checkbox"></span>Breaking News
     </label>
   </li>
</ul>
</div>
</div>
</div>
<?php */ ?>
            <!---->


                <div class="sid_bvijay mb10">
                    <h4> Meta Fields</h4>
                    <div class="hd_show_con">
                        <div class="tab-content mb15">
                            <ul class="ctgor">
                                <li>
                                    <div class="bs-component">
                                        <div class="radio-custom mb5">
                                            <input type="radio" id="radioExample3" name="is_specialnews" value="0" checked />
                                            <label for="radioExample3">Default </label>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="bs-component">
                                        <div class="radio-custom mb5">
                                            <input type="radio" id="radioExample4" name="is_specialnews" value="1" />
                                            <label for="radioExample4">HeadLine News</label>
                                        </div>
                                    </div>
                                </li>
                                <li>

                                    <div class="bs-component">
                                        <div class="radio-custom mb5">
                                            <input type="radio" id="radioExample5" name="is_specialnews" value="2" />
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
                    <h4> News Type/Categories </h4>
                    <div class="hd_show_con">
                        <!-- <ul class="product_cata">
                         <li class="active">
                          <a href="#tab1" data-toggle="tab"> News Categories  </a>
                        </li>
                        <li >
                          <a href="#tab2" data-toggle="tab">Most Used</a>
                        </li>
                      </ul> -->
                        <div class="tab-content mb15">
                            <div id="tab1" class="tab-pane active">
                                @if($newtype->count() > 0)
                                    <ul class="ctgor">
                                        @foreach($newtype as $row)
                                            <li>
                                                <label class="option">
                                                    <input type="checkbox" name="news_type[]" value="{{ $row->id }}">
                                                    <span class="checkbox"></span> {{ $row->news_type }}
                                                </label>
                                            </li>
                                            @if(show_newscategory($row->id)->count() > 0)
                                                <ol>
                                                    @foreach( show_newscategory($row->id) as $crow )
                                                        <li>
                                                            <label class="option">
                                                                <input type="checkbox" name="news_category[]" value="{{ $crow->id }} ">
                                                                <span class="checkbox"></span> {{ $crow->category }}
                                                            </label>
                                                        </li>
                                                    @endforeach
                                                </ol>
                                            @endif
                                        @endforeach
                                    </ul>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                <div class="sid_bvijay mb10">
                    <input type="text" class="form-control" name="ordering" placeholder="Ordering" value="{{ $_ordering }}" readonly />
                </div>

{{--                <div class="sid_bvijay mb10">--}}
{{--                    <select name="author" class="form-control input-sm">--}}
{{--                        <option disabled selected> Choose Author </option>--}}
{{--                        @foreach($authors as $row)--}}
{{--                            <option value="{{ $row->id }}">{{ ucfirst($row->name) }}</option>--}}
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
{{--                                        <option disabled selected> Choose Content Writer </option>--}}
{{--                                        @foreach($content_writers as $row)--}}
{{--                                            <option value="{{ $row->id }}">{{ ucfirst($row->name) }}</option>--}}
{{--                                        @endforeach--}}
{{--                                    </select>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                @endif--}}

{{--                <div class="sid_bvijay mb10">--}}
{{--                    <h4> Audio </h4>--}}
{{--                    <div class="hd_show_con">--}}
{{--                        <div id="xedit-demo">--}}
{{--                            <input type="file" name="audio"/>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}

                <div class="sid_bvijay mb10">
                    <h4> Thumbnail </h4>
                    <div class="hd_show_con">
{{--                        <input type="checkbox" name="thumbnail_status" value="1" /> Hide from detail--}}
                        <div id="xedit-demo">
                            <input type="file" name="news_thumbnail" />
                        </div>
                    </div>
                </div>
                <?php /*?>
<div class="sid_bvijay mb10">
 <h4> Caption </h4>
 <div class="hd_show_con">
 <div id="xedit-demo">
   <input type="text" name="thumbnail_caption" class="form-control" />
 </div>
</div>
</div>
<?php */?>
            </div>
        </aside>

        </form>
    </section>
    <!-- End: Content -->

@endsection
