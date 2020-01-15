<?php 

session_start();
if( !isset( $_SESSION["user"]) ){
    header('Location:login.php');
}

include("../database/connection.php");

// insert new bill
$sql = "select * from bills where bill_type=2" ;
$q = $db->prepare( $sql );
$q->execute();
$bills = $q->fetchAll();

$pageActive = "showBillPurchase" ;

include("header.php") ; 

?>

<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2>فواتير البيع</h2>
        </div>
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            فواتير البيع
                        </h2>
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>رقم الفاتورة</th>
                                        <th>المبلغ</th>
                                        <th>التاريخ</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        foreach ($bills as $bill) {
                                            echo '<tr>
                                            <td>'.$bill["id"].'</td>
                                            <td>'.$bill["bill_price"].'</td>
                                            <td>'.$bill["bill_date"].'</td>
                                            <td>
                                                <a href="#"><button type="button"
                                                        class="btn btn-success m-t-15 waves-effect">تفاصيل</button></a>
                                            </td>
                                        </tr>';
                                        }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>

<?php include("footer.php") ; ?>