<!DOCTYPE html>
<html>
<head>
  <!-- Meta, title, CSS, favicons, etc. -->
  <meta charset="utf-8">
  <title> {{ config('app.name', '') }} - @yield('title') </title>
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="Cyberlink">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <base href = "<?=url('/'); ?>" />
  <!-- Font CSS (Via CDN) -->
  <link rel='stylesheet' type='text/css' href='https://fonts.googleapis.com/css?family=Open+Sans:300,400,600'>
  @yield('additional-css')

  <link rel="stylesheet" type="text/css" href="{{ asset( env('PUBLIC_PATH') . '/vendor/plugins/datatables/media/css/dataTables.bootstrap.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset( env('PUBLIC_PATH') . '/vendor/plugins/datatables/media/css/dataTables.plugins.css') }}">

  <!-- Theme CSS -->
  <link rel="stylesheet" type="text/css" href="{{ asset( env('PUBLIC_PATH') . '/assets/skin/default_skin/css/theme2.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset( env('PUBLIC_PATH') . '/assets/skin/default_skin/css/theme3.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset( env('PUBLIC_PATH') . '/assets/skin/default_skin/css/theme.css') }}">

  <!-- Admin Forms CSS -->
  <link rel="stylesheet" type="text/css" href="{{ asset( env('PUBLIC_PATH') . '/assets/admin-tools/admin-forms/css/admin-forms.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset( env('PUBLIC_PATH') . '/assets/css/nepaliDatePicker.css') }}">
  <!-- Favicon -->
  <link rel="shortcut icon" href="{{ asset( env('PUBLIC_PATH') . '/themes-assets/images/favicon.png') }}">
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
  <![endif]-->
</head>

<body class="dashboard-page sb-l-o sb-r-c">
  <!-- Start: Main -->
  <div id="main">
   <!-- Start: Header -->
   <header class="navbar navbar-fixed-top">
    <div class="navbar-branding">
      <a class="navbar-brand" href="{{url('/')}}" target="_blank">
        Admin Panel
      </a>
      <span id="toggle_sidemenu_l" class="ad ad-lines"></span>
    </div>

    <ul class="nav navbar-nav navbar-right">
      <li class="dropdown">
        <a href="#" class="dropdown-toggle fw600 p15" data-toggle="dropdown">
          <img src="{{ asset( env('PUBLIC_PATH') . '/assets/img/avatars/1.png') }}" alt="avatar" class="mw30 br64 mr15">
          {{ Auth::user()->name }}
          <span class="caret caret-tp hidden-xs"></span>
        </a>
        <ul class="dropdown-menu list-group dropdown-persist w250" role="menu">
        <li><a href="{{route('admin.userprofile')}}">User Profile</a></li>
          <li><a href="{{route('admin.changepassword')}}">Change Password </a></li>
          @guest
          <li><a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a></li>
          <li><a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a></li>
          @else
          <li class="dropdown-footer">
            <a class="animated animated-short fadeInUp" href="{{ route('logout') }}"
            onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">
            <span class="fa fa-power-off pr5"></span>
            {{ __('Logout') }}
          </a>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
           {{ csrf_field() }}
         </form>
       </li>
       @endguest
     </ul>
   </li>
 </ul>
</header>

<!-- Start: Sidebar Left -->
@include('admin.common.sidebar')
<section id="content_wrapper">
<header id="topbar">
        <div class="topbar-left">
          <!-- <ol class="breadcrumb">
           <li class="crumb-active">
              <a href="{{url('dashboard')}}">Dashboard</a>
            </li>
           <li class="crumb-link">
              <a href="{{url('dashboard')}}">Home</a>
            </li>
            <li class="crumb-trail"> Dashboard </li>
          </ol> -->
        </div>
<div class="topbar-right">
@yield('breadcrumb')
</div>
</header>



  @include('admin.common.notification')
  @include('admin.common.message')
  @yield('content')
</section>
</div>
<!-- End: Main -->
<!-- jQuery -->
<script src="{{ asset( env('PUBLIC_PATH') . '/vendor/jquery/jquery-1.11.1.min.js') }}"></script>
<script src="{{ asset( env('PUBLIC_PATH') . '/vendor/jquery/jquery_ui/jquery-ui.min.js') }}"></script>
<script src="{{ asset( env('PUBLIC_PATH') . '/assets/js/jquery.nepaliDatePicker.js') }}"></script>

<!-- Bootstrap Maxlength plugin -->
<script src="{{ asset( env('PUBLIC_PATH') . '/vendor/plugins/maxlength/bootstrap-maxlength.min.js') }}"></script>

<script src="{{asset( env('PUBLIC_PATH') . '/vendor/plugins/datatables/media/js/jquery.dataTables.js')}}"></script>
<script src="{{asset( env('PUBLIC_PATH') . '/vendor/plugins/datatables/extensions/TableTools/js/dataTables.tableTools.min.js')}}"></script>
<script src="{{asset( env('PUBLIC_PATH') . '/vendor/plugins/datatables/extensions/ColReorder/js/dataTables.colReorder.min.js')}}"></script>
<script src="{{asset( env('PUBLIC_PATH') . '/vendor/plugins/datatables/media/js/dataTables.bootstrap.js')}}"></script>

<!-- Theme Javascript -->
<script src="{{ asset( env('PUBLIC_PATH') . '/assets/js/utility/utility.js') }}"></script>
<script src="{{ asset( env('PUBLIC_PATH') . '/assets/js/demo/demo.js') }}"></script>
<script src="{{ asset( env('PUBLIC_PATH') . '/assets/js/main.js') }}"></script>

@yield('scripts')
<script src="https://cdn.tiny.cloud/1/xlhisqrt01di88akhyau1n9s2fwnbn6w77vmfoldzzizqsjx/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<script src="{{asset(env('PUBLIC_PATH').'tinymce/init-tinymce.js')}}"></script>

<script src="https://www.google.com/recaptcha/api.js?render={{env('SITE_KEY')}}"></script>
<script>
grecaptcha.ready(function() {
    grecaptcha.execute('<?php echo env("SITE_KEY"); ?>', {action: 'homepage'}).then(function(token) {
      document.getElementById('g_recaptcha_response').value=token;
    });
});
</script>
<!--  -->
<script type="text/javascript">
    $("#date-picker").nepaliDatePicker({
        dateFormat: "%y %M %d",
        closeOnDateSelect: true
    });
  jQuery(document).ready(function() {

    "use strict";

    // Init Theme Core
    Core.init();

    // Init Demo JS
    //Demo.init();

    $('#datatable3').dataTable({
      "order": [[ 2, "desc" ]],
      "aoColumnDefs": [{
        'bSortable': false,
        'aTargets': [-1]

      }],
      "oLanguage": {
        "oPaginate": {
          "sPrevious": "Previous",
          "sNext": "Next"
        }
      },
      "iDisplayLength": 20,
      "aLengthMenu": [
      [5, 10, 25, 50, -1],
      [5, 10, 25, 50, "All"]
      ],
      "sDom": '<"dt-panelmenu clearfix"Tfr>t<"dt-panelfooter clearfix"ip>',
      "oTableTools": {
        "sSwfPath": "{{env('PUBLIC_PATH')}}/vendor/plugins/datatables/extensions/TableTools/swf/copy_csv_xls_pdf.swf"
      }
    });



  });
</script>
</body>
</html>
