<?php
session_start();
include_once('DBconnect.php');


$sql = "SELECT MAX(order_id) as last_id from orders";
$result = mysqli_query($conn, $sql); 
$row = mysqli_fetch_array($result); 
if($row['last_id'] == NULL){
    $last = 500000001;
    $_SESSION['order_id'] = $last;
}else{
    $d = $row['last_id'];
    $last = $d + 1;
    $_SESSION['order_id'] = $last;
}
$currentDateTime = date('y-m-d H:i:s');
$sql = "INSERT INTO orders (order_id,order_date,ship_date,price_total,order_status,customer_cus_id,qty_total)";
$sql .="VALUES ('".$last."','".$currentDateTime."','-','".$_SESSION['total_price']."','ยังไม่ได้จัดส่ง','".$_SESSION['cus_id']."','".$_SESSION['qty_total']."')";
$result = mysqli_query($conn, $sql);
foreach($_SESSION['shopping_cart'] as $key => $orderlist):
    $sql = "INSERT INTO order_detail(order_id,p_id,qty,discount)";
    $sql .= "VALUES('".$_SESSION['order_id']."','".$orderlist['id']."','".$orderlist['quantity']."','')";
    $result = mysqli_query($conn, $sql);
endforeach;
unset($_SESSION['shopping_cart']);
unset($_SESSION['cart_count']);
if($result){
    echo "<script type='text/javascript'>alert('ท่านได้ทำการสั่งสินค้าแล้ว');
    window.location='market_index.php';
    </script>";
}else{
    echo "Error Save [".$result."]";
}
?>