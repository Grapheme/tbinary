<!DOCTYPE html>
<html lang="en-us">
  <head>
    <meta charset="utf-8">
    <!--<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">-->

    <title> Admin panel </title>
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Use the correct meta names below for your web application
       Ref: http://davidbcalhoun.com/2010/viewport-metatag 
       
    <meta name="HandheldFriendly" content="True">
    <meta name="MobileOptimized" content="320">-->
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

    <!-- Basic Styles -->
    <link rel="stylesheet" type="text/css" media="screen" href="<?=URL::to('admin_template/css/bootstrap.min.css')?>">
    <link rel="stylesheet" type="text/css" media="screen" href="<?=URL::to('admin_template/css/font-awesome.min.css')?>">

    <!-- SmartAdmin Styles : Please note (smartadmin-production.css) was created using LESS variables -->
    <link rel="stylesheet" type="text/css" media="screen" href="<?=URL::to('admin_template/css/smartadmin-production_unminified.css')?>">
    <link rel="stylesheet" type="text/css" media="screen" href="<?=URL::to('admin_template/css/smartadmin-skins.css')?>">

    <!-- SmartAdmin RTL Support is under construction
    <link rel="stylesheet" type="text/css" media="screen" href="<?=URL::to('admin_template/css/smartadmin-rtl.css')?>"> -->

    <!-- We recommend you use "your_style.css" to override SmartAdmin
    specific styles this will also ensure you retrain your customization
    with each SmartAdmin update.
    <link rel="stylesheet" type="text/css" media="screen" href="<?=URL::to('admin_template/css/demo.css')?>"> -->

    <!-- Demo purpose only: goes with demo.js, you can delete this css when designing your own WebApp -->
    <link rel="stylesheet" type="text/css" media="screen" href="<?=URL::to('admin_template/css/demo.css')?>">

    <!-- FAVICONS -->
    <link rel="shortcut icon" href="<?=URL::to('admin_template/img/favicon/favicon.ico')?>" type="image/x-icon">
    <link rel="icon" href="<?=URL::to('admin_template/img/favicon/favicon.ico')?>" type="image/x-icon">

    <!-- GOOGLE FONT -->
