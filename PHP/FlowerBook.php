<?php
	$activePage = "Flower Book";
?>
<!DOCTYPE html>
<head>
	<title>Awesome Blossoms - Flower Book</title>
	<link rel="stylesheet" type="text/css" href="../Styles/FlowerBook.css">
	<link rel="shortcut icon" type="image/png" href="../Images/Icons/Logo/favicon.png"/>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
	<!--Content Box-->
	<?php
	include("NavBar.php");
	if(!isset($_GET['page'])){
		$page = 1;
	}else{
		$page = $_GET['page'];
	}
	?>
	<div class="container-fluid">
		<div class="container-wrap">
			<!--End of Header-->
			<!--Flower Book div-->
			<div class="book-section">
				<div>
					<div id="category-dropdown">
						<h6 id="category-title">Select a Category</h6>
						<select name="category">
							<option value ="fotm">Flowers of the Month</option>
							<option value ="alpha">Alphabetical</option>
							<option value ="events">Events</option>
							<option value ="bouquet">Bouquet</option>
						</select>
					</div>
				</div>
				<div class="contain row text-center">
					<h2 id="book-header">Flower Book</h2>
					<div id="book-window row text-center">
						<?php
						$resultsPerPage = 15;
						$startQuery = "SELECT * FROM item";
						$startRS = mysqli_query($conn,$startQuery);
						$numRS = mysqli_num_rows($startRS);
						$numPages = ceil($numRS/$resultsPerPage);
						$startingNum = ($page-1)*$resultsPerPage;
						$query = "SELECT * FROM item ORDER BY itemName DESC LIMIT ".$startingNum. ',' .$resultsPerPage;
						$stmt = mysqli_stmt_init($conn);
						if(!mysqli_stmt_prepare($stmt,$query)){
							echo "SQL statement failed!";
						}else{
							mysqli_stmt_execute($stmt);
							$rs = mysqli_stmt_get_result($stmt);
							while($row = mysqli_fetch_assoc($rs)){
								$currentItem = $row["itemID"];
								echo '<div class="item-entity col-md-3">
									<h3 class="item-title"> '.$row["itemName"].' </h3>
									<img src="../Images/Shop/'.$row["itemPic"].'" class="card-img-top" alt="...">
										<div class="card-body">
											<p class="item-desc">'.$row["itemDesc"].'</p>
											<button type="button" class="btn btn-primary btn-sm" data-target="#cat'.$row["itemID"].'" data-toggle="modal">Read More</button>
                       					</div>
										<div>
											Tags:';
                                            $queryAllTags = "SELECT * FROM category ORDER BY cat_name ASC";
                                            $resultAllTags = mysqli_query($conn, $queryAllTags);
                                            $queryItemTags = "SELECT * FROM item_category WHERE item_id = '$currentItem'";
                                            $resultItemTags = mysqli_query($conn, $queryItemTags);
                                            $rowTag = mysqli_fetch_assoc($resultItemTags);
                                             while($rowAll = mysqli_fetch_assoc($resultAllTags))
                                            {
                                                if($rowAll["category_id"] == $rowTag["category_id"]){
                                                    echo "     ".$rowAll["cat_name"];
                                                    $rowTag = mysqli_fetch_assoc($resultItemTags);
												}
											}
											echo '
										</div>
								</div>
								<div class="modal fade" id="cat'.$row["itemID"].'" tabindex="-1">
												<div class="modal-dialog">
													<div class="modal-content">
														<div class="modal-header">
															<h4 class="modal-title">'.$row["itemName"].'</h4>
															<button class="close" data-dismiss="modal">&times;</button>
														</div>
														<div class="modal-body">
															<img src="../Images/Shop/'.$row["itemPic"].'" class="item-image" alt="Item Image"><br><br>
															<p>'.$row["itemExpDesc"].'</p>
														</div>
														<div class="modal-footer">
															<button class="btn btn-primary" data-dismiss="modal">Close</button>
														</div>
													</div>
												</div>
											</div>';
			}
		}    
		 ?>   
		 </div>
						<div class="pagination">
							<a href="#"> &laquo; </a>
							<?php
							for($page=1;$page <= $numPages; $page++){
								echo '<a href="FlowerBook.php?page=' . $page . '">' .$page. '</a>';
							}						
							?>
							<a href="#"> &raquo; </a>
						</div>         
					</div>
				</div>
			</div>
			<!--End of Book div-->
			<!--Footer-->
			<!--End of Content-->
			<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
			<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
			<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
		</body>
		</html>