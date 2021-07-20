@extends('admin.master')
@section('title','Post Type')
@section('breadcrumb')
    <a href="{{ route('newstype.index') }}" class="btn btn-primary">List</a>
@endsection
@section('content')
<form class="form-horizontal" role="form" action="{{ route('newstype.store') }}" method="post" enctype="multipart/form-data">
 {{ csrf_field() }}
 <div class="col-md-8">
  <!-- Input Fields -->
  <div class="panel">
    <div class="panel-heading">
      <span class="panel-title">Add News Type</span>
    </div>
    <div class="panel-body">


     <div class="form-group">
      <label for="inputStandard" class="col-lg-3 control-label"> Parent </label>
      <div class="col-lg-8">
        <div class="bs-component">
         <select name="parent_id" class="form-control input-sm">
          <option disabled selected> Choose Parent </option>
          @if($newstype1->count() > 0)
          @foreach($newstype1 as $row)
          <option value="{{ $row->id }}"> {{ $row->news_type }} </option>


            @if(has_child($row->id))
                    @foreach(sub_type($row->id) as $child_row)
                        <option value="{{$child_row->id}}"> —> {{$child_row->news_type}} </option>

                        @if(has_child($child_row->id))
                            @foreach(sub_type($child_row->id) as $grand_child_row)
                                <option value="{{$grand_child_row->id}}"> — —> {{$grand_child_row->news_type}} </option>
                            @endforeach
                        @endif

                    @endforeach
                @endif


          @endforeach
          @endif
        </select>
      </div>
    </div>
  </div>

<div class="form-group">
  <label for="inputStandard" class="col-lg-3 control-label">Title </label>
  <div class="col-lg-8">
    <div class="bs-component">
      <input type="text" id="news_type" name="news_type" class="form-control" value="{{ old('news_type') }}" />
    </div>
  </div>
</div>

<div class="form-group">
  <label for="inputStandard" class="col-lg-3 control-label"> Uri</label>
  <div class="col-lg-8">
    <div class="bs-component">
      <input type="text" id="uri" name="uri" class="form-control" value="{{ old('uri') }}" />
    </div>
  </div>
</div>

 <div class="form-group">
                    <label for="inputStandard" class="col-lg-3 control-label"> Meta Keyword</label>
                    <div class="col-lg-8">
                      <div class="bs-component">
                        <input type="text" id="inputStandard" name="meta_keyword" class="form-control" placeholder="" value="{{ old('meta_keyword') }}" />
                      </div>
                    </div>
                  </div>

   <div class="form-group">
                    <label for="inputStandard" class="col-lg-3 control-label"> Meta Description</label>
                    <div class="col-lg-8">
                      <div class="bs-component">
                        <textarea id="inputStandard" name="meta_description" class="form-control"> </textarea>
                      </div>
                    </div>
                  </div>

<div class="form-group">
  <label for="inputStandard" class="col-lg-3 control-label"> Ordering </label>
  <div class="col-lg-8">
    <div class="bs-component">
      <input type="text" id="ordering" name="ordering" class="form-control" value="{{ $_ordering }}" />
    </div>
  </div>
</div>

<div class="form-group">
  <label class="col-lg-3 control-label" for="textArea3">  </label>
  <div class="col-lg-8">
    <div class="bs-component">
     <input type="submit" class="btn btn-primary btn" value="Submit" />
   </div>
 </div>
</div>


</div>
</div>
</div>
<div class="col-md-4">






  <div class="sid_bvijay mb10">
   <h4> Set as menu </h4>
   <div class="hd_show_con">
    <div class=" mb15">
     <div class="form-group">
       <select name="is_menu" class="form-control input-sm">
        <option value="0"> No </option>
        <option value="1"> Yes </option>
      </select>
    </div>
  </div>
</div>
</div>



</div>
</form>
@endsection
@section('scripts')
<script type="text/javascript">
  $(document).ready(function(){
  var news_type;
  $('#news_type').on('keyup', function(){
      news_type = $('#news_type').val();
      news_type=news_type.replace(/[^a-zA-Z0-9 ]+/g,"");
      news_type=news_type.replace(/\s+/g, "-");
      $('#uri').val(news_type);
  });
});
</script>
@endsection


