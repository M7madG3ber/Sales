<?php

session_start();
if( !isset( $_SESSION["user"]) ){
    header('Location:login.php');
}

include("../database/connection.php");

if( isset($_POST["submit"])  ){

    $date = date( "d/m/Y" ) ;

    $price = 0 ;
    for( $i=0 ; $i< count($_POST["price"]) ; $i++ )
    {
        $price += ( intval( $_POST["price"][$i] ) * intval( $_POST["quantity"][$i] ) );
    }

    // insert new bill
    $sql = "insert into bills(bill_price,bill_type,bill_date) values(?,?,?)" ;
    $q = $db->prepare( $sql );
    $q->execute( [ $price , 2 , $date ] );

    // get last bills id
    $sql = "select max(id) as lastId from bills" ;
    $q = $db->prepare( $sql );
    $q->execute( );
    $billId = $q->fetch() ;

    for( $i=0 ; $i< count($_POST["price"]) ; $i++ )
    {
        // insert bill items
        $sql = "insert into items_bills(item_id,bill_id,quantity,price) values(?,?,?,?)";
        $q = $db->prepare( $sql ) ;
        $q->execute( [ $_POST["item"][$i] , $billId["lastId"] , $_POST["quantity"][$i] , $_POST["price"][$i] ] );

        // update price and quantity for item
        $sql = "select * from items where id=" . $_POST["item"][$i] ;
        $q = $db->prepare( $sql );
        $q->execute( );
        $item = $q->fetch() ;
        $newQuantity = intval( $item["item_quantity"] ) - intval($_POST["quantity"][$i]) ;
        $sql = "update items set item_quantity=? where id=" . $_POST["item"][$i] ;
        $q = $db->prepare( $sql );
        $q->execute([$newQuantity] );
    }

    header("Location:showBillPurchase.php");
    
}

$q = $db->prepare( "select * from items" );
$q->execute();
$items = $q->fetchAll() ;

$options = "" ;

foreach ($items as $item) {
    $options .= '<option value="'.$item["id"].'">'.$item["item_name"].'</option>' ;
}

$pageActive = "addBillPurchase" ;

include("header.php") ; 

?>

<section class="content">
    <div class="container-fluid">
        <div id="alertQuantity">
            <h3>يوجد من هذا المنتج <span id="alertQuantityCount"></span> قطعة فقط</h3>
        </div>
        <div id="alertPrice">
            <h3>سعر هذا المنتج <span id="alertPriceCount"></span> ج</h3>
        </div>
        <div class="block-header">
            <h2>فواتير البيع</h2>
        </div>
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            إضافة فاتورة بيع
                            <small></small>
                        </h2>
                    </div>
                    <div class="body">
                        <i id="addBillPurchaseIcon" class="material-icons btn btn-danger">add</i>
                        <div class="table-responsive">
                            <form action="" method="post">
                                <table class="table table-bordered table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>الصنف</th>
                                            <th>الكمية</th>
                                            <th>السعر</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody id="addBillPurchase">
                                        <tr>
                                            <td>
                                                <div class="form-group" style="margin:0">
                                                    <select id="addBillPurchaseItem1" name="item[]">
                                                        <?php echo $options ; ?>
                                                    </select>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group" style="margin:0">
                                                    <input id="addBillPurchaseQuantity1" name="quantity[]" type="text"
                                                        class="form-control addBillPurchaseQuantity"
                                                        placeholder="الكمية" />
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group" style="margin:0">
                                                    <input id="addBillPurchasePrice1" name="price[]" type="text"
                                                        class="form-control addBillPurchasePrice" placeholder="السعر" />
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>

                                </table>
                                <input type="hidden" name="" id="addBillPurchaseCount" value="1">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <button type="submit" name="submit"
                                            class="btn btn-danger m-t-15 waves-effect">إضافة</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php 

include("footer.php") ; 

echo <<< __html
<script>
$(function() {
    $("#addBillPurchaseIcon").on("click", function() {
        var count = parseInt($("#addBillPurchaseCount").val()) + 1;
        $("#addBillPurchase").append('<tr><td><div class="form-group" style="margin:0"><select id="addBillPurchaseItem' +count + '" name="item[]">$options</select></div></td><td><div class="form-group" style="margin:0"><input id="addBillPurchaseQuantity' +count +'" name="quantity[]" type="number" class="form-control addBillPurchaseQuantity" placeholder="الكمية" /></div></td><td><div class="form-group" style="margin:0"><input id="addBillPurchasePrice' +count +'" name="price[]" type="number" class="form-control addBillPurchasePrice" placeholder="السعر" /></div></td></tr>');
        $("#addBillPurchaseCount").val(count);
        loadAjaxQuantity();
        loadAjaxPrice();
    });
    loadAjaxQuantity();
    loadAjaxPrice();
    
});
</script>
__html;

?>