<?php

session_start();
if( !isset( $_SESSION["user"]) ){
    header('Location:login.php');
}

include("../database/connection.php");

if( isset($_POST["submit"]) ){

    $date = date( "d/m/Y" ) ;

    $sql = 'update users set password="'.$_POST["password"].'" , user_name="'.$_POST["user_name"].'" , user_type='.$_POST["user_type"].' where username="'. $_SESSION["user"] .'"';
    
    $test = $db->exec( $sql );
    
    if( $test != false )
    {
        header("Location:logout.php");
    }
}

$q = $db->prepare( "select * from users where username = ?" );
$q->execute( [ $_SESSION["user"] ] );
$user = $q->fetch() ;

$pageActive = "setting" ;

include("header.php") ; 

?>

<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2>البيانات الشخصية</h2>
        </div>
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            تعديل البيانات
                            <small></small>
                        </h2>
                    </div>
                    <div class="body">
                        <form action="" method="post">
                            <div class="row clearfix">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>كلمة المرور</label>

                                        <input type="text" value="<?php echo $user["username"] ;?>" class="form-control"
                                            placeholder="كلمة المرور" name="username" />
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>كلمة السر</label>

                                        <input type="password" value="<?php echo $user["password"] ;?>"
                                            class="form-control" placeholder="كلمة السر" name="password" />
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>اسم المستخدم</label>

                                        <input type="text" value="<?php echo $user["user_name"] ;?>"
                                            class="form-control" placeholder="اسم المستخدم" name="user_name" />
                                    </div>
                                </div>
                                <div class=" col-sm-12">
                                    <div class="form-group">
                                        <label>نوع الدخول</label>

                                        <select class="form-control show-tick" name="user_type">
                                            <option <?php if( $user["user_type"] == 1 ) { echo "selected" ; }?>
                                                value="1">
                                                مسئول</option>
                                            <option <?php if( $user["user_type"] == 2 ) { echo "selected" ; }?>
                                                value="2">موظف</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <button type="submit" name="submit"
                                            class="btn btn-danger m-t-15 waves-effect">تعديل</button>
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