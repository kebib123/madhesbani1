@extends('admin.master')
@section('title','Post')

@section('breadcrumb')
@endsection

@section('content')

<section id="content" class="table-layout animated fadeIn">
  <!-- begin: .tray-center -->
  <div class="tray tray-center">
    <h4> Document List </h4>
    <ul class="subsubsub">
     <li> <a href="{{ url('doc/multipledocument/'.Request::segment(3).'/create') }}" class="btn btn-primary"> Create </a> </li>
   </ul>
   <!-- recent orders table -->
   
  <div class="panel">
    <div class="panel-body pn">
      <div class="table-responsive">
        <table class="table admin-form table-striped  dataTable" id="datatable3">
          <thead>
            <tr class="bg-light">
              <th class="text-center"> SN </th>
              <th>Post Name</th>
              <th></th>
              <th>Ordering</th>                          
              <th>Published</th>
            </tr>
          </thead>
          <tbody>
           @if($data->count() > 0)
            @foreach($data as $row)
            <tr class="id{{$row->id}}">
              <td class="text-center">
                {{$loop->iteration}}
              </td>
              <td class="post_title title_hi_sh">                
                    <strong> {{ ucfirst($row->title) }} </strong> 
                <div class="row_actions"><span class="id">ID: {{$row->id}} | </span><span class="edit"><a href="{{url('doc/multipledocument/'.Request::segment(3).'/'. $row->id. '/edit')}}" aria-label="">Edit</a> | </span><span class="trash"><a href="#{{$row->id}}" class="submitdelete" aria-label="">Delete</a> </span>
                </td>
                <td></td>
                <td>{{$row->ordering}}
                </td>
                <td class="date"> {{$row->created_at}} </td>             
              </tr>
              @endforeach
             
              @endif 
          </tbody>
        </table>
      </div>
    </div>
  </div>
 


</div>

</section>

@endsection

@section('libraries')
<!-- Datatables -->
<script src="{{asset(env('PUBLIC_PATH').'vendor/plugins/datatables/media/js/jquery.dataTables.js')}}"></script>

<!-- Datatables Tabletools addon -->
<script src="{{asset(env('PUBLIC_PATH').'vendor/plugins/datatables/extensions/TableTools/js/dataTables.tableTools.min.js')}}"></script>

<!-- Datatables ColReorder addon -->
<script src="{{asset(env('PUBLIC_PATH').'vendor/plugins/datatables/extensions/ColReorder/js/dataTables.colReorder.min.js')}}"></script>

<!-- Datatables Bootstrap Modifications  -->
<script src="{{asset(env('PUBLIC_PATH').'vendor/plugins/datatables/media/js/dataTables.bootstrap.js')}}"></script>
<script type="text/javascript">
  $('document').ready(function(){
    // Select Checkbox
    $('#checkAll').on('click',function(e){
      if($(this).is(':checked', true)){
        $('.check_box').prop('checked', true);
      }else{
        $('.check_box').prop('checked', false);
      }
    });
    // Delete Data
    $('.deleteAll').on(function(){

    });
  });

  // Data Table
  $('#datatable3').dataTable({
    "aoColumnDefs": [{
      'bSortable': true,
      'aTargets': [-1]

    }],
    "oLanguage": {
      "oPaginate": {
        "sPrevious": "Previous",
        "sNext": "Next"
      }
    },
    "iDisplayLength": 10,
    "aLengthMenu": [
    [5, 10, 25, 50, -1],
    [5, 10, 25, 50, "All"]
    ],
    "sDom": '<"dt-panelmenu clearfix"Tfr>t<"dt-panelfooter clearfix"ip>',
    "oTableTools": {
      "sSwfPath": "{{asset(env('PUBLIC_PATH').'vendor/plugins/datatables/extensions/TableTools/swf/copy_csv_xls_pdf.swf')}}"
    }
  });
</script>
  @endsection

  @section('scripts')
  <script type="text/javascript">
  // Delete row
  jQuery(document).ready(function() {
  $('.submitdelete').on('click',function(e){
    e.preventDefault();
    if(!confirm('Are you sure to delete?')) return false;
    var csrf = $('meta[name="csrf-token"]').attr('content');
    var str = $(this).attr('href');
    var id = str.slice(1);
    $.ajax({
      type:'DELETE',
      url:"{{url('doc/deleterow') . '/'}}" + id,
      data:{_token:csrf},    
      success:function(data){  
       alert(data);             
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