<?php

session_start();
if( !isset( $_SESSION["user"]) ){
    header('Location:login.php');
}

include("../database/connection.php");

$q = $db->prepare( "select * from items" );
$q->execute();
$items = $q->fetchAll() ;

$pageActive = "showItems" ;

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
                            الأصناف
                        </h2>
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>رقم الصنف</th>
                                        <th>اسم الصنف</th>
                                        <th>الكمية</th>
                                        <th>السعر</th>
                                        <th>النوع</th>
                                        <th>التاريخ</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        foreach ($items as $item ) {

                                            $q = $db->prepare( "select type_name from types where id = ?" );
                                            $q->execute( [ $item["item_type"] ] );
                                            $type = $q->fetch() ;

                                            echo'<tr>
                                            <td>'.$item["id"].'</td>
                                            <td>'.$item["item_name"].'</td>
                                            <td>'.$item["item_quantity"].'</td>
                                            <td>'.$item["item_price"].'</td>
                                            <td>'.$type["type_name"].'</td>
                                            <td>'.$item["item_date"].'</td>
                                            <td>
                                                <a href="updateItem.php?id='.$item["id"].'"><button type="button"
                                                        class="btn btn-primary m-t-15 waves-effect">تعديل</button></a>
                                                <a href="delete.php?type=item&id='.$item["id"].'"><button type="button"
                                                        class="btn btn-danger m-t-15 waves-effect">حذف</button></a>
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