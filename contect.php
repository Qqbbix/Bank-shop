<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="assets/jquery-3.3.1.min.js"></script>
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css" >
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap-social.css" >
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Kanit" rel="stylesheet">
    <script src="Project/assets/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <style>
      .jumbotron {
        background-image: url("img/bg02.jpg");
         background-size: cover;
        }
       .testdiv{
         border-left: 1px solid;
        }
    </style>
    <title>ติดต่อ</title>
</head>
<body>


  


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
                    <li class="nav-item active">
                        <a class="nav-link" href="contect.php">ติดต่อ  <span class="sr-only">(current)</span></a>
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

    <br><br>
    <!--end navbar-->
    

    <!-- content-->
    <div class = "container">
        <div class="card bg-light mb-3">
            <div class="card-header"></div>
            <div class="card-body">
                <p class="card-text">สอบถามหรือมีปัญหาในการใช้งาน สามารถติดต่อได้ที่ช่องทางเหล่านี้</p>
                <hr>
                <div class="container">
                  <div class="row">
                        <div class="col-12"> 
                            <div class="border-left">
                                <div class = table-responsive-md>
                                <table class="table table-sm text-center table-borderless" >
                                   <tbody>
                                        <tr><td><h4>ช่องทางติดต่อ</h4></td></tr>
                                        <tr><td>&nbsp;<br><br><br></td></tr>
                                        <tr><td>
                                                    <div class = "row">
                                                    <div class = "col-2"></div>
                                                    <div class=" col-8 text-center"> <a href="https://www.facebook.com/ร้าน-BANK-SHOP-838029339879346/" target=_blank class="btn btn-block btn-social btn-facebook text-white"><i class="fa fa-facebook">
                                                    </i>facbook</h5></a></td></tr></div>
                                                    <div class = "col-2"></div></div>
                                        <tr><td>--------หรือ--------</td></tr>
                                        <tr><td>               
                                                    <div class = "row">
                                                    <div class = "col-2"></div>
                                                    <div class=" col-8 text-center"> <a class="btn btn-block btn-social btn-instagram text-white"><i class="fa fa-instagram ">
                                                    </i>instagram</h5></a></td></tr></div>
                                                    <div class = "col-2"></div></div></td></tr>
                                        <tr><td>&nbsp;</td></tr>
                                        <tr><td>&nbsp;</td></tr>
                                        <tr><td>&nbsp;</td></tr>
                                        <tr><td>&nbsp;</td></tr>
                                        <tr><td>&nbsp;</td></tr>
                                        <tr><td>&nbsp;</td></tr>
                                        <tr><td>&nbsp;</td></tr>
                                        <tr><td>&nbsp;</td></tr>
                                        <tr><td>&nbsp;</td></tr>
                                    </tbody>
                                </table> 
                                </div>
                            </div>
                        </div>

                    
                </div>
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
   <!-- Footer -->
</body>
</html>