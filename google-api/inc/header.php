<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en"><script id="tinyhippos-injected">if (window.top.ripple) { window.top.ripple("bootstrap").inject(window, document); }</script><!--<![endif]-->
<!-- BEGIN HEAD --><head>
        <meta charset="utf-8">
        <title>DBC | Dashboard</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport">
        <meta content="" name="description">
        <meta content="" name="author">
        <!-- BEGIN GLOBAL MANDATORY STYLES -->
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&amp;subset=all" rel="stylesheet" type="text/css">
        <link href="assets/css/jquery.dataTables.css" rel="stylesheet" type="text/css">
        <link href="assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <link href="assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css">
        <link href="assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL STYLES -->
        <link href="assets/global/css/components.min.css" rel="stylesheet" id="style_components" type="text/css">
        <link href="assets/global/css/plugins.min.css" rel="stylesheet" type="text/css">
        <!-- END THEME GLOBAL STYLES -->
        <!-- BEGIN THEME LAYOUT STYLES -->
        <link href="assets/layouts/layout3/css/layout.min.css" rel="stylesheet" type="text/css">
        <link href="assets/layouts/layout3/css/themes/default.min.css" rel="stylesheet" type="text/css" id="style_color">
        <link href="assets/layouts/layout3/css/custom.min.css" rel="stylesheet" type="text/css">
        <link href="style.css" rel="stylesheet" type="text/css">
        <!-- END THEME LAYOUT STYLES -->
        <link rel="shortcut icon" href="favicon.ico"> </head>
    <!-- END HEAD -->

    <body class="page-container-bg-solid page-boxed" cz-shortcut-listen="true">
        <!-- BEGIN HEADER -->
        
<div class="page-header">
            <!-- BEGIN HEADER TOP -->
            <div class="page-header-top">
                <div class="container">
                    <!-- BEGIN LOGO -->
                    <div class="page-logo">
                        <a href="index.php">
                            <img src="assets/layouts/layout3/img/logo-default.jpg" alt="logo" class="logo-default">
                        </a>
                    </div>
                    <!-- END LOGO -->
                    <!-- BEGIN RESPONSIVE MENU TOGGLER -->
                    <a href="javascript:;" class="menu-toggler"></a>
                    <!-- END RESPONSIVE MENU TOGGLER -->
                    <!-- BEGIN TOP NAVIGATION MENU -->
                    <div class="top-menu">
                    </div>

                    <!-- END TOP NAVIGATION MENU -->
                </div>
            </div>
            <!-- END HEADER TOP -->
            <!-- BEGIN HEADER MENU -->
            <div class="page-header-menu" style="display: block;">
                <div class="container">
                    <!-- BEGIN HEADER SEARCH BOX -->
                    
                    <!-- END HEADER SEARCH BOX -->
                    <!-- BEGIN MEGA MENU -->
                    <!-- DOC: Apply "hor-menu-light" class after the "hor-menu" class below to have a horizontal menu with white background -->
                    <!-- DOC: Remove data-hover="dropdown" and data-close-others="true" attributes below to disable the dropdown opening on mouse hover -->
                    <div class="hor-menu  ">
                        <ul class="nav navbar-nav">
                            <li class="menu-dropdown mega-menu-dropdown <?php echo (isset($active) && $active=='my_deliveries')?'active':''; ?>">
                                <a href="index.php"> My Deliveries
                                    <span class="arrow"></span>
                                </a>
                                
                            </li>
                            <li class="menu-dropdown classic-menu-dropdown <?php echo (isset($active) && $active=='store')?'active':''; ?>">
                                <a href="store-locations.php"> Store Locations
                                    <span class="arrow"></span>
                                </a>
                                
                            </li>
                            <li class="menu-dropdown mega-menu-dropdown <?php echo (isset($active) && $active=='suggest')?'active':''; ?>">
                                <a href="suggest-locations.php"> Suggest Locations
                                    <span class="arrow"></span>
                                </a>
                                
                            </li>
                        </ul>
                    </div>
                    <!-- END MEGA MENU -->
                </div>
            </div>
            <!-- END HEADER MENU -->
        </div>
        <style type="text/css" media="screen">
            .row{
                max-width:960px;
            }
        </style>