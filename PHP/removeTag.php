<?php
if(isset($_POST['removeTagBtn'])){
    $removeTag = $_POST['removeTag'];
    $dupTag = "SELECT * from category where cat_name='$removeTag'";
    $tagRS = mysqli_query($conn,$dupTag);
    $row = mysqli_fetch_assoc($tagRS);
    $temp = $row['active'];
    if(mysqli_num_rows($tagRS) && $temp == 1){
        $queryActive = "UPDATE category 
        SET active = 0 WHERE cat_name = '$removeTag'";
        mysqli_query($conn, $queryActive);
        header("location:FlowerShopAdmin.php?removedTag=1");
    }else{
        echo "<script> alert('Tag does not exist'); </script>";
        header("location::FlowerShopAdmin.php");
    }
}
?>