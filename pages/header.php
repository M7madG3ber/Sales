<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Sales Site</title>

    <!-- Favicon-->
    <link rel="icon" href="../images/favicon.ico" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Cairo&display=swap" rel="stylesheet">

    <!-- Bootstrap Core Css -->
    <link href="../plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="../plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="../css/style.css" rel="stylesheet">
    <link href="../css/rtl.css" rel="stylesheet">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="../css/all-themes.css" rel="stylesheet" />

    <!-- My Style -->
    <link href="../css/mystyle.css" rel="stylesheet">

</head>

<body class="theme-red">

    <!-- Page Loader -->
    <div class="page-loader-wrapper">
        <div class="loader">
            <div class="preloader">
                <div class="spinner-layer pl-red">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>
            <p>Please wait...</p>
        </div>
    </div>
    <!-- #END# Page Loader -->

    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>
    <!-- #END# Overlay For Sidebars -->

    <!-- Top Bar -->
    <nav class="navbar">
        <div class="container-fluid">
            <div class="navbar-header">
                <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#navbar-collapse" aria-expanded="false"></a>
                <a href="javascript:void(0);" class="bars"></a>
                <a class="navbar-brand" href="home.php">Gaber.Ware</a>
            </div>
            <div class="collapse navbar-collapse" id="navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li class="pull-right"><a href="logout.php"><i class="material-icons">logout</i></a></li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- #END# Top Bar -->

    <section>

        <!-- Left Sidebar -->
        <aside id="leftsidebar" class="sidebar">
            <!-- Menu -->
            <div class="menu">
                <ul class="list">
                    <li class="<?php if( $pageActive == "home" ){ echo "active" ;} ?>">
                        <a href="home.php">
                            <i class="material-icons">home</i>
                            <span>الصفحة الرئيسية</span>
                        </a>
                    </li>

                    <?php
                    if( $_SESSION["type"] == 1 )
                    {
                    ?>
                    <li class="<?php if( $pageActive == "addUser" || $pageActive == "showUsers" ){ echo "active" ;} ?>">
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">people_alt</i>
                            <span>المستخدمين</span>
                        </a>
                        <ul class="ml-menu">
                            <li class="<?php if( $pageActive == "addUser" ){ echo "active" ;} ?>">
                                <a href="addUser.php">إضافة</a>
                            </li>
                            <li class="<?php if( $pageActive == "showUsers" ){ echo "active" ;} ?>">
                                <a href="showUsers.php">عرض</a>
                            </li>
                        </ul>
                    </li>
                    <?php
                    }
                    ?>
                    <li class="<?php if( $pageActive == "addType" || $pageActive == "showTypes" ){ echo "active" ;} ?>">
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">widgets</i>
                            <span>مجموعات الأصناف</span>
                        </a>
                        <ul class="ml-menu">
                            <li class="<?php if( $pageActive == "addType" ){ echo "active" ;} ?>">
                                <a href="addType.php">إضافة</a>
                            </li>
                            <li class="<?php if( $pageActive == "showTypes" ){ echo "active" ;} ?>">
                                <a href="showTypes.php">عرض</a>
                            </li>
                        </ul>
                    </li>
                    <li class="<?php if( $pageActive == "addItem" || $pageActive == "showItems" ){ echo "active" ;} ?>">
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">widgets</i>
                            <span>الأصناف</span>
                        </a>
                        <ul class="ml-menu">
                            <li class="<?php if( $pageActive == "addItem" ){ echo "active" ;} ?>">
                                <a href="addItem.php">إضافة</a>
                            </li>
                            <li class="<?php if( $pageActive == "showItems" ){ echo "active" ;} ?>">
                                <a href="showItems.php">عرض</a>
                            </li>
                        </ul>
                    </li>
                    <li
                        class="<?php if( $pageActive == "addBillSale" || $pageActive == "showBillSale" ){ echo "active" ;} ?>">
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">list_alt</i>
                            <span>فواتير الشراء</span>
                        </a>
                        <ul class="ml-menu">
                            <li class="<?php if( $pageActive == "addBillSale" ){ echo "active" ;} ?>">
                                <a href="addBillSale.php">إضافة</a>
                            </li>
                            <li class="<?php if( $pageActive == "showBillSale" ){ echo "active" ;} ?>">
                                <a href="showBillSale.php">عرض</a>
                            </li>
                        </ul>
                    </li>
                    <li
                        class="<?php if( $pageActive == "addBillPurchase" || $pageActive == "showBillPurchase" ){ echo "active" ;} ?>">
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">list_alt</i>
                            <span>فواتير البيع</span>
                        </a>
                        <ul class="ml-menu">
                            <li class="<?php if( $pageActive == "addBillPurchase" ){ echo "active" ;} ?>">
                                <a href="addBillPurchase.php">إضافة</a>
                            </li>
                            <li class="<?php if( $pageActive == "showBillPurchase" ){ echo "active" ;} ?>">
                                <a href="showBillPurchase.php">عرض</a>
                            </li>
                        </ul>
                    </li>

                    <?php
                    if( $_SESSION["type"] == 1 )
                    {
                    ?>
                    <li class="<?php if( $pageActive == "reportItemsFinish" ){ echo "active" ;} ?>">
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">insert_invitation</i>
                            <span>التقارير</span>
                        </a>
                        <ul class="ml-menu">
                            <li class="<?php if( $pageActive == "reportItemsFinish" ){ echo "active" ;} ?>">
                                <a href="reportItemsFinish.php">تقرير الأصناف المنتهية</a>
                            </li>
                        </ul>
                    </li>
                    <?php
                    }
                    ?>
                    <li class="<?php if( $pageActive == "setting" ){ echo "active" ;} ?>">
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">settings_applications</i>
                            <span>الإعدادات</span>
                        </a>
                        <ul class="ml-menu">
                            <li class="<?php if( $pageActive == "setting" ){ echo "active" ;} ?>">
                                <a href="setting.php">تعديل</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
            <!-- #Menu -->
            <!-- Footer -->
            <div class="legal">
                <div class="copyright">
                    Developed By <a>&copy; Mohamed Gaber</a>.
                </div>
            </div>
            <!-- #Footer -->
        </aside>
        <!-- #END# Left Sidebar -->

    </section>