<?php
    session_start();
    if(!isset($_SESSION["user"])) {
        header("Location:login.html");
    }
    $pdo = new PDO('mysql:host=127.0.0.1;dbname=household', 'root', '123456');
    $stmt = $pdo->query('SELECT * FROM users;');
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <title>户籍管理系统</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1, user-scalable=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- STYLESHEETS -->
    <!--[if lt IE 9]><script src="js/flot/excanvas.min.js"></script><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script><![endif]-->
    <link rel="stylesheet" type="text/css" href="css/cloud-admin.css">
    <link rel="stylesheet" type="text/css" href="css/themes/default.css" id="skin-switcher">
    <link rel="stylesheet" type="text/css" href="css/responsive.css">
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- JQUERY UI-->
    <link rel="stylesheet" type="text/css" href="js/jquery-ui-1.10.3.custom/css/custom-theme/jquery-ui-1.10.3.custom.min.css" />
    <!-- DATE RANGE PICKER -->
    <link rel="stylesheet" type="text/css" href="js/bootstrap-daterangepicker/daterangepicker-bs3.css" />
    <!-- DATA TABLES -->
    <link rel="stylesheet" type="text/css" href="js/datatables/media/css/jquery.dataTables.min.css" />
    <link rel="stylesheet" type="text/css" href="js/datatables/media/assets/css/datatables.min.css" />
    <link rel="stylesheet" type="text/css" href="js/datatables/extras/TableTools/media/css/TableTools.min.css" />
    <!-- UNIFORM -->
    <link rel="stylesheet" type="text/css" href="js/uniform/css/uniform.default.css" />
    <!-- FONTS -->
    <link href='http://fonts.useso.com/css?family=Open+Sans:300,400,600,700' rel='stylesheet' type='text/css'>
</head>

<body>
    <!-- HEADER -->
    <header class="navbar clearfix" id="header">
    <div class="container">
        <div class="navbar-brand">
            <!-- COMPANY LOGO -->
            <a href="index.php">
                <img src="img/logo/logo.png" alt="Cloud Admin Logo" class="img-responsive" height="30" width="120">
            </a>
            <!-- /COMPANY LOGO -->
            <!-- TEAM STATUS FOR MOBILE -->
            <div class="visible-xs">
                <a href="#" class="team-status-toggle switcher btn dropdown-toggle">
                    <i class="fa fa-users"></i>
                </a>
            </div>
            <!-- /TEAM STATUS FOR MOBILE -->
            <!-- SIDEBAR COLLAPSE -->
            <div id="sidebar-collapse" class="sidebar-collapse btn">
                <i class="fa fa-bars"
                   data-icon1="fa fa-bars"
                   data-icon2="fa fa-bars" ></i>
            </div>
            <!-- /SIDEBAR COLLAPSE -->
        </div>
        <!-- NAVBAR LEFT -->
        
        <!-- /NAVBAR LEFT -->
        <!-- BEGIN TOP NAVIGATION MENU -->
        <ul class="nav navbar-nav pull-right">
            <!-- BEGIN USER LOGIN DROPDOWN -->
            <li class="dropdown user" id="header-user">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <img alt="" src="img/avatars/avatar3.jpg" />
                    <span class="username"><?php echo $_SESSION["user"];?></span>
                    <i class="fa fa-angle-down"></i>
                </a>
                <ul class="dropdown-menu">
                    <li><a href="index.php"><i class="fa fa-user"></i> My Profile</a></li>
                    <li><a href="logout.php"><i class="fa fa-power-off"></i> Log Out</a></li>
                </ul>
            </li>
            <!-- END USER LOGIN DROPDOWN -->
        </ul>
        <!-- END TOP NAVIGATION MENU -->
    </div>
