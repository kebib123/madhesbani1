@extends('admin.master')
@section('title', Request::segment(2))

@section('breadcrumb')

@endsection

@section('content')
 <section id="content"  >
  <button type="button" class="btn btn-default btn-sm backlink"><i class="fa fa-angle-double-left" aria-hidden="true"></i> Back </button>
  &nbsp;
<a href="{{ route('editor.post.index',Request::segment(2)) }}" class="btn btn-default btn-sm backlink"><i class="fa fa-list" aria-hidden="true"></i> Show List </a>
<br>
<form class="form-horizontal" role="form" action="{{ route('editor.post.store',Request::segment(2)) }}" method="post" enctype="multipart/form-data">
  {{ csrf_field() }}

  <div class="col-md-9">
    <!-- Input Fields -->
    <div class="panel">
      <div class="panel-heading">
        <span class="panel-title">New Post</span>
      </div>
      <div class="panel-body">
        <input type="hidden" name="post_date" value="<?=date('Y-m-d h:i:s')?>" />
        <input type="hidden" name="post_type" value="{{ Request::segment(2) }}" />
        <div class="form-group">
          <label for="inputStandard" class="col-lg-2 control-label">Title</label>
          <div class="col-lg-9">
            <div class="bs-component">
              <input type="text" id="post_title" name="post_title" class="form-control" placeholder="" />
              <input type="hidden" id="uri" name="uri" class="form-control" placeholder="" />
            </div>
          </div>
        </div>

        <div class="form-group">
          <label for="inputStandard" class="col-lg-2 control-label">Sub Title</label>
          <div class="col-lg-9">
            <div class="bs-component">
              <input type="text" id="" name="sub_title" class="form-control" placeholder="" />
            </div>
          </div>
        </div>

        <div class="form-group">
          <label for="inputSelect" class="col-lg-2 control-label"> Category </label>
          <div class="col-lg-9">
            <div class="bs-component">
              <select name="post_category" class="form-control">
                <option value="0"> Select Category </option>
                @if($category)
                @foreach($category as $row)
                <option value="{{$row->id}}"> {{$row->category}}</option>
                @endforeach
                @endif
              </select>
              <div id="source-button" class="btn btn-primary btn-xs" style="display: none;">&lt; &gt;</div></div>
            </div>
          </div>

          <div class="form-group">
            <label for="inputSelect" class="col-lg-2 control-label">Select Parent</label>
            <div class="col-lg-9">
              <div class="bs-component">
                <select name="post_parent" class="form-control">
                  <option value="0"> Choose Parent </option>
                  @foreach($parent_post as $row)
                  <option value="{{$row->id}}">{{$row->post_title}}</option>

                  @foreach(has_child_post($row->id) as $child_row)
                  <option value="{{$child_row->id}}"> —> {{$child_row->post_title}}</option>
                   <?php /*?>
                  @foreach(has_child_post($child_row->id) as $grand_child_row)
                  <option value="{{$grand_child_row->id}}"> — —> {{$grand_child_row->post_title}}</option>

                  @foreach(has_child_post($grand_child_row->id) as $grand_child_row_x)
                  <option value="{{$grand_child_row_x->id}}"> — — —> {{$grand_child_row_x->post_title}}</option>
                  @endforeach

                  @endforeach
                  <?php */?>
                  @endforeach

                  @endforeach
                </select>
                <div id="source-button" class="btn btn-primary btn-xs" style="display: none;">&lt; &gt;</div></div>
              </div>
            </div>

            <div class="form-group">
              <label class="col-lg-2 control-label" for="textArea3"> Brief </label>
              <div class="col-lg-9">
                <div class="bs-component">
                  <textarea class="form-control" id="" name="post_excerpt" rows="3"></textarea>
                </div>
              </div>
            </div>
            <div class="form-group">
              <label class="col-lg-2 control-label" for="textArea2">Content</label>
              <div class="col-lg-10">
                <div class="bs-component">
                  <textarea class="form-control my-editor" id="" name="post_content" rows="3"></textarea>
                </div>
              </div>
            </div>

            <div class="form-group">
              <label for="inputStandard" class="col-lg-2 control-label">Meta Key</label>
              <div class="col-lg-9">
                <div class="bs-component">
                  <input type="text" id="" name="meta_keyword" class="form-control" placeholder="" />
                </div>
              </div>
            </div>

            <div class="form-group">
              <label class="col-lg-2 control-label" for="textArea3"> Meta Description </label>
              <div class="col-lg-9">
                <div class="bs-component">
                  <textarea class="form-control" id="textArea3" name="meta_description" rows="3"></textarea>
                </div>
              </div>
            </div>

            <?php /*?>
              <div class="form-group">
              <label class="col-lg-2 control-label" for="textArea3">Video ID</label>
              <div class="col-lg-9">
                <div class="bs-component">
                  <input type="text" class="form-control" id="" name="associated_title" />
                </div>
              </div>
            </div>

         <div class="form-group">
              <label for="inputStandard" class="col-lg-2 control-label"> External Link </label>
              <div class="col-lg-9">
                <div class="bs-component">
                  <input type="text" id="" name="external_link" class="form-control" placeholder="http://example.com" />
                </div>
              </div>
            </div>
            <?php */?>
          </div>
        </div>
      </div>

      <div class="col-md-3">
        <div class="admin-form">
          <div class="sid_bvijay mb10">
            <div class="hd_show_con">
              <div class="publice_edi">
                Status: <a href="avoid:javascript;" data-toggle="collapse" data-target="#publish_1">Active</a>
              </div>
            </div>
            <footer>
              <div id="publishing-action">
                <input type="submit" class="btn btn-primary btn-sm" value="Publish" />
              </div>
              <div class="clearfix"></div>
            </footer>
            <div class="clearfix"></div>
          </div>



          <div class="sid_bvijay mb10">
            <label class="field select">
              <select id="template" name="template">
                @foreach($templates as $key=>$template)
                <option value="{{$key}}">{{ ucfirst($template)}}</option>
                @endforeach
              </select>
              <i class="arrow"></i>
            </label>
          </div>

           <div class="sid_bvijay mb10">
            <label class="field select">
              <select id="template_child" name="template_child">
                @foreach($templates_child as $key=>$template_child)
                <option value="{{$key}}">{{ ucfirst($template_child)}}</option>
                @endforeach
              </select>
              <i class="arrow"></i>
            </label>
          </div>

          <div class="sid_bvijay mb10">
            <label class="field text">
              <input type="number" id="" name="post_order" class="form-control" placeholder="Post Order" value="{{ $post_order }}" />
            </label>
          </div>

            <div class="sid_bvijay mb10">
                <h4> Audio </h4>
                <div class="hd_show_con">
                    <div id="xedit-demo">
                        <input type="file" name="audio"/>
                    </div>
                </div>
            </div>


          <div class="sid_bvijay mb10">
            <h4> Thumbnail </h4>
            <div class="hd_show_con">
              <div id="xedit-demo">
               <input type="file" name="page_thumbnail" />
             </div>
           </div>
         </div>


          <?php /*?>
           <div class="sid_bvijay mb10">
            <div class="hd_show_con">
              Show project in home
              <input type="checkbox" name="show_in_home" value="1" />
            </div>
          </div>

         <div class="sid_bvijay mb10">
            <h4> Banner </h4>
            <div class="hd_show_con">
              <div id="xedit-demo">
               <input type="file" name="cover" />
             </div>
           </div>
         </div>
        <?php */?>
       </div>

     </div>
   </form>
 </section>
   @endsection
   @section('scripts')
   <script type="text/javascript">
    $(document).ready(function(){
      $('#post_title').on('keyup',function(){
        var post_title;
        post_title = $('#post_title').val();
        post_title=post_title.replace(/[^a-zA-Z0-9 ]+/g,"");
        post_title=post_title.replace(/\s+/g, "-");
        $('#uri').val(post_title);
      });
    });

// Go back link
$('.backlink').click(function(){
  var url = '<?=url()->previous(); ?>';
  window.location=url;
});

  </script>
  @endsection
