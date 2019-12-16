<?php
    $activePage = 'Flower Shop - Admin';
    if(isset($_GET['addedTag'])){
        echo "<script> alert('Tag added to database!') </script>";
    }else if(isset($_GET['activeTag'])){
        echo "<script> alert('Tag activated') </script>";
    }else if(isset($_GET['removedTag'])){
        echo "<script> alert('Tag is removed from database') </script>";
    }else if(isset($_GET['duplicate'])){
        echo  "<script> alert('Item already exists') </script>";
    }else if(isset($_GET['file'])){
        echo  "<script> alert('Image file size is too large') </script>";
    }else if(isset($_GET['fns'])){
        echo  "<script> alert('File type not supported') </script>";
    }else if(isset($_GET['edited'])){
        echo "<script> alert('Updated successfully'); </script>";
    }else if(isset($_GET['removed'])){
        echo "<script> alert('Deleted item from database'); </script>";
    }
?>
<?php include("NavBar.php"); ?>
<?php include("removeTag.php"); ?>
<?php include("AddTag.php"); ?>
<?php include("NewAddItemAdmin.php"); ?>
<?php include("EditItemAdmin.php"); ?>


    <head>
        <link rel="stylesheet" type="text/css" href="../Styles/PurchaseAdmin.css">
        <?php 
        $curr = $_SESSION['current_user'];
        if(empty($curr)){
            header('Location:ServerError.php?invalid=1');
        }
       $admin = "SELECT UserType from account where Email='$curr'";
       $adminRS = mysqli_query($conn,$admin);
       if(mysqli_num_rows($adminRS) == 1){
        $row = mysqli_fetch_assoc($adminRS);
        $test = $row['UserType'];
        if(strcmp($row['UserType'],"admin") == 0){
            echo "<script> alert('IMPORTANT: You are accessing the flower shop database'); </script>";
        }else{
            header('location:ServerError.php?invalid=1');
        }
       }
        ?>
    </head>
    <body>
    <div class="row" id="admin-option">
            <div class="col">
                        <form action='NewAddItemAdmin.php' method='POST' id='addForm' enctype='multipart/form-data'>
                            <label for='itemName'> Item Name </label>
                            <input type ='text' id='addName' name='addName' required>
                            <br>
                            <label for='itemPrice'> Item Price </label>
                            <input type = 'number' min='0' id='addPrice' name='addPrice' required>
                            <br>
                            <label for='itemDesc'> Item Description </label>
                            <input type='text' id='addDesc' name='addDesc' required>
                            <br>
                            <label for='itemExpDesc'> Expanded Item Description (Flower Book) </label>
                            <input type='text' id='addExpDesc' name='addExpandedDesc' required>
                            <br>
                            <label for='itemPic'>Item Picture</label>
                            <input type='file' id='addPic' name='addPic' required>
                            <br>
                            <label for='itemStock'> Item Stock </label>
                            <input type='number' min='0' id='addStock' name='addStock' required>
                            <br>
                            <label for='itemTags'> Tags </label>
                            <br>
                            <?php 
                            $query = "SELECT * FROM category ORDER BY cat_name ASC";
                            $result = mysqli_query($conn, $query);
                             while($row = mysqli_fetch_assoc($result))
                            {
                                if($row["active"] == 1){
                                    echo '<input type="checkbox" class="form-check-input" value="'.$row["category_id"].'" name="tag[]">';
                                    echo '<label class="form-check-label" for="'.$row["category_id"].'">'.$row["cat_name"].'</label>';
                                    echo '<br>';
                                }
                            }
                            ?>
                            <br>
                            <br>
                            <button type='submit' name='confirmAddBtn' id='confirmAddBtn'> Add Item to Database</button>
                        </form>
            </div>
            <div class="col">

            <form method="POST" id='addTagForm'>
                            <label for='createNewTag'> Create New Tag </label>
                            <input type='text' id='addNewTag' name='newTagName'>
                            <button type='submit' name='addNewTag'>Add New Tag</button>
            </form>
            
            <form method="POST" id='deleteTagForm'>
               <label for='removeTag'> Remove Tag </label>
               <input type='text' id='removeTag' name='removeTag'>
               <button type='submit' name='removeTagBtn'>Remove Tag</button>
            </div>
    </div>
        <div class="row">
        <?php
        $query = "SELECT * FROM item ORDER BY itemName DESC";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt,$query)){
            echo "SQL statement failed!";
        }else{
            mysqli_stmt_execute($stmt);
            $rs = mysqli_stmt_get_result($stmt);
            while($row = mysqli_fetch_assoc($rs)){
                $currentItem = $row["itemID"];
                echo '<form method="POST" action="EditItemAdmin.php">
                <div class="col-4">
                <div class="card" style="width: 18rem;">
                    <img src="../Images/Shop/'.$row["itemPic"].'" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5> <input type="text" class="card-title" value="'.$row["itemName"].'" name="itemName"></h5>
                            <input type="text area" class="card-text" value="'.$row["itemDesc"].'" name="itemDesc">
                            <input type="text area" value="'.$row["itemExpDesc"].'" name="itemExpDesc">
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item"><input type="text" class="card-text" value='.$row["itemPrice"].' name="itemPrice"></li>
                            <li class="list-group-item"><input type="text" class="card-text" value='.$row["itemStock"].' name="itemStock"></li>
                        </ul>
                        <div class="card-body">
                            <button type="submit" class="btn btn-primary" name="removeItemBtn">Remove from Shop</button>
                            <button type="submit" class="btn btn-primary" name="updateItemBtn">Update</button>
                            <div class="card-footer text-muted">
                                            Tags
                                            <br>';
                                            $queryAllTags = "SELECT * FROM category ORDER BY cat_name ASC";
                                            $resultAllTags = mysqli_query($conn, $queryAllTags);
                                            $queryItemTags = "SELECT * FROM item_category WHERE item_id = '$currentItem'";
                                            $resultItemTags = mysqli_query($conn, $queryItemTags);
                                            $rowTag = mysqli_fetch_assoc($resultItemTags);
                                             while($rowAll = mysqli_fetch_assoc($resultAllTags))
                                            {
                                                if($rowAll["category_id"] == $rowTag["category_id"]){
                                                    echo '<input type="checkbox" class="form-check-input" value="'.$rowAll["category_id"].'" name="tag[]" checked>';
                                                    echo '<label class="form-check-label" for="'.$rowAll["category_id"].'">'.$rowAll["cat_name"].'</label>';
                                                    echo '<br>';
                                                    $rowTag = mysqli_fetch_assoc($resultItemTags);
                                                }else{
                                                    echo '<input type="checkbox" class="form-check-input" value="'.$rowAll["category_id"].'" name="tag[]">';
                                                    echo '<label class="form-check-label" for="'.$rowAll["category_id"].'">'.$rowAll["cat_name"].'</label>';
                                                    echo '<br>';
                                                }
                                                }
                                            echo '</div>
                                            </div>
                                         </div>
                                        </div>
                                         </form>';
                                            }
                                        }
         ?>   
          </div>
        <!--End of Content-->
    </body>
</html>