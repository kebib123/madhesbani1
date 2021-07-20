@extends('admin.master')
@section('breadcrumb')

@endsection
@section('content')
<section id="content"  >
	<div class="col-lg-9">
 	  <p><a href="{{ url('doc/multipledocument/'.Request::segment(3).'/create') }}" class="btn btn-primary btn-sm"> Create </a>   &nbsp;
       <a href="{{ url('doc/multipledocument/' . Request::segment(3) ) }}" class="btn btn-primary btn-sm">List</a></p>
<div class="alert" id="message" style="display: none"></div>
<form class="form-horizontal" id="upload_image1" role="form" action="{{ url('doc/multipledocument',$data->id) }}" method="post" enctype="multipart/form-data">
	{{ csrf_field() }}   
	           
	<div class="panel-group accordion" id="accordion">
		<!-- Input Fields -->
		<div class="panel">
			<div class="panel-heading">
				<span class="panel-title">Edit Video</span>
			</div>
			<div class="panel-body">  
				<input type="hidden" name="post_id" value="{{ Request::segment(3) }}">

				<div class="form-group">
					<label for="inputStandard" class="col-lg-3 control-label"> Title </label>
					<div class="col-lg-8">
						<div class="bs-component">
							<input type="text" name="title" id="title" value="{{ ($data->title)?$data->title:"" }}" class="form-control" /> 		
						</div>
					</div>
				</div>

					 <div class="form-group">
			        <label for="inputStandard" class="col-lg-3 control-label">Sub Title</label>
			        <div class="col-lg-8">
			          <div class="bs-component">
			            <input type="text" id="sub_title" name="sub_title" class="form-control" value="{{$data->sub_title}}" />
			          </div>
			        </div>
			      </div>

				<div class="form-group">
			        <label for="inputStandard" class="col-lg-3 control-label">Brief</label>
			        <div class="col-lg-8">
			          <div class="bs-component">
			            <textarea class="form-control" id="textArea3" name="brief" rows="3">{{$data->brief}} </textarea>
			          </div>
			        </div>
			      </div>

				
				<div class="form-group">
					<label for="inputStandard" class="col-lg-3 control-label"> Ordering </label>
					<div class="col-lg-8">
						<input type="text" name="ordering" value="{{ ($data->ordering)?$data->ordering:'' }}" class="form-control" /> 		
					</div>
				</div>
				

				<div class="form-group">
					<label for="inputStandard" class="col-lg-3 control-label"> Document </label>
					<div class="col-lg-8">
						<div class="bs-component">
							<input type="file" name="document" class="form-control" /> 
						</div>
					</div>
				</div> 

				@if($data->document)
				<div class="form-group">
					<label for="inputStandard" class="col-lg-3 control-label"> </label>
					<div class="col-lg-8">
						<div class="bs-component">
							 <span class="id{{$data->id}}">
             					 <a href="#{{$data->id}}" class="delete_doc">X</a>
             		<img src="{{ asset(env('PUBLIC_PATH').'/themes-assets/images/default.png') }}" width="75" />
							{{ ($data->title == '')?$data->document:$data->title }} 
						</span>
						</div>
					</div>
				</div> 
				@endif 

				<div class="form-group">
					<label for="inputStandard" class="col-lg-3 control-label">  </label>
					<div class="col-lg-8">
						<div class="bs-component">
							<input type="submit" name="submit" value="Submit" />      
						</div>
					</div>
				</div> 
			</div>


		</div>
	</div> 

	</div>
	<aside class="col-lg-3 ">
 <!-- menu quick links -->

        <div class="admin-form">
          <div class="sid_bvijay mb10">
            <h4> Thumbnail </h4>
            <div class="hd_show_con">
              <div id="xedit-demo">
              	 @if($data->doc_thumb)
              <span class="thumbid{{$data->id}}">
              <a href="#{{$data->id}}" class="image_delete_thumb">X</a>
              <img src="{{ asset(env('PUBLIC_PATH').'/uploads/medium/' . $data->doc_thumb) }}" width="150" />
              </span>
              <hr> 
              @endif 
               <input type="file" name="doc_thumb" />
             </div>
           </div>
         </div>
       </div>
   <select class="form-control" name="post_category">
   				 <option value="0" selected disabled> Select Year </option>
                @if($category)
                @foreach($category as $row)
                <option value="{{$row->id}}" {{ ($row->id == $data->post_category )?'selected':'' }}> {{$row->category}}</option>
                @endforeach  
                @endif 
              </select>
           
     <select name="month" class="form-control">
	<option value="00" selected disabled>Select Month</option>
	<option value="01" {{($data->month == '01')?'selected':''}}>01</option>
	<option value="02" {{($data->month == '02')?'selected':''}}>02</option>
	<option value="03" {{($data->month == '03')?'selected':''}}>03</option>
	<option value="04" {{($data->month == '04')?'selected':''}}>04</option>
	<option value="05" {{($data->month == '05')?'selected':''}}>05</option>
	<option value="06" {{($data->month == '06')?'selected':''}}>06</option>
	<option value="07" {{($data->month == '07')?'selected':''}}>07</option>
	<option value="08" {{($data->month == '08')?'selected':''}}>08</option>
	<option value="09" {{($data->month == '09')?'selected':''}}>09</option>
	<option value="10" {{($data->month == '10')?'selected':''}}>10</option>
	<option value="11" {{($data->month == '11')?'selected':''}}>11</option>
	<option value="12" {{($data->month == '12')?'selected':''}}>12</option>
