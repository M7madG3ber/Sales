<?php

session_start();

include("../database/connection.php");

if( isset($_POST["submit"]) ){

    $date = date( "d/m/Y" ) ;

    $sql = 'insert into items(item_name,item_quantity,item_price,item_date,item_type,item_user) values( "'.$_POST["item_name"].'" , 0 , 0 , "'.$date.'" , '.$_POST["item_type"].' , "'. $_SESSION["user"] .'" )';
    
    $test = $db->exec( $sql );
    
    if( $test != false )
    {
        header("Location:showItems.php");
    }
}

$q = $db->prepare( "select * from types" );
$q->execute();
$types = $q->fetchAll() ;

if( !isset( $_SESSION["user"]) ){
    header('Location:login.php');
}

$pageActive = "addItem" ;

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
                            إضافة صنف
                            <small></small>
                        </h2>
                    </div>
                    <div class="body">
                        <form action="" method="post">
                            <div class="row clearfix">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>اسم الصنف</label>
                                        <div class="form-line">
                                            <input type="text" name="item_name" class="form-control"
                                                placeholder="اسم الصنف" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <label>نوع الصنف</label>
                                            <select class="form-control show-tick" name="item_type">
                                                <?php
                                                foreach ($types as $type) {
                                                    echo '<option value="'.$type["id"].'">'. $type["type_name"].'</option>';
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <button type="submit" name="submit"
                                            class="btn btn-danger m-t-15 waves-effect">إضافة</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include("footer.php") ; ?>