</header>
    <!--/HEADER -->
    <!-- PAGE -->
    <section id="page">
        <!-- SIDEBAR -->
        <div id="sidebar" class="sidebar">
            <div class="sidebar-menu nav-collapse">
                <div class="divide-20"></div>
                <!-- SEARCH BAR -->
                <div id="search-bar">
                    <input class="search" type="text" placeholder="Search"><i class="fa fa-search search-icon"></i>
                </div>
                <!-- /SEARCH BAR -->
                <!-- SIDEBAR QUICK-LAUNCH -->
                <!-- <div id="quicklaunch">
                        <!-- /SIDEBAR QUICK-LAUNCH -->
                <!-- SIDEBAR MENU -->
                <ul>
                    <li class="active">
                        <a href="index.php">
                            <i class="fa fa-tachometer fa-fw"></i> <span class="menu-text">主页</span>
                            <span class="selected"></span>
                        </a>
                    </li>
                    <li class="has-sub">
                        <a href="javascript:;" class="">
                            <i class="fa fa-bookmark-o fa-fw"></i> <span class="menu-text">户籍操作</span>
                            <span class="arrow"></span>
                        </a>
                        <ul class="sub">
                            <li><a class="" href="search.php"><span class="sub-menu-text">户籍查看</span></a></li>
                            <li><a class="" href="in.php"><span class="sub-menu-text">户籍迁入</span></a></li>
                            <li><a class="" href="out.php"><span class="sub-menu-text">户籍迁出</span></a></li>
                            <li><a class="" href="die.php"><span class="sub-menu-text">户籍注销</span></a></li>
                        </ul>
                    </li>
                    <li><a class="" href="changeInfo.php"><i class="fa fa-desktop fa-fw"></i> <span class="menu-text">信息修改</span></a></li>
                    <li><a class="" href="makeIdcard.php"><i class="fa fa-envelope-o fa-fw"></i> <span class="menu-text">办理身份证</span></a></li>
                    <li><a class="" href="createperson.php"><i class="fa fa-th-large fa-fw"></i> <span class="menu-text">建立新户口</span></a></li>
                </ul>
                <!-- /SIDEBAR MENU -->
            </div>
        </div>
                <!-- /SIDEBAR -->
        <div id="main-content">
            <!-- SAMPLE BOX CONFIGURATION MODAL FORM-->
            <div class="modal fade" id="box-config" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                      <h4 class="modal-title">Box Settings</h4>
                    </div>
                    <div class="modal-body">
                      Here goes box setting content.
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                      <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                  </div>
                </div>
              </div>
            <!-- /SAMPLE BOX CONFIGURATION MODAL FORM-->
            <div class="container">
                <div class="row">
                    <div id="content" class="col-lg-12">
                        <!-- PAGE HEADER-->
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="page-header">
                                    <!-- STYLER -->
                                    
                                    <!-- /STYLER -->
                                    <!-- BREADCRUMBS -->
                                    <ul class="breadcrumb">
                                        <li>
                                            <i class="fa fa-home"></i>
                                            <a href="index.html">Home</a>
                                        </li>
                                        <li>用户</li>
                                    </ul>
                                    <!-- /BREADCRUMBS -->
                                    <div class="clearfix">
                                        <h3 class="content-title pull-left">个人主页</h3>
                                    </div>
                                    <div class="description"><?php echo $_SESSION['user'];?></div>
                                </div>
                            </div>
                        </div>
                        <!-- /PAGE HEADER -->
                        <!-- USER PROFILE -->
                        <div class="row">
                            <div class="col-md-12">
                                <!-- BOX -->
                                <div class="box border">
                                    <div class="box-title">
                                        <h4><i class="fa fa-user"></i><span class="hidden-inline-mobile">欢迎回来，<?php echo $_SESSION['user'];?></span></h4>
                                    </div>
                                    <div class="box-body">
                                        <div class="tabbable header-tabs user-profile">
                                            <ul class="nav nav-tabs">
                                               <li class="active"><a href="#pro_overview" data-toggle="tab"><i class="fa fa-dot-circle-o"></i> <span class="hidden-inline-mobile">Overview</span></a></li>
                                            </ul>
                                            <div class="tab-content">
                                               <!-- OVERVIEW -->
                                               <div class="tab-pane fade in active" id="pro_overview">
                                                  <div class="row">
                                                    <!-- PROFILE PIC -->
                                                    <div class="col-md-3 col-md-offset-5">
                                                        <div class="list-group">
                                                          <li class="list-group-item zero-padding">
                                                            <img alt="" class="img-responsive" src="img/profile/avatar.jpg">
                                                          </li>
                                                          <div class="list-group-item profile-details">
                                                                <h2><?php echo $SESSION['user']?></h2>
                                                                <p><i class="fa fa-circle text-green"></i> Online</p>
                                                                <p>Email: <?php echo $row['email']?></p>
                                                                <p>今天是：<?php echo date("Y/m/d");?></p>
                                                         </div>
                                                          
                                                        </div>                                                      
                                                    </div>
                                                    <!-- /PROFILE PIC -->
                                                    <!-- PROFILE DETAILS -->
                                                    <div class="col-md-9">
                                                        <!-- ROW 1 -->
                                                        <!-- /ROW 1 -->
                                                        <div class="divide-40"></div>
                                                        <!-- ROW 2 -->
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                
                                                            </div>
                                                        </div>
                                                        <!-- /ROW 2 -->
                                                    </div>
                                                    <!-- /PROFILE DETAILS -->
                                                  </div>
                                               </div>
                                               <!-- /OVERVIEW -->
                                            </div>
                                        </div>
                                        <!-- /USER PROFILE -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="footer-tools">
                            <span class="go-top">
                                <i class="fa fa-chevron-up"></i> Top
                            </span>
                        </div>
                    </div><!-- /CONTENT-->
                </div>
            </div>
        </div>
    </section>
    <!--/PAGE -->
    <!-- JAVASCRIPTS -->
    <!-- Placed at the end of the document so the pages load faster -->
    <!-- JQUERY -->
    <script src="js/jquery/jquery-2.0.3.min.js"></script>
    <!-- JQUERY UI-->
    <script src="js/jquery-ui-1.10.3.custom/js/jquery-ui-1.10.3.custom.min.js"></script>
    <!-- BOOTSTRAP -->
    <script src="bootstrap-dist/js/bootstrap.min.js"></script>
    
        
    <!-- DATE RANGE PICKER -->
    <script src="js/bootstrap-daterangepicker/moment.min.js"></script>
    
    <script src="js/bootstrap-daterangepicker/daterangepicker.min.js"></script>
    <!-- SLIMSCROLL -->
    <script type="text/javascript" src="js/jQuery-slimScroll-1.3.0/jquery.slimscroll.min.js"></script>
    <!-- SLIMSCROLL -->
    <script type="text/javascript" src="js/jQuery-slimScroll-1.3.0/jquery.slimscroll.min.js"></script><script type="text/javascript" src="js/jQuery-slimScroll-1.3.0/slimScrollHorizontal.min.js"></script>
    <!-- BLOCK UI -->
    <script type="text/javascript" src="js/jQuery-BlockUI/jquery.blockUI.min.js"></script>
    <!-- EASY PIE CHART -->
    <script src="js/jquery-easing/jquery.easing.min.js"></script>
    <script type="text/javascript" src="js/easypiechart/jquery.easypiechart.min.js"></script>
    <!-- SPARKLINES -->
    <script type="text/javascript" src="js/sparklines/jquery.sparkline.min.js"></script>
    <!-- UNIFORM -->
    <script type="text/javascript" src="js/uniform/jquery.uniform.min.js"></script>
    <!-- COOKIE -->
    <script type="text/javascript" src="js/jQuery-Cookie/jquery.cookie.min.js"></script>
    <!-- CUSTOM SCRIPT -->
    <script src="js/script.js"></script>
    <script>
        jQuery(document).ready(function() {     
            App.setPage("user_profile");  //Set current page
            App.init(); //Initialise plugins and elements
        });
    </script>
    <!-- /JAVASCRIPTS -->
</body>
</html>