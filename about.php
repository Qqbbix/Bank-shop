<?php session_start(); ?>
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
    <title>เกี่ยวกับเรา</title>
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
                        <a class="nav-link" href="index.php">หน้าแรก </a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="market_index.php">ร้านค้า</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="about.php">เกี่ยวกับเรา <span class="sr-only">(current)</span></a>
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

    <br><br><br>


    <!-- ส่วนของเนื้อหา -->
    <div class = "container">
        <div class="card mb-3">
            <img src="img/about-us.jpg" class="card-img-top">
            <div class="card-body">
                <h5 class="card-title">เกี่่ยวกับเรา</h5>
                <p class="card-text">เรามีทีมทำงานที่มีคุณภาพเพื่อทำให้เว็บออกมาดีที่สุดนอกจากนี้ ลูกค้าจะสามารถได้สินค้าที่สมีคุณภาพอย่างแน่นอน.</p>
                <div class="card ">
                    <div class="card-header text-white bg-secondary">
                        <h4>ทีมพัฒนา</h4>
                    </div>
                    <div class="card-body">
                        <div class = "container">
                            <div class = "row">
                                <div class = "col-md-4">
                                     <div class="card" style="width: 18rem;">
                                        <img src="img/team/B6074562.png" class="card-img-top">
                                        <div class="card-body">
                                            <p class="card-text">นายพงศกร นากลาง B6074562</p>
                                        </div>
                                    </div>
                                </div>
                                <div class = "col-md-4">
                                     <div class="card" style="width: 18rem;">
                                        <img src="img/team/B6070656.jpg" class="card-img-top">
                                        <div class="card-body">
                                            <p class="card-text">นายนัฐวุฒิ​ นาค​ขุน​ทด​ B6070656</p>
                                        </div>
                                    </div>
                                </div>
                                <div class = "col-md-4">
                                     <div class="card" style="width: 18rem;">
                                        <img src="img/team/B6074463.jpg" class="card-img-top">
                                        <div class="card-body">
                                            <p class="card-text">นายสหรัฐ​ วงค์​บุญ​เพ็ง​ B6074463</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class = "row mt-3">
                                <div class = "col-md-4">
                                     <div class="card" style="width: 18rem;">
                                        <img src="img/team/B6070960.jpg" class="card-img-top">
                                        <div class="card-body">
                                            <p class="card-text">นายปองพล ศิลปะ B6070960</p>
                                        </div>
                                    </div>
                                </div>
                                <div class = "col-md-4">
                                     <div class="card" style="width: 18rem;">
                                        <img src="img/team/B6071271.jpg" class="card-img-top">
                                        <div class="card-body">
                                            <p class="card-text">นายธนพล วง​สุ​ตาล​ B6071271</p>
                                        </div>
                                    </div>
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

</body>
</html>