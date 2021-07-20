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
     <a class="" href="{{ url('admin/postcategory/create') }}">Create</a>
       &nbsp;
         <a class="" href="{{ url('admin/postcategory') }}">List</a></h3>               
      <form class="form-horizontal" action="{{ url('admin/postcategory', $data->id) }}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }} 
                 
<input type="hidden" name="_method" value="PUT" />
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
        <select class="form-control" name="post_type">
          @foreach($posttype as $row)
          <option value="{{$row->id}}">{{$row->post_type}}</option>
          @endforeach
        </select>
        <div id="source-button" class="btn btn-primary btn-xs" style="display: none;">&lt; &gt;</div></div>
      </div>
    </div>  

    <div class="form-group">
      <label for="inputStandard" class="col-lg-3 control-label">Category</label>
      <div class="col-lg-8">
        <div class="bs-component">
          <input type="text" id="post_category" name="category" class="form-control" placeholder="" value="{{$data->category}}" />
        </div>
      </div>
    </div>

    <div class="form-group">
      <label for="inputStandard" class="col-lg-3 control-label">Uri</label>
      <div class="col-lg-8">
        <div class="bs-component">
          <input type="text" id="uri" name="uri" class="form-control" value="{{$data->uri}}"  placeholder="" />
        </div>
      </div>
    </div>     

    <div class="form-group">
     <label for="inputStandard" class="col-lg-3 control-label">Caption</label>
     <div class="col-lg-8">
      <div class="bs-component">
        <input type="text" id="" name="category_caption" class="form-control" value="{{$data->category_caption}}" placeholder="" />
      </div>
    </div>
  </div> 

  <div class="form-group">
   <label for="inputStandard" class="col-lg-3 control-label">Content</label>
   <div class="col-lg-8">
    <div class="bs-component">                        
      <div class="bs-component">                       
        <div class="bs-component">
          <textarea class="form-control" id="textArea3" name="category_content" rows="3" autocomplete="off">{{$data->category_content}}</textarea>
        </div>
      </div>
    </div>
  </div>
</div>                    

</div> 
</div>        
</div>
</div>
<!-- end: .tray-center -->

<aside class="col-lg-3 ">
 <!-- menu quick links -->

         <div class="admin-form">
    <div class="sid_bvijay mb10">                   
      <div class="hd_show_con">
        <div class="publice_edi">
          Status: <a href="avoid:javascript;" data-toggle="collapse" data-target="#publish_1">Active</a>
        </div>                    
      </div>
      <footer>                        
        <div id="publishing-action">
          <input type="submit" class="btn btn-primary btn-lg" value="Publish" />
        </div>
        <div class="clearfix"></div>
      </footer>
      <div class="clearfix"></div>
    </div>

    <div class="sid_bvijay mb10">
      <label class="field text">
        <input type="number" id="inputStandard" name="ordering" class="form-control" value="{{$data->ordering}}" placeholder="Order" />   
      </label>
    </div>

    <div class="sid_bvijay mb10">
      <h4> Thumbnail </h4>
      <div class="hd_show_con">
        <div id="xedit-demo">
          @if($data->thumbnail)
          <span class="id{{$data->id}}">
            <a href="#{{$data->id}}" class="imagedelete">X</a>
            <img src="{{ asset(env('PUBLIC_PATH').'uploads/original/' . $data->thumbnail) }}" width="200" />
          </span>
          <hr> 
          @endif 
          <input type="file" name="thumbnail" />
        </div>
      </div>
    </div>

  </div>         

    
</aside>

</form>
</section>
<!-- End: Content -->

@endsection
 @section('scripts')
  <script type="text/javascript">
   // Delete Thumb
    $('.imagedelete').on('click',function(e){
    e.preventDefault();
    if(!confirm('Are you sure to delete?')) return false;
    var csrf = $('meta[name="csrf-token"]').attr('content');
    var str = $(this).attr('href');
    var id = str.slice(1);
    $.ajax({
      type:'DELETE',
      url:"{{url('admin/delete_category_thumb') . '/'}}" + id,
      data:{_token:csrf},    
      success:function(data){ 
        $('span.id' + id ).remove();
      },
      error:function(data){  
      alert(data + 'Error!');     
     }
   });
  });

  $(document).ready(function(){
    var post_category;
    $('#post_category').on('keyup', function(){
      post_category = $('#post_category').val();
      post_category=post_category.replace(/[^a-zA-Z0-9 ]+/g,"");
      post_category=post_category.replace(/\s+/g, "-");
      $('#uri').val(post_category);
    });
  });   
  </script>
  @endsection
  