<?php
$Email = '';
$conn = mysqli_connect('localhost',$user,$pass,$db);
 if(isset($_POST['loginBtn'])){
		$Email = $_POST['loginEmail'];
		$Password = $_POST['loginPassword'];

		
		$query = "SELECT * from account where Email='$Email' LIMIT 1";
		$rs = mysqli_query($conn,$query);
		$numRows = mysqli_num_rows($rs);
		if($numRows == 1){
			$row = mysqli_fetch_assoc($rs);
			if(password_verify($Password, $row['Password'])){
				$_SESSION['current_user'] = $row['Email'];
				$_SESSION['login_user'] = $row['FName'];
				$_SESSION['user_lname'] = $row['LName'];
				$_SESSION['user_address'] = $row['Address'];
				$_SESSION['user_number'] = $row['ContactNumber'];
				$_SESSION['user_type'] = $row['UserType'];
				$_SESSION['success'] = "You have logged in Successfully";
				
				header("location:Home.php?success=1");
			}else{
				$passError = "Incorrect Password";
				$script =  "<script> $(document).ready(function(){
									 $('#loginModal').modal('show');
									});
							</script>";
			}
		}else{
			$userError = "User does not exist";
			$script =  "<script> $(document).ready(function(){
							$('#loginModal').modal('show');
			   				});
	   					</script>";
		}

    }
?>