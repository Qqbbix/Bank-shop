<?php   
session_start();
$_SESSION['name_search'] = $_POST['name_search'];
$_SESSION['page01'] = 0;
$_SESSION['page02'] = 0;
$_SESSION['page03'] = 0;
$_SESSION['page04'] = 0;
$_SESSION['page05'] = 0;
header("Location: http://it2.sut.ac.th/CMS61_G28/g28/market_index.php");
?>