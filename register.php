<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css" >
    <link href="https://fonts.googleapis.com/css?family=Kanit" rel="stylesheet">
    <title>สมัครสมาชิก</title>
    <style>
        textarea { resize:none; }
    </style>
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

    <!--- form registor -->
    <div class = "container">
        <form action="add_register.php" method="POST">
        <div class = "row">
          <div class = "col-md-9 mx-auto">
                <div class= "card ">
                  <div class="card-header bg-info text-white text-center">
                      สมัครสมาชิก
                  </div>
                  <div class="card-body">
                      <div class="form-group row">
                          <label for="username" class = "col-form-label col-sm-2">ชื่อผู้ใช้งาน:</label>
                        <div class = "col-sm-5">
                          <input type="text" id = "username" name="username" class="form-control" require>
                          <span id="availability" ></span>
                        </div>
                      </div>
                      <div class="form-group row">
                          <label for="password" class = "col-form-label  col-sm-2">รหัสผ่าน:</label>
                          <div class = "col-sm-5">
                          <input type="password" id = "password" name="password" class="form-control" require>
                          </div>
                      </div>
                      <div class="form-group row">
                          <label for="name" class = "col-form-label  col-sm-2">ชื่อ:</label>
                          <div class = "col-sm-5">
                          <input type="text" id = "name" name="fname" class="form-control" require>
                          </div>
                      </div>
                      <div class="form-group row">
                          <label for="lname" class = "col-form-label  col-sm-2">นามสกุล:</label>
                          <div class = "col-sm-5">
                          <input type="text" id = "test" name="lname" class="form-control" require>
                          </div>
                      </div>
                      <div class="form-group row">
                          <label for="address" class = "col-form-label  col-sm-2">ที่อยู่:</label>
                          <div class = "col-sm-5">
                          <textarea class="form-control" rows="5" cols="10" id="address" name= "address" wordwrap = "on" require></textarea>
                          </div>
                      </div>
                      <div class="form-group row">
                          <label for="zipcode" class = "col-form-label  col-sm-2" >รหัสไปรษณีย์:</label>
                          <div class = "col-sm-5">
                          <input type="text" id = "zipcode" name="zipcode" class="form-control" require>
                          </div>
                      </div>
                      <div class="form-group row">
                          <label for="mail" class = "col-form-label  col-sm-2" >อีเมล:</label>
                          <div class = "col-sm-5">
                          <input type="text" id = "mail" name="mail" class="form-control" require>
<!--  mail   ----->        <span id="mail_availability" ></span>
                          </div>
                      </div>
                      <div class="form-group row">
                          <label for="phone" class = "col-form-label  col-sm-2" >เบอร์โทร:</label>
                          <div class = "col-sm-5">
                          <input type="text" id = "text" name="phone" class="form-control" require>
                          </div>
                      </div>
              <!--     </div>--->   
                  <div class="card-footer text-center">
                      <input type="submit" name = "submit" id = "register" class="btn btn-success btn-lg" value="สมัครสมาชิก ">
                  </div>
                </div>
          </div>
        </div>
        </form>
    </div>          








  <!-- Footer -->
  <footer class="page-footer font-small blue ">
     <!-- Copyright -->
    <div class="footer-copyright text-center py-3 mx-auto">© 2019 Copyright:
        BANK@SHOP
      </div>
  </footer>

</body>
</html>
<script>
$( document ).ready(function() {
    $("#username").blur(function(){
        var username = $(this).val();
        if(username != ''){
        $.ajax({
         url: 'check.php',
         method:"POST",
         data:{user_name:username},
          success: function(data) { 
            if(data !='0' ){
                $('#availability').html('<span class = "text-danger">Username not Available</span>');
                $('#register').attr("disabled",true);
            }else{
                $('#availability').html('<span class = "text-success">Username Available</span>');
                $('#register').attr("disabled",false);
            }
          }
          
        });}   
    });
    // เพิ่มตรงนี้------------------------------------------------------
    $("#mail").blur(function(){
        var mail = $(this).val();
        if(mail != ''){
        $.ajax({
         url: 'check.php',
         method:"POST",
         data:{e_mail:mail},
          success: function(data) { 
            if(data !='0' ){
                $('#mail_availability').html('<span class = "text-danger">Email not Available</span>');
                $('#register').attr("disabled",true);
            }else{
                $('#mail_availability').html('<span class = "text-success">Email Available</span>');
                $('#register').attr("disabled",false);
            }
          }
          
        });}
    });
})

</script>