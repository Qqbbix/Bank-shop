<?php
session_start();
include_once('DBconnect.php');

$sql = "SELECT MAX(cus_id) as last_id from customer";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);
if($row['last_id'] == NULL){
    $lastID = 10000001;
}else{
    $lastID = $row['last_id']+1;
}




//$result = mysqli_query($conn, $sql);
printf("Error: %s\n", mysqli_error($conn));
if(mysqli_num_rows($result) == 1){
 //   $row = mysqli_fetch_array($result);
    //$lastID = $row['last_id']+1;
    $currentDateTime = date('Y-m-d H:i:s');
    $insersql = "INSERT INTO customer (cus_id,cus_name,cus_surname,cus_address,cus_zipcode,cus_email,cus_phone,cus_regis_date)";
    $insersql .= "VALUES ('".$lastID."','".$_POST['fname']."','".$_POST['lname']."','".$_POST['address']."','".$_POST['zipcode']."','".$_POST['mail']."','".$_POST['phone']."','".$currentDateTime."')";
    $result01 = mysqli_query($conn, $insersql);
    $insersql2 = "INSERT INTO login (user_name,password,role,cus_id)";
    $insersql2 .= "VALUES ('".$_POST['username']."','".$_POST['password']."',DEFAULT,'".$lastID."')";
    $result02 = mysqli_query($conn, $insersql2);


    if($result01 && $result02){
        echo "<script type='text/javascript'>alert('ลงทะเบียนเสร็จสิ้น');
        window.location='login.php';
        </script>";
    }else{
        echo "Error Save [".$insersql."]";
        echo "Error Save [".$insersql2."]";
    }
}









//header("location: login.php");
?>