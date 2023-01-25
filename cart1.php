<?php
session_start();
include("connect.php");
$id=$_SESSION['id'];

//calcualte row

$sql = "SELECT * from carts where buyer='$id'";
  
    if ($result = mysqli_query($conn, $sql)) {
  
    // Return the number of rows in result set
    $rowcount = mysqli_num_rows( $result );
}

//calculate value row
//$add = mysqli_query($conn, "SELECT SUM(price) AS value_sum FROM orders where buyer='$id'"); 
//$row = mysqli_fetch_assoc($add); 

$result = mysqli_query($conn, "SELECT SUM(price) AS value_sum FROM carts where buyer='$id'"); 
$row = mysqli_fetch_assoc($result); 
$sum = $row['value_sum'];

$tot_product = mysqli_query($conn, "SELECT SUM(quantity) AS value_sum FROM carts where buyer='$id'"); 
$row = mysqli_fetch_assoc($tot_product); 
$Total_product = $row['value_sum'];

if(isset($_POST['checkout'])){

    $sql = "UPDATE product INNER JOIN newcart  on product.id = newcart.product_id SET product.quantity = product.quantity - newcart.newcart_quan";
    if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully";
        header("Location:cart1.php");
      } else {
        echo "Error updating record: " . $conn->error;
      }
      
}



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- custom css file link  -->
    <link rel="stylesheet" href="cart.css" />

</head>
<body>

<header class="header">
        <div class="item">
            <a href="prac2.php"><img src="prezent.png"></a>
        </div>
        <div class="item">
            <input type="text" class="search" id="search"/>
        </div>
        <div class="item">
            <div class="icon">
            <a href="cart.php" class="fas fa-shopping-cart" id="menu-btn"></a>
            <a href="profile.php"class="fas fa-user" id="menu-btn"></a>
            <a href="logout.php"class="fa fa-sign-out" id="menu-btn"></a>
        </div>
        </div>
    </header>
<div class="table-sec">
<form name="product" action="cart1.php" method="post">
<table class="cart">
            <tr>
                <th>Seller</th>
                <th>Image</th>
                <th>Name</th>
                <th>Quantity</th>
                <th>Wrapping Card Color</th>
                <th>Wish</th>
                <th>Price</th>
                <th>Action</th>
            </tr>
            <?php 
if(isset($_SESSION['id'])){

$id = preg_replace('#[^0-9]#i', '', $_SESSION['id']);
$sql = mysqli_query($conn,"SELECT * FROM carts cross join admin WHERE buyer='$id' and carts.seller = admin.id");
$productCount = mysqli_num_rows($sql);

 if ($productCount > 0) {
    // get all the product details
    while($row = mysqli_fetch_assoc($sql)){
         $id  = $row["id"]; 
         $pic = $row["image"];
         $product_name = $row["name"];
         $quantity = $row["quantity"];
         $price = $row["price"];
         $wrapping_card_color = $row["wrapping_card_color"];
         $wish = $row['wish'];
         $seller = $row['admin_name'];
        
         
    ?>

    <tr>
        <td>
            <?php echo htmlentities($seller)?>

        </td>
        <td><img id="image" src="uploads/<?php echo htmlentities($pic); ?>" /><br /></td>
        <td><p> <?php echo htmlentities($product_name);?></p></td>
        <td>
        <button id="minus" class="edit">-</button>
        <span id="numberPlace" class="place"><?php echo htmlentities($quantity);?></span>
        <button id="plus" class="edit">+</button>
        </td>
        <td><p> <?php echo htmlentities($wrapping_card_color);?></p></td>
        <td><p> <?php echo htmlentities($wish);?></p></td>
        <td><p>RM<?php echo htmlentities($price);?></p></td>
        <td><a href="delete.php?userid=<?php echo $row["id"]; ?>">Delete</a></td>
         
    </tr>
   <?php      
   }

  } 
else {
    ?>
    <p>No item in the cart.</p>
    <!-- echo "That item does not exist."; -->
    <?php
    exit();
}

} else {
echo "Data to render this page is missing.";
exit();
}?>
</table>
<input type="submit" id="btn" name="checkout" value="checkout"/>
</form>
</div>




<div class="checkout">
    <a href="payment.php" class="check">checkout</a>
    <p>Total Prodcuts:<?php echo $Total_product;?><p>
    <p>Total Price:RM<?php echo $sum;?></p>
</div>

</div>
<script>
    window.onload=function(){
    var minusBtn = document.getElementById("minus"),
        plusBtn = document.getElementById("plus"),
        numberPlace = document.getElementById("numberPlace"),
        submitBtn = document.getElementById("submit"),
        number = 1, /// number value
        min = 0, /// min number
        max = 30; /// max number
        
    minusBtn.onclick = function(){
        if (number>min){
           number = number-1; /// Minus 1 of the number
           numberPlace.innerText = number ; /// Display the value in place of the number
           
        }
        if(number == min) {        
            numberPlace.style.color= "red";
            setTimeout(function(){numberPlace.style.color= "black"},500)
        }
        else {
          numberPlace.style.color="black";            
           }
                
    }
    plusBtn.onclick = function(){
        if(number<max){
           number = number+1;
           numberPlace.innerText = number ; /// Display the value in place of the number
        }     
        if(number == max){
               numberPlace.style.color= "red";
               setTimeout(function(){numberPlace.style.color= "black"},500)
        }
           
        else {
               numberPlace.style.color= "black";
               
        }
     
           
    }
    submitBtn.onclick = function(){
        alert("you choice : " + number);
    }
    
}

</script>



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
        
        
        <div class="container">
            <div class="grid">
               <div class="col-1">
                <?php
                if(isset($_SESSION['id'])){

                    $id = preg_replace('#[^0-9]#i', '', $_SESSION['id']);
                    $sql = mysqli_query($conn,"SELECT * FROM carts WHERE buyer='$id'");
                    $productCount = mysqli_num_rows($sql);

                    if ($productCount > 0) {
                        // get all the product details
                        while($row = mysqli_fetch_assoc($sql)){
                             $id  = $row["id"]; 
                             $pic = $row["image"];
                             $product_name = $row["name"];
                             $quantity = $row["quantity"];
                             $price = $row["price"];         
 
                ?>
                
                    <div class="flex item justify-content-between">
                        <div class="flex">
                            <div class="img text-center">
                                <img src="uploads/<?php echo htmlentities($pic); ?>" alt="">
                            </div>
                            <div class="title">
                                <h3><?php echo htmlentities($product_name);?></h3>
                                <span>Electronics</span></br>
                                <span>Total item: <?php echo htmlentities($quantity);?></span>
                            </div>
                        </div>
                        <div class="price">
                            <h4 class="text-red">RM<?php echo htmlentities($price);?></h4>
                        </div>
                    </div>
                
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
</div>

    </body>
</html>