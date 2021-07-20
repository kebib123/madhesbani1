@extends('admin.master')
@section('title','News Type')
@section('breadcrumb')
@endsection
@section('content')
<div class="tray tray-center" style="height: 647px;">
<div class="panel">
	<div class="panel-body ph20">
		<div class="tab-content">
			<div id="users" class="tab-pane active">
				<div class="table-responsive mhn20 mvn15">
				<table class="table admin-form theme-warning fs13" id="datatable3">
						<thead>
							<tr class="bg-light">
								<th>SN</th>
								<th>News Type</th>
                                <th>Is Menu?</th>
                                <td class="text-center">Ordering</td>
								<th>Created Date</th>
								<th class="text-left">Action</th>
							</tr>
						</thead>
						<tbody>
							@if(count($data) > 0)
							@foreach($data as $row)
							<tr class="id{{$row->id}}">
								<td>{{$loop->iteration}}</td>
								<td>{{ $row->news_type }}
									&nbsp;
									@if( has_child($row->id))
									<a href="{{ url('admin/newstype/'. $row->uri . '/child') }}">
										<i class="fa fa-list-ul" aria-hidden="true"></i>
									</a>
									@endif


								</td>
                                <td> {{ ($row->is_menu == 1)?'Yes':'NO' }}</td>
								<td class="text-center">{{ $row->ordering }}</td>
								<td> {{ $row->created_at }} </td>
								<td class="text-left">
									<a href="{{ url('admin/newstype/'.$row->id.'/edit') }}">Edit</a>
                                    @if(!is_empty_newstype($row->id))
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
      url:"{{url('admin/newstype') . '/'}}" + id,
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
