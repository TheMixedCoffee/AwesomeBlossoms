<?php
if(isset($_POST['removeItemBtn'])){
    $itemName = $_POST['itemName'];
    $query = "DELETE FROM item WHERE itemName = '$itemName'";
    if(mysqli_query($conn,$query)){
        echo "<script> alert('Deleted item from database'); </script>";
    };
}
?>