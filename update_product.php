<?php  
include_once("DBconnect.php");
echo $_FILES['image']['name'];
if($_FILES['image']['name'] != ""){
    $file_name = $_FILES['image']['name'];
    $file_size =$_FILES['image']['size'];
    $file_tmp =$_FILES['image']['tmp_name'];
    $file_type=$_FILES['image']['type'];
    move_uploaded_file($file_tmp,"pro_img/".$file_name);
    echo "test";
    $currentDateTime = date('Y-m-d H:i:s');
    $sql = "UPDATE product SET p_model = '".$_POST['pro_name']."',p_band = '".$_POST['pro_band']."',p_type = '".$_POST['pro_type']."',p_description = '".$_POST['pro_des']."',p_date = '".$currentDateTime."',p_price = '".$_POST['pro_price']."',p_img = '".$file_name."'";
    $sql .= "WHERE p_id = '".$_POST['product_id']."'";
    $result = mysqli_query($conn, $sql);

}else{
    $currentDateTime = date('Y-m-d H:i:s');
    $sql = "UPDATE product SET p_model = '".$_POST['pro_name']."',p_band = '".$_POST['pro_band']."',p_type = '".$_POST['pro_type']."',p_description = '".$_POST['pro_des']."',p_date = '".$currentDateTime."',p_price = '".$_POST['pro_price']."'";
    $sql .= "WHERE p_id = '".$_POST['product_id']."'";
    $result = mysqli_query($conn, $sql);
}
if($result){
    echo "<script type='text/javascript'>alert('อัปเดตสินค้าแล้ว');
    window.location='manage_product.php';
    </script>";
}else{
    echo "Error Save [".$result."]";
}

?>