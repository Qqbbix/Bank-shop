<?php
    $servername = 'localhost';
    $username ='php61_g28';
    $password= '265734';
    $db_name ='php61_g28';



    //<!---- ไม่ต้องยุ่ง ---->
    $conn = new mysqli($servername, $username, $password,$db_name);
    mysqli_query($conn,"SET NAMES UTF8");
   // <!-- check connection-->
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 


?>