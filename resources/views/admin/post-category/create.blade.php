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
         <a class="" href="{{ url('admin/postcategory')}}">List</a></h3>               
      <form class="form-horizontal" action="{{ url('admin/postcategory') }}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }} 
                 

  <div class="panel-group accordion" id="accordion">
  <!-- Input Fields -->
  <div class="panel">
    <div class="panel-heading">
      <span class="panel-title">New Post Type</span>
    </div>
    <div class="panel-body"> 

         <div class="form-group">
        <label for="inputStandard" class="col-lg-3 control-label">Post Type</label>
        <div class="col-lg-8">                  
         <div class="bs-component">
          <select class="form-control" name="post_type">
            @foreach($data as $row)
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
            <input type="text" id="post_category" name="category" class="form-control" placeholder="" />
          </div>
        </div>
      </div>  

      <div class="form-group">
        <label for="inputStandard" class="col-lg-3 control-label">Uri</label>
        <div class="col-lg-8">
          <div class="bs-component">
            <input type="text" id="uri" name="uri" class="form-control" placeholder="" />
          </div>
        </div>
      </div>   

      <div class="form-group">
       <label for="inputStandard" class="col-lg-3 control-label">Caption</label>
       <div class="col-lg-8">
        <div class="bs-component">
          <input type="text" id="inputStandard" name="category_caption" class="form-control" placeholder="" />
        </div>
      </div>
    </div> 

    <div class="form-group">
     <label for="inputStandard" class="col-lg-3 control-label">Content</label>
     <div class="col-lg-8">
      <div class="bs-component">                       
        <div class="bs-component">
          <textarea class="form-control" id="textArea3" name="category_content" rows="3" autocomplete="off"></textarea>
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
        <input type="number" id="inputStandard" name="ordering" class="form-control" value="{{ $ordering }}" />   
      </label>
    </div>

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

</form>
</section>
<!-- End: Content -->

@endsection
@section('scripts')
<script type="text/javascript">
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