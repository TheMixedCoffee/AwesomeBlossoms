<?php
if(isset($_POST['updateItemBtn'])){
    //BASIC INFO QUERY
    include_once("ServerConnect.php");
    $itemName = $_POST['itemName'];
    $itemDesc = $_POST['itemDesc'];
    $itemPrice = $_POST['itemPrice'];
    $itemStock = $_POST['itemStock'];
    $itemExpDesc = $_POST['itemExpDesc'];
    $stmt = mysqli_stmt_init($conn);
    $query = "UPDATE item SET itemDesc = ?, itemPrice = ?, itemStock = ?, itemExpDesc = ? WHERE itemName = ?";
    if(mysqli_stmt_prepare($stmt,$query)){
        mysqli_stmt_bind_param($stmt, "sdiss",$itemDesc,$itemPrice,$itemStock,$itemExpDesc,$itemName);
        mysqli_stmt_execute($stmt);
        header("Location:FlowerShopAdmin.php?edited=1");   
        }else{
            echo mysqli_error($conn);
     }
 }


if(isset($_POST['removeItemBtn'])){
    include_once("ServerConnect.php");
    $itemName = $_POST['itemName'];
    $query = "DELETE FROM item WHERE itemName = '$itemName'";
    if(mysqli_query($conn,$query)){
        header("Location:FlowerShopAdmin.php?removed=1");
    }
}
?>