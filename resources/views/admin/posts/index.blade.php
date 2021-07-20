@extends('admin.master')
@section('title','Post Type')
@section('breadcrumb')
@endsection
@section('content')
<!-- Begin: Content -->
<section id="content" class="table-layout animated fadeIn">
  <!-- begin: .tray-center -->
  <div class="tray tray-center">
    <ul class="subsubsub">
     <li> <a href="{{ route('editor.post.create', Request::segment(2)) }}" class="btn btn-primary"> Create Post</a> </li>
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
              <th>Files</th>
              <th>Order</th>  
              <th></th>                          
              <th>Published</th>
            </tr>
          </thead>
          <tbody>
          
            @foreach($data as $row)
            <tr class="id{{$row->id}}">
              <td class="text-center">
                {{$loop->iteration}}
              </td>
              <td class="post_title title_hi_sh"> 
                @if(check_child_post($row->id))
                    <strong> {{$row->post_title }} </strong> 
                      <a href="{{ url('editor/' . Request::segment(2) . '/' . $row->id ) }}"> <i class="fa fa-list" aria-hidden="true"></i> </a>
                    @else
                    <strong> {{$row->post_title }} </strong> 
                @endif
                
                <div class="row_actions"><span class="id">ID: {{$row->id}} | </span><span class="edit"><a href="{{url( 'editor/'.Request::segment(2) .'/'. $row->id. '/edit')}}" aria-label="">Edit</a> 
                 </span> 
                
                 @if(!check_child_post($row->id) > 0 )
                 | <span class="trash"><a href="#{{$row->id}}" class="submitdelete1">Delete</a> </span>
                 @endif

                </td>
                <td> 
                    <a href="{{ route('doc.multipledocument',$row->id) }}" class="btn btn-danger submitdelete">  <i class="fa fa-file-pdf-o" aria-hidden="true"></i></a>
                  
                
                </a>
              </td>
                <td class="categories">                  
                  {{ $row->post_order }}
                </td>
              <td>
                <?php /* ?>
                 
                <a href="{{ route('post.multiplephoto', $row->id ) }}" title="Multiple-Photo">
                  <i class="fa fa-picture-o" aria-hidden="true"></i>
                </a> 

                  <a href="{{url('admin/associated/'.Request::segment(2).'/'.$row->id)}}"><i class="fa fa-plus"></i></a>
               
                <a href="{{ route('doc.multipledocument',$row->id) }}" title="PDF">
                  <i class="fa fa-file-pdf-o" aria-hidden="true"></i>
                </a>

                  <a href="{{ url('admin/multiplevideo/' . $row->id ) }}" title="Video">
                  <i class="fa fa-video-camera" aria-hidden="true"></i>
                  </a>
                  <?php */ ?>                 
                </td>
                <td class="date"> {{$row->created_at}} </td>             
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
  $('.submitdelete1').on('click',function(e){
    e.preventDefault();
    if(confirm('Are you sure to delete?')){
    var csrf = $('meta[name="csrf-token"]').attr('content');
    var str = $(this).attr('href');
    var id = str.slice(1);
    $.ajax({
      type:'delete',
      url:"{{url('editor').'/'.Request::segment(2).'/'}}" + id,
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
