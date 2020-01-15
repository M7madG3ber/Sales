<?php 

include("../database/connection.php");
if( isset($_GET["id"]) )
{
    $typeId = $_GET["id"] ;
    $sql = 'select * from types where id=?';
    $q = $db->prepare( $sql );
    $q->execute( [ $typeId ] );
    $type = $q->fetch( );
}
if( isset( $_POST["edit"] ) )
{

    echo "<pre>";
    var_dump( $_POST );
    echo "</pre>";
    // die();
    
    $date = date( "d/m/Y" ) ;
    $sql = 'update types set type_name=? , type_date=? where id=?';
    $q = $db->prepare( $sql );
    $q->execute( [ $_POST["type_name"] , $date , $_POST["type_id"] ] );
    header("Location:showTypes.php");
}

session_start();
if( !isset( $_SESSION["user"]) ){
    header('Location:login.php');
}

$pageActive = "updateType" ;

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
                            تعديل مجموعة أصناف
                            <small></small>
                        </h2>
                    </div>
                    <div class="body">
                        <form action="" method="post">
                            <div class="row clearfix">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>اسم مجموعة الأصناف</label>
                                        <div class="form-line">
                                            <input type="text" name="type_name" class="form-control" value="<?php echo $type["type_name"] ; ?>"
                                                placeholder="اسم مجموعة الأصناف" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <button type="submit" name="edit"
                                            class="btn btn-danger m-t-15 waves-effect">تعديل</button>
                                    </div>
                                </div>
                                <input type="hidden" name="type_id" value="<?php echo $type["id"] ; ?>">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include("footer.php") ; ?>