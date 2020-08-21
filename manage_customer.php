<?php session_start(); 
include_once('DBconnect.php');


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
    <title>จัดการร้านค้า</title>
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
                <div class="card-header"><h4>รายชื่อลูกค้า</h4></div>
                    <div class="card-body">
                    <nav class="navbar navbar-light bg-light">
                        <form class="form-inline" action = "manage_customer.php" method = "POST">
                            <input class="form-control mr-sm-2 col-8" type="search" placeholder="ค้นหา,ปี-เดือน-วัน" aria-label="Search" name = "search_text" width = 125px>
                            <input class="btn btn-outline-success my-2 my-sm-0" type="submit" name = "search" value = "ค้นหา">
                        </form>
                   </nav>
                   <table class="table">
                        <thead class ="text-center">
                            <tr>
                            <th width = 10%>รหัส</th>
                            <th width = 10%>ชื่อ</th>
                            <th width = 10%>นามสกุล</th>
                            <th width = 15%>ที่อยู่</th>
                            <th width = 10%>ไปรษณีย์</th>
                            <th width = 10%>อีเมล</th>
                            <th width = 10%>เบอร์โทร</th>
                            <th width = 10%>วันที่สมัคร</th>
                            </tr>
                        </thead>
                        <tbody>
                    <?php    
                    if(!isset($_POST['search_text']) || $_POST['search_text'] == ""){
                            $sql = "SELECT * FROM customer";
                            $result = mysqli_query($conn, $sql);
                            if(mysqli_num_rows($result)){
                                while($row = mysqli_fetch_array($result)):
                    ?>
                            <tr>
                            <td><?php echo $row['cus_id']; ?></td>
                            <td><?php echo $row['cus_name']; ?></td>
                            <td><?php echo $row['cus_surname']; ?></td>
                            <td><?php echo $row['cus_address']; ?></td>
                            <td><?php echo $row['cus_zipcode']; ?></td>
                            <td><?php echo $row['cus_email']; ?></td>
                            <td><?php echo $row['cus_phone']; ?></td>
                            <td><?php echo $row['cus_regis_date']; ?></td>
                            </tr>
                                <?php 
                            endwhile;
                            } 
                        }else{
                            $sql = "SELECT * FROM customer where cus_id like '%".$_POST['search_text']."%' OR cus_name like '%".$_POST['search_text']."%' OR cus_surname like '%".$_POST['search_text']."%' OR cus_address like '%".$_POST['search_text']."%' OR cus_zipcode like '%".$_POST['search_text']."%' OR cus_email like '%".$_POST['search_text']."%' OR cus_phone like '%".$_POST['search_text']."%' OR cus_regis_date like '%".$_POST['search_text']."%'";
                            $result = mysqli_query($conn, $sql);
                            if(mysqli_num_rows($result) > 0){
                                while($row = mysqli_fetch_array($result)):
                            ?>
                            <tr>
                            <td><?php echo $row['cus_id']; ?></td>
                            <td><?php echo $row['cus_name']; ?></td>
                            <td><?php echo $row['cus_surname']; ?></td>
                            <td><?php echo $row['cus_address']; ?></td>
                            <td><?php echo $row['cus_zipcode']; ?></td>
                            <td><?php echo $row['cus_email']; ?></td>
                            <td><?php echo $row['cus_phone']; ?></td>
                            <td><?php echo $row['cus_regis_date']; ?></td>
                            </tr>
                                <?php 
                            endwhile;
                            } 
                        }
                        ?>

                        </tbody>
                    </table>





                    </div>
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