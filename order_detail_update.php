<?php
session_start(); 
include_once('DBconnect.php');

$currentDateTime = date('Y-m-d H:i:s');
$sql = "UPDATE orders SET order_status = 'จัดส่งแล้ว',ship_date = '".$currentDateTime ."' WHERE order_id ='".$_POST['update_order_id']."'";
$result  =mysqli_query($conn, $sql);

if($result){
    echo "<script type='text/javascript'>alert('อัปเดตแล้ว');
    window.location='manage_order.php';
    </script>";
}else{
    echo "Error Save [".$result."]";
}

?>