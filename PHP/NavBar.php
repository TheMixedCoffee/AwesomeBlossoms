<?php
	include('ServerConnect.php'); //Connect to the db
	include('LogInConnect.php'); //Login
?>
<?php
				if($activePage == "Home"){
					echo '<style type="text/css">
						#homeNav{
							background-color:rgb(170, 183, 174);
							font-weight:bold;
							</style>';
				}else if($activePage == "PurchaseFlowers"){
					echo '<style type="text/css">
					#pfNav{
						background-color:rgb(170, 183, 174);
						font-weight:bold;
						</style>';
				}else if($activePage == "Flower Book"){
					echo '<style type="text/css">
						#fbNav{
							background-color:rgb(170, 183, 174);
							font-weight:bold;
							</style>';
				}else if($activePage == "Contact Us"){
					echo '<style type="text/css">
						#contactNav{
							background-color:rgb(170, 183, 174);
							font-weight:bold;
							</style>';
				}else if($activePage == "Profile"){
					echo '<style type="text/css">
						#profileNav{
							background-color:rgb(170, 183, 174);
							font-weight:bold;
							</style>';
				}
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="../Styles/HeaderNew.css">
	<link rel="stylesheet" type="text/css" href="../Styles/Footer.css">
    <link rel="shortcut icon" type="image/png" href="../Images/Icons/Logo/favicon.png">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link href="https://fonts.googleapis.com/css?family=Playfair+Display&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.js" integrity="sha256-BTlTdQO9/fascB1drekrDVkaKd9PkwBymMlHOiG+qLI=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<script src="../Scripts/keepModal.js"></script>
	<script src="../Scripts/redirect.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Awesome Blossoms - <?php echo $activePage ?></title>
</head>
<body>
	<div class="container-expand">
		<div class="row-header">
			<div class="logo-title">
				<img src="../Images/Icons/Logo/AwesomeBlossomsLogo.png" alt="Awesome Blossoms Logo" class="logo-header">
			</div>
			<!-- <div class="header-banner">
				<img src="../Images/Icons/banner.png" alt="Awesome Blossoms Banner" class="banner-header">
			</div> -->
		</div>
		<div class="row" id="rowID">
			<div class="col" id="homeNav"><a href="Home.php">Home</a></div>
			<div class="col" id="pfNav"><a href="FlowerStore.php">Purchase Flowers</a></div>
			<div class="col" id="fbNav"><a href="FlowerBook.php">Flower Book</a></div>
			<div class="col" id="contactNav"><a href="ContactUs.php">Contact Us</a></div>
			<div class="col">
				<div class="dropdown" id="profileNav"><?php if(isset($_SESSION['success'])){
														echo $_SESSION['login_user'];
												}else{
													echo "Profile";
												}
												?>
												</div>
				<div class="dropdown-content">
					<?php
							if(!isset($_SESSION['success'])){
								if($activePage != "SignUp"){
									echo "<button type='button' onClick='redirect(`SignUp.php`)'class='btn-profile'> Sign Up </button>";
								}
								echo "<button type='submit' class='btn-profile' data-target='#loginModal' data-toggle='modal'>Login</button>";
							}else{
								echo "<button class='btn-profile' name='viewProfileBtn' onClick='redirect(`Profile.php`)'>View Profile</button>";
								?>
								<form method="POST" action="Logout.php">
								<?php
								echo "<button type='submit' class='btn-profile'>Logout</a></button>";
							}
						?>
						</form>
				</div>
			</div>
		</div>
		<div class="modal fade" id="loginModal" tabindex="-1">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title">Login</h4>
						<button class="close" data-dismiss="modal">&times;</button>
					</div>
					<div class="modal-body">
						<form method="POST" action="Home.php">
							<div class="form-group">
							<?php include ("LoginError.php"); ?>
                                <label for="loginUserName">Email</label>
                                <input class="form-control" placeholder="Email" id="loginEmail" type="email" required name="loginEmail" value="<?php echo $Email; ?>">
                            </div>
                            <div class="form-group">
                                <label for="loginPassword">Password</label>
                                <input class="form-control" placeholder="Password" id="loginPassword" type="password" name="loginPassword">
                            </div>
					</div>
					<div class="modal-footer">
						<a href="SignUp.php"> Don't have an account? Click here to register </a>
						<?php
								echo "<button type='submit' class='btn btn-primary' name='loginBtn'>Login</button>";
						?>
						<button class="btn btn-primary" data-dismiss="modal">Close</button>
					</div>
					</form>
				</div>
			</div>
		</div>
	</div>
<?php if(isset($script)){ echo $script; } ?>