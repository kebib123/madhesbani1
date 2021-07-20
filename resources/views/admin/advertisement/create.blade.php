@extends('admin.master')
@section('title','Post Category')
@section('breadcrumb')
    <a href="{{ route('advertisement.index') }}" class="btn btn-primary">List</a>
@endsection
@section('content')
    <section id="content"  >
        <form class="form-horizontal" role="form" action="{{ route('advertisement.store') }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="col-md-9">
                <!-- Input Fields -->
                <div class="panel">
                    <div class="panel-heading">
                        <span class="panel-title">Create News Advertisement </span>
                    </div>
                    <div class="panel-body">

                        <div class="form-group">
                            <label for="inputStandard" class="col-lg-3 control-label">Title</label>
                            <div class="col-lg-8">
                                <div class="bs-component">
                                    <input type="text" id="inputStandard" name="title" class="form-control" placeholder="" />
                                </div>
                            </div>
                        </div>

                        <!--   <div class="form-group">
                           <label for="inputStandard" class="col-lg-3 control-label">Add Size</label>
                           <div class="col-lg-8">
                             <div class="bs-component">
                               <input type="text" id="inputStandard" name="add_size" class="form-control" />
                             </div>
                           </div>
                         </div>  -->

                        <div class="form-group">
                            <label for="inputStandard" class="col-lg-3 control-label"> Position </label>
                            <div class="col-lg-8">
                                <div class="bs-component">
                                    <input type="number" id="inputStandard" name="position" class="form-control" placeholder="" value="" />
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputStandard" class="col-lg-3 control-label"> Client </label>
                            <div class="col-lg-8">
                                <div class="bs-component">
                                    <input type="text" id="inputStandard" name="client_name" class="form-control" placeholder="" value="" />
                                </div>
                            </div>
                        </div>

                            <div class="form-group">
                              <label for="inputStandard" class="col-lg-3 control-label"> Client Link </label>
                              <div class="col-lg-8">
                               <div class="bs-component">
                                 <input type="text" id="inputStandard" name="client_link" class="form-control" placeholder="" value="" />
                               </div>
                             </div>
                           </div>

                        <!-- <div class="form-group">
                          <label for="inputStandard" class="col-lg-3 control-label">Start Date</label>
                          <div class="col-lg-8">
                            <div class="bs-component">
                              <input type="date" id="start_date" name="start_date" class="form-control" placeholder="" />
                            </div>
                          </div>
                        </div>

                        <div class="form-group">
                         <label for="inputStandard" class="col-lg-3 control-label"> End Date</label>
                         <div class="col-lg-8">
                          <div class="bs-component">
                            <input type="date" id="end_date" name="end_date" class="form-control" placeholder="" />
                          </div>
                        </div>
                      </div>  -->

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
                        <h4> Advertisement </h4>
                        <div class="hd_show_con">
                            <div id="xedit-demo">
                                <input type="file" name="add_image" />
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
