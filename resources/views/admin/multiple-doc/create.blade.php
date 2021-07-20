@extends('admin.master')
@section('breadcrumb')

@endsection
@section('content')
 <section id="content" >
 	<div class="col-lg-9">
 	  <h3 style="text-left"> Add New   &nbsp;
         <a href="{{ url('doc/multipledocument/'.Request::segment(3) ) }}" class="btn btn-primary btn-sm">List</a></h3>

<div class="alert" id="message" style="display: none"></div>
<form class="form-horizontal" id="upload_image1" role="form" action="{{ route('multipledocument.store') }}" method="post" enctype="multipart/form-data">
	{{ csrf_field() }}               
	<div class="panel-group accordion" id="accordion">
		<!-- Input Fields -->
		<div class="panel">
			<div class="panel-heading">
				<span class="panel-title">Add Document</span>
			</div>
			<div class="panel-body">  
				<input type="hidden" name="post_id" value="{{ $post_id }}">
				<div class="form-group">
					<label for="inputStandard" class="col-lg-3 control-label"> Title </label>
					<div class="col-lg-8">
						<div class="bs-component">
							<input type="text" name="title" id="title" class="form-control" /> 	
						</div>
					</div>
				</div>

				 <div class="form-group">
			        <label for="inputStandard" class="col-lg-3 control-label">Sub Title</label>
			        <div class="col-lg-8">
			          <div class="bs-component">
			            <input type="text" id="sub_title" name="sub_title" class="form-control" placeholder="" />
			          </div>
			        </div>
			      </div>

				<div class="form-group">
			        <label for="inputStandard" class="col-lg-3 control-label">Brief</label>
			        <div class="col-lg-8">
			          <div class="bs-component">
			            <textarea class="form-control" id="textArea3" name="brief" rows="3"> </textarea>
			          </div>
			        </div>
			      </div>
			      
				<div class="form-group">
					<label for="inputStandard" class="col-lg-3 control-label"> Ordering </label>
					<div class="col-lg-8">
						<div class="bs-component">
							<input type="number" name="ordering" id="ordering" value="{{$ordering}}" class="form-control" /> 	
						</div>
					</div>
				</div>

				<div class="form-group">
					<label for="inputStandard" class="col-lg-3 control-label"> Document </label>
					<div class="col-lg-8">
						<div class="bs-component">
							<input type="file" name="document" id="document" class="form-control" Required/> 	
						</div>
					</div>
				</div>  

				<div class="form-group">
					<label for="inputStandard" class="col-lg-3 control-label">  </label>
					<div class="col-lg-8">
						<div class="bs-component">
							<input type="submit" name="submit" value="Submit">      
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
               <input type="file" name="doc_thumb" />
             </div>
           </div>
         </div>
       </div>
          <select class="form-control" name="post_category">
   				 <option value="0" selected disabled> Select Year </option>
                @if($category)                  
                @foreach($category as $row)
                <option value="{{$row->id}}"> {{$row->category}}</option>
                @endforeach  
                @endif 
    </select> 
     <select name="month" class="form-control">
	<option value="00" selected disabled>Select Month</option>
	<option value="01">01</option>
	<option value="02">02</option>
	<option value="03">03</option>
	<option value="04">04</option>
	<option value="05">05</option>
	<option value="06">06</option>
	<option value="07">07</option>
	<option value="08">08</option>
	<option value="09">09</option>
	<option value="10">10</option>
	<option value="11">11</option>
	<option value="12">12</option>
</select> 
 <select class="form-control" name="cat_id">
	<option value="00" selected disabled>Select Date</option>
	<option value="01">01</option>
	<option value="02">02</option>
	<option value="03">03</option>
	<option value="04">04</option>
	<option value="05">05</option>
	<option value="06">06</option>
	<option value="07">07</option>
	<option value="08">08</option>
	<option value="09">09</option>
	<option value="10">10</option>
	<option value="11">11</option>
	<option value="12">12</option>
	<option value="13">13</option>
	<option value="14">14</option>
	<option value="15">15</option>
	<option value="16">16</option>
	<option value="17">17</option>
	<option value="18">18</option>
	<option value="19">19</option>
	<option value="20">20</option>
	<option value="21">21</option>
	<option value="22">22</option>
	<option value="23">23</option>
	<option value="24">24</option>
	<option value="25">25</option>
	<option value="26">26</option>
	<option value="27">27</option>
	<option value="28">28</option>
	<option value="29">29</option>
	<option value="30">30</option>
	<option value="31">31</option>
</select> 
</aside>
	
</form>

</section>
@endsection

@section('libraries')
<script type="text/javascript">
	$('document').ready(function(){
		
});
</script>
@endsection
