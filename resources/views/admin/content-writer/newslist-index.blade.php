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
              <th>Ordering</th>                     
              <th>Post By</th>
              <th>Visiter</th>
              <th>Created</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            @foreach($data as $row)
            <tr class="id{{$row->id}}">
              <td>{{ $row->id }}</td>
              <td class="title_hi_sh"> <strong>
                <a href="avoid:javascript;"> {{ $row->news_title }} </a></strong> </td>
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
              <td> {{ $row->nepali_date }} मा प्रकाशित</td>   
              <td>
                
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

@endsection
