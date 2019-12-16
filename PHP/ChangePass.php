<?php
if(isset($_POST['confirmChangePass'])){
    $currUser = $_SESSION['current_user'];
    $Password = $_POST['currPass'];
    $newQuery = "SELECT * from account where Email='$currUser' LIMIT 1";
		$rs = mysqli_query($conn,$newQuery);
		$numRows = mysqli_num_rows($rs);
		if($numRows == 1){
            $row = mysqli_fetch_assoc($rs);
            $oldPassword = $row['Password'];
            if(password_verify($Password, $oldPassword)){
                $newPass = $_POST['newPass'];
                $confirmNewPass = $_POST['confirmNewPass'];
                if(strcmp($confirmNewPass,$newPass)==0){
                    $userPassword = password_hash($newPass, PASSWORD_DEFAULT);
                    $sql = "UPDATE account SET Password = '$userPassword' WHERE Email='$currUser'";
                    mysqli_query($conn,$sql);
                    echo "<script type='text/javascript'> alert('Updated successfully') </script>";
                }else{
                    $noMatch = "Password must match";
                    $script =  "<script> $(document).ready(function(){
                        $('#passModal').modal('show');
                           });
                       </script>";
                }
            }else{
            $wrongPass = "Incorrect password";
            $script =  "<script> $(document).ready(function(){
                $('#passModal').modal('show');
                   });
               </script>";
        }
    }
}
?>