</select> 
 <select class="form-control" name="cat_id">
	<option value="00" selected disabled>Select Date</option>
	<option value="01" {{($data->cat_id == '01')?'selected':''}}>01</option>
	<option value="02" {{($data->cat_id == '02')?'selected':''}}>02</option>
	<option value="03" {{($data->cat_id == '03')?'selected':''}}>03</option>
	<option value="04" {{($data->cat_id == '04')?'selected':''}}>04</option>
	<option value="05" {{($data->cat_id == '05')?'selected':''}}>05</option>
	<option value="06" {{($data->cat_id == '06')?'selected':''}}>06</option>
	<option value="07" {{($data->cat_id == '07')?'selected':''}}>07</option>
	<option value="08" {{($data->cat_id == '08')?'selected':''}}>08</option>
	<option value="09" {{($data->cat_id == '09')?'selected':''}}>09</option>
	<option value="10" {{($data->cat_id == '10')?'selected':''}}>10</option>
	<option value="11" {{($data->cat_id == '11')?'selected':''}}>11</option>
	<option value="12" {{($data->cat_id == '12')?'selected':''}}>12</option>
	<option value="13" {{($data->cat_id == '13')?'selected':''}}>13</option>
	<option value="14" {{($data->cat_id == '14')?'selected':''}}>14</option>
	<option value="15" {{($data->cat_id == '15')?'selected':''}}>15</option>
	<option value="16" {{($data->cat_id == '16')?'selected':''}}>16</option>
	<option value="17" {{($data->cat_id == '17')?'selected':''}}>17</option>
	<option value="18" {{($data->cat_id == '18')?'selected':''}}>18</option>
	<option value="19" {{($data->cat_id == '19')?'selected':''}}>19</option>
	<option value="20" {{($data->cat_id == '20')?'selected':''}}>20</option>
	<option value="21" {{($data->cat_id == '21')?'selected':''}}>21</option>
	<option value="22" {{($data->cat_id == '22')?'selected':''}}>22</option>
	<option value="23" {{($data->cat_id == '23')?'selected':''}}>23</option>
	<option value="24" {{($data->cat_id == '24')?'selected':''}}>24</option>
	<option value="25" {{($data->cat_id == '25')?'selected':''}}>25</option>
	<option value="26" {{($data->cat_id == '26')?'selected':''}}>26</option>
	<option value="27" {{($data->cat_id == '27')?'selected':''}}>27</option>
	<option value="28" {{($data->cat_id == '28')?'selected':''}}>28</option>
	<option value="29" {{($data->cat_id == '29')?'selected':''}}>29</option>
	<option value="30" {{($data->cat_id == '30')?'selected':''}}>30</option>
	<option value="31" {{($data->cat_id == '31')?'selected':''}}>31</option>
</select> 
</aside>
</form>
</section>
@endsection

@section('scripts')
<script type="text/javascript">
	$('document').ready(function(){
	// Delete Doc
    $('.delete_doc').on('click',function(e){
    e.preventDefault();
    if(!confirm('Are you sure to delete?')) return false;
    var csrf = $('meta[name="csrf-token"]').attr('content');
    var str = $(this).attr('href');
    var id = str.slice(1);
    $.ajax({
      type:'DELETE',
      url:"{{url('doc/multipledocument') . '/'}}" + id,
      data:{_token:csrf},    
      success:function(data){ 
        $('span.id' + id ).remove();
      },
      error:function(data){  
      alert(data + 'Error!');     
     }
   });
  });
});

		$('document').ready(function(){
	// Delete Doc
    $('.image_delete_thumb').on('click',function(e){
    e.preventDefault();
    if(!confirm('Are you sure to delete?')) return false;
    var csrf = $('meta[name="csrf-token"]').attr('content');
    var str = $(this).attr('href');
    var id = str.slice(1);
    $.ajax({
      type:'DELETE',
      url:"{{url('doc/doc_thumb') . '/'}}" + id,
      data:{_token:csrf},    
      success:function(data){ 
        $('span.thumbid' + id ).remove();
      },
      error:function(data){  
      alert(data + 'Error!');     
     }
   });
  });
});
</script>
@endsection
