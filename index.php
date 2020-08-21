<?php session_start(); $_SESSION['GG'] = 2;?>
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
    <title>ร้าน BANK SHOP</title>
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
                    <li class="nav-item active">
                        <a class="nav-link" href="index.php">หน้าแรก <span class="sr-only">(current)</span></a>
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

    <br><br><br>

    <!-- ส่วนของ slide -->
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
              <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
              <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
              <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img  width = "1280" height="300"class="d-block w-100 img-fluid" src="img/promotion/slide01.jpg" alt="First slide">
              </div>
              <div class="carousel-item">
                <img width = "1280" height="300" class="d-block w-100 img-fluid" src="img/promotion/slide02.jpg" alt="Second slide">
              </div>
              <div class="carousel-item">
                <img width = "1280" height="300" class="d-block w-100 img-fluid" src="img/promotion/slide03.jpg" alt="Third slide">
              </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
    </div>


    <!-- ส่วนของ ข้อความ -->
    <div class="jumbotron">
        <div class="container">
        <h1 class="display-4 text-white" style="font-family:kanit">BANKZA Fishing</h1>
        <p class="lead  text-white "style="font-family:kanit">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; เว็บไซต์ขายอุปกรณ์ตกปลาที่มีคุณภาพ ผ่านการตรวจสอบสินค้าจากยอดฝีมือนักตกปลาจากทะเลอันดามัน คุณจะมั่นใจได้เลยว่าจะได้รับสินค้าที่มีคุณภาพอย่างแน่นอน.</p>
       <hr color = #fff>
        <br>
        <!-- คอนเทนหน้า index-->
  
       
        <br>
        <div class="row">
                <div class = "col-sm-12 text-center">
                 <a href="market_index.php"> <button type="button" class="btn btn-danger btn-lg " >คลิกเพื่อเลือกซื้อ</button> </a> <br><br><br>
          </div>
        </div> </div>
    </div>         


  <!-- Footer -->
  <footer class="page-footer font-small blue bg-secondary">
     <!-- Copyright -->
    <div class="footer-copyright text-center py-3 mx-auto">© 2019 Copyright:
        BANK@SHOP
      </div>
  </footer>





<?php     

$_SESSION['page01'] = 1;
$_SESSION['page02'] = 0;
$_SESSION['page03'] = 0;
$_SESSION['page04'] = 0;
$_SESSION['page05'] = 0;
$_SESSION['name_search'] = '';

?>
</body>
</html>