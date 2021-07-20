<div class="uk-width-1-3@m ">
 
  <div class="uk-margin-medium-bottom" style="z-index: 9;" uk-sticky="offset: 100; bottom: #uk-stop-sticky">   
    <h1 class="su-uk-headline-title uk-margin-bottom">
      <span class="uk-strip"><a class="title-strip">
          Filter 
      </a>
      </span>
    </h1>
    <div class="uk-list-news-varticle">

      <form class="uk-form-stacked">
            <!---->
            <div class="uk-margin-bottom">
                <label class="uk-form-label">Year</label>
                <div class="uk-form-controls">
                <select class="uk-select" id="form-stacked-select">
                        <option>Select Year</option>
                        <option> 2075</option>
                    </select>
                    
                    </div>
            </div>
            <!---->
            
                        <!---->
           <div class="uk-margin-bottom">
                <label class="uk-form-label">Month</label>
                <div class="uk-form-controls">
                <select class="uk-select" id="form-stacked-select">
                        <option>Select Month</option>
                        <option>Baisak</option>
                    </select>
                    
                    </div>
            </div>
            <!---->
            
              <!---->
            <div class="uk-margin-bottom">
                <label class="uk-form-label">Date</label>
                <div class="uk-form-controls">
                <select class="uk-select" id="form-stacked-select">
                        <option>Select Date</option>
                        <option>1</option>
                    </select>
                    
                    </div>
            </div>
            <!---->
            
            <button class="uk-button uk-button-primary">Search</button>
    
