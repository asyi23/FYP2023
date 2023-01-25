<?php
session_start();
include("connect.php");
$id=$_SESSION['id'];
$cat =$_GET['cat'];

$sql = "SELECT * from newcart where user_id='$id'";
  
    if ($result = mysqli_query($conn, $sql)) {
  
    // Return the number of rows in result set
    $rowcount = mysqli_num_rows( $result );
}



//add
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
    <link rel="stylesheet" href="category.css" />
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
        <p2><?php echo $cat?><p2>
        <div class="forwomen">
        <div class="content">

<?php
if(isset($_GET['cat']))
{
    $product_cat = $_GET['cat'];
    $sql = "SELECT * FROM product where cat ='$product_cat' ";
}

$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        
        //echo "id: " . $row["food_id"]. " - Name: " . $row["food_name"]. " " . "<br>";
?>
        <!-- food resultset <a href="index.php?page=product&action=add&id=<?php //echo $row['product_id']; ?>"><i class="fa fa-shopping-cart" ></i> Add to Cart</a><br><br>-->
<div class="box">
    <img id="image" src="uploads/<?php echo htmlentities($row['img']); ?>" style="height:20rem;" /><br />
    <h3 id="name"><?php echo htmlentities($row['name']);?> 
     </h3><br>   
        <div class="price" id="price">
            RM <?php echo htmlentities($row['price']);?><br />
        </div>
        <a href="oneview.php?id=<?php echo htmlentities($row['id']);?> " class="detail">View Product Details</a></td>
    <br />
</div>  
<?php 
    }//while
}//if
else {
    echo "Sorry, 0 result found";
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