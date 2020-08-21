<?php
session_start();
$product_id = array();
if(filter_input(INPUT_POST, 'add_cart')){
   if(isset($_SESSION['shopping_cart'])){
       $count = count($_SESSION['shopping_cart']);
       $product_id = array_column($_SESSION['shopping_cart'],'id');
        if(!in_array(filter_input(INPUT_GET, 'id'),$product_id)){
            $_SESSION['cart_count'] += 1;
            $_SESSION['shopping_cart'][$count] = array
            (
            'id' => filter_input(INPUT_GET, 'id'),
            'name_model' => filter_input(INPUT_POST, 'name_model'),
            'name_band' => filter_input(INPUT_POST, 'name_band'),
            'quantity' => filter_input(INPUT_POST, 'quantity'),
            'product_price' => filter_input(INPUT_POST, 'product_price')
            );
        }else{
            for($i = 0;$i < count($product_id);$i++){
                if($product_id[$i] == filter_input(INPUT_GET, 'id')){
                    $_SESSION['shopping_cart'][$i]['quantity'] += filter_input(INPUT_POST, 'quantity');
                }
            }
        }
   }else{
    $_SESSION['cart_count'] = 1;
     $_SESSION['shopping_cart'][0] = array
     (
       'id' => filter_input(INPUT_GET, 'id'),
       'name_model' => filter_input(INPUT_POST, 'name_model'),
       'name_band' => filter_input(INPUT_POST, 'name_band'),
       'quantity' => filter_input(INPUT_POST, 'quantity'),
       'product_price' => filter_input(INPUT_POST, 'product_price')
     );
   }
  
}
header("location:market_index.php");
?>