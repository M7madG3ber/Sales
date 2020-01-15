<?php 

session_start();
if( !isset( $_SESSION["user"]) ){
    header('Location:login.php');
}

include("../database/connection.php");

$q = $db->prepare( "select * from items" );
$q->execute();
$itemsCount = $q->rowCount () ;

$q = $db->prepare( "select * from bills" );
$q->execute();
$billsCount = $q->rowCount () ;

$q = $db->prepare( "select * from users" );
$q->execute();
$usersCount = $q->rowCount () ;

$q = $db->prepare( "select * from types" );
$q->execute();
$typesCount = $q->rowCount () ;

$pageActive = "home" ;

include("header.php") ;

?>
<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2>الصفحة الرئيسية</h2>
        </div>

        <!-- Widgets -->
        <div class="row clearfix">
            <div class="col-sm-6 col-xs-12">
                <div class="info-box bg-pink hover-expand-effect">
                    <div class="icon">
                        <i class="material-icons">widgets</i>
                    </div>
                    <div class="content">
                        <div class="text">مجموعات الأصناف</div>
                        <div class="number"><?php echo $typesCount; ?></div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-xs-12">
                <div class="info-box bg-cyan hover-expand-effect">
                    <div class="icon">
                        <i class="material-icons">person</i>
                    </div>
                    <div class="content">
                        <div class="text">المستخدمين</div>
                        <div class="number"><?php echo $usersCount; ?></div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-xs-12">
                <div class="info-box bg-light-green hover-expand-effect">
                    <div class="icon">
                        <i class="material-icons">forum</i>
                    </div>
                    <div class="content">
                        <div class="text">الفواتير</div>
                        <div class="number"><?php echo $billsCount; ?></div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-xs-12">
                <div class="info-box bg-orange hover-expand-effect">
                    <div class="icon">
                        <i class="material-icons">widgets</i>
                    </div>
                    <div class="content">
                        <div class="text">الأصناف</div>
                        <div class="number"><?php echo $itemsCount; ?></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include("footer.php") ; ?>