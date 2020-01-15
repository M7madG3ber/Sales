<?php 

if( isset($_POST["submit"]) ){

    include("../database/connection.php");
    $date = date( "d/m/Y" ) ;

    $sql = 'insert into types(type_name,type_date) values( "'.$_POST['type_name'].'" , "'. $date .'" )';

    $test = $db->exec( $sql );
    
    if( $test != false )
    {
        header("Location:showTypes.php");
    }
}

session_start();
if( !isset( $_SESSION["user"]) ){
    header('Location:login.php');
}

$pageActive = "addType" ;

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
                            إضافة مجموعة أصناف
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
                                            <input type="text" name="type_name" class="form-control"
                                                placeholder="اسم مجموعة الأصناف" />
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