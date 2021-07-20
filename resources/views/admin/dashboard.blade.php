@extends('admin.master')
@section('title','Dashboard')
@section('content')

<section id="content" class="">
        <!-- Admin-panels -->
        <div class="admin-panels ui-sortable animated fadeIn" style="height: 1003px;">
          <div class="row"> 
             
            
<!-- // -->

  <!-- Begin: Content -->
      <section id="content" class="animated fadeIn">

        <!-- Dashboard Tiles -->
        <div class="row mb10">
          <div class="col-sm-6 col-md-3">
            <div class="panel bg-alert light of-h mb10">
              <div class="pn pl20 p5">
                <div class="icon-bg">
                  <i class="fa fa-file-o"></i>
                </div>
                <h2 class="mt15 lh15">
                <b>{{$total_news}}</b>
                </h2>
                <h5 class="text-muted">Total News</h5>
              </div>
            </div>
          </div>
          <div class="col-sm-6 col-md-3">
            <div class="panel bg-info light of-h mb10">
              <div class="pn pl20 p5">
                <div class="icon-bg">
                  <i class="fa fa-circle-o"></i>
                </div>
                <h2 class="mt15 lh15">
                <b>{{$total_category}}</b>
                </h2>
                <h5 class="text-muted">News Categories</h5>
              </div>
            </div>
          </div>
          <div class="col-sm-6 col-md-3">
            <div class="panel bg-danger light of-h mb10">
              <div class="pn pl20 p5">
                <div class="icon-bg">
                  <i class="fa fa-bar-envelope"></i>
                </div>
                <h2 class="mt15 lh15">
                <b>{{$num_of_inquiries}}</b>
                </h2>
                <h5 class="text-muted">Number of Inquiries</h5>
              </div>
            </div>
          </div>

          <div class="col-sm-6 col-md-3">
            <div class="panel bg-warning light of-h mb10">
              <div class="pn pl20 p5">
                <div class="icon-bg">
                  <i class="fa fa-bar-chart-o"></i>
                </div>
                <h2 class="mt15 lh15">
                <b>{{$news_visiters}}</b>
                </h2>
                <h5 class="text-muted">News Visitor</h5>
              </div>
            </div>
          </div>

        @if($newstype)
        @foreach($newstype as $row)
          <div class="col-sm-6 col-md-3">
            <div class="panel bg-warning light of-h mb10">
              <div class="pn pl20 p5">
                <!-- <div class="icon-bg">
                  <i class="fa fa-bar-chart-o"></i>
                </div>                 -->
                <a href="{{-- url('admin/type/' . $row->uri ) --}}" class="fs20 mt5 mbn text-white text-center">
                    {{$row->news_type}} 
                </a>
              </div>
            </div>
          </div>
          @endforeach 
        @endif 
        </div>

        <!-- Admin-panels -->
        <div class="admin-panels ui-sortable animated fadeIn" style="height: 1003px;">
<div class="row mb10">
        	 <!-- Chart Column -->
                  
                    <!-- // -->
</div>


          <div class="row">

            <!-- Three Pane Widget -->
            <div class="col-md-12 admin-grid" id="grid-0">
              
            <div class="panel preserve-grid"></div><div class="panel sort-disable" id="p0">
                
                <div class="panel-body mnw700 of-a">
                  <div class="row">                  

                    <!-- Multi Text Column -->
                    <div class="col-md-6 br-r">
                      <h3 class="mt5 pb5 fw600">Most Viewed Pages</h3>
                      @if($max_viewed->count() > 0)
                       <ul class="list-group">
                       @foreach($max_viewed as $row)
                       	<li class="list-group-item d-flex justify-content-between align-items-center">
                        <a href="{{--url(geturl($row->uri))--}}" target="_blank"> {{$row->news_title}} </a>
                        {!! viewsIndicator($row->visiter) !!}                        
                      </li>
                      @endforeach            						  
                      </ul>
                      @endif
                      </div>

                    <!-- Flag/Icon Column -->
                    <div class="col-md-6">
                    	 <h3 class="mt5 pb5 fw600">Recent News</h3>
                       @if($recent_news->count() > 0)
            <ul class="list-group">
            @foreach($recent_news as $row)
                       	 <li class="list-group-item d-flex justify-content-between align-items-center">
						    <a href="{{--url(geturl($row->uri))--}}" target="_blank"> {{$row->news_title}} </a>						     
						  </li>
              @endforeach               
						  
						</ul>
            @endif
                    </div>
                  </div>
                </div>
              </div><div class="panel preserve-grid"></div></div>
            <!-- end: .col-md-12.admin-grid -->

          </div>
          <!-- end: .row --> 

        </div>

      </section>
      <!-- End: Content -->

         </div>      
        </div>   
      </section>

@endsection
