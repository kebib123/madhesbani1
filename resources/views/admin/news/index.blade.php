@extends('admin.master')
@section('title','News Title')
@section('breadcrumb')
@endsection
@section('content')
<!-- Begin: Content -->
<section id="content" class="table-layout animated fadeIn">
  <!-- begin: .tray-center -->
  <div class="tray tray-center">
    <ul class="subsubsub">
     <li> <a href="{{ route('news.create', Request::segment(3) ) }}" class="btn btn-primary"> Create Post</a> </li>
   </ul>
   <!-- recent orders table -->

  <div class="panel">
    <div class="panel-body pn">
      <div class="table-responsive">
        <table class="table admin-form table-striped  dataTable" id="datatable3">
          <thead>
            <tr class="bg-light">
              <th>ID</th>
              <th>Title</th>
              <th>Ordering</th>
              <th>Post By</th>
              <th>Visiter</th>
              <th>Created</th>
              <th>Status</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach($data as $row)
            <tr class="id{{$row->id}}">
              <td>{{ $row->id }}</td>
              <td class="title_hi_sh"> <strong>
                <a href="{{ url('admin/type/'.Request::segment(3).'/'.$row->id.'/edit') }}"> {{ $row->news_title }} </a></strong> </td>
             <?php /* ?> <td class="text-center">
                @if($row->news_category )
                {{ $row->news_category }}
                @else
                  -
                @endif
              </td> <?php */ ?>
              <td class="text-center">{{ $row->ordering }}</td>
              <td>
                @if(postby($row->content_writer))
                {{ postby($row->content_writer) }}
                @else
                 -
                @endif </td>
              <td> {{ $row->visiter }} </td>
              <td> {{ time_elapsed_string($row->created_at) }}
                  मा प्रकाशित</td>
              <td><input type="checkbox" name="status" class="updatestatus" data-id="{{ $row->id }}" value="1" {{ ($row->status == 1)?'checked':'' }}></td>
              <td>
                <a href="{{ url('admin/type/' . Request::segment(3) . '/' . $row->id .'/edit') }}" class="btn btn-sm btn-success">Edit</a>
                <a href="#{{$row->id}}" class="btn btn-sm btn-danger submitdelete">Delete</a>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>



</div>

</section>
<!-- End: Content -->
@endsection
@section('scripts')
<script>
   jQuery(document).ready(function() {
  $('.submitdelete').on('click',function(e){
    e.preventDefault();
    if(confirm('Are you sure to delete?')){
    var csrf = $('meta[name="csrf-token"]').attr('content');
    var str = $(this).attr('href');
    var id = str.slice(1);
    $.ajax({
      type:'delete',
      url:"{{url('admin/type/' . Request::segment(3) ) . '/'}}" + id,
      data:{_token:csrf},
      success:function(data){
       $('tbody tr.id' + id ).remove();
     },
     error:function(data){
       alert('Error occurred!');
     }
   });
   }
  });

    // status update
  $('.updatestatus').on('click',function(e){
    e.preventDefault();
    var csrf = $('meta[name="csrf-token"]').attr('content');
    var id = $(this).attr('data-id');
    $.ajax({
      type:'POST',
      url:"{{url('admin/type/' . Request::segment(3) ) . '/'}}" + id + '/newsstatus',
      data:{_token:csrf},
      success:function(data){
          location.reload();
     },
     error:function(data){
       alert('Error occurred!');
     }
   });

  });

  });
</script>
@endsection
