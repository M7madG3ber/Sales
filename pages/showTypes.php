<?php 

session_start();
if( !isset( $_SESSION["user"]) ){
    header('Location:login.php');
}

include("../database/connection.php");

$q = $db->prepare( "select * from types" );
$q->execute();
$types = $q->fetchAll() ;

$pageActive = "showTypes" ;

include("header.php") ; 

?>

<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2>مجموعات الأصناف</h2>
        </div>
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            مجموعات الأصناف
                        </h2>
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>مجموعة الأصناف</th>
                                        <th>التاريخ</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($types as $type) {
                                        echo '<tr>
                                        <td>'. $type["id"].'</td>
                                        <td>'. $type["type_name"].'</td>
                                        <td>'. $type["type_date"].'</td>
                                        <td>
                                            <a href="updateType.php?id='.$type["id"].'"><button type="button"
                                                    class="btn btn-primary m-t-15 waves-effect">تعديل</button></a>
                                            <a href="delete.php?type=type&id='.$type["id"].'"><button type="button"
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