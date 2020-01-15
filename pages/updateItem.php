<?php
include("../database/connection.php");

if( isset($_GET["id"]) )
{
    $itemId = $_GET["id"] ;
    $sql = 'select * from items where id=?';
    $q = $db->prepare( $sql );
    $q->execute( [ $itemId ] );
    $item = $q->fetch( );
}

session_start();

if( isset($_POST["edit"]) ){

    $date = date( "d/m/Y" ) ;
    $sql = 'update items set item_name=? , item_type=? , item_date=? where id=?';
    $q = $db->prepare( $sql );
    $q->execute( [  $_POST["item_name"] ,  $_POST["item_type"] , $date , $_POST["item_id"] ] );
    header("Location:showItems.php");
}

$q = $db->prepare( "select * from types" );
$q->execute();
$types = $q->fetchAll() ;

if( !isset( $_SESSION["user"]) ){
    header('Location:login.php');
}

$pageActive = "updateItem" ;

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
                            تعديل صنف
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
                                            <input type="text" value="<?php echo $item["item_name"] ; ?>" name="item_name" class="form-control"
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
                                                    echo '<option value="'.$type["id"].'" ';
                                                    
                                                    if( $item["item_type"] == $type["id"] )
                                                    {
                                                        echo " selected " ;
                                                    }

                                                    echo ' >'. $type["type_name"].'</option>';
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <button type="submit" name="edit"
                                            class="btn btn-danger m-t-15 waves-effect">تعديل</button>
                                    </div>
                                </div>
                                <input type="hidden" name="item_id" value="<?php echo $item["id"]; ?>">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include("footer.php") ; ?>