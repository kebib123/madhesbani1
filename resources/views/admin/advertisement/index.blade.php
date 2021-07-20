@extends('admin.master')
@section('title','Post Category')
@section('breadcrumb')
@endsection
@section('content')
    <section id="content" class="table-layout animated fadeIn">
        <div class="tray tray-center" style="height: 647px;">
            <div class="panel">
                <div class="panel-body ph20">
                    <div class="tab-content">
                        <div id="users" class="tab-pane active">
                            <div class="table-responsive mhn20 mvn15">
                                <table class="table admin-form theme-warning fs13" id="datatable3">
                                    <thead>
                                    <tr class="bg-light">
                                        <th class="">SN</th>
                                        <th class=""> Title </th>
                                        <th class="text-center">Position</th>
                                        <th>Size</th>

                                        <th class=""> Picture </th>

                                        <th class=""> Status </th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if(count($data) > 0)
                                        @foreach($data as $row)
                                            <tr class="id{{$row->id}}">
                                                <td>{{$loop->iteration}}</td>
                                                <td>{{ ucfirst($row->title) }}</td>
                                                <td class="text-center">{{ $row->position }}</td>
                                                <td>{{ ucfirst($row->add_size) }}</td>

                                                <td class="">
                                                    @if($row->add_image)
                                                        <a href="{{ asset('/uploads/advertisement/' . $row->add_image ) }}" target="_blank"><img src="{{ asset('/uploads/advertisement/' . $row->add_image ) }}" alt="{{ $row->title }}" width="100" /></a>
                                                    @endif
                                                </td>

                                                <td class="">
                                                    @if($row->status == 1)
                                                        <span class="text-success">Enabled</span>
                                                    @elseif($row->status == 0)
                                                        <span class="text-danger">Disabled</span>
                                                    @endif
                                                </td>
                                                <td class="text-center">
                                                    <a href="{{ url('admin/advertisement/'.$row->id.'/edit') }}">Edit</a>| <span class="trash"><a href="#{{$row->id}}" class="btn-delete">Delete</a> </span>
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
    </section>
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
                    url:"{{url('admin/advertisement') . '/'}}" + id,
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
