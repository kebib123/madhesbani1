@extends('admin.master')
@section('title','Post Category')
@section('breadcrumb')
    <a href="{{ route('advertisement.index') }}" class="btn btn-primary">List</a>
@endsection
@section('content')
    <section id="content"  >

        <form class="form-horizontal" role="form" action="{{ route('advertisement.update',$data->id) }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            <input type="hidden" name="_method" value="PUT" />
            <div class="col-md-9">
                <!-- Input Fields -->
                <div class="panel">
                    <div class="panel-heading">
                        <span class="panel-title"> Create News Advertisement </span>
                    </div>
                    <div class="panel-body">
                        <div class="form-group">
                            <label for="inputStandard" class="col-lg-3 control-label">Title</label>
                            <div class="col-lg-8">
                                <div class="bs-component">
                                    <input type="text" id="inputStandard" name="title" class="form-control" value="{{ $data->title }}" />
                                </div>
                            </div>
                        </div>

                    <!--   <div class="form-group">
        <label for="inputStandard" class="col-lg-3 control-label">Add Size</label>
        <div class="col-lg-8">
          <div class="bs-component">
            <input type="text" id="inputStandard" name="add_size" class="form-control" value="{{-- $data->add_size --}}"  />
          </div>
        </div>
      </div>  -->

                        <div class="form-group">
                            <label for="inputStandard" class="col-lg-3 control-label"> Position </label>
                            <div class="col-lg-8">
                                <div class="bs-component">
                                    <input type="number" id="inputStandard" name="position" class="form-control" value="{{ $data->position }}" readonly />
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputStandard" class="col-lg-3 control-label"> Client </label>
                            <div class="col-lg-8">
                                <div class="bs-component">
                                    <input type="text" id="inputStandard" name="client_name" class="form-control" placeholder="" value="{{ $data->client_name }}" />
                                </div>
                            </div>
                        </div>

                    <div class="form-group">
       <label for="inputStandard" class="col-lg-3 control-label"> Client Link </label>
       <div class="col-lg-8">
        <div class="bs-component">
          <input type="text" id="inputStandard" name="client_link" class="form-control" placeholder="" value="{{ $data->client_link }}" />
        </div>
      </div>
    </div>

{{--      <div class="form-group">--}}
{{--        <label for="inputStandard" class="col-lg-3 control-label">Start Date</label>--}}
{{--        <div class="col-lg-8">--}}
{{--          <div class="bs-component">--}}
{{--            <input type="text" id="start_date" name="start_date" class="form-control" value="{{ $data->start_date }}" />--}}
{{--          </div>--}}
{{--        </div>--}}
{{--      </div>--}}

{{--      <div class="form-group">--}}
{{--       <label for="inputStandard" class="col-lg-3 control-label"> End Date</label>--}}
{{--       <div class="col-lg-8">--}}
{{--        <div class="bs-component">--}}
{{--          <input type="text" id="end_date" name="end_date" class="form-control" value="{{ $data->end_date }}" />--}}
{{--        </div>--}}
{{--      </div>--}}
{{--    </div>  -->--}}

                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="admin-form">
                    <div class="mb10">
                        <div class="hd_show_con">
                            <div class="publice_edi">
                                <a href="avoid:javascript;" data-toggle="collapse" data-target="#publish_1">Action</a>
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
                        <h4> Status </h4>
                        <div class="hd_show_con">
                            <div class=" mb15">
                                <div class="form-group">
                                    <select name="status" class="form-control input-sm">
                                        <option disabled> Choose Status </option>
                                        <option value="1" {{($data->status == '1')?'selected':''}}>Enabled</option>
                                        <option value="0" {{($data->status == '0')?'selected':''}}>Disabled</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="sid_bvijay mb10">
                        <h4> Advertisement </h4>
                        <div class="hd_show_con">
                            <div id="xedit-demo">
                                @if($data->add_image)
                                    <img src="{{ asset('/uploads/advertisement/' . $data->add_image ) }}" alt="{{ $data->title }}" width="60%" />
                                @endif
                                <input type="file" name="add_image" /> <br />
                                ( Size must be {{ $data->add_size }} px )
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </form>
    </section>
@endsection

@section('scripts')
    <script>
        $( function() {
            $( "#start_date" ).datepicker({ dateFormat: 'yy-mm-dd' });
            $( "#end_date" ).datepicker({ dateFormat: 'yy-mm-dd' });
        } );
    </script>
@endsection
