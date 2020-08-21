<?php session_start(); 

if(filter_input(INPUT_GET, 'action')=='delete'){
    foreach($_SESSION['shopping_cart'] as $key => $order_delete){
        if($order_delete['id'] == filter_input(INPUT_GET, 'id')){
          unset($_SESSION['shopping_cart'][$key]);
          $_SESSION['cart_count'] -= 1;  
        }
    }
    $_SESSION['shopping_cart'] =array_values($_SESSION['shopping_cart']);
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
    <title>รายการสินค้า</title>
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
                        <a class="dropdown-item" href="#">รายการสินค้า</a>
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
    <div class = "container" style="min-height:550px;">
    <?php 
    if(!empty($_SESSION['shopping_cart'])){
    ?>
    
    <h4>รายการสินค้า</h4> 
        <table class="table">
    <thead class="thead-dark">
        <tr class="text-center">
        <th scope="col">สินค้า</th>
        <th scope="col">จำนวน</th>
        <th scope="col">ราคาต่อชิ้น</th>
        <th scope="col">ราคารวม</th>
        <th scope="col">ดำเนินการ</th>
        </tr>
    </thead> 
    <tbody>
    <?php 
     $sum = 0;
     $sum2 = 0;
     foreach($_SESSION['shopping_cart'] as $key => $orderlist): 
     ?>
   
        <tr class="text-center">
        <td><?php echo $orderlist['name_model'].' '.$orderlist['name_band']; ?></td>
        <td><?php echo $orderlist['quantity']; ?></td>
        <td><?php echo $orderlist['product_price']; ?></td>
        <td><?php echo number_format($orderlist['product_price']*$orderlist['quantity'], 2); ?></td>
        <td><a href="main_cart.php?action=delete&id=<?php echo $orderlist['id']; ?>"><button type="button" class="btn btn-danger">ลบรายการ</button></a></td>
        </tr>
     <?php    
      $sum = $orderlist['product_price']*$orderlist['quantity'] + $sum;
      $sum2 =  $orderlist['quantity'] + $sum2;
    endforeach; $_SESSION['total_price'] = $sum;  $_SESSION['qty_total'] = $sum2;  ?>
        <tr >
        <td colspan="3" align = "right"><b>ราคารวมทั้งสิ้น</b></td>
        <td class="text-center"><?php echo number_format($sum, 2); ?></td>
        </tr>
        <tr>
        <td colspan="4">&nbsp;</td>
        <td align ="center"><a href="order_product.php"><button type="button" class="btn btn-primary btn-lg">&nbsp;&nbsp;&nbsp;สั่งสินค้า&nbsp;&nbsp;&nbsp;</button></a></td>
        </tr>
    </tbody>
</table>
<?php  
        }else{ ?>
        <h4>ตะกร้าสินค้าของท่าน</h4>
        <table class="table">
        <thead class="thead-dark">
            <tr>
            <th scope="col">สินค้า</th>
            <th scope="col">จำนวน</th>
            <th scope="col">ราคาต่อชิ้น</th>
            <th scope="col">ราคารวม</th>
            <th scope="col">ดำเนินการ</th>
            </tr>
        </thead>
        </table>
        <h5 class="text-center">-----ยังไม่มีสินค้า----</h5>
        <br><br><br><br><br><br><br><br><br><br><br><br><br><br>


  <?php  } ?>
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