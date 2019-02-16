<!DOCTYPE html>

<html lang="en">

    <head>
        <meta charset="utf-8" />
        <title>Point Of Sale</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta content="Preview page of Metronic Admin Theme #2 for statistics, charts, recent events and reports" name="description" />
        <meta content="" name="author" />
        <!-- BEGIN GLOBAL MANDATORY STYLES -->
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
        <link href="{{asset("admin/plugins/font-awesome.min.css")}}" rel="stylesheet" type="text/css" />
        <link href="{{asset("admin/plugins/simple-line-icons.min.css")}}" rel="stylesheet" type="text/css" />
        <link href="{{asset("admin/plugins/bootstrap.min.css")}}" rel="stylesheet" type="text/css" />
        <link href="{{asset("admin/plugins/bootstrap-switch.min.css")}}" rel="stylesheet" type="text/css" />
        <!-- END GLOBAL MANDATORY STYLES -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <link href="{{asset("admin/plugins/daterangepicker.min.css")}}" rel="stylesheet" type="text/css" />
        <link href="{{asset("admin/plugins/morris.css")}}" rel="stylesheet" type="text/css" />
        <link href="{{asset("admin/plugins/fullcalendar.min.css")}}" rel="stylesheet" type="text/css" />
        <link href="{{asset("admin/plugins/jqvmap.css")}}" rel="stylesheet" type="text/css" />
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL STYLES -->
        <link href="{{asset("admin/css/components.min.css")}}" rel="stylesheet" id="style_components" type="text/css" />
        <link href="{{asset("admin/css/plugins.min.css")}}" rel="stylesheet" type="text/css" />
        <!-- END THEME GLOBAL STYLES -->
        <!-- BEGIN THEME LAYOUT STYLES -->
        <link href="{{asset("admin/css/layout.min.css")}}" rel="stylesheet" type="text/css" />
        <link href="{{asset("admin/css/blue.min.css")}}" rel="stylesheet" type="text/css" id="style_color" />
        <link href="{{asset("admin/css/custom.min.css")}}" rel="stylesheet" type="text/css" />
        <!-- END THEME LAYOUT STYLES -->
        <link rel="shortcut icon" href="favicon.ico" /> </head>
    <!-- END HEAD -->

    <body class="page-header-fixed page-sidebar-closed-hide-logo page-container-bg-solid">
        <!-- BEGIN HEADER -->
        <div class="page-header navbar navbar-fixed-top">
            <!-- BEGIN HEADER INNER -->
            <div class="page-header-inner ">
                {{-- <!-- BEGIN LOGO -->
                <div class="page-logo">
                    <a href="index.html">
                        <img src="../assets/layouts/layout2/img/logo-default.png" alt="logo" class="logo-default" /> </a>
                    <div class="menu-toggler sidebar-toggler">
                        <!-- DOC: Remove the above "hide" to enable the sidebar toggler button on header -->
                    </div>
                </div>
                <!-- END LOGO --> --}}

                <!-- BEGIN PAGE TOP -->
                <div class="page-top">
                    <!-- BEGIN HEADER SEARCH BOX -->
                    <!-- DOC: Apply "search-form-expanded" right after the "search-form" class to have half expanded search box -->
                    <form class="search-form search-form-expanded" action="page_general_search_3.html" method="GET">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search..." name="query">
                            <span class="input-group-btn">
                                <a href="javascript:;" class="btn submit">
                                    <i class="icon-magnifier"></i>
                                </a>
                            </span>
                        </div>
                    </form>
                    <!-- END HEADER SEARCH BOX -->

                </div>
            </div>
        </div>

        <div class="page-container">
            <!-- BEGIN SIDEBAR -->
            <div class="page-sidebar-wrapper">

                <div class="page-sidebar navbar-collapse collapse">

                    <ul class="page-sidebar-menu  page-header-fixed page-sidebar-menu-hover-submenu " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
                        <li class="nav-item start active open">
                            <a href="javascript:;" class="nav-link nav-toggle">
                                <i class="icon-home"></i>
                                <span class="title">Users</span>
                                <span class="selected"></span>
                                <span class="arrow open"></span>
                            </a>
                            <ul class="sub-menu">
                                <li class="nav-item start ">
                                    <a href="index.html" class="nav-link ">
                                        <i class="icon-bar-chart"></i>
                                        <span class="title">All users</span>
                                    </a>
                                </li>
                                <li class="nav-item start active open">
                                    <a href="dashboard_2.html" class="nav-link ">
                                        <i class="icon-bulb"></i>
                                        <span class="title">Dashboard 2</span>
                                        <span class="selected"></span>
                                        <span class="badge badge-success">1</span>
                                    </a>
                                </li>
                                <li class="nav-item start ">
                                    <a href="dashboard_3.html" class="nav-link ">
                                        <i class="icon-graph"></i>
                                        <span class="title">Dashboard 3</span>
                                        <span class="badge badge-danger">5</span>
                                    </a>
                                </li>
                            </ul>
                        </li>

                    </ul>
                    <!-- END SIDEBAR MENU -->
                </div>
                <!-- END SIDEBAR -->
            </div>
            <!-- END SIDEBAR -->
            <!-- BEGIN CONTENT -->
            <div class="page-content-wrapper">
                <!-- BEGIN CONTENT BODY -->
                <div class="page-content">


                </div>
                <!-- END CONTENT BODY -->
            </div>
        </div>
        <!-- END CONTAINER -->
        <!-- BEGIN FOOTER -->
        <div class="page-footer">
            {{-- <div class="page-footer-inner"> 2019 &copy; Point Of Sale
                <div class="scroll-to-top">
                    <i class="icon-arrow-up"></i>
                </div>
            </div> --}}
        </div>
            <!-- BEGIN CORE PLUGINS -->
            <script src="{{asset("admin/scripts/jquery.min.js")}}" type="text/javascript"></script>
            <script src="{{asset("admin/scripts/bootstrap.min.js")}}" type="text/javascript"></script>
            {{-- <script src="{{asset("admin/scripts/js.cookie.min.js")}}" type="text/javascript"></script> --}}
            <script src="{{asset("admin/scripts/jquery.slimscroll.min.js")}}" type="text/javascript"></script>
            <script src="{{asset("admin/scripts/jquery.blockui.min.js")}}" type="text/javascript"></script>
            <script src="{{asset("admin/scripts/bootstrap-switch.min.js")}}" type="text/javascript"></script>
            <!-- END CORE PLUGINS -->
            <!-- BEGIN PAGE LEVEL PLUGINS -->
            <script src="{{asset("admin/scripts/moment.min.js")}}" type="text/javascript"></script>
            <script src="{{asset("admin/scripts/daterangepicker.min.js")}}" type="text/javascript"></script>
            <script src="{{asset("admin/scripts/morris.min.js")}}" type="text/javascript"></script>
            {{-- <script src="{{asset("admin/scripts/raphael-min.js")}}" type="text/javascript"></script> --}}
            <script src="{{asset("admin/scripts/jquery.waypoints.min.js")}}" type="text/javascript"></script>
            <script src="{{asset("admin/scripts/jquery.counterup.min.js")}}" type="text/javascript"></script>
            <script src="{{asset("admin/scripts/amcharts.js")}}" type="text/javascript"></script>
            <script src="{{asset("admin/scripts/serial.js")}}" type="text/javascript"></script>
            <script src="{{asset("admin/scripts/pie.js")}}" type="text/javascript"></script>
            <script src="{{asset("admin/scripts/radar.js")}}" type="text/javascript"></script>
            <script src="{{asset("admin/scripts/light.js")}}" type="text/javascript"></script>
            <script src="{{asset("admin/scripts/patterns.js")}}" type="text/javascript"></script>
            <script src="{{asset("admin/scripts/chalk.js")}}" type="text/javascript"></script>
            <script src="{{asset("admin/scripts/ammap.js")}}" type="text/javascript"></script>
            <script src="{{asset("admin/scripts/worldLow.js")}}" type="text/javascript"></script>
            <script src="{{asset("admin/scripts/amstock.js")}}" type="text/javascript"></script>
            <script src="{{asset("admin/scripts/fullcalendar.min.js")}}" type="text/javascript"></script>
            {{-- <script src="{{asset("admin/global/plugins/horizontal-timeline/horizontal-timeline.js")}}" type="text/javascript"></script>
            <script src="{{asset("admin/global/plugins/flot/jquery.flot.min.js")}}" type="text/javascript"></script>
            <script src="{{asset("admin/global/plugins/flot/jquery.flot.resize.min.js")}}" type="text/javascript"></script>
            <script src="{{asset("admin/global/plugins/flot/jquery.flot.categories.min.js")}}" type="text/javascript"></script>
            <script src="{{asset("admin/global/plugins/jquery-easypiechart/jquery.easypiechart.min.js")}}" type="text/javascript"></script>
            <script src="{{asset("admin/global/plugins/jquery.sparkline.min.js")}}" type="text/javascript"></script>
            <script src="{{asset("admin/global/plugins/jqvmap/jqvmap/jquery.vmap.js")}}" type="text/javascript"></script>
            <script src="{{asset("admin/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.russia.js")}}" type="text/javascript"></script>
            <script src="{{asset("admin/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.world.js")}}" type="text/javascript"></script>
            <script src="{{asset("admin/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.europe.js")}}" type="text/javascript"></script>
            <script src="{{asset("admin/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.germany.js")}}" type="text/javascript"></script>
            <script src="{{asset("admin/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.usa.js")}}" type="text/javascript"></script>
            <script src="{{asset("admin/global/plugins/jqvmap/jqvmap/data/jquery.vmap.sampledata.js")}}" type="text/javascript"></script> --}}
            <!-- END PAGE LEVEL PLUGINS -->
            <!-- BEGIN THEME GLOBAL SCRIPTS -->
            <script src="{{asset("admin/scripts/app.min.js")}}" type="text/javascript"></script>
            <!-- END THEME GLOBAL SCRIPTS -->
            <!-- BEGIN PAGE LEVEL SCRIPTS -->
            <script src="{{asset("admin/scripts/dashboard.min.js")}}" type="text/javascript"></script>
            <!-- END PAGE LEVEL SCRIPTS -->
            <!-- BEGIN THEME LAYOUT SCRIPTS -->
            <script src="{{asset("admin/scripts/layout.min.js")}}" type="text/javascript"></script>
            <script src="{{asset("admin/scripts/demo.min.js")}}" type="text/javascript"></script>
            <script src="{{asset("admin/scripts/quick-sidebar.min.js")}}" type="text/javascript"></script>
            <script src="{{asset("admin/scripts/quick-nav.min.js")}}" type="text/javascript"></script>
            <!-- END THEME LAYOUT SCRIPTS -->
            <script>
                $(document).ready(function()
                {
                    $('#clickmewow').click(function()
                    {
                        $('#radio1003').attr('checked', 'checked');
                    });
                })
            </script>
    </body>

</html>
