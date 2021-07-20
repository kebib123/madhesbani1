@extends('admin.master')
@section('title','Post Category')
@section('breadcrumb')
@endsection
@section('content')
<a href="{{ route('newscategory.index') }}" class="btn btn-primary">List</a>
<form class="form-horizontal" role="form" action="{{ route('newscategory.store') }}" method="post" enctype="multipart/form-data">
  {{ csrf_field() }}            
  <div class="col-md-9">
    <!-- Input Fields -->
    <div class="panel">
      <div class="panel-heading">
        <span class="panel-title">Create News Category</span>
      </div>
      <div class="panel-body">
       <div class="form-group">
        <label for="inputStandard" class="col-lg-3 control-label">News Type</label>
        <div class="col-lg-8">                  
         <div class="bs-component">
          <select class="form-control" name="news_type">
            <option disabled selected> Choose News Type </option>
            @if($newstype->count() > 0)
            @foreach($newstype as $row)
            <option value="{{$row->id}}">{{$row->news_type}}</option>
            @endforeach
            @endif
          </select>
          <div id="source-button" class="btn btn-primary btn-xs" style="display: none;">&lt; &gt;</div></div>
        </div>
      </div>  

      <div class="form-group">
        <label for="inputStandard" class="col-lg-3 control-label">Category</label>
        <div class="col-lg-8">
          <div class="bs-component">
            <input type="text" id="inputStandard" name="category" class="form-control" placeholder="" />
          </div>
        </div>
      </div>  

      <div class="form-group">
        <label for="inputStandard" class="col-lg-3 control-label">Uri</label>
        <div class="col-lg-8">
          <div class="bs-component">
            <input type="text" id="inputStandard" name="uri" class="form-control" placeholder="" />
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

</div>
</div>  

<div class="panel">
      <div class="panel-heading">
        <span class="panel-title"> Content </span>
      </div>
      <div class="panel-body">
        <textarea class="form-control my-editor" id="textArea3" name="category_content" rows="3" autocomplete="off"></textarea>
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
          <input type="submit" class="btn btn-primary btn-lg" value="Publish" />
        </div>
        <div class="clearfix"></div>
      </footer>
      <div class="clearfix"></div>
    </div>

    <div class="sid_bvijay mb10">
      <label class="field text">
        <input type="number" id="inputStandard" name="ordering" class="form-control" value="{{ $_ordering }}" />   
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

</div>
</form>
@endsection