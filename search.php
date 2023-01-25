<?php
session_start();
include("connect.php");
$id=$_SESSION['id'];
$query = $_GET['query']; 

$sql = "SELECT * from newcart where user_id='$id'";
  
    if ($result = mysqli_query($conn, $sql)) {
  
    // Return the number of rows in result set
    $rowcount = mysqli_num_rows( $result );
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Birthday</title>

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <!-- custom css file link  -->
    <link rel="stylesheet" href="homepages.css" />
    <script type="text/javascript" src="prac2.js"></script>
    <style>
body {
  background-color: #ffffff;
}
    </style>

</head>
<body>
    <div class="intro">
        <p2>25% Discount for second item<p2>
    </div>
    <header class="header">
        <div class="logo">
            <a href="prac2.php"><img src="prezent.png"></a>
        </div>
        <div class="logo">
        <form action="search.php" method="GET">
        <input type="text" name="query" class="search" id="search">
        <input type ="submit" name="search" class="btn-search">
        </form>
        </div>
        <div class="logo">
        <div class="icon">
        <p><?php echo $rowcount;?></p>
        <a href="cart_test.php" class="fas fa-shopping-cart" id="cart-btn"></a>
        <a href="profile.php"class="fas fa-user" id="menu-btn"></a>
        <a href="logout.php"class="fa fa-sign-out" id="menu-btn"></a>
        </div>
        </div>
    </header>

    <div class="display">
        <p>Search result for <?php echo $query?></p>
        <div class="forwomen">
        <div class="content">
<?php

    
	$query = $_GET['query']; 
	// gets value sent over search form
	
	$min_length = 3;
	// you can set minimum length of the query if you want
	
	if(strlen($query) >= $min_length){ // if query length is more or equal minimum length then
		
		$query = htmlspecialchars($query); 
		// changes characters used in html to their equivalents, for example: < to &gt;
	
		
		$raw_results = mysqli_query($conn,"SELECT * FROM product
			WHERE (`name` LIKE '%".$query."%')") or die(mysql_error());
			
		// * means that it selects all fields, you can also write: `id`, `title`, `text`
		// articles is the name of our table
		
		// '%$query%' is what we're looking for, % means anything, for example if $query is Hello
		// it will match "hello", "Hello man", "gogohello", if you want exact match use `title`='$query'
		// or if you want to match just full word so "gogohello" is out use '% $query %' ...OR ... '$query %' ... OR ... '% $query'
		
		if(mysqli_num_rows($raw_results) > 0){ // if one or more rows are returned do following
			
			while($results = mysqli_fetch_array($raw_results)){
			// $results = mysql_fetch_array($raw_results) puts data from database into array, while it's valid it does the loop
			?>
            <div class="box">
                 <img id="image" src="uploads/<?php echo htmlentities($results['img']); ?>" style="height:20rem;" /><br />
                 <h3 id="name"><?php echo htmlentities($results['name']);?> 
                 </h3><br>   
                <div class="price" id="price">
                      RM <?php echo htmlentities($results['price']);?><br />
                 </div>
                    <a href="oneview.php?id=<?php echo htmlentities($results['id']);?> " class="detail">View Product Details</a></td>
                <br />
            </div>
             <?php
			}
			
		}
		else{ // if there is no matching rows do following
			echo "No results";
		}
		
	}
	else{ // if query length is less than minimum
		echo "Minimum length is ".$min_length;
	}

?>
</div>
</div>
</div>

    <div class="footer-basic">
            
            <footer>
                <div class="social"><a href="#"><i class="icon ion-social-instagram"></i></a><a href="#"><i class="icon ion-social-snapchat"></i></a><a href="#"><i class="icon ion-social-twitter"></i></a><a href="#"><i class="icon ion-social-facebook"></i></a></div>
                <ul class="list-inline">
                    <li class="list-inline-item"><a href="#">Home</a></li>
                    <li class="list-inline-item"><a href="#">Services</a></li>
                    <li class="list-inline-item"><a href="#">About</a></li>
                    <li class="list-inline-item"><a href="#">Terms</a></li>
                    <li class="list-inline-item"><a href="#">Privacy Policy</a></li>
                </ul>
                <p class="copyright">Asyidatul Asindi © 2022</p>
            </footer>
        </div>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.bundle.min.js"></script>
</body>
</html>
