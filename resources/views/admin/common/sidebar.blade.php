<aside id="sidebar_left" class="nano nano-primary affix">

  <!-- Start: Sidebar Left Content -->
  <div class="sidebar-left-content nano-content">

    <!-- Start: Sidebar Header -->
    <header class="sidebar-header">

      <!-- Sidebar Widget - Author (hidden)  -->
      <div class="sidebar-widget author-widget hidden">
        <div class="media">
          <div class="media-body">
            <div class="media-links">
             <a href="#" class="sidebar-menu-toggle">User Menu -</a> <a href="#">Logout</a>
           </div>
           <div class="media-author">Cyberlink Pvt. Ltd.</div>
         </div>
       </div>
     </div>
     <!-- Sidebar Widget - Search (hidden) -->
  </header>
  <!-- End: Sidebar Header -->

  <!-- Start: Sidebar Left Menu -->
  <ul class="nav sidebar-menu">
    <li class="sidebar-label pt15"> Menu </li>
    <li class="active">
      <a href="{{ url('admin/dashboard') }}">
        <span class="glyphicon glyphicon-home"></span>
        <span class="sidebar-title">Dashboard</span>
      </a>
    </li>


     <li>
      <a href="{{ route('news.breaking-news') }}">
        <span class="fa fa-dot-circle-o text-info"></span>
        <span class="sidebar-title"> Headline News </span>
      </a>
    </li>
      <li>
          <a href="{{ route('news.headlines') }}">
              <span class="fa fa-dot-circle-o text-info"></span>
              <span class="sidebar-title"> Breaking News </span>

          </a>
      </li>

@if(checkAuth(1))
<li>
            <a class="accordion-toggle" href="#">
              <span class="fa fa-dot-circle-o text-info"></span>
              <span class="sidebar-title"> Manage Posts </span>
              <span class="caret"></span>
            </a>
            <ul class="nav sub-nav">
            @if(Auth::id() == 1)
            <li>
                <a href="{{ url('type/posttype') }}">
                  <span class="fa fa-arrows"></span>
                  Post Types
                </a>
              </li>
              <li>
                <a href="{{ url('admin/postcategory') }}">
                  <span class="fa fa-arrows"></span>
                  Post Categories
                </a>
              </li>
              @endif
             <!-- Post Type List -->

             @if($posttype)
             @foreach($posttype as $row)
              <li>
                <a href="{{ url('editor/'.$row->uri)}}">
                  <span class="">></span>
                  {{$row->post_type}}
                </a>
              </li>
              @endforeach
              @endif

            </ul>
          </li>
@endif
@if(checkAuth(2))
    <li>
      <a class="accordion-toggle" href="#">
        <span class="fa fa-dot-circle-o text-info"></span>
        <span class="sidebar-title"> Manage News </span>
        <span class="caret"></span>
      </a>
      <ul class="nav sub-nav">
      @if(Auth::id() == 1)
        <li>
          <a href="admin/newstype">
            <span class="fa fa-arrows-h"></span>
            <span class="sidebar-title">News Types </span>
          </a>
        </li>
        @endif
        <!-- News Type List -->
        @if($newstype)
        @foreach($newstype as $row)
            @if(checkUser($row->id))
            <li>
              <a href="{{ url('admin/type/' . $row->uri ) }}">
                <span class="fa fa-arrows-h"></span>
                {{$row->news_type}}
              </a>
            </li>
            @endif
        @endforeach
        @endif
      </ul>
    </li>
    @endif


        <li>
      <a href="{{ url('admin/media') }}">
        <span class="fa fa-dot-circle-o text-info"></span>
        <span class="sidebar-title">  Manage Media </span>
      </a>
    </li>

@if(checkAuth(3))
    <li>
      <a href="{{ url('admin/advertisement') }}">
        <span class="fa fa-dot-circle-o text-info"></span>
        <span class="sidebar-title"> Manage Advertisement   </span>
      </a>
    </li>
    @endif
@if(checkAuth(4))
    <li class="">
            <a class="accordion-toggle">
             <span class="glyphicon glyphicon-user text-info"></span>
             <span class="sidebar-title"> Manage Users </span>
             <span class="caret"></span>
           </a>
           <ul class="nav sub-nav">
             <li>
             <a href="{{ route('user.index') }}">
                 <span class="fa fa fa-arrows-h"></span>
                 Users
               </a>
             </li>
             <li>
             <a href="{{ route('role.index') }}">
                 <span class="fa fa fa-arrows-h"></span>
                 User Roles
               </a>
             </li>
             <li>
             <a href="{{ route('adminmenu.index') }}">
                 <span class="fa fa fa-arrows-h"></span>
                 Admin Menus
               </a>
             </li>
             </ul>
         </li>
         @endif
@if(checkAuth(5))

<li>
  <a href="{{ url('admin/contentwriter') }}">
    <span class="fa fa-dot-circle-o text-info"></span>
    <span class="sidebar-title"> Content Writer     </span>
  </a>
</li>
          <li>
              <a href="{{ route('author.index') }}">
                  <span class="fa fa-dot-circle-o text-info"></span>
                  <span class="sidebar-title"> Author    </span>
              </a>
          </li>
@endif
@if(checkAuth(6))
<li>
  <a href="{{ url('admin/settings') }}">
    <span class="fa fa-dot-circle-o text-info"></span>
    <span class="sidebar-title"> Settings    </span>
  </a>
</li>
@endif
</div>
</aside>
