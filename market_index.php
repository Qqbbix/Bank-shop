<?php
if(!isset($_SESSION)) 
{ 
    session_start(); 
} 
if(isset($_SESSION['id'])){

?>


<?php include_once('DBconnect.php');
  ?>
<?php 
  if(isset($_SESSION['GG'])){
    if($_SESSION['GG'] == 2){
        $_SESSION['page01'] = 1;
        $_SESSION['GG'] = 0;

  }
  }
 
// ตรงนี้ไม่ต้องไปยุ่งแล้ววววววววว--------------------------------------------------------------------------------------------
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
    <title>ร้านค้า</title>
</head>
<body>

    <script src="assets/jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="assets/js/bootstrap.min.js"></script>
  


    <!-- ส่วนของ Navbar-->
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
                    <li class="nav-item active">
                    <a class="nav-link" href="market_index.php">ร้านค้า <span class="sr-only">(current)</span></a>
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
    </div>
    <br>

        <div class = "row">







        
            <div class="col-3">
                <a href="main_cart.php" class = "btn btn-success btn-lg btn-block ml-1 mb-1" style="max-width: auto;">ตะกร้าสินค้า (<?php if(isset($_SESSION['cart_count'])){echo ' '.$_SESSION['cart_count'].' ';}else{ echo 0; } ?>)</a>



                <div class = "card ml-1" style="max-width: auto;">
                  <div class = "card-header bg-primary text-center text-white">
                    สินค้า
                  </div>
                </div>

                  <div class="list-group text-center ml-1">
                    <a href="session/show01.php" class="list-group-item list-group-item-action" >สินค้าทั้งหมด</a>  
                    <a href="session/show02.php" class="list-group-item list-group-item-action">  คันเบ็ด</a>  
                    <a href="session/show03.php" class="list-group-item list-group-item-action">  เอน</a>  
                    <a href="session/show04.php" class="list-group-item list-group-item-action"> รอก</a>  
                    <a href="session/show05.php" class="list-group-item list-group-item-action">  เหยื่อปลา</a>
                  </div>

            </div>
            <div class="col-9">
            <!--ค้นหา-->
                 <nav class="navbar navbar-light bg-dark justify-content-between">
                  <a class="navbar-brand text-white">ค้นหาสินค้า</a>
                  <form class="form-inline" action = "session/search_item.php" method = "POST">
                    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name = "name_search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                  </form>
                </nav>
            <!--ค้นหา-->
              <div class ="container">
               
    
    
    <!-- แสดง -->
    <?php
     if(isset($_SESSION['name_search']) && $_SESSION['name_search'] != ''){
            $roww = 4;
            $temp = 1;  
            $sql = "SELECT * FROM `product` WHERE `p_model` LIKE '%".$_SESSION['name_search']."%' OR `p_type` LIKE '%".$_SESSION['name_search']."%' OR `p_band` LIKE '%".$_SESSION['name_search']."%'  OR  `p_price` LIKE '%".$_SESSION['name_search']."%' ORDER BY p_date";
            $result = mysqli_query($conn, $sql);
            if(mysqli_num_rows($result)>0){
              while($productQ = mysqli_fetch_array($result)){
                if($roww % 4 == 0){ ?> <div class = "row">   <?php $roww = 1; }  $roww = $roww + 1; ?>
              <div class = "col-md-3 mt-4">
                  <form method = "POST" action="cart.php?action=add&id=<?php echo $productQ['p_id']; ?>">
                    <div class="card" style="width: auto;">
                      <img class="card-img-top" src="pro_img/<?php echo $productQ['p_img'] ?>" class ="img-respontsive" width = 100px height = 150px>
                      <div class="card-body">
                        <h6 class="card-title text-center"><?php echo ' รุ่น '.$productQ['p_model'].' '.$productQ['p_band'] ?></h6>
                        <hr>
                        <p class="card-text"><?php echo 'รายละเอียด: '.$productQ['p_description'] ?></p>
                        <p class="card-text text-danger"><?php echo 'ราคา: '.$productQ['p_price'].' บาท'; ?></p>
                        <hr>
                        <div class="form-group text-center">
                          <input type="text" class="form-control " id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="จำนวนสินค้า" name ="quantity"/>
                          
                        </div>
                        <div class ="text-center">
                        <input type="hidden" name ='name_model' value = "<?php echo $productQ['p_model']; ?>"/>
                        <input type="hidden" name ='name_band' value = "<?php echo $productQ['p_band']; ?>"/>
                        <input type="hidden" name ='product_price' value = "<?php echo $productQ['p_price']; ?>"/>
                        <input type="submit" class="btn btn-primary text-center" name = "add_cart" value="เพิ่มสินค้า"/>  </div>
                      </div>
                    </div>
                  </form>
              </div>
            <?php $roww =$roww-1;
                    $temp += 1;
            if($roww % 4 ==0 ||$temp-1 == mysqli_num_rows($result) ){ ?> </div> <br> <?php  $roww = 1;  } 
              }
            }else{ ?>
             <br>
              <H1 class = "text-center">--ไม่พบสินค้า--</H1>

          <?php
            }
     }else{

        if(isset($_SESSION['page01'])&& $_SESSION['page01'] == 1){
                          $roww = 4;
                          $temp = 1;  
                          $sql = "SELECT * FROM product ORDER BY p_date DESC";
                          $result = mysqli_query($conn, $sql);
                          if(mysqli_num_rows($result)>0){
                            while($productQ = mysqli_fetch_array($result)){
                              if($roww % 4 == 0){ ?> <div class = "row">   <?php $roww = 1; }  $roww = $roww + 1; ?>
                            <div class = "col-md-3 mt-4">
                                <form method = "POST" action="cart.php?action=add&id=<?php echo $productQ['p_id']; ?>">
                                  <div class="card" style="width: auto;">
                                    <img class="card-img-top" src="pro_img/<?php echo $productQ['p_img'] ?>" class ="img-respontsive" width = 100px height = 150px>
                                    <div class="card-body">
                                      <h6 class="card-title text-center"><?php echo ' รุ่น '.$productQ['p_model'].' '.$productQ['p_band'] ?></h6>
                                      <hr>
                                      <p class="card-text"><?php echo 'รายละเอียด: '.$productQ['p_description'] ?></p>
                                      <p class="card-text text-danger"><?php echo 'ราคา: '.$productQ['p_price'].' บาท'; ?></p>
                                      <hr>
                                      <div class="form-group text-center">
                                        <input type="text" class="form-control " id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="จำนวนสินค้า" name ="quantity"/>
                                        
                                      </div>
                                      <div class ="text-center">
                                      <input type="hidden" name ='name_model' value = "<?php echo $productQ['p_model']; ?>"/>
                                      <input type="hidden" name ='name_band' value = "<?php echo $productQ['p_band']; ?>"/>
                                      <input type="hidden" name ='product_price' value = "<?php echo $productQ['p_price']; ?>"/>
                                      <input type="submit" class="btn btn-primary text-center" name = "add_cart" value="เพิ่มสินค้า"/> </div>
                                    </div>
                                  </div>
                                </form>
                            </div>
                          <?php $roww =$roww-1;
                                  $temp += 1;
                          if($roww % 4 ==0 ||$temp-1 == mysqli_num_rows($result) ){ ?> </div> <br> <?php  $roww = 1;  } 
                            }
                          } 
            }else if(isset($_SESSION['page02'])&& $_SESSION['page02'] == 1){
                          $roww = 4;
                          $temp = 1;  
                          $sql = "SELECT * FROM product where p_type = 'คันเบ็ด' ORDER BY p_date DESC";
                          $result = mysqli_query($conn, $sql);
                          if(mysqli_num_rows($result)>0){
                            while($productQ = mysqli_fetch_array($result)){
                              if($roww % 4 == 0){ ?> <div class = "row">   <?php $roww = 1; }  $roww = $roww + 1; ?>
                            <div class = "col-md-3 mt-4">
                            <form method = "POST" action="cart.php?action=add&id=<?php echo $productQ['p_id']; ?>">
                                  <div class="card" style="width: auto;">
                                    <img class="card-img-top" src="pro_img/<?php echo $productQ['p_img'] ?>" class ="img-respontsive" width = 100px height = 150px>
                                    <div class="card-body">
                                      <h6 class="card-title text-center"><?php echo ' รุ่น '.$productQ['p_model'].' '.$productQ['p_band'] ?></h6>
                                      <hr>
                                      <p class="card-text"><?php echo 'รายละเอียด: '.$productQ['p_description'] ?></p>
                                      <p class="card-text text-danger"><?php echo 'ราคา: '.$productQ['p_price'].' บาท'; ?></p>
                                      <hr>
                                      <div class="form-group text-center">
                                        <input type="text" class="form-control " id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="จำนวนสินค้า" name ="quantity"/>
                                        
                                      </div>
                                      <div class ="text-center">
                                      <input type="hidden" name ='name_model' value = "<?php echo $productQ['p_model'] ?>"/>
                                      <input type="hidden" name ='name_band' value = "<?php echo $productQ['p_band'] ?>"/>
                                      <input type="hidden" name ='product_price' value = "<?php echo $productQ['p_price'] ?>"/>
                                      <input type="submit" class="btn btn-primary text-center" name = "add_cart" value="เพิ่มสินค้า"/> </div>
                                    </div>
                                  </div>
                                </form>
                            </div>
                          <?php $roww =$roww-1;
                                  $temp += 1;
                          if($roww % 4 ==0 ||$temp-1 == mysqli_num_rows($result) ){ ?> </div> <br> <?php  $roww = 1;  } 
                            }
                          } 
            }else if(isset($_SESSION['page03'])&& $_SESSION['page03'] == 1){
                          $roww = 4;
                          $temp = 1;  
                          $sql = "SELECT * FROM product where p_type = 'เอน' ORDER BY p_date DESC";
                          $result = mysqli_query($conn, $sql);
                          if(mysqli_num_rows($result)>0){
                            while($productQ = mysqli_fetch_array($result)){
                              if($roww % 4 == 0){ ?> <div class = "row">   <?php $roww = 1; }  $roww = $roww + 1; ?>
                            <div class = "col-md-3 mt-4">
                            <form method = "POST" action="cart.php?action=add&id=<?php echo $productQ['p_id']; ?>">
                                  <div class="card" style="width: auto;">
                                    <img class="card-img-top" src="pro_img/<?php echo $productQ['p_img'] ?>" class ="img-respontsive" width = 100px height = 150px>
                                    <div class="card-body">
                                      <h6 class="card-title text-center"><?php echo ' รุ่น '.$productQ['p_model'].' '.$productQ['p_band'] ?></h6>
                                      <hr>
                                      <p class="card-text"><?php echo 'รายละเอียด: '.$productQ['p_description'] ?></p>
                                      <p class="card-text text-danger"><?php echo 'ราคา: '.$productQ['p_price'].' บาท'; ?></p>
                                      <hr>
                                      <div class="form-group text-center">
                                        <input type="text" class="form-control " id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="จำนวนสินค้า" name ="quantity"/>
                                        
                                      </div>
                                      <div class ="text-center">
                                      <input type="hidden" name ='name_model' value = "<?php echo $productQ['p_model'] ?>"/>
                                      <input type="hidden" name ='name_band' value = "<?php echo $productQ['p_band'] ?>"/>
                                      <input type="hidden" name ='product_price' value = "<?php echo $productQ['p_price'] ?>"/>
                                      <input type="submit" class="btn btn-primary text-center" name = "add_cart" value="เพิ่มสินค้า"/> </div>
                                    </div>
                                  </div>
                                </form>
                            </div>
                          <?php $roww =$roww-1;
                                  $temp += 1;
                          if($roww % 4 ==0 ||$temp-1 == mysqli_num_rows($result) ){ ?> </div> <br> <?php  $roww = 1;  } 
                            }
                          } 
            }else if(isset($_SESSION['page04'])&& $_SESSION['page04'] == 1){
                          $roww = 4;
                          $temp = 1;  
                          $sql = "SELECT * FROM product where p_type = 'รอก' ORDER BY p_model ASC";
                          $result = mysqli_query($conn, $sql);
                          if(mysqli_num_rows($result)>0){
                            while($productQ = mysqli_fetch_array($result)){
                              if($roww % 4 == 0){ ?> <div class = "row">   <?php $roww = 1; }  $roww = $roww + 1; ?>
                            <div class = "col-md-3 mt-4">
                            <form method = "POST" action="cart.php?action=add&id=<?php echo $productQ['p_id']; ?>">
                                  <div class="card" style="width: auto;">
                                    <img class="card-img-top" src="pro_img/<?php echo $productQ['p_img'] ?>" class ="img-respontsive" width = 100px height = 150px>
                                    <div class="card-body">
                                      <h6 class="card-title text-center"><?php echo ' รุ่น '.$productQ['p_model'].' '.$productQ['p_band'] ?></h6>
                                      <hr>
                                      <p class="card-text"><?php echo 'รายละเอียด: '.$productQ['p_description'] ?></p>
                                      <p class="card-text text-danger"><?php echo 'ราคา: '.$productQ['p_price'].' บาท'; ?></p>
                                      <hr>
                                      <div class="form-group text-center">
                                        <input type="text" class="form-control " id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="จำนวนสินค้า" name ="quantity"/>
                                        
                                      </div>
                                      <div class ="text-center">
                                      <input type="hidden" name ='name_model' value = "<?php echo $productQ['p_model'] ?>"/>
                                      <input type="hidden" name ='name_band' value = "<?php echo $productQ['p_band'] ?>"/>
                                      <input type="hidden" name ='product_price' value = "<?php echo $productQ['p_price'] ?>"/>
                                      <input type="submit" class="btn btn-primary text-center" name = "add_cart" value="เพิ่มสินค้า"/> </div>
                                    </div>
                                  </div>
                                </form>
                            </div>
                          <?php $roww =$roww-1;
                                  $temp += 1;
                          if($roww % 4 ==0 ||$temp-1 == mysqli_num_rows($result) ){ ?> </div> <br> <?php  $roww = 1;  } 
                            }
                          } 
            }else if(isset($_SESSION['page05'])&& $_SESSION['page05'] == 1){
                          $roww = 4;
                          $temp = 1;  
                          $sql = "SELECT * FROM product where p_type = 'เหยื่อตกปลา' ORDER BY p_date DESC";
                          $result = mysqli_query($conn, $sql);
                          if(mysqli_num_rows($result)>0){
                            while($productQ = mysqli_fetch_array($result)){
                              if($roww % 4 == 0){ ?> <div class = "row">   <?php $roww = 1; }  $roww = $roww + 1; ?>
                            <div class = "col-md-3 mt-4">
                            <form method = "POST" action="cart.php?action=add&id=<?php echo $productQ['p_id']; ?>">
                                  <div class="card" style="width: auto;">
                                    <img class="card-img-top" src="pro_img/<?php echo $productQ['p_img'] ?>" class ="img-respontsive" width = 100px height = 150px>
                                    <div class="card-body">
                                      <h6 class="card-title text-center"><?php echo ' รุ่น '.$productQ['p_model'].' '.$productQ['p_band'] ?></h6>
                                      <hr>
                                      <p class="card-text"><?php echo 'รายละเอียด: '.$productQ['p_description'] ?></p>
                                      <p class="card-text text-danger"><?php echo 'ราคา: '.$productQ['p_price'].' บาท'; ?></p>
                                      <hr>
                                      <div class="form-group text-center">
                                        <input type="text" class="form-control " id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="จำนวนสินค้า" name ="quantity"/>
                                        
                                      </div>
                                      <div class ="text-center">
                                      <input type="hidden" name ='name_model' value = "<?php echo $productQ['p_model'] ?>"/>
                                      <input type="hidden" name ='name_band' value = "<?php echo $productQ['p_band'] ?>"/>
                                      <input type="hidden" name ='product_price' value = "<?php echo $productQ['p_price'] ?>"/>
                                      <input type="submit" class="btn btn-primary text-center" name = "add_cart" value="เพิ่มสินค้า"/> </div>
                                    </div>
                                  </div>
                                </form>
                            </div>
                          <?php $roww =$roww-1;
                                  $temp += 1;
                          if($roww % 4 ==0 ||$temp-1 == mysqli_num_rows($result) ){ ?> </div> <br> <?php  $roww = 1;  } 
                            }
                          } 
                        }
          }
        ?>
              </div>
            </div>
        </div>
      <br>











  <!-- Footer -->
  <footer class="page-footer font-small blue bg-dark">
     <!-- Copyright -->
    <div class="footer-copyright text-center py-3 mx-auto">© 2019 Copyright:
        <a href="https://mdbootstrap.com/education/bootstrap/"> MDBootstrap.com</a>
      </div>
  </footer>




</body>
</html>

        <?php   }else{
          
          echo "<script type='text/javascript'>alert('กรุณาเข้าสู่ระบบ');
          window.location='login.php';
          </script>";
        }
          
          
          
          ?>