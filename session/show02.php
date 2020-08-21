<?php   
session_start();
$_SESSION['page02'] = 1;
$_SESSION['page01'] = 0;
$_SESSION['page03'] = 0;
$_SESSION['page04'] = 0;
$_SESSION['page05'] = 0;
$_SESSION['name_search'] = '';
header("Location: http://it2.sut.ac.th/CMS61_G28/g28/market_index.php");
exit();
?>