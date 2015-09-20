<?php 
    session_start();
    if(!isset($_SESSION["user"])) {
        header("Location:login.html");
    }

    error_reporting(E_ALL);
    ini_set('display_errors', 1);
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
                    <li>
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
                    <li class="active"><a class="" href="changeInfo.php"><i class="fa fa-desktop fa-fw"></i> <span class="menu-text">信息修改</span></a></li>
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
                                        <li>信息修改</li>
                                    </ul>
                                    <!-- /BREADCRUMBS -->
                                </div>
                            </div>
                        </div>
                        <!-- /PAGE HEADER -->
                        <!-- DATA TABLES -->
                        <div class="row">
                            <div class="col-md-12">
                                <!-- BOX -->
                                <div class="box border blue">
                                    <div class="box-title">
                                        <h4><i class="fa fa-table"></i>居民身份信息</h4>
                                        <div class="tools hidden-xs">
                                            <a href="#box-config" data-toggle="modal" class="config">
                                                <i class="fa fa-cog"></i>
                                            </a>
                                            <a href="javascript:;" class="reload">
                                                <i class="fa fa-refresh"></i>
                                            </a>
                                            <a href="javascript:;" class="collapse">
                                                <i class="fa fa-chevron-up"></i>
                                            </a>
                                            <a href="javascript:;" class="remove">
                                                <i class="fa fa-times"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="box-body">
                                        <table id="datatable1" cellpadding="0" cellspacing="0" border="0" class="datatable table table-striped table-bordered table-hover">
                                            <thead>
                                                <tr>
                                                    <th>身份证号</th>
                                                    <th>姓名</th>
                                                    <th class="hidden-xs">性别</th>
                                                    <th>家庭住址</th>
                                                    <th class="hidden-xs">籍贯</th>
                                                    <th>操作</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                                $n = $_SESSION['email'];
                                                $pdo = new PDO('mysql:host=127.0.0.1;dbname=household','root', '123456');
                                                $stmt = $pdo->query("select identityId,name,sex,address,hometown,relationId from users natural join resident natural join family where email='$n'");
                                                $row = $stmt->fetch(PDO::FETCH_ASSOC);
                                                while ($row) {
                                                    echo '<tr class="gradeX">';
                                                    echo '<td>'.$row['identityId'].'</td>';
                                                    echo '<td>'.$row['name'].'</td>';
                                                    echo '<td class="hidden-xs">';
                                                    if($row['sex']==0) {
                                                        echo '女';
                                                    }
                                                    else {
                                                        echo '男';
                                                    }
                                                    echo'</td>';
                                                    echo '<td class="center">'.$row['address'].'</td>';
                                                    echo '<td class="center">'.$row['hometown'].'</td>';
                                                    echo '<td class="center"><a href="change.php?cid='.$row['identityId'].'">'.'修改</a></td>';
                                                    echo '</tr>';
                                                    $row = $stmt->fetch(PDO::FETCH_ASSOC);
                                                }
                                            ?>
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th>身份证号</th>
                                                    <th>姓名</th>
                                                    <th class="hidden-xs">性别</th>
                                                    <th>家庭住址</th>
                                                    <th class="hidden-xs">籍贯</th>
                                                    <th>户主</th>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                                <!-- /BOX -->
                            </div>
                        </div>
                        <!-- /DATA TABLES -->
                        <div class="separator"></div>
                        
                        
                        <div class="footer-tools">
                            <span class="go-top">
                                <i class="fa fa-chevron-up"></i> Top
                            </span>
                        </div>
                    </div>
                    <!-- /CONTENT-->
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
    <script type="text/javascript" src="js/jQuery-slimScroll-1.3.0/slimScrollHorizontal.min.js"></script>
    <!-- BLOCK UI -->
    <script type="text/javascript" src="js/jQuery-BlockUI/jquery.blockUI.min.js"></script>
    <!-- DATA TABLES -->
    <script type="text/javascript" src="js/datatables/media/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="js/datatables/media/assets/js/datatables.min.js"></script>
    <script type="text/javascript" src="js/datatables/extras/TableTools/media/js/TableTools.min.js"></script>
    <script type="text/javascript" src="js/datatables/extras/TableTools/media/js/ZeroClipboard.min.js"></script>
    <!-- COOKIE -->
    <script type="text/javascript" src="js/jQuery-Cookie/jquery.cookie.min.js"></script>
    <!-- CUSTOM SCRIPT -->
    <script src="js/script.js"></script>
    <script>
    jQuery(document).ready(function() {
        App.setPage("dynamic_table"); //Set current page
        App.init(); //Initialise plugins and elements
    });
    </script>
    <!-- /JAVASCRIPTS -->
</body>

</html>