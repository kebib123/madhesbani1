@extends('admin.master')
@section('title','Edit User')
@section('breadcrumb')
<a href="{{ route('user.index') }}" class="btn btn-primary btn-sm">List</a>
@endsection
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Add/Edit User Posttype -  {{ $user->name }}</div>

                <div class="panel-body">
                <form action="{{route('user.update_newstype',$user)}}" method="post">
                {{@csrf_field()}}
                    <input type="hidden" name="_method" value="put" />
                @if($data->count() > 0)
                {{--$user->newstype--}}
                @foreach($data as $row)
                        <div class="form-group">                           
                            <div class="col-md-12"> 
                                <input type="checkbox" class="col-md-1 addpermission" name="newstype_id[]" value="{{ $row->id }}"
                                 @if($user->newstype->pluck('id')->contains($row->id)) checked @endif />                    
                                <label for="title" class="col-md-7 control-label">{{$row->news_type}}</label>
                            </div>
                            
                        </div> 
                @endforeach        
                @endif        
       
                <br>
<input type="submit" class="btn btn-primary btn-sm" value="Update Admin Menu"/>
</form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
@endsection