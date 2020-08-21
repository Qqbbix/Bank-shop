<?php session_start(); include_once('DBconnect.php');
if(isset($_POST['delete_btn'])){
    if(isset($_POST['pro_id'])){
        $sql ="DELETE FROM product where p_id = '".$_POST['pro_id']."'";
        $re = mysqli_query($conn , $sql);
        unset($_POST['pro_id']);
        unset($_POST['delete_btn']);
    }
}

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
    <title>จัดการสินค้า</title>
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
 


<!-- content -->

        <div class = "container" style="min-height: 560px;" >
            <div class="row">
            <div class="card border-light col-12" style =" width: auto;">
                <div class="card-header"><h4>จัดการสินค้า</h4></div>
                    <div class="card-body">
              
                    <nav class="navbar navbar-light bg-light">
                    <div class = "row">
                    
                    <form class="form-inline" action = "manage_product.php" method ="POST">
                        <input class="form-control mr-sm-2" type="search" placeholder="ค้นหา" aria-label="Search" name = "search_p">
                        <input class="btn btn-outline-success my-2 my-sm-0" type="submit" value = "ค้นหา">
                 
                 
                   
                    </form></div>
                      <a href="add_form_product.php"><button class="btn btn-success text-right">เพิ่มข้อมูล</button></a>
                   
                 
                    
                  
                    </nav>





                   <table class="table">
                        <thead class = "text-center">
                            <tr>
                            <th scope="col">ภาพสินค้า</th>
                            <th scope="col">รหัสสินค้า</th>
                            <th scope="col">ชื่่อสินค้า</th>
                            <th scope="col">ยี่ห้อ</th>
                            <th scope="col">ราคา</th>
                            <th scope="col">รายละเอียด</th>
                            <th scope="col">อัปเดต</th>
                            <th scope="col" width = 20% class = "text-center">ดำเนินการ</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php 
                            if(!isset($_POST['search_p']) || $_POST['search_p'] == "" ){
                                $sql = "SELECT * FROM product";
                                $result = mysqli_query($conn, $sql);
                                if(mysqli_num_rows($result)>0){
                                    while($row = mysqli_fetch_array($result)):
                        ?>
                            <form action="update_product_form.php" method = "POST">
                                    <tr>
                                    <td><img src="pro_img/<?php echo $row['p_img']; ?>" width = "90px" height = "90px"></td>
                                    <td class = "text-center"><input type = "hidden" name = "pro_id" value = "<?php echo $row['p_id'];?>"><?php echo $row['p_id'];?></td>
                                    <td class = "text-center"><?php echo $row['p_model']; ?></td>
                                    <td class = "text-center"><?php echo $row['p_band']; ?></td>
                                    <td class = "text-center"><?php echo $row['p_price']; ?></td>
                                    <td><?php echo $row['p_description']; ?></td>
                                    <td><?php echo $row['p_date']; ?></td>
                                    <td class = "text-right">
                                       <div class = "row ">
                                        <input type="submit" name = "update_btn" class = "btn btn-primary mr-2 ml-4" value = "อัปเดต">
                             </form>
                                        <form action="manage_product.php" method = "POST">
                                        <input type = "hidden" name = "pro_id" value = "<?php echo $row['p_id'];?>">
                                        <input type="submit" name = "delete_btn" class = "btn btn-danger" value = "ลบข้อมูล" onclick = myFunction()> 
                                        </form>
                                        </div>
                                    </td>
                                    </tr>
                    
                           <?php       endwhile; }
                            }else{                                   
                                $sql = "SELECT * FROM product WHERE `p_model` LIKE '%".$_POST['search_p']."%' OR `p_type` LIKE '%".$_POST['search_p']."%' OR `p_band` LIKE '%".$_POST['search_p']."%' OR `p_id` LIKE '%".$_POST['search_p']."%' OR `p_price` LIKE '%".$_POST['search_p']."%' ORDER BY p_id";
                                $result = mysqli_query($conn, $sql);
                                if(mysqli_num_rows($result)>0){
                                    while($row = mysqli_fetch_array($result)):
                            ?>
                                    
                                    <form action="update_product_form.php" method = "POST">
                                    <tr>
                                    <td><img src="pro_img/<?php echo $row['p_img']; ?>" width = "80px" height = "80px"></td>
                                    <td class = "text-center"><input type = "hidden" name = "pro_id" value = "<?php echo $row['p_id'];?>"><?php echo $row['p_id'];?></td>
                                    <td class = "text-center"><?php echo $row['p_model']; ?></td>
                                    <td class = "text-center"><?php echo $row['p_band']; ?></td>
                                    <td class = "text-center"><?php echo $row['p_price']; ?></td>
                                    <td><?php echo $row['p_description']; ?></td>
                                    <td><?php echo $row['p_date']; ?></td>
                                    <td class = "text-right">
                                    <div class = "row">
                                        <input type="submit" name = "update_btn" class = "btn btn-primary mr-2 ml-4" value = "อัปเดต">
                                        </form>
                                        <form action="manage_product.php" method = "POST">
                                        <input type = "hidden" name = "pro_id" value = "<?php echo $row['p_id'];?>">
                                        <input type="submit" name = "delete_btn" class = "btn btn-danger" value = "ลบข้อมูล" onclick = myFunction()> 
                                        </form></div>
                                    </td>
                                    </tr>
            
                           <?php       endwhile; }
                           }           
                            ?>
                        </tbody>
                    </table>
                    </div>
                </div>
            </div>     
        </div>


                



















<script>
function myFunction() {
  confirm("แน่ใจว่าคุณต้องการลบ");
}
</script>






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