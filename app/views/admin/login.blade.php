
<!DOCTYPE html>
<html lang="en-us">
    <head>
        <meta charset="utf-8">
        <!--<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">-->

        <title> SmartAdmin </title>
        <meta name="description" content="">
        <meta name="author" content="">

        <!-- Use the correct meta names below for your web application
             Ref: http://davidbcalhoun.com/2010/viewport-metatag 
             
        <meta name="HandheldFriendly" content="True">
        <meta name="MobileOptimized" content="320">-->
        
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

        <!-- Basic Styles -->
        <link rel="stylesheet" type="text/css" media="screen" href="{{slink::to('admin_template/css/bootstrap.min.css')}}"> 
        <link rel="stylesheet" type="text/css" media="screen" href="{{slink::to('admin_template/css/font-awesome.min.css')}}">

        <!-- SmartAdmin Styles : Please note (smartadmin-production.css) was created using LESS variables -->
        <link rel="stylesheet" type="text/css" media="screen" href="{{slink::to('admin_template/css/smartadmin-production.css')}}">
        <link rel="stylesheet" type="text/css" media="screen" href="{{slink::to('admin_template/css/smartadmin-skins.css')}}">  

        <!-- GOOGLE FONT -->
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,700italic,300,400,700">

    </head>
    <body id="login" class="animated fadeInDown">
        <!-- possible classes: minified, no-right-panel, fixed-ribbon, fixed-header, fixed-width-->
        <header id="header">
            <!--<span id="logo"></span>-->

            <div id="logo-group">

                <!-- END AJAX-DROPDOWN -->
            </div>

        </header>

        <div id="main" role="main">

            <!-- MAIN CONTENT -->
            <div id="content" class="container">

                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-7 col-lg-8 hidden-xs hidden-sm">
                        <h1 class="txt-color-red login-header-big">Login page</h1>

                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-5 col-lg-4">
                        <div class="well no-padding">
                            @if (Session::has('message'))
                                <div class="flash alert">
                                    <p>{{ Session::get('message') }}</p>
                                </div>
                            @endif
                            {{ Form::open(array('role' => 'form', route('login'), 'class' => 'smart-form client-form', 'id' => 'login-form')) }}
                                <header>
                                    Sign In
                                </header>

                                <fieldset>
                                    
                                    <section>
                                        <label class="label">Username</label>
                                        <label class="input"> <i class="icon-append fa fa-user"></i>
                                            <input type="text" name="user">
                                        </label>
                                    </section>

                                    <section>
                                        <label class="label">Password</label>
                                        <label class="input"> <i class="icon-append fa fa-lock"></i>
                                            <input type="password" name="password">
                                        </label>
                                    </section>

                                    <section>
                                        <label class="checkbox">
                                            <input type="checkbox" name="remember" checked="" value="on">
                                            <i></i>Stay signed in</label>
                                    </section>
                                </fieldset>
                                <footer>
                                    <button type="submit" class="btn btn-primary">
                                        Sign in
                                    </button>
                                </footer>
                            {{ Form::close() }}

                        </div>
                        
                    </div>
                </div>
            </div>

        </div>

        <!--================================================== -->  

        <!-- PACE LOADER - turn this on if you want ajax loading to show (caution: uses lots of memory on iDevices)
        <script data-pace-options='{ "restartOnRequestAfter": true }' src="js/plugin/pace/pace.min.js"></script>-->

        <!-- Link to Google CDN's jQuery + jQueryUI; fall back to local -->
        <script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
        <script> if (!window.jQuery) { document.write('<script src="js/libs/jquery-2.0.2.min.js"><\/script>');} </script>

        <script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
        <script> if (!window.jQuery.ui) { document.write('<script src="js/libs/jquery-ui-1.10.3.min.js"><\/script>');} </script>

        <!-- JS TOUCH : include this plugin for mobile drag / drop touch events         
        <script src="js/plugin/jquery-touch/jquery.ui.touch-punch.min.js"></script> -->

        <!-- BOOTSTRAP JS -->       
        <script src="{{slink::to('admin_template/js/bootstrap/bootstrap.min.js')}}"></script>

        <!-- CUSTOM NOTIFICATION -->
        <script src="{{slink::to('admin_template/js/notification/SmartNotification.min.js')}}"></script>

        <!-- JARVIS WIDGETS -->
        <script src="{{slink::to('admin_template/js/smartwidgets/jarvis.widget.min.js')}}"></script>
        
        <!-- EASY PIE CHARTS -->
        <script src="{{slink::to('admin_template/js/plugin/easy-pie-chart/jquery.easy-pie-chart.min.js')}}"></script>
        
        <!-- SPARKLINES -->
        <script src="{{slink::to('admin_template/js/plugin/sparkline/jquery.sparkline.min.js')}}"></script>
        
        <!-- JQUERY VALIDATE -->
        <script src="{{slink::to('admin_template/js/plugin/jquery-validate/jquery.validate.min.js')}}"></script>
        
        <!-- JQUERY MASKED INPUT -->
        <script src="{{slink::to('admin_template/js/plugin/masked-input/jquery.maskedinput.min.js')}}"></script>
        
        <!-- JQUERY SELECT2 INPUT -->
        <script src="{{slink::to('admin_template/js/plugin/select2/select2.min.js')}}"></script>

        <!-- JQUERY UI + Bootstrap Slider -->
        <script src="{{slink::to('admin_template/js/plugin/bootstrap-slider/bootstrap-slider.min.js')}}"></script>
        
        <!-- browser msie issue fix -->
        <script src="{{slink::to('admin_template/js/plugin/msie-fix/jquery.mb.browser.min.js')}}"></script>
        
        <!-- SmartClick: For mobile devices -->
        <script src="{{slink::to('admin_template/js/plugin/smartclick/smartclick.js')}}"></script>
        
        <!--[if IE 7]>
            
            <h1>Your browser is out of date, please update your browser by going to www.microsoft.com/download</h1>
            
        <![endif]-->

        <!-- MAIN APP JS FILE -->
        <script src="{{slink::to('admin_template/js/app.js')}}"></script>

        <script type="text/javascript">
            runAllForms();

            $(function() {
                // Validation
                $("#login-form").validate({
                    // Rules for form validation
                    rules : {
                        user : {
                            required : true
                        },
                        password : {
                            required : true,
                            minlength : 3,
                            maxlength : 20
                        }
                    },

                    // Messages for form validation
                    messages : {
                        user : {
                            required : 'Please enter your username'
                        },
                        password : {
                            required : 'Please enter your password'
                        }
                    },

                    // Do not change code below
                    errorPlacement : function(error, element) {
                        error.insertAfter(element.parent());
                    }
                });
            });
        </script>

    </body>
</html>