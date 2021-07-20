@extends('admin.master')
@section('title','Author')
@section('breadcrumb')
<a href="{{ route('author.create') }}" class="btn btn-primary btn-sm">Create</a>
@endsection
@section('content')
<div class="">
<div class="panel">
	<div class="panel-body ph20">
		<div class="tab-content">
			<div id="users" class="tab-pane active">
				<div class="table-responsive mhn20 mvn15">

				<table class="table admin-form theme-warning fs13" id="datatable3">
						<thead>
							<tr class="bg-light">
								<th>SN</th>
								<th>Author</th>
								<th>Created Date</th>
								<th class="text-left">Action</th>
							</tr>
						</thead>
						<tbody>
							@if(count($data) > 0)
							@foreach($data as $row)
							<tr class="id{{$row->id}}">
								<td>{{$loop->iteration}}</td>
								<td>{{ ucfirst($row->name) }}</td>
								<td> {{ $row->created_at }} </td>
								<td class="text-left">
									<a href="{{ route('author.edit',$row->id) }}">Edit</a>

									@if(!is_empty_posttype($row->id))
									|
									<a href="#{{$row->id}}" class="btn-delete">Delete</a>
									@endif
								</td>
							</tr>
							@endforeach
							@endif
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
</div>
@endsection

@section('scripts')
<script type="text/javascript">
jQuery(document).ready(function() {
  $('.btn-delete').on('click',function(e){
    e.preventDefault();
    if(!confirm('Are you sure to delete?')) return false;
    var csrf = $('meta[name="csrf-token"]').attr('content');
    var str = $(this).attr('href');
    var id = str.slice(1);
    $.ajax({
      type:'DELETE',
      url:"{{url('admin/author') . '/'}}" + id,
      data:{_token:csrf},
      success:function(data){
        $('tbody tr.id' + id ).remove();
      },
      error:function(data){
       alert('Error occurred!');
     }
   });
  });
});
  </script>
@endsection
