<!DOCTYPE html>
<head>
<link rel="stylesheet" type="text/css" href="../Styles/Profile.css">
<body>
<?php
$activePage = "Profile";
include ("NavBar.php");
?>
<?php include("ChangePass.php"); ?>
<!-- Profile -->
<section class = "profile-section">
                    <h2 id="profile-header">Profile</h2>
                    <div class="modal fade" id="editModal" tabindex="-1">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title">Edit Profile</h4>
						<button class="close" data-dismiss="modal">&times;</button>
					</div>
					<div class="modal-body">
						<form method="POST" action="Profile.php">
							<div class="form-group">
                            <?php
                             include ("EditProfile.php");
                            ?>
                            First Name:<input type='text' id='newFName' name='newFName' value="<?php echo $_SESSION['login_user']; ?>">
                           
                            </div>
                            <div class="form-group">
                            Last Name: <input type='text' id='newLName' name='newLName' value="<?php echo $_SESSION['user_lname']; ?>"> 
                            </div>
                            <div class="form-group">
                            Address: <input type='text' id='newAddress' name='newAddress' value="<?php echo $_SESSION['user_address']; ?>"> 
                            </div>
                            <div class="form-group">
                            Contact Number:<input type='number' id='newNumber' name='newNumber' value="<?php echo $_SESSION['user_number']; ?>"> 
                            </div>
					</div>
					<div class="modal-footer">
                        <button type='submit' class='btn btn-primary' name='confirmEdit'>Edit Profile</button>
						<button class="btn btn-primary" data-dismiss="modal">Close</button>
					</div>
					</form>
				</div>
			</div>
        </div>
        <div class="modal fade" id="passModal" tabindex="-1">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title">Change Password</h4>
						<button class="close" data-dismiss="modal">&times;</button>
					</div>
					<div class="modal-body">
						<form method="POST" action="Profile.php">
                            <div class="form-group">
                            <?php include ("ChangePassError.php"); ?>
                            <label for="currPass"> Input Current Password:</label>
                            <input type="password" name="currPass" required>
                            </div>
                            <div class="form-group">
                            <label for="newPass"> Input New Password:</label>
                            <input type="password" name="newPass" required>
                            </div>
                            <div class="form-group">
                            <label for="confirmPass"> Confirm New Password:</label>
                            <input type="password" name="confirmNewPass" required>
                            </div>
					</div>
					<div class="modal-footer">
                        <button type='submit' class='btn btn-primary' name='confirmChangePass'>Change Password</button>
						<button class="btn btn-primary" data-dismiss="modal">Close</button>
					</div>
					</form>
				</div>
			</div>
        </div>
                  	<div class="profile-content">
                      <p>Complete Name: <?php echo $_SESSION['login_user']; ?> <?php echo $_SESSION['user_lname']; ?> </p>
                  		<p>Address: <?php echo $_SESSION['user_address']; ?></p>
                  		<p>Email: <?php echo $_SESSION['current_user']; ?></p>
                      <p>Contact Number: <?php echo $_SESSION['user_number']; ?></p>
                      <form method="POST">
                      <button type="button" class='btn-edit' data-target='#editModal' data-toggle='modal' name="editProfileBtn">Edit Profile</button>
                      <button type="button" class='btn-edit' data-target='#passModal' data-toggle='modal' name="changePassBtn">Change Password</button>
                    </form>
                    </div>

               </section>


<!-- Footer -->
<?php if(isset($script)){ echo $script; } ?>
<?php include("Footer.php"); ?>
