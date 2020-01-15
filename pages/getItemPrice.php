<?php

$item = json_decode( $_POST["myJSON"] ) ;
// echo $item->id ;

include("../database/connection.php");

$sql = "select * from items where id=?" ;
$q = $db->prepare( $sql );
$q->execute( [ $item->id ] );
$itemDB = $q->fetch();

echo json_encode( [ "id"=>$itemDB["id"] , "item_price" => $itemDB["item_price"] ] );

?>