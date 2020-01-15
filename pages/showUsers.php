<?php

session_start();

if( !isset( $_SESSION["user"]) ){
    header('Location:login.php');
}
if( $_SESSION["type"] != 1 ){
    header('Location:logout.php');
}

include("../database/connection.php");

$q = $db->prepare( "select * from users order by user_date,user_name" );
$q->execute();
$users = $q->fetchAll() ;

// echo "<pre>";
// var_dump( $users ) ;
// echo "</pre>";
// die();

$pageActive = "showUsers" ;

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
                            المستخدمين
                        </h2>
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>الاسم</th>
                                        <th>كلمة المرور</th>
                                        <th>النوع</th>
                                        <th>تاريخ الإضافة</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php

                                        foreach ($users as $user) {
                                            if( $user["user_type"] ==1 ){
                                                $type="مسئول";
                                            }
                                            else{
                                                $type="موظف";
                                            }
                                            echo '<tr>
                                                <td>'.  $user["user_name"] .'</td>
                                                <td>'.  $user["username"] .'</td>
                                                <td>'.  $type .'</td>
                                                <td>'.  $user["user_date"] .'</td>
                                                <td>' ;
                                            if( $user["username"] == $_SESSION["user"] ){
                                                echo '<a href="setting.php"><button type="button"
                                                class="btn btn-primary m-t-15 waves-effect">تعديل</button></a>';
                                            }
                                            else{
                                                echo '<a href="delete.php?type=user&id='.$user["username"].'"><button type="button"
                                                class="btn btn-danger m-t-15 waves-effect">حذف</button></a>';
                                            }
                                            echo '</td>
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