@extends('themes.default.common.master')
@section('content')
<!-- =========================================
Main Container
========================================== -->
<div class="uk-container uk-container-center uk-margin-medium-top  uk-margin-medium-bottom  ">
   
   <div class="uk-grid-divider" uk-grid>
      <!-- left list -->
      @if($documents->count()>0)  
      <div class="uk-width-expand@m">

         <h1 class="su-uk-headline-title uk-margin-bottom">
            <span class="uk-strip"><a class="title-strip"> {{ $data->post_title }} </a> </span>
         </h1>

         <!-- list -->
           @foreach($documents as $key=>$row)
         <div class="uk-news-list-page uk-margin-medium-bottom uk-padding">
            <div class="uk-grid" data-uk-grid-margin="">
               <div class="uk-width-1-3@m">

      @if($row->doc_thumb)
        <div class="main-list-image">
            
              <img src="{{url(env('PUBLIC_PATH').'/uploads/medium/'.$row->doc_thumb)}}" alt="{{ $row->post_title }}" />
                    
                     </div>
                     @else
                     <div class="main-list-image">
                     
                      <img src="{{ asset( env('PUBLIC_PATH') . '/themes-assets/images/logo1.png') }}" alt="{{ config('app.name', '') }}" />
                    </div>  
                    @endif

               </div>
               <div class="uk-width-expand@m">
                  <div class="uk-panel">
                     <h3 class="uk-margin-remove-bottom">
                       
                          {{$row->title}}
                    
                     </h3>
                     <span class="uk-article-meta">
                       {{$row->sub_title}}
                     </span>
                     <p class="uk-margin-remove-top"> 
                        {{ $row->brief }}
                     </p>
                  </div> <br>
                  @if($row->document)
                  <a href="{{ asset(env('PUBLIC_PATH').'/uploads/doc/' . $row->document ) }}" download> <button class="uk-button uk-button-primary uk-width-1-2"> Download </button></a>
                  @endif            
               </div>
            </div>
         </div>
         @endforeach
          <div id="pagelist">
        {{ $documents->links() }} 
    </div>  
      </div>
      @else
      <div class="uk-width-expand@m">
     <h1 class="su-uk-headline-title uk-margin-bottom">
            <span class="uk-strip"><a class="title-strip"> {{ $data->post_title }} </a> </span>
         </h1>

         <div class="uk-news-list-page uk-margin-medium-bottom uk-padding">
            <div class="uk-grid" data-uk-grid-margin="">
               {!! $data->post_content !!}
                </div>
         </div>
       <div id="pagelist">
    </div>  
      </div>
      @endif
      <!-- left list end -->
      <!-- sidebar -->
      @include('themes.default.common.sidebar-right')
      <!-- sidebar end -->
   </div>
  <div class="" id="uk-stop-sticky"></div>
</div>

<script type="text/javascript">
  jQuery(document).ready(function() {
   $( "div#pagelist ul" ).addClass( "uk-pagination uk-flex-center" );
   $( "div#pagelist ul li.active" ).removeClass( "active" ).addClass( "uk-active" );
   $( "div#pagelist ul li.disabled" ).removeClass( "disabled" ).addClass( "uk-disabled" );
  });
</script>
@endsection