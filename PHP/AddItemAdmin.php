<?php
include_once("ServerConnect.php");
if(isset($_POST['confirmAddBtn'])){
    $itemName = $_POST['addName'];
    $itemName = strtolower(str_replace(" ", "-", $itemName)); //Format name
    $itemPrice = $_POST['addPrice'];
    $itemDesc = $_POST['addDesc'];
    $itemExpDesc = $_POST['addExpDesc'];
    $itemStock = $_POST['addStock'];
    $itemPic = $_FILES['addPic'];
    $picName = $itemPic['name'];
    $picTempName = $itemPic['tmp_name'];
    $picError = $itemPic['error'];
    $picSize = $itemPic['size'];

    $picTempExt = explode(".", $picName);
    $picExt = strtolower(end($picTempExt));
    var_dump($_POST);
    $allowedExt = array("jpg","jpeg","png");
    if(in_array($picExt, $allowedExt)){
        if($picError === 0){
            if($picSize < 200000){
                $picFullName = $itemName . "."  . uniqid("", true) . "." . $picExt;
                $picDest = "../Images/Shop" . $picFullName;
                if(empty($itemName) || empty($itemDesc)) {
                    header("Location:FlowerShopAdmin.php?upload=empty");
                    exit();
                }else{
                    $query = "SELECT * FROM item;";
                    $stmt = mysqli_stmt_init($conn);
                    if(!mysqli_stmt_prepare($stmt,$query)){
                        echo "SQL Statement failed";
                    }else{
                        mysqli_stmt_execute($stmt);
                        $rs = mysqli_stmt_get_result($stmt);
                        $numRows = mysqli_num_rows($rs);
                        $itemOrder = $numRows + 1;          
                        $query = "INSERT INTO item (itemName,itemDesc,itemExpDesc,itemPic,itemStock,itemPrice) VALUES (?,?,?,?,?,?);";
                        if(!mysqli_stmt_prepare($stmt,$query)){
                            echo "SQL Statement failed";
                        }else{
                            mysqli_stmt_bind_param($stmt, "sssid",$itemName,$itemDesc,$itemExpDesc,$picFullName,$itemStock,$itemPrice);
                            mysqli_stmt_execute($stmt);
                            move_uploaded_file($picTempName,$picDest);
                           // header("Location:FlowerShopAdmin.php?upload=success");
                        }
                    }
                }
            }else{
                echo "File size is too big";
                exit();
            }
        }else{
            echo "Oof! Error";
            exit();
        }
    }else{
        echo "File type not supported";
        exit();
    }



}
?>