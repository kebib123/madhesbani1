@extends('admin.master')
@section('title','Setting')
@section('breadcrumb')     
@endsection
@section('content')

<form class="form-horizontal" role="form" action="{{ url('admin/settings',1) }}" method="post" enctype="multipart/form-data">
           {{ csrf_field() }}    
           <input type="hidden" name="_method" value="PUT" />        
<div class="col-md-12">
            <!-- Input Fields -->
            <div class="panel">
              <div class="panel-heading">
                <span class="panel-title">Settings</span>
              </div>
              <div class="panel-body"> 
             
                  <div class="form-group">
                    <label for="inputStandard" class="col-lg-3 control-label">Site Name</label>
                    <div class="col-lg-6">
                      <div class="bs-component">
                        <input type="text" id="inputStandard" name="site_name" class="form-control" placeholder="" value="{{$data->site_name}}" />
                      </div>
                    </div>
                  </div>

                    <div class="form-group">
                    <label for="inputStandard" class="col-lg-3 control-label">Address </label>
                    <div class="col-lg-6">
                      <div class="bs-component">
                        <input type="text" id="inputStandard" name="address" class="form-control" placeholder="" value="{{ $data->address }}" />
                      </div>
                    </div>
                  </div>               

                 <!--   <div class="form-group">
                    <label for="inputStandard" class="col-lg-3 control-label">Path</label>
                    <div class="col-lg-6">
                      <div class="bs-component">
                        <input type="text" id="inputStandard" name="path" class="form-control" placeholder="" value="{{--$data->path--}}" />
                      </div>
                    </div>
                  </div> -->

                   <div class="form-group">
                    <label for="inputStandard" class="col-lg-3 control-label">Telephone</label>
                    <div class="col-lg-6">
                      <div class="bs-component">
                        <input type="text" id="inputStandard" name="phone" class="form-control" placeholder="" value="{{$data->phone}}" />
                      </div>
                    </div>
                  </div>

                    <div class="form-group">
                    <label for="inputStandard" class="col-lg-3 control-label">Mobile</label>
                    <div class="col-lg-6">
                      <div class="bs-component">
                        <input type="text" id="inputStandard" name="phone2" class="form-control" placeholder="" value="{{$data->phone2}}" />
                      </div>
                    </div>
                  </div>

                   <div class="form-group">
                    <label for="inputStandard" class="col-lg-3 control-label">Email Primary</label>
                    <div class="col-lg-6">
                      <div class="bs-component">
                        <input type="text" id="inputStandard" name="email_primary" class="form-control" placeholder="" value="{{$data->email_primary}}" />
                      </div>
                    </div>
                  </div>
                  
                 
                  
                    <div class="form-group">
                    <label for="inputStandard" class="col-lg-3 control-label">Secondary Email</label>
                    <div class="col-lg-6">
                      <div class="bs-component">
                        <input type="text" id="inputStandard" name="email_secondary" class="form-control" placeholder="" value="{{$data->email_secondary}}" />
                      </div>
                    </div>
                  </div>

                  <?php /*?>
                    <div class="form-group">
                    <label for="inputStandard" class="col-lg-3 control-label">Email Primary1</label>
                    <div class="col-lg-6">
                      <div class="bs-component">
                        <input type="text" id="inputStandard" name="email4" class="form-control" placeholder="" value="{{$data->email4}}" />
                      </div>
                    </div>
                  </div>
                  
                     <div class="form-group">
                    <label for="inputStandard" class="col-lg-3 control-label">Supporting Email</label>
                    <div class="col-lg-6">
                      <div class="bs-component">
                        <input type="text" id="inputStandard" name="email3" class="form-control" placeholder="" value="{{$data->email3}}" />
                      </div>
                    </div>
                  </div>
                  <?php */?>
                    <div class="form-group">
                    <label for="inputStandard" class="col-lg-3 control-label">Registration Number </label>
                    <div class="col-lg-6">
                      <div class="bs-component">
                        <input type="text" id="inputStandard" name="reg_number" class="form-control" placeholder="" value="{{$data->reg_number}}" />
                      </div>
                    </div>
                  </div>

               <h3 class="text-center"> Our Team </h3>

                   <div class="form-group">
                    <label class="col-lg-3 control-label" for="textArea2"></label>
                    <div class="col-lg-6">
                      <div class="bs-component">
                        <textarea class="form-control" name="team" rows="3">{{ $data->team }}</textarea>
                      </div>
                    </div>
                  </div>  

                   <h3 class="text-center"> Social Media </h3>

				<div class="form-group">
                    <label for="inputStandard" class="col-lg-3 control-label">Facebook Link</label>
                    <div class="col-lg-6">
                      <div class="bs-component">
                        <input type="text" id="inputStandard" name="facebook_link" class="form-control" placeholder="" value="{{$data->facebook_link}}" />
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="inputStandard" class="col-lg-3 control-label">Google Plus</label>
                    <div class="col-lg-6">
                      <div class="bs-component">
                        <input type="text" id="inputStandard" name="linkedin_link" class="form-control" placeholder="" value="{{$data->linkedin_link}}" />
                      </div>
                    </div>
                  </div>

  <div class="form-group">
                    <label for="inputStandard" class="col-lg-3 control-label"> Youtube </label>
                    <div class="col-lg-6">
                      <div class="bs-component">
                        <input type="text" id="inputStandard" name="youtube_link" class="form-control" placeholder="" value="{{$data->youtube_link}}" />
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="inputStandard" class="col-lg-3 control-label">Twitter Link</label>
                    <div class="col-lg-6">
                      <div class="bs-component">
                        <input type="text" id="inputStandard" name="twitter_link" class="form-control" placeholder="" value="{{$data->twitter_link}}" />
                      </div>
                    </div>
                  </div>

                   <h3 class="text-center"> Meta Keyword and Description </h3>
                  
                  <div class="form-group">
                    <label for="inputStandard" class="col-lg-3 control-label" for="textArea3">Meta Key</label>
                    <div class="col-lg-6">
                      <div class="bs-component">
                         <textarea class="form-control" id="" name="meta_key" rows="3">{{$data->meta_key}}</textarea>                       
                      </div>
                    </div>
                  </div>
                  
                   <div class="form-group">
                    <label for="inputStandard" class="col-lg-3 control-label" for="textArea3">Meta Description</label>
                    <div class="col-lg-6">
                      <div class="bs-component">
                         <textarea class="form-control" id="" name="meta_description" rows="3">{{$data->meta_description}}</textarea>
                        
                      </div>
                    </div>
                  </div>
                  
                  <?php /* ?> 
                <!--   <div class="form-group">
                    <label class="col-lg-3 control-label" for="textArea2">For Advertisement</label>
                    <div class="col-lg-9">
                      <div class="bs-component">
                        <textarea class="form-control my-editor" id="contentEditor2" name="welcome_text" rows="3">{{--$data->welcome_text--}}</textarea>
                      </div>
                    </div>
                  </div>   -->

                <!--    <div class="form-group">
                    <label class="col-lg-3 control-label" for="textArea2"> Editor </label>
                    <div class="col-lg-9">
                      <div class="bs-component">
                        <textarea class="form-control my-editor" id="contentEditor1" name="google_map" rows="3">{{--$data->google_map--}}</textarea>
                      </div>
                    </div>
                  </div>  -->

                <div class="form-group">
                    <label class="col-lg-3 control-label" for="textArea2"> Registered Office Map</label>
                    <div class="col-lg-9">
                      <div class="bs-component">
                        <textarea class="form-control" id="contentEditor5" name="google_map2" rows="3">{{$data->google_map2}}</textarea>
                      </div>
                    </div>
                  </div>  <?php */ ?>   

                  <div class="form-group">
                    <label class="col-lg-3 control-label" for="textArea2">Copyright Text</label>
                    <div class="col-lg-6">
                      <div class="bs-component">
                        <textarea class="form-control" id="contentEditor3" name="copyright_text" rows="3">{{$data->copyright_text}}</textarea>
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