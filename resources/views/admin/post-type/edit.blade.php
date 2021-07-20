@extends('admin.master')
@section('title','Post')

@section('breadcrumb')
@endsection

@section('content') 
    <!-- Begin: Content -->
        <section id="content"  >
  <!-- begin: .tray-center -->

      <div class="col-lg-9">
    <h3 style="text-left">
     <a class="" href="{{ route('type.posttype.create', Request::segment(2)) }}">Create</a>
       &nbsp;
         <a class="" href="{{ route('type.posttype.index',Request::segment(2)) }}">List</a></h3>               
      <form class="form-horizontal" action="{{ url('type/posttype', $data->id) }}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}                 
  <div class="panel-group accordion" id="accordion">
  <!-- Input Fields -->
  <div class="panel">
    <div class="panel-heading">
      <span class="panel-title">Edit Post Type</span>
    </div>
    <div class="panel-body"> 

     <div class="form-group">
          <label for="inputStandard" class="col-lg-3 control-label">Post Type</label>
          <div class="col-lg-8">
            <div class="bs-component">
              <input type="text" id="post_type" name="post_type" class="form-control" placeholder="" value="{{$data->post_type}}" />
            </div>
          </div>
        </div>         
        <div class="form-group">
          <label for="inputStandard" class="col-lg-3 control-label"> Uri</label>
          <div class="col-lg-8">
            <div class="bs-component">
              <input type="text" id="uri" name="uri" class="form-control" placeholder="" value="{{$data->uri}}" readonly />
            </div>
          </div>
        </div> 


            <div class="form-group">
              <label for="inputStandard" class="col-lg-3 control-label">Sub Title</label>
              <div class="col-lg-8">
                <div class="bs-component">
                  <input type="text" id="sub_title" name="sub_title" class="form-control" placeholder="" value="{{$data->sub_title}}"/>
                </div>
              </div>
            </div>

            <div class="form-group">
              <label for="inputStandard" class="col-lg-3 control-label">Brief</label>
              <div class="col-lg-8">
                <div class="bs-component">
                  <textarea class="form-control" id="textArea3" name="post_excerpt" rows="3">{{$data->post_excerpt}}</textarea>
                </div>
              </div>
            </div>

        <div class="form-group">
          <label for="inputStandard" class="col-lg-3 control-label"> Ordering </label>
          <div class="col-lg-8">
            <div class="bs-component">
              <input type="text" id="ordering" name="ordering" class="form-control" value="{{ $data->ordering }}" />
            </div>
          </div>
        </div>  

        <div class="form-group">
          <label for="inputStandard" class="col-lg-3 control-label"> Is Menu ? </label>
          <div class="col-lg-8">
            <div class="bs-component">
              <select name="is_menu" class="form-control input-sm">
                <option value="0" {{($data->is_menu == '0')?'selected':''}}> No </option> 
                <option value="1" {{($data->is_menu == '1')?'selected':''}}> Yes </option>    
              </select>
            </div>
          </div>
        </div>
          <div class="form-group">
          <label class="col-lg-3 control-label" for="textArea3">  </label>
          <div class="col-lg-8">
            <div class="bs-component">
              <input type="submit" class="btn btn-primary btn-lg" value="Submit" />
            </div>
          </div>
        </div>


</div>
</div>          
</div>
</div>
<!-- end: .tray-center -->
<?php /*?>
<aside class="col-lg-3 ">
 <!-- menu quick links -->

        <div class="admin-form">
          <div class="sid_bvijay mb10">
            <h4> Thumbnail </h4>
            <div class="hd_show_con">
              <div id="xedit-demo">
               <input type="file" name="thumbnail" />
             </div>
           </div>
         </div>
       </div>
    
</aside>
<?php */?>
</form>
</section>
<!-- End: Content -->

@endsection
@section('scripts')
  <script type="text/javascript">
    $('.imagedeleted').on('click',function(e){
    e.preventDefault();
    if(!confirm('Are you sure to delete?')) return false;
    var csrf = $('meta[name="csrf-token"]').attr('content');
    var str = $(this).attr('href');
    var id = str.slice(1);
    $.ajax({
      type:'delete',
      url:"{{url('delete_posttype_thumb') . '/'}}" + id,
      data:{_token:csrf},    
      success:function(data){ 
        $('span.id' + id ).remove();
      },
      error:function(data){  
      alert(data + 'Error!');     
     }
   });
  });

  //
  $(document).ready(function(){
    var post_type;
    $('#post_type').on('keyup', function(){
      post_type = $('#post_type').val();
      post_type=post_type.replace(/[^a-zA-Z0-9 ]+/g,"");
      post_type=post_type.replace(/\s+/g, "-");
      $('#uri').val(post_type);
    });
  });  
  </script>
  @endsection