</form>

 
    </div>
  </div>
  <!-- ad -->
  @php
  $position = 35;
  @endphp
  @if( advertisement($position) )
  <div class="ad-aside uk-text-center uk-margin-top">
    <a href="{{ advertisement($position)->client_link }}" target="_blank">
      <img src="{{ asset( env('PUBLIC_PATH') . '/uploads/advertisement/' . advertisement($position)->add_image ) }}" alt="{{ advertisement($position)->client_name }}" title="{{ (Auth::check())? advertisement($position)->title.'-'.advertisement($position)->position.'-'.advertisement($position)->add_size : '' }}" />
    </a>
  </div>
  @endif
  @php
  $position = 36;
  @endphp
  @if( advertisement($position) )
  <div class="ad-aside uk-text-center uk-margin-small-top">
    <a href="{{ advertisement($position)->client_link }}" target="_blank">
      <img src="{{ asset( env('PUBLIC_PATH') . '/uploads/advertisement/' . advertisement($position)->add_image ) }}" alt="{{ advertisement($position)->client_name }}" title="{{ (Auth::check())? advertisement($position)->title.'-'.advertisement($position)->position.'-'.advertisement($position)->add_size : '' }}" />
    </a>
  </div>
  @endif
  @php
  $position = 37;
  @endphp
  @if( advertisement($position) )
  <div class="ad-aside uk-text-center uk-margin-small-top">
    <a href="{{ advertisement($position)->client_link }}" target="_blank">
      <img src="{{ asset( env('PUBLIC_PATH') . '/uploads/advertisement/' . advertisement($position)->add_image ) }}" alt="{{ advertisement($position)->client_name }}" title="{{ (Auth::check())? advertisement($position)->title.'-'.advertisement($position)->position.'-'.advertisement($position)->add_size : '' }}" />
    </a>
  </div>
  @endif
  @php
  $position = 38;
  @endphp
  @if( advertisement($position) )
  <div class="ad-aside uk-text-center uk-margin-small-top">
    <a href="{{ advertisement($position)->client_link }}" target="_blank">
      <img src="{{ asset( env('PUBLIC_PATH') . '/uploads/advertisement/' . advertisement($position)->add_image ) }}" alt="{{ advertisement($position)->client_name }}" title="{{ (Auth::check())? advertisement($position)->title.'-'.advertisement($position)->position.'-'.advertisement($position)->add_size : '' }}" />
    </a>
  </div>
  @endif
  @php
  $position = 39;
  @endphp
  @if( advertisement($position) )
  <div class="ad-aside uk-text-center uk-margin-small-top">
    <a href="{{ advertisement($position)->client_link }}" target="_blank">
      <img src="{{ asset( env('PUBLIC_PATH') . '/uploads/advertisement/' . advertisement($position)->add_image ) }}" alt="{{ advertisement($position)->client_name }}" title="{{ (Auth::check())? advertisement($position)->title.'-'.advertisement($position)->position.'-'.advertisement($position)->add_size : '' }}" />
    </a>
  </div>
  @endif

  <!-- ad -->
  <!--  -->
    <?php /*?>
  <?php $newstype = 10;
  $limit = 4;
  ?>
  @if(newslist($newstype,$limit))
  <div class="uk-margin-medium-top">
    <h1 class="su-uk-headline-title uk-margin-bottom">
      <span class="uk-strip"><a href="{{ url('/koria') }}" class="title-strip">कोरिया </a>  <div class="uk-view-all">
        <a href="{{ url('/koria') }}">सबै <i class="fa fa-list"></i></a></div>  </span>
      </h1>
      <div class="uk-list-news-varticle">


        @foreach(newslist($newstype,$limit) as $row)
        <div class="news-list uk-margin-medium-bottom clearfix">

          @if( $row->news_thumbnail ) 
          <div class="imgcover">
            <a href="{{ url(get_newstype($row->news_type)['uri'] .'/'. splitTimeStamp($row->created_at,$row->uri) ) }}">
              <img src="{{ asset( env('PUBLIC_PATH') . '/uploads/medium/' . $row->news_thumbnail) }}" alt="{{ $row->news_title }}" />
            </a>
          </div>
          @else
          <div class="imgcover">
            <img src="{{ asset( env('PUBLIC_PATH') . '/themes-assets/images/logo1.png') }}" alt="{{ config('app.name', '') }}" />
          </div>
          @endif
          <div class="headline">
            <h4><a href="{{ url(get_newstype($row->news_type)['uri'] .'/'. splitTimeStamp($row->created_at,$row->uri) ) }}"> {{ $row->news_title }} </a></h4>
          </div>
        </div>
        <div class="clearfix"></div>
        @endforeach
        <!--  -->
      </div>
    </div>
    @endif

  <?php */?>

    <!--  -->
    <!-- ad -->
    @php
    $position = 40;
    @endphp
    @if( advertisement($position) )
    <div class="ad-aside uk-text-center uk-margin-top">
      <a href="{{ advertisement($position)->client_link }}" target="_blank">
        <img src="{{ asset( env('PUBLIC_PATH') . '/uploads/advertisement/' . advertisement($position)->add_image ) }}" alt="{{ advertisement($position)->client_name }}" title="{{ (Auth::check())? advertisement($position)->title.'-'.advertisement($position)->position.'-'.advertisement($position)->add_size : '' }}" />
      </a>
    </div>
    @endif
    @php
    $position = 41;
    @endphp
    @if( advertisement($position) )
    <div class="ad-aside uk-text-center uk-margin-small-top">
      <a href="{{ advertisement($position)->client_link }}" target="_blank">
        <img src="{{ asset( env('PUBLIC_PATH') . '/uploads/advertisement/' . advertisement($position)->add_image ) }}" alt="{{ advertisement($position)->client_name }}" title="{{ (Auth::check())? advertisement($position)->title.'-'.advertisement($position)->position.'-'.advertisement($position)->add_size : '' }}" />
      </a>
    </div>
    @endif
    @php
    $position = 42;
    @endphp
    @if( advertisement($position) )
    <!-- ad -->
    <!-- ad -->
    <div class="ad-aside uk-text-center uk-margin-medium-top">
      <a href="{{ advertisement($position)->client_link }}" target="_blank">
        <img src="{{ asset( env('PUBLIC_PATH') . '/uploads/advertisement/' . advertisement($position)->add_image ) }}" alt="{{ advertisement($position)->client_name }}" title="{{ (Auth::check())? advertisement($position)->title.'-'.advertisement($position)->position.'-'.advertisement($position)->add_size : '' }}" />
      </a>
    </div>
    @endif
    @php
    $position = 43;
    @endphp
    @if( advertisement($position) )
    <div class="ad-aside uk-text-center uk-margin-small-top">
      <a href="{{ advertisement($position)->client_link }}" target="_blank">
        <img src="{{ asset( env('PUBLIC_PATH') . '/uploads/advertisement/' . advertisement($position)->add_image ) }}" alt="{{ advertisement($position)->client_name }}" title="{{ (Auth::check())? advertisement($position)->title.'-'.advertisement($position)->position.'-'.advertisement($position)->add_size : '' }}" />
      </a>
    </div>
    @endif
    @php
    $position = 44;
    @endphp
    @if( advertisement($position) )
    <div class="ad-aside uk-text-center uk-margin-small-top">
      <a href="{{ advertisement($position)->client_link }}" target="_blank">
        <img src="{{ asset( env('PUBLIC_PATH') . '/uploads/advertisement/' . advertisement($position)->add_image ) }}" alt="{{ advertisement($position)->client_name }}" title="{{ (Auth::check())? advertisement($position)->title.'-'.advertisement($position)->position.'-'.advertisement($position)->add_size : '' }}" />
      </a>
    </div>
    @endif
    <!-- ad -->
    <!--  -->
    <?php /*?>
    <?php $newstype = 2;
    $limit = 4;
    ?>
    @if(newslist($newstype,$limit))
    <div class="uk-margin-medium-top">
      <h1 class="su-uk-headline-title uk-margin-bottom">
        <span class="uk-strip"><a href="{{ url('/village-city') }}" class="title-strip">गाउँ नगर </a>  <div class="uk-view-all">
          <a href="{{ url('/village-city') }}">सबै <i class="fa fa-list"></i></a></div>  </span>
        </h1>
        <div class="uk-list-news-varticle">
          <!--  -->
          @foreach(newslist($newstype,$limit) as $row)
          <div class="news-list uk-margin-medium-bottom clearfix">

            @if( $row->news_thumbnail ) 
            <div class="imgcover">
              <a href="{{ url(get_newstype($row->news_type)['uri'] .'/'. splitTimeStamp($row->created_at,$row->uri) ) }}">
                <img src="{{ asset( env('PUBLIC_PATH') . '/uploads/medium/' . $row->news_thumbnail) }}" alt="{{ $row->news_title }}" />
              </a>
            </div>
            @else
            <div class="imgcover">
              <img src="{{ asset( env('PUBLIC_PATH') . '/themes-assets/images/logo1.png') }}" alt="{{ config('app.name', '') }}" />
            </div>
            @endif
            
            <div class="headline">
              <h4><a href="{{ url(get_newstype($row->news_type)['uri'] .'/'. splitTimeStamp($row->created_at,$row->uri) ) }}"> {{ $row->news_title }} </a></h4>
            </div>
          </div>
          <div class="clearfix"></div>
          @endforeach
          <!--  -->
          
        </div>
      </div>
      @endif
      <!--  -->
        <?php */?>
    </div>