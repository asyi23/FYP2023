<?php
session_start();
// include("include/configuration.php");
include("connect.php");
?>

<!DOCTYPE html>
<html>

<head>
	<title>Pelayaran Auto Care Service Center</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<!--<link rel="stylesheet" type="text/css" href="css/w3.css">
	<link rel="stylesheet" type="text/css" href="css/jquery-ui.css"> -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
<!-- Header -->
 
<!-- Navigation Menu -->
	<header> 
	<?php
		include("include/topNav.php");
	?>
	</header>	

<!-- Category Navigation [Fixed position] -->
		<nav class="catNav">
			<?php
			include("include/catNav.php");
			?>	
		</nav>

<!-- Page Content Welcome Image -->
	<div class="welcome">
		<h1>Welcome to Pelayaran Tyre Service Center Auto Store</h1>	
	</div>
<!-- Page Content Left Column 
	<div class="col-secLeft">
		<h2>GOOD DEALS</h2>
	</div>
Page Content Right Column 
	<div class="col-secRight">
		<h2>BEST SELLER</h2>
	</div> -->
<!-- Page Content: Display Product -->
	<div class="col-mid">
		<?php
		$sql = "SELECT * from product";
		$result = mysqli_query($conn, $sql);
		if ($result->num_rows > 0) {
          while($row = $result->fetch_assoc()) { 
            $id = $row["product_id"];
        ?>
          	<img src = "<?php echo htmlentities($row['product_pic']); ?>" style = "width:30%"></img><br>
			<b><?php echo htmlentities($row['product_name']);?></b><br>
			<b>RM<?php echo htmlentities($row['product_price']);?></b><br><br>
			<a href ="oneview.php?id=<?php echo htmlentities($row['product_id']);?>">View</a> 
			<form method="post" action="cart_action.php?action=add&id=<?php echo $row['Product_ID'];?>">
				<input type="text" name="quantity" value="1" size="2" />
				<button type="submit"><i class="fa fa-cart-plus" style="font-size:20px"></i> Add to Cart</button>
			</form></b><br>
			
		<?php
          		}//while
        }//if
    	else {
          echo "No result found.";
    	}
    		$conn->close();
		?>

	</div>
<!-- Footer -->
	<footer>
		<?php
		include("include/footer.php");
		?>
		<small><i>Copyright &copy;Pelayaran Tyre Sdn Bhd. All Rights Reserved</i></small>
	</footer>
</body>

</html>