<?php
    if(isset($_POST['user_name'])){
        include_once('DBconnect.php');
        $username = $conn->real_escape_string($_POST['user_name']);
        //เปลี่ยนแค่ บรรทัด sql
        $sql = "SELECT * FROM `login` WHERE `user_name` = '".$username."'";
        $result = mysqli_query($conn, $sql);
        echo mysqli_num_rows($result);
    }
    if(isset($_POST['e_mail'])){
        include_once('DBconnect.php');
        $mail = $conn->real_escape_string($_POST['e_mail']);
        //เปลี่ยนแค่ บรรทัด sql
        $sql = "SELECT * FROM `customer` WHERE `cus_email` = '".$mail."'";
        $result = mysqli_query($conn, $sql);
        echo mysqli_num_rows($result);

    }
?>