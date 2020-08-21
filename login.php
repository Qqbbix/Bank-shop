<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css" >
    <link href="https://fonts.googleapis.com/css?family=Kanit" rel="stylesheet">
    <title>เข้าสู่ระบบ</title>
</head>
<body>

    <script src="assets/jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="assets/js/bootstrap.min.js"></script>
  
    <!-- ส่วนของ Navbar -->
    <nav class="navbar navbar-expand-lg navbar navbar-dark bg-dark fixed-top">
        <div class="container">
            <a class="navbar-brand" href="index.php"><img src="img/promotion/logofishing.jpeg" width = "150px" height = "50px"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
        
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">หน้าแรก</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="market_index.php">ร้านค้า</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="about.php">เกี่ยวกับเรา</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="contect.php">ติดต่อ</a>
                    </li>
            </ul>
           
            <ul class="navbar-nav ml-auto"> 
            <?php if(isset($_SESSION['id'])){?>
                    <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                       ยินดีต้อนรับคุณ <?php echo $_SESSION['id']  ?>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="main_cart.php">รายการสินค้า(<?php if(isset($_SESSION['cart_count'])){echo ' '.$_SESSION['cart_count'].' ';} ?>)</a>
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
        </div>
    </nav>
    <br><br><br><br>

    <!--login session -->         
    <?php
        if(isset($_POST['submit'])){
          @session_start();
          include_once('DBconnect.php');
          $user_name = $_POST['username'];
          $passw =$conn->real_escape_string( $_POST['password']);
          $sql = "SELECT * FROM `login` WHERE `user_name` = '".$user_name."' AND `password` = '".$passw."'";
          $result = mysqli_query($conn,$sql);
          if(mysqli_num_rows($result)==1){
            $row = $result->fetch_assoc();
              if($row['role'] == "admin"){
                  $sql2 = "SELECT * FROM login as l JOIN staff as s on (s.staff_id = l.staff_id) WHERE l.user_name = '".$user_name."'";
                  $result2 = mysqli_query($conn,$sql2);
                  $row2 = $result2->fetch_assoc();
                  $_SESSION['hold'] = 1;
                  $_SESSION['id'] = $row2['staff_fname']." ".$row2['staff_lname'];
                   header("location:manage_order.php");
                   session_write_close();
              }else{
                  $sql2 = "SELECT * FROM login as l JOIN customer as s on (s.cus_id = l.cus_id) WHERE l.user_name = '".$user_name."'";
                  $result2 = mysqli_query($conn,$sql2);
                  $row2 = $result2->fetch_assoc();
                  $_SESSION['id'] = $row2['cus_name']." ".$row2['cus_surname'];
                  $_SESSION['cus_id'] = $row2['cus_id'];
                  header("location:index.php");

              }
          }else{
            echo '<script language="javascript">';
            echo 'alert("Username or Password is incorrect!")';
            echo '</script>';
          }
        }
    
    ?>

    <!--ล็อกอิน-->
    <div class = "container">
        <form action="" method="POST">
        <div class = "row">
          <div class = "col-md-5 mx-auto">
                <div class= "card ">
                  <div class="card-header text-center bg-secondary text-white">
                  เข้าสู่ระบบ
                  </div>
                  <div class="card-body">
                      <div class="form-group row">
                          <label for="username" class = "col-form-label col-sm-3">ชื่อผู้ใช้งาน:</label>
                        <div class = "col-sm-9">
                          <input type="text" id = "username" name="username" class="form-control">
                        </div>
                      </div>
                      <div class="form-group row">
                          <label for="password" class = "col-form-label  col-sm-3">รหัสผ่าน:</label>
                          <div class = "col-sm-9">
                          <input type="password" id = "password" name="password" class="form-control">
                          </div>
                      </div>
                  </div>
                  <div class="card-footer text-center">
                      <input type="submit" name = "submit" class="btn btn-secondary btn-lg" value="เข้าสู่ระบบ">
                      <a href="register.php"><p class="col-form-label">สมัครสมาชิก</p></a>
                  </div>
                </div>
          </div>
        </div>
        </form>
    </div>
   







  <!-- Footer -->
  <footer class="page-footer font-small blue bg-secondary fixed-bottom">
     <!-- Copyright -->
    <div class="footer-copyright text-center py-3 mx-auto">© 2019 Copyright:
        BANK@SHOP
      </div>
  </footer>

</body>
</html>