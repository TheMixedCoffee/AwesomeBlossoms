<?php
if(isset($_POST["remove"])){
    $itemID = $_POST['itemID'];
    $query = "DELETE from order_line where itemID='$itemID'";
                foreach ($_SESSION['cart'] as $key => $value){
                    if($value["itemID"] == $_GET['id']){
                        unset($_SESSION['cart'][$key]);
                    }
                }
                if(mysqli_query($conn,$query)){
                    header("location:ViewCart.php?action=removed&id='$itemID'");
                }else{
                    echo mysqli_error($conn);
                }
                
}

?>