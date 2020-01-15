<?php

if( isset($_POST["submit"]) ){

    include("../database/connection.php");
    $date = date( "d/m/Y" ) ;

    $sql = 'insert into users values( "' . $_POST['username']  . '","' . $_POST['password'] .'","'.$_POST['user_name'] .'","'.$_POST['user_type'] .'" , "'.$date.'" )';
    
    $test = $db->exec( $sql );
    
    if( $test != false )
    {
        header("Location:showUsers.php");
    }
}

session_start();
if( !isset( $_SESSION["user"]) ){
    header('Location:login.php');
}
if( $_SESSION["type"] != 1 ){
    header('Location:logout.php');
}

$pageActive = "addUser" ;

include("header.php") ; 

?>

<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2>المستخدمين</h2>
        </div>
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            إضافة مستخدم
                            <small></small>
                        </h2>
                    </div>
                    <div class="body">
                        <form action="" method="post" autocomplete="off">
                            <div class="row clearfix">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>كلمة المرور</label>
                                        <div class="form-line">
                                            <input type="text" name="username" class="form-control"
                                                placeholder="كلمة المرور">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>كلمة السر</label>
                                        <div class="form-line">
                                            <input type="password" name="password" class="form-control"
                                                placeholder="كلمة السر" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>اسم المستخدم</label>
                                        <div class="form-line">
                                            <input type="text" name="user_name" class="form-control"
                                                placeholder="اسم المستخدم" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>نوع الدخول</label>
                                        <div class="form-line">
                                            <select class="form-control show-tick" name="user_type">
                                                <option value="1">مسئول</option>
                                                <option value="2">موظف</option>
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