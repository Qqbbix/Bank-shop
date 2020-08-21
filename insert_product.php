<?php  
include_once("DBconnect.php");
$file_name = $_FILES['image']['name'];
$file_size =$_FILES['image']['size'];
$file_tmp =$_FILES['image']['tmp_name'];
$file_type=$_FILES['image']['type'];
move_uploaded_file($file_tmp,"pro_img/".$file_name);


$currentDateTime = date('Y-m-d H:i:s');
$sql = "INSERT INTO product (p_id,p_model,p_band,p_type,p_description,p_date,p_price,p_img) ";
$sql .= "VALUES ( '".$_POST['product_id']."','".$_POST['pro_name']."','".$_POST['pro_band']."','".$_POST['pro_type']."','".$_POST['pro_des']."','".$currentDateTime."','".$_POST['pro_price']."','".$file_name."')";
$result = mysqli_query($conn, $sql);

if($result){
    echo "<script type='text/javascript'>alert('เพิ่มสินค้าแล้ว');
    window.location='add_form_product.php';
    </script>";
}else{
    echo "Error Save [".$result."]";
}
?>