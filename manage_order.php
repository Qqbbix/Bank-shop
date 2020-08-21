<?php 
session_start(); 
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
.table-wrapper-scroll-y {
display: block;
max-height: 150px;
overflow-y: auto;
-ms-overflow-style: -ms-autohiding-scrollbar;
}



.table-wrapper-scroll-y2 {
display: block;
max-height: 300px;
overflow-y: auto;
-ms-overflow-style: -ms-autohiding-scrollbar;
}
    </style>
    <title>จัดการสั่งสินค้า</title>
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

        <div class = "mr-3 ml-3" style="min-height: 300px;" >
            <div class="row">
            <div class="card border-light col-12" style =" width: auto;">
                <div class="card-header"><h4>รายการสั่งสินค้า</h4></div>
                    <div class="card-body">
                    <nav class="navbar navbar-light bg-light">
                    <form action="manage_order.php" method = "POST">
                        <div class = "row">

                        <input type="text" class="form-control col-3 mr-2"  name="search_text"  placeholder="ค้นหา">
                        <input type="text" class="form-control col-2 mr-2"  name="search_date1" placeholder="ปี-เดือน-วัน"> <h5 class = "mt-1 mr-2">ถึง</h5>
                        <input type="text"  class="form-control col-2 mr-2" name="search_date2" placeholder="ปี-เดือน-วัน">
                        <select name="order_type" class="form-control col-2 mr-2" >
                        <option value="ทั้งหมด">ทั้งหมด</option>
                        <option value="ยังไม่ได้จัดส่ง">ยังไม่ได้จัดส่ง</option>
                        <option value="จัดส่งแล้ว">จัดส่งแล้ว</option>
                        </select>
                        <input type="submit"  class="form-control col-2 mr-2 btn btn-outline-success" name="submit_search" value="ค้นหา">
                        </div>
                    </form>
                   </nav>
                   <div class = "table-wrapper-scroll-y2">
                   <table class="table">
                        <thead>
                            <tr>
                            <th width = 10%>วันที่สั่ง</th>
                            <th width = 10%>หมายเลขสั่งซื้อ</th>
                            <th width = 10%>ชื่อลูกค้า</th>
                            <th width = 10%>จำนวนสินค้า</th>
                            <th width = 10%>ราคารวม</th>
                            <th width = 10%>สถานะ</th>
                            <th width = 10%>วันที่จัดส่ง</th>
                            <th width = 10%>ดำเนินการ</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                        if($_SESSION['hold'] == 1){
                            $sql2 = "SELECT * FROM orders_view ";
                            $_SESSION['sql'] =  $sql2;
                            $_SESSION['hold'] = 0;
                        }
                     
                        if(isset($_POST['submit_search'])){
                        if(isset($_POST['search_text']) && isset($_POST['search_date1']) && isset($_POST['search_date2']) && isset($_POST['search_date2']) && isset($_POST['order_type'])
                            && $_POST['search_text'] != "" && $_POST['search_date1'] != "" && $_POST['search_date2'] != "" && $_POST['order_type'] != ""){
                              if($_POST['order_type'] == 'ทั้งหมด'){
                                $sql2 = "SELECT * FROM orders_view WHERE (order_date BETWEEN '".$_POST['search_date1']."' AND '".$_POST['search_date2']."') AND (order_id LIKE '%".$_POST['search_text']."%' OR cus_name LIKE '%".$_POST['search_text']."%' )";
                                $_SESSION['sql'] =  $sql2;
                              }else{
                                 $sql2 = "SELECT * FROM orders_view WHERE (order_date BETWEEN '".$_POST['search_date1']."' AND '".$_POST['search_date2']."' AND order_status = '".$_POST['order_type']."') AND (order_id LIKE '%".$_POST['search_text']."%' OR cus_name LIKE '%".$_POST['search_text']."%' )";
                                 $_SESSION['sql'] =  $sql2;
                              }
                        }else if($_POST['order_type'] != "" && $_POST['search_date1'] == "" && $_POST['search_date2'] == "" && $_POST['search_text'] == "" ){
                             if ($_POST['order_type'] == "ยังไม่ได้จัดส่ง") {
                                $sql2 = "SELECT * FROM orders_view WHERE order_status = 'ยังไม่ได้จัดส่ง'";
                                $_SESSION['sql'] =  $sql2;
                             }else if($_POST['order_type'] == "จัดส่งแล้ว"){
                                $sql2 = "SELECT * FROM orders_view WHERE order_status = 'จัดส่งแล้ว'";
                                $_SESSION['sql'] =  $sql2;
                             }else{
                                $sql2 = "SELECT * FROM orders_view ";
                                $_SESSION['sql'] =  $sql2;
                             }

                        }else if($_POST['order_type'] != "" && $_POST['search_date1'] != "" && $_POST['search_date2'] != "" && $_POST['search_text'] == ""){
                            if ($_POST['order_type'] == "ยังไม่ได้จัดส่ง") {
                                $sql2 = "SELECT * FROM orders_view WHERE order_status = 'ยังไม่ได้จัดส่ง' AND order_date BETWEEN '".$_POST['search_date1']."' AND '".$_POST['search_date2']."'  ";
                                $_SESSION['sql'] =  $sql2;
                             }else if($_POST['order_type'] == "จัดส่งแล้ว"){
                                $sql2 = "SELECT * FROM orders_view WHERE order_status = 'จัดส่งแล้ว' AND order_date BETWEEN '".$_POST['search_date1']."' AND '".$_POST['search_date2']."'";
                                $_SESSION['sql'] =  $sql2;
                             }else{
                                $sql2 = "SELECT * FROM orders_view WHERE order_date BETWEEN '".$_POST['search_date1']."' AND '".$_POST['search_date2']."'";
                                $_SESSION['sql'] =  $sql2;
                             }
                        }else if($_POST['order_type'] == "ทั้งหมด" && $_POST['search_date1'] == "" && $_POST['search_date2'] == "" && $_POST['search_text'] != ""){
                            $sql2 = "SELECT * FROM orders_view WHERE order_status LIKE '%".$_POST['search_text']."%' OR order_id LIKE '%".$_POST['search_text']."%'  OR cus_name LIKE '%".$_POST['search_text']."%' OR cus_name LIKE '%".$_POST['search_text']."%' OR customer_name LIKE '%".$_POST['search_text']."%' OR price_total LIKE '%".$_POST['search_text']."%' OR ship_date LIKE '%".$_POST['search_text']."%' 
                            OR qty_total LIKE '%".$_POST['search_text']."%'";
                            $_SESSION['sql'] =  $sql2;
                        }else{
                            $sql2 = "SELECT * FROM orders_view ";
                            $_SESSION['sql'] =  $sql2;
                        }
                        } 
                        unset($_POST['submit_search']);

                            $sql = $_SESSION['sql'];
                            $result = mysqli_query($conn, $sql);
                            if(mysqli_num_rows($result) > 0){
                                while($row = mysqli_fetch_array($result)):
                        ?>
                        <form action="order_detail_update.php" method = "POST">
                            <tr>
                            <td><?php echo $row['order_date'];  ?></td>
                            <td><?php echo $row['order_id'];  ?></td>
                            <td><?php echo $row['cus_name'].' '.$row['customer_name'];  ?></td>
                            <td><?php echo $row['qty_total'];  ?></td>
                            <td><?php echo $row['price_total'];  ?></td>
                            <td><?php echo $row['order_status'];  ?></td>
                            <td><?php echo $row['ship_date'];  ?></td>
                            <td> 
                            <div class = "row">
                            
                                <input type="hidden" name = "update_order_id" value = "<?php echo $row['order_id']; ?>">    
                               <input type="submit" name = "update_submit" value="อัปเดต" class= "btn btn-primary mr-1">
                            </form>
                                <form action="manage_order.php" method = "POST">
                                <input type="hidden" name = "order_id" value = "<?php echo $row['order_id'];  ?>">
                                <input type="hidden" name = "order_cus_name" value = "<?php echo $row['cus_name'];  ?>">
                                <input type="hidden" name = "order_cus_surname" value = "<?php echo $row['customer_name'];  ?>">
                                <input type="submit" name = "show_submit" value="แสดง" class= "btn btn-success">
                                </form>
                            
                            </div>
                            </td>
                            </tr>
                            <?php   
                            endwhile;
                            }?>
                        </tbody>
                    </table>
                    </div>
                    </div>
                </div>
            </div>     
        </div>
        <?php  
        
        
        if(isset($_POST['order_id']) && $_POST['order_id'] != "" ){
        ?>
       <div class = "mr-3 ml-3" >
            <div class="row">
            <div class="card border-light col-12" style =" width: auto;">
                <div class="card-header">
                <b><p>หมายเลขสั่งซื้อ:&nbsp;&nbsp;<?php echo $_POST['order_id'].'     '; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;นาย:&nbsp;&nbsp;<?php echo $_POST['order_cus_name'].' '. $_POST['order_cus_surname']; ?></p></b>
                </div>
                    <div class="card-body">
                    <div class = "table-wrapper-scroll-y">
                   <table class="table">
                        <thead>
                            <tr>
                            <th width = 10%>รหัสสินค้า</th>
                            <th width = 10%>ขื่อสินค้า</th>
                            <th width = 10%>ราคาต่อชิ้น</th>
                            <th width = 10%>จำนวน</th>
                            <th width = 10%>ส่วนลด</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php 
                            $text  = $_POST['order_id'];
                            $sql = "SELECT * FROM `order_detail_view` WHERE `order_id` = '".$text."'";

                            
                            $result = mysqli_query($conn, $sql);
                            if(mysqli_num_rows($result) > 0){
                                while($row = mysqli_fetch_array($result)):
                        ?>
                            <tr>
                            <td><?php echo $row['p_id'];  ?></td>
                            <td><?php echo $row['p_model'].' '.$row['p_band'];  ?></td>
                            <td><?php echo $row['p_price'];  ?></td>
                            <td><?php echo $row['qty'];  ?></td>
                            <td><?php echo $row['discount'];  ?></td>                    
                            </tr>
                            <tr>
                            <?php   
                            endwhile;
                            }?>
                        </tbody>
                    </table>
                    </div>
                    </div>
                </div>
            </div>     
        </div>

                        <?php   }else{?>
                            <div class = "mr-3 ml-3" >
                                <div class="row">
                                <div class="card border-light col-12" style =" width: auto;">
                                    <div class="card-header">
                                    <b><p>หมายเลขสั่งซื้อ:&nbsp;&nbsp;นาย:&nbsp;&nbsp;</p></b>
                                    </div>
                                        <div class="card-body">
                                        <div class = "table-wrapper-scroll-y">
                                    <table class="table">
                                            <thead>
                                                <tr>
                                                <th width = 10%>รหัสสินค้า</th>
                                                <th width = 10%>ขื่อสินค้า</th>
                                                <th width = 10%>ราคาต่อชิ้น</th>
                                                <th width = 10%>จำนวน</th>
                                                <th width = 10%>ส่วนลด</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                  
                                            </tbody>
                                        </table>
                                        </div>
                                        </div>
                                    </div>
                                </div>     
                            </div>
                        <?php   }?>
<br>
                

























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