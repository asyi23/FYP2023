<?php
session_start();
include("connect.php");
$id=$_SESSION['id'];



?>
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>CodePen - Dashboard UI #1 : Project management with Charts</title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:300,600" /><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css'>
<link rel='stylesheet' href='https://cdn.jsdelivr.net/jquery.selectric/1.10.1/selectric.css'>
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.2.0/css/material-design-iconic-font.min.css'><link rel="stylesheet" href="./style.css">

</head>
<body>
<!-- partial:index.partial.html -->
<nav class="navbar navbar-dark sticky-top flex-md-nowrap p-0">
	<a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">Prezent Hi <?php echo $_SESSION["name"] ?></a>
	<input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">
	<ul class="navbar-nav px-3">
		<li class="nav-item text-nowrap">
			<a class="nav-link" href="logout.php">Sign out</a>
		</li>
	</ul>
</nav>
<div class="container-fluid">
	<div class="row">
		<nav class="col-md-2 d-none d-md-block sidebar">
			<div class="sidebar-sticky">
				<ul class="nav flex-column">
					<li class="nav-item">
						<a class="nav-link active" href="#">
                  <i class="zmdi zmdi-widgets"></i>
                  Dashboard <span class="sr-only">(current)</span>
                </a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#">
                  <i class="zmdi zmdi-file-text"></i>
                  Orders
                </a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#">
                  <i class="zmdi zmdi-shopping-cart"></i>
                  Products
                </a>
					</li>
				</ul>
			</div>
		</nav>
		<main role="main" class="col-md-9 ml-sm-auto col-lg-10 my-3">
			<div class="card-list">
				<div class="row">
					<div class="col-12 col-md-6 col-lg-4 col-xl-3 mb-4">
						<div class="card blue">
							
						</div>
					</div>
					<div class="col-12 col-md-6 col-lg-4 col-xl-3 mb-4">
						<div class="card green">
						
						</div>
					</div>
					<div class="col-12 col-md-6 col-lg-4 col-xl-3 mb-4">
						<div class="card orange">
						
						</div>
					</div>
					<div class="col-12 col-md-6 col-lg-4 col-xl-3 mb-4">
						<div class="card red">
				
						</div>
					</div>
				</div>
			</div>
			<div class="projects mb-4">
				<div class="projects-inner">
					<header class="projects-header">
						<div class="title">List Of Products</div>
						<div class="count">| 32 Projects</div>
					</header>
					<table class="projects-table">
						<thead>
							<tr>
								<th>Image</th>
								<th>Name</th>
								<th>Price</th>
								<th>Stock</th>
								<th>For</th>
								<th class="text-right">Actions</th>
							</tr>
						</thead>
						<?php 
   if(isset($_SESSION['id'])){

$id = preg_replace('#[^0-9]#i', '', $_SESSION['id']);
$sql = mysqli_query($conn,"SELECT * FROM products WHERE seller='$id'");
$productCount = mysqli_num_rows($sql);

 if ($productCount > 0) {
    // get all the product details
    while($row = mysqli_fetch_assoc($sql)){
         $id  = $row["id"]; 
         $pic = $row["image"];
         $product_name = $row["name"];
         $stock = $row["quantity"];
         $price = $row["price"];
		 $cat = $row["cat"];
         
    ?>
    <tr>
    <td><img id="image" src="<?php echo htmlentities($pic); ?>" /><br /></td>
        <td><p> <?php echo htmlentities($product_name);?></p></td>
		<td><p>RM<?php echo htmlentities($price);?></p></td>
		<td><p><?php echo htmlentities($stock);?></p></td>
		<td><p><?php echo htmlentities($cat);?></p></td>
        <td><a href="delete.php?userid=<?php echo $row["id"]; ?>">Delete</a></td>
    </tr>
   <?php      
   }

  } 
else {
    echo "That item does not exist.";
    exit();
}

} else {
echo "Data to render this page is missing.";
exit();
}?>

					</table>
				</div>
			</div>
		</main>
	</div>
</div>
<!-- partial -->
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js'></script>
<script src='https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js'></script>
<script src='https://cdn.jsdelivr.net/jquery.selectric/1.10.1/jquery.selectric.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.bundle.min.js'></script><script  src="./script.js"></script>

</body>
</html>
