@extends('admin.master')
@section('title','News Title')
@section('breadcrumb')
@endsection
@section('content')
<!-- Begin: Content -->
<section id="content" class="table-layout animated fadeIn">
  <!-- begin: .tray-center -->
  <div class="tray tray-center">
  <!-- recent orders table -->

  <div class="panel">
    <div class="panel-body pn">
      <div class="table-responsive">
        <table class="table admin-form table-striped  dataTable" id="datatable3">
          <thead>
            <tr class="bg-light">
              <th>ID</th>
              <th>Title</th>
              <th>Categories</th>
              <th>Ordering</th>
              <th>Post By</th>
              <th>Created</th>

            </tr>
          </thead>
          <tbody>

            @foreach($data as $row)
            <?php $arr = explode(",",$row->news_type); ?>

            <tr class="id{{$row->id}}">
              <td>{{ $row->id }}</td>
              <td class="title_hi_sh"> <strong>
                      <a href="{{ url('admin/type/'.get_newstype($row->news_type)->uri.'/'.$row->id.'/edit') }}">{{ $row->news_title }}</a> </strong> </td>
              <td class="text-center">
                @if($row->news_type )
                <a href="{{ url('admin/type/' . get_newstype($row->news_type)->uri ) }}">{{ get_newstype($row->news_type)->news_type }}</a>
                @else
                  -
                @endif
              </td>
              <td class="text-center">{{ $row->ordering }}</td>
              <td>
                @if(postby($row->content_writer))
                {{ postby($row->content_writer) }}
                @else
                 -
                @endif </td>
              <td> {{ $row->nepali_date }} मा प्रकाशित</td>

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
  });
</script>
@endsection
