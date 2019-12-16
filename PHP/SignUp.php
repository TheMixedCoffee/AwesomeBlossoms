<?php 
    global $activePage;
    $activePage = "SignUp";
    include("NavBar.php"); 
    include("SignUpConnect.php");
?>

<div class="container" id="signUpContainer" tabindex="-1">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title">Sign Up</h4>
					</div>
					<div class="modal-body">
						<form method = "POST" action="SignUp.php">
							<div class="form-group">
                                <label for="inputEmail">Email</label>
                                <input class="form-control" placeholder="Email" id="inputEmail" type="email" value="<?php echo $email;?>" required name="email">
                            </div>
                            <div class="form-group">
                                <label for="inputPassword" id="passwordLabel">Password</label> <?php include("SignUpError.php"); ?>
                                <input class="form-control" placeholder="Password" id="inputPassword" type="password" minlength="5" required name="password">
                            </div>
                            <div class="form-group">
                                <label for="inputUserName">Confirm Password</label>
                                <input class="form-control" placeholder="Confirm Password" id="inputConfirmPassword" type="password" required name="confirmPassword">
                            </div>
                            <div class="form-group">
                                <label for="inputPassword">First Name</label>
                                <input class="form-control" placeholder="First Name" id="inputFirstName" type="text" value="<?php echo $firstName;?>" name="firstName">
                            </div>
                            <div class="form-group">
                                <label for="inputUserName">Last Name</label>
                                <input class="form-control" placeholder="Last Name" id="inputLastName" type="text" value="<?php echo $lastName;?>" name="lastName">
                            </div>
                            <div class="form-group">
                                <label for="inputPassword">Address</label>
                                <input class="form-control" placeholder="Address" id="inputAddress" type="text" value="<?php echo $address;?>" name="address">
                            </div>
                            <div class="form-group">
                                <label for="inputUserName">Contact Number</label>
                                <input class="form-control" placeholder="Contact Number" id="inputContactNumber" type="text" value="<?php echo $contactNumber;?>" name="contactNumber">
							</div>
							<div class="modal-footer">
							<button class="btn btn-primary" name="signUp" id="signUpBtn">Sign Up</button>
						</form>
					</div>
					</div>
				</div>
            </div>
        </div>
        <?php include("Footer.php"); ?>