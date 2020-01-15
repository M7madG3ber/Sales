<?php

session_start();
if( !isset( $_SESSION["user"]) ){
    header('Location:login.php');
}
if( $_SESSION["type"] != 1 ){
    header('Location:logout.php');
}

include("../database/connection.php");

$q = $db->prepare( "select * from items where item_quantity=0" );
$q->execute();
$items = $q->fetchAll() ;

$pageActive = "reportItemsFinish" ;

include("header.php") ; 

?>

<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2>الأصناف</h2>
        </div>
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            الأصناف المنتهية
                        </h2>
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>رقم الصنف</th>
                                        <th>اسم الصنف</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        foreach ($items as $item ) {
                                            echo'<tr>
                                                <td>'.$item["id"].'</td>
                                                <td>'.$item["item_name"].'</td>
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