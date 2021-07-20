@extends('admin.master')
@section('title','Banner')
@section('breadcrumb')
     <a href="{{ Request::segment(1) }}" class="btn btn-primary btn-sm">List</a>
@endsection
@section('content')

<form class="form-horizontal" role="form" action="{{ url('banner', $data->id) }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}   
<input type="hidden" name="_method" value="PUT" />          
<div class="col-md-12">
            <!-- Input Fields -->
            <div class="panel">
              <div class="panel-heading">
                <span class="panel-title">Edit Banner</span>
              </div>
              <div class="panel-body"> 
             
                  <div class="form-group">
                    <label for="inputStandard" class="col-lg-3 control-label">Title</label>
                    <div class="col-lg-6">
                      <div class="bs-component">
                        <input type="text" id="inputStandard" name="title" class="form-control" placeholder="" value="{{$data->title}}" />
                      </div>
                    </div>
                  </div>

                   <div class="form-group">
                    <label for="inputStandard" class="col-lg-3 control-label">Caption</label>
                    <div class="col-lg-6">
                      <div class="bs-component">
                        <input type="text" id="inputStandard" name="caption" class="form-control" placeholder="" value="{{$data->caption}}" />
                      </div>
                    </div>
                  </div>
               
                  <div class="form-group">
                    <label class="col-lg-3 control-label" for="textArea2">Content</label>
                    <div class="col-lg-6">
                      <div class="bs-component">
                        <textarea class="form-control" id="textArea2" name="content" rows="3">{{$data->content }}</textarea>
                      </div>
                    </div>
                  </div>                 
                  
               <div class="form-group">
                    <label class="col-lg-3 control-label" for="banner">Banner</label>
                    <div class="col-lg-6">
                      <div class="bs-component">
                        <input type="file" class="form-control" name="picture"/>
                      </div>
                    </div>
                  </div>

                  @if($data->picture != '' OR $data->picture != null)
                  <div class="form-group">
                    <label class="col-lg-3 control-label" for="banner"></label>
                    <div class="col-lg-6">
                      <div class="bs-component">
                        <img src="{{url('public/uploads/banners/' . $data->picture )}}" width="70%" />
                      </div>
                    </div>
                  </div>                    
                  @endif

                 <div class="form-group">
                    <label class="col-lg-3 control-label" for="link">Link</label>
                    <div class="col-lg-6">
                      <div class="bs-component">
                        <input type="text" class="form-control" name="link" value="{{$data->link}}" /> <br />
                        <p>( http://www.example.com or https://www.example.com )</p>
                      </div>
                    </div>
                  </div> 
                 
                  <div class="form-group">
                    <label class="col-lg-3 control-label" for=""></label>
                    <div class="col-lg-6">
                      <div class="bs-component">
                        <input type="submit" class="form-control btn btn-primary" name="submit" value="Submit" />
                      </div>
                    </div>
                  </div> 
                
              </div>
            </div>          
          </div>

          
          </form>
@endsection