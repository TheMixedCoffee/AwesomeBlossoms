<?php
if(isset($_POST['add'])){
    if(isset($_SESSION['cart'])){
        $item_array_id = array_column($_SESSION['cart'], "itemID");
        if(in_array($_POST['itemID'],$item_array_id)){
            echo "<script> alert('Item already in cart'); </script>";
        }else{
            $numItems = count($_SESSION['cart']);
            $item_array = array(
                'itemID' => $_POST['itemID']
            );
            $_SESSION['cart'][$numItems] = $item_array;
        }
    }else{
        $item_array = array(
            'itemID' => $_POST['itemID']
        );
        $_SESSION['cart'][0] = $item_array;
    }
}