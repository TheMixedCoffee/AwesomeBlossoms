<?php
//var_dump($_POST);
include_once("ServerConnect.php");
if(isset($_POST['confirmAddBtn'])){
    $itemName = $_POST['addName'];
    $itemPrice = $_POST['addPrice'];
    $itemDesc = $_POST['addDesc'];
    $itemExp = $_POST['addExpandedDesc'];
    $itemStock = $_POST['addStock'];
    $itemPic = $_FILES['addPic'];
    $picName = $itemPic['name'];
    $picTempName = $itemPic['tmp_name'];
    $picError = $itemPic['error'];
    $picSize = $itemPic['size'];
    $picTempExt = explode(".", $picName);
    $picExt = strtolower(end($picTempExt));
    $allowedExt = array("jpg","jpeg","png");
    if(in_array($picExt, $allowedExt)){
        if($picError === 0){
            if($picSize < 200000){
                $picFullName = $picName;
                $picDest = "../Images/Shop" . $picFullName;
                if(empty($itemName) || empty($itemDesc)) {
                    header("Location:FlowerShopAdmin.php?upload=empty");
                    exit();
                }else{
                    $query = "SELECT * FROM item where itemName='$itemName';";
                    $stmt = mysqli_stmt_init($conn);
                    $dupItem = mysqli_query($conn,$query);
                    if(!mysqli_stmt_prepare($stmt,$query)){
                        echo "SQL Statement failed";
                    }else if(mysqli_num_rows($dupItem) == 0){
                        mysqli_stmt_execute($stmt);
                        $rs = mysqli_stmt_get_result($stmt);
                        $numRows  = mysqli_num_rows($rs);
                        $itemOrder = $numRows + 1;          
                        $query = "INSERT INTO item (itemName,itemDesc,itemExpDesc,itemPic,itemStock,itemPrice) VALUES (?,?,?,?,?,?);";
                        if(!$x = mysqli_stmt_prepare($stmt,$query)){
                            echo "<script> alert('XD $x') </script>";
                        }else{
                            mysqli_stmt_bind_param($stmt, "ssssid",$itemName,$itemDesc,$itemExp,$picFullName,$itemStock,$itemPrice);
                            mysqli_stmt_execute($stmt);
                            move_uploaded_file($picTempName,$picDest);
                       //   echo "sjikunma";
                            
                         //SET TAG
                       //  var_dump($_POST);
                      //   echo "<script> console.log('yeet') </script>";
                         $itemName = $_POST['addName'];
                         if(!empty($_POST['tag'])){
                      //     echo "<script> console.log('yeeters') </script>";
                             $itemIDQuery = "SELECT itemID FROM item WHERE itemName = '$itemName'";
                             $rs = mysqli_query($conn,$itemIDQuery);
                       //      echo $itemIDQuery;
                             $numRows = mysqli_num_rows($rs);
                             if($numRows == 1){
                          //     echo "<script> console.log('yeeteries') </script>";
                                 $itemDetails = mysqli_fetch_assoc($rs);
                                 $itemID = $itemDetails['itemID'];
                             }
                             foreach($_POST['tag'] as $selected){
                        //       echo "<script> console.log('wow') </script>";
                                 $getCategory = "SELECT category_id FROM category WHERE category_id= '$selected'";
                          //     echo "<script> console.log($selected) </script>";
                                $categoryRS =  mysqli_query($conn, $getCategory);
                                $categoryDetails = mysqli_fetch_assoc($categoryRS);
                                $categoryID = $categoryDetails['category_id'];
                                 $query = "INSERT INTO item_category (category_id,item_id) VALUES ('$categoryID', '$itemID')";
                                 mysqli_query($conn,$query);
                        //       echo $query;
                             }
                         }
                         //END OF SET TAG
                            header("Location:FlowerShopAdmin.php?upload=success");
                        }
                    }else{
                        header("Location:FlowerShopAdmin.php?upload=duplicate");
                        exit();
                    }
                }
            }else{
                header("Location:FlowerShopAdmin.php?upload=file");
                exit();
            }
        }else{
            header("Location:FlowerShopAdmin.php");
            exit();
        }
    }else{
        header("Location:FlowerShopAdmin.php?upload=fns");
        exit();
    }


}
?>