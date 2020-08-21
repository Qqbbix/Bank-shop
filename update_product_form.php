<?php session_start(); include_once('DBconnect.php'); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css" >
    <link href="https://fonts.googleapis.com/css?family=Kanit" rel="stylesheet">
    <style>
      .jumbotron {
        background-image: url("img/bg02.jpg");
         background-size: cover;
        }

    </style>
    <title>อัปเดตสินค้า</title>
</head>
<body>

    <script src="assets/jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="assets/js/bootstrap.min.js"></script>

     <!-- ส่วนของ Navbar -->
     <div>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class ="container">
    <span class="navbar-brand mb-0 h2"><h4>Bank Shop Management</h4></span>
    </nav></div>
    <nav class="navbar navbar-expand-lg navbar navbar-dark bg-dark">
        <div class="container">
    
            <ul class="navbar-nav mr-auto">
            <!-- Navbar2-->
           <li class= "nav-item mt-1"><a href="manage_order.php"><button type="button" class="btn btn-secondary mr-2">รายการสั่งสินค้า</button></a></li>
           <li class= "nav-item mt-1"><a href="manage_product.php"><button type="button" class="btn btn-secondary mr-2">จัดการสินค้า</button></a></li>
          <li class= "nav-item mt-1"> <a href="manage_customer.php"><button type="button" class="btn btn-secondary mr-2">&nbsp;&nbsp;ลูกค้า&nbsp;&nbsp;</button></a></li>
            </ul>
            <ul class="navbar-nav ml-auto"> 
            <?php if(isset($_SESSION['id'])){?>
                    <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                       ยินดีต้อนรับคุณ <?php echo $_SESSION['id']  ?>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="logout.php">ล็อกเอาท์</a>
                    </div>
                    </li>
                    
              <?php }else{ ?>
                    <li class="nav-item">
                        <a href="register.php" class="btn btn-success btn-sm active" role="button" aria-pressed="true">สมัครสมาชิก</a>&nbsp;&nbsp;
                    </li>
                    <li class="nav-item">
                        <a href="login.php" class="btn btn-secondary btn-sm active" role="button" aria-pressed="true">เข้าสู่ระบบ</a>
                    </li>
              <?php } ?>
                 </ul>
            
        </div>
    </nav>
</div>
 



<?php 
    $sql = "SELECT * FROM product WHERE p_id = '".$_POST['pro_id']."'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);
?>

 <!-- ฟอร์มupdate-->
<div class = "container" style="min-height: 560px;" >
<div class="card bg-light mb-3">
  <div class="card-header">อัปเดตสินค้า</div>
  <div class="card-body">
  <form action="update_product.php" method="POST" enctype="multipart/form-data">
  <div style ="margin-left:20%; margin-right:20%;">
    <div class="form-group">
            <label for="p_id" class = "col-form-label">หมายเลขสินค้า:</label><br>
            <input type="text" id = "p_id" name="product_id" class="form-control" value ="<?php echo $row['p_id']; ?>"    readonly>
     </div>

     <div class="form-group">
            <label for="model" class = "col-form-label">รุ่นสินค้า:</label><br>
            <input type="text" id = "model" name="pro_name" class="form-control" value="<?php echo $row['p_model']; ?>">
     </div>
     <div class="form-group">
            <label for="band" class = "col-form-label">ยี่ห้อสินค้า:</label><br>
            <input type="text" id = "band" name="pro_band" class="form-control" value="<?php echo $row['p_band']; ?>">
     </div>
     <div class="form-group">
      <label for="inputState">ประเภทสินค้า:</label>
      <select id="inputState" class="form-control" name = "pro_type">
        <option selected value="<?php echo $row['p_type']; ?>"><?php echo $row['p_type']; ?></option>
        <option value="คันเบ็ด">คันเบ็ด</option>
        <option value="รอก">รอก</option>
        <option value="เอน">เอน</option>
        <option value="เหยื่อตกปลา">เหยื่อตกปลา</option>
      </select>
    </div>
    <div class="form-group">
            <label for="price" class = "col-form-label">ราคาสินค้าต่อชิ้น:</label><br>
            <input type="text" id = "price" name="pro_price" class="form-control " value="<?php echo $row['p_price'];?>" ?>
     </div>
     <div class="form-group">
        <label for="exampleFormControlTextarea1">รายละเอียดสินค้า</label>
        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" wordwrap = on name = "pro_des" value ="<?php echo $row['p_description']; ?>"><?php echo $row['p_description']; ?></textarea>
  </div>
     <div class="custom-file">
        <input type="file" class="custom-file-input" id="customFile" name = "image">
        <label class="custom-file-label" for="customFile">Choose file</label>
  </div>
<div class="form-group ">
        <input type="submit" name ="submit" class = "btn btn-primary mt-3 btn-lg btn-block" value="อัปเดตสินค้า">
</div>
</div>
  </form>
  </div>
</div>




</div>







  <!-- Footer -->
  <footer class="page-footer font-small blue bg-secondary">
     <!-- Copyright -->
    <div class="footer-copyright text-center py-3 mx-auto">© 2019 Copyright:
        BANK@SHOP
      </div>
  </footer>





<?php     


?>
</body>
</html>