<!--     <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,700italic,300,400,700&subset=latin,cyrillic-ext,cyrillic">
 -->
    <link href='http://fonts.googleapis.com/css?family=Ubuntu:300,400,500,700,300italic,400italic,500italic,700italic&subset=latin,cyrillic-ext,cyrillic,latin-ext' rel='stylesheet' type='text/css'>

  </head>
  <body class="">
    <!-- possible classes: minified, fixed-ribbon, fixed-header, fixed-width-->

    <!-- HEADER -->
    <header id="header">
      <div id="logo-group">

        <!-- PLACE YOUR LOGO HERE -->
        <h1 id="logo">Strawberry CMS</h1>
        <!-- END LOGO PLACEHOLDER -->

        <!-- Note: The activity badge color changes when clicked and resets the number to 0
        Suggestion: You may want to set a flag when this happens to tick off all checked messages / notifications -->
        <!--<span id="activity" class="activity-dropdown"> <i class="fa fa-user"></i> <b class="badge"> 21 </b> </span>

        <!-- AJAX-DROPDOWN : control this dropdown height, look and feel from the LESS variable file -->

      

      </div>
      <!-- end projects dropdown -->

      <!-- pulled right: nav area -->
      <div class="pull-right">

        <!-- collapse menu button -->
        <div id="hide-menu" class="btn-header pull-right">
          <span> <a href="javascript:void(0);" title="Collapse Menu"><i class="fa fa-reorder"></i></a> </span>
        </div>
        <!-- end collapse menu -->

        <!-- logout button -->
        <div id="logout" class="btn-header transparent pull-right">
          <span> <a href="<?=URL::to('logout')?>" title="Sign Out"><i class="fa fa-sign-out"></i></a> </span>
        </div>
        <!-- end logout button -->

        <!-- search mobile button (this is hidden till mobile view port) -->
        <div id="search-mobile" class="btn-header transparent pull-right">
          <span> <a href="javascript:void(0)" title="Search"><i class="fa fa-search"></i></a> </span>
        </div>
        <!-- end search mobile button -->

        <!-- input: search field
        <form action="#search.html" class="header-search pull-right">
          <input type="text" placeholder="Find reports and more" id="search-fld">
          <button type="submit">
            <i class="fa fa-search"></i>
          </button>
          <a href="javascript:void(0);" id="cancel-search-js" title="Cancel Search"><i class="fa fa-times"></i></a>
        </form>
        <!-- end input: search field -->

        <!-- multiple lang dropdown : find all flags in the image folder 
        <ul class="header-dropdown-list hidden-xs">
          <li>
            <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <img alt="" src="img/flags/us.png"> <span> US </span> <i class="fa fa-angle-down"></i> </a>
            <ul class="dropdown-menu pull-right">
              <li class="active">
                <a href="javascript:void(0);"><img alt="" src="img/flags/us.png"> US</a>
              </li>
              <li>
                <a href="javascript:void(0);"><img alt="" src="img/flags/es.png"> Spanish</a>
              </li>
              <li>
                <a href="javascript:void(0);"><img alt="" src="img/flags/de.png"> German</a>
              </li>
            </ul>
          </li>
        </ul>
        <!-- end multiple lang -->

      </div>
      <!-- end pulled right: nav area -->

    </header>
    <!-- END HEADER -->

    <!-- Left panel : Navigation area -->
    <!-- Note: This width of the aside area can be adjusted through LESS variables -->
    <aside id="left-panel">

      <!-- User info -->
      <div class="login-info">
        <span> <!-- User image size is adjusted inside CSS, it should stay as it --> <!--<img src="img/avatars/sunny.png" alt="me" class="online" />--> 
          <a><?php echo Auth::user()->user ?></a>
        </span>
      </div>
      <!-- end user info -->

      <!-- NAVIGATION : This navigation is also responsive

      To make this navigation dynamic please make sure to link the node
      (the reference to the nav > ul) after page load. Or the navigation
      will not initialize.
      -->
      <nav>
        <!-- NOTE: Notice the gaps after each icon usage <i></i>..
        Please note that these links work a bit different than
        traditional hre="" links. See documentation for details.
        -->
        <?php
        $options = array(
          '' =>           array(trans('admin.dashboard'), 'fa-home',        ''),
          'pages' =>      array(trans('admin.pages'),     'fa-list-alt',    'admin_pages'),
          'galleries' =>  array(trans('admin.galleries'), 'fa-picture-o',   ''),
          'news' =>       array(trans('admin.news'),      'fa-calendar',    'admin_news'),
          'temps' =>      array(trans('admin.templates'), 'fa-edit',        ''),
          'users' =>      array(trans('admin.users'),     'fa-male',        'admin_users'),
          'groups' =>     array(trans('admin.groups'),    'fa-shield',      'admin_users'),
          'languages' =>  array(trans('admin.languages'), 'fa-comments-o',  ''),
          'settings' =>   array(trans('admin.settings'),  'fa-cog',         ''),
          'downloads' =>  array(trans('admin.downloads'), 'fa-cloud-upload','admin_downloads'),
          );

        ?>

        <ul>

          @foreach($options as $url => $option)

            @if($option[2] == '' or allow::to($option[2]))
            <li <?php if(slink::segment(2) == $url) echo "class=\"active\"";?> >
              <a href="{{slink::to('admin/'.$url)}}" title="<?=$option[0]?>"><i class="fa fa-lg fa-fw <?=$option[1]?>"></i> <span class="menu-item-parent"><?=$option[0]?></span></a>
            </li>
            @endif

          @endforeach

        </ul>
      </nav>
      <span class="minifyme"> <i class="fa fa-arrow-circle-left hit"></i> </span>

    </aside>
    <!-- END NAVIGATION -->

    <!-- MAIN PANEL -->
    <div id="main" role="main">

      <!-- RIBBON -->
      <div id="ribbon">

        <span class="ribbon-button-alignment"> <span id="refresh" class="btn btn-ribbon" data-title="refresh"  rel="tooltip" data-placement="bottom" data-original-title="<i class='text-warning fa fa-warning'></i> Warning! This will reset all your widget settings." data-html="true"><i class="fa fa-refresh"></i></span> </span>

        <!-- breadcrumb -->
        <!--<ol class="breadcrumb">
          <li>Home</li><li>Dashboard</li>
        </ol>-->
        <!-- end breadcrumb -->

        <!-- You can also add more buttons to the
        ribbon for further usability

        Example below:

        <span class="ribbon-button-alignment pull-right">
        <span id="search" class="btn btn-ribbon hidden-xs" data-title="search"><i class="fa-grid"></i> Change Grid</span>
        <span id="add" class="btn btn-ribbon hidden-xs" data-title="add"><i class="fa-plus"></i> Add</span>
        <span id="search" class="btn btn-ribbon" data-title="search"><i class="fa-search"></i> <span class="hidden-mobile">Search</span></span>
        </span> -->

      </div>
      <!-- END RIBBON -->

      <!-- MAIN CONTENT -->
      <div id="content">
        <!-- widget grid -->
        <div class="row">
          <div class="col-xs-12 col-sm-7 col-md-7 col-lg-4">
            <h1 class="page-title txt-color-blueDark">
              @if(isset($options[slink::segment(2)]))

                @if(slink::segment(3))<a href="{{slink::to('admin/'.slink::segment(2))}}">@endif
                  <i class="fa-fw fa {{$options[slink::segment(2)][1]}}"></i> {{$options[slink::segment(2)][0]}}
                @if(slink::segment(3))</a>@endif

              @endif
              @if(slink::segment(3) != "" && isset($bread))
              <span>&gt; {{$bread}}</span>
              @endif
            </h1>
          </div>
        </div>
        <section id="widget-grid" class="">

          <!-- row -->
          <div class="row">
            <article class="col-sm-12">
              <!-- new widget -->
              @yield('content')

            </article>

          </div>

          <!-- end row -->

        </section>
        <!-- end widget grid -->

      </div>
      <!-- END MAIN CONTENT -->

    </div>
    <!-- END MAIN PANEL -->

    <!--================================================== -->

    <!-- PACE LOADER - turn this on if you want ajax loading to show (caution: uses lots of memory on iDevices)-->
    <script data-pace-options='{ "restartOnRequestAfter": true }' src="<?=URL::to('admin_template/js/plugin/pace/pace.min.js')?>"></script>

    <!-- Link to Google CDN's jQuery + jQueryUI; fall back to local -->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
    <script>
      if (!window.jQuery) {
        document.write('<script src="<?=URL::to('admin_template/js/libs/jquery-2.0.2.min.js')?>"><\/script>');
      }
    </script>

    <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
    <script>
      if (!window.jQuery.ui) {
        document.write('<script src="<?=URL::to('admin_template/js/libs/jquery-ui-1.10.3.min.js')?>"><\/script>');
      }
    </script>

    <!-- JS TOUCH : include this plugin for mobile drag / drop touch events
    <script src="<?=URL::to('admin_template/js/plugin/jquery-touch/jquery.ui.touch-punch.min.js')?>"></script> -->

    <!-- BOOTSTRAP JS -->
    <script src="<?=URL::to('admin_template/js/bootstrap/bootstrap.min.js')?>"></script>

    <!-- CUSTOM NOTIFICATION -->
    <script src="<?=URL::to('admin_template/js/notification/SmartNotification.js')?>"></script>

    <!-- JARVIS WIDGETS -->
    <script src="<?=URL::to('admin_template/js/smartwidgets/jarvis.widget.min.js')?>"></script>

    <!-- EASY PIE CHARTS -->
    <script src="<?=URL::to('admin_template/js/plugin/easy-pie-chart/jquery.easy-pie-chart.min.js')?>"></script>

    <!-- SPARKLINES -->
    <script src="<?=URL::to('admin_template/js/plugin/sparkline/jquery.sparkline.min.js')?>"></script>

    <!-- JQUERY VALIDATE -->
    <script src="<?=URL::to('admin_template/js/plugin/jquery-validate/jquery.validate.min.js')?>"></script>

    <!-- JQUERY MASKED INPUT -->
    <script src="<?=URL::to('admin_template/js/plugin/masked-input/jquery.maskedinput.min.js')?>"></script>

    <!-- JQUERY SELECT2 INPUT -->
    <script src="<?=URL::to('admin_template/js/plugin/select2/select2.min.js')?>"></script>

    <!-- JQUERY UI + Bootstrap Slider -->
    <script src="<?=URL::to('admin_template/js/plugin/bootstrap-slider/bootstrap-slider.min.js')?>"></script>

    <!-- browser msie issue fix -->
    <script src="<?=URL::to('admin_template/js/plugin/msie-fix/jquery.mb.browser.min.js')?>"></script>

    <!-- SmartClick: For mobile devices -->
    <script src="<?=URL::to('admin_template/js/plugin/smartclick/smartclick.js')?>"></script>

    <!--[if IE 7]>

    <h1>Your browser is out of date, please update your browser by going to www.microsoft.com/download</h1>

    <![endif]-->

    <!-- MAIN APP JS FILE -->
    <script src="<?=URL::to('admin_template/js/app.js')?>"></script>
    
    <!-- PAGE RELATED PLUGIN(S) -->
    
    <!-- Flot Chart Plugin: Flot Engine, Flot Resizer, Flot Tooltip -->
    <script src="<?=URL::to('admin_template/js/plugin/flot/jquery.flot.cust.js')?>"></script>
    <script src="<?=URL::to('admin_template/js/plugin/flot/jquery.flot.resize.js')?>"></script>
    <script src="<?=URL::to('admin_template/js/plugin/flot/jquery.flot.tooltip.js')?>"></script>
    
    <!-- Vector Maps Plugin: Vectormap engine, Vectormap language -->
    <script src="<?=URL::to('admin_template/js/plugin/vectormap/jquery-jvectormap-1.2.2.min.js')?>"></script>
    <script src="<?=URL::to('admin_template/js/plugin/vectormap/jquery-jvectormap-world-mill-en.js')?>"></script>
    
    <!-- Full Calendar -->
    <script src="<?=URL::to('admin_template/js/plugin/fullcalendar/jquery.fullcalendar.min.js')?>"></script>

    @yield('plugins')

    <script type="text/javascript">
    // DO NOT REMOVE : GLOBAL FUNCTIONS!
    $(document).ready(function() {
      pageSetUp();
    })

    </script>
    
    <!-- Your GOOGLE ANALYTICS CODE Below -->
    <script type="text/javascript">
      var _gaq = _gaq || [];
      _gaq.push(['_setAccount', 'UA-XXXXXXXX-X']);
      _gaq.push(['_trackPageview']);

      (function() {
        var ga = document.createElement('script');
        ga.type = 'text/javascript';
        ga.async = true;
        ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
        var s = document.getElementsByTagName('script')[0];
        s.parentNode.insertBefore(ga, s);
      })();

    </script>

  </body>

</html>
