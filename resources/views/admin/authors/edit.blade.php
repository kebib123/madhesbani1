@extends('admin.master')
@section('title','Post Type')
@section('breadcrumb')
@endsection
@section('content')
{{--<a href="{{ route('contentwriter.index') }}" class="btn btn-primary">List</a>--}}
<form class="form-horizontal" role="form" action="{{ route('author.update',$data->id) }}" method="post" enctype="multipart/form-data">
 <input type="hidden" name="_method" value="PUT">
    {{ csrf_field() }}
 <div class="col-md-8">
  <!-- Input Fields -->
  <div class="panel">
    <div class="panel-heading">
      <span class="panel-title">Add </span>
    </div>
    <div class="panel-body">

      <div class="form-group">
        <label for="inputStandard" class="col-lg-3 control-label"> Name </label>
        <div class="col-lg-8">
          <div class="bs-component">
            <input type="text" id="name" name="name" class="form-control" value="{{ $data->name }}" />
          </div>
        </div>
      </div>

      <div class="form-group">
        <label for="inputStandard" class="col-lg-3 control-label"> Email </label>
        <div class="col-lg-8">
          <div class="bs-component">
            <input type="text" id="email" name="email" class="form-control" value="{{ $data->email }}" />
          </div>
        </div>
      </div>

      <div class="form-group">
        <label for="inputStandard" class="col-lg-3 control-label"> Phone </label>
        <div class="col-lg-8">
          <div class="bs-component">
            <input type="text" id="phone" name="phone" class="form-control" value="{{ $data->phone }}" />
          </div>
        </div>
      </div>

    </div>
  </div>

  <div class="panel">
    <div class="panel-heading">
      <span class="panel-title"> Description </span>
    </div>
    <div class="panel-body">
     <textarea class="form-control" id="editor2" name="description" rows="3">
     	{{ $data->description }}
     </textarea>
   </div>
 </div>

 <div class="form-group">
  <div class="col-lg-8">
    <div class="bs-component">
     <input type="submit" class="btn btn-primary btn" value="Submit" />
   </div>
 </div>
</div>

</div>
</form>
@endsection
@section('scripts')
<script type="text/javascript">
  $(document).ready(function(){
  // var post_type;
  // $('#post_type').on('keyup', function(){
  //   post_type=post_type.replace(/[^a-zA-Z0-9 ]+/g,"");
  //   post_type=post_type.replace(/\s+/g, "-");
  //     $('#uri').val(post_type);
  // });
});
</script>
@endsection
