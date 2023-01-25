<?php
session_start();
include("connect.php");
include("connect1.php");
$id=$_SESSION['id'];
?>

<?php

//display porduct card

if(isset($_GET['id'])){

    $id = preg_replace('#[^0-9]#i', '', $_GET['id']);
    $sql = mysqli_query($conn,"SELECT * FROM product WHERE id='$id' LIMIT 1");
    $productCount = mysqli_num_rows($sql);

     if ($productCount > 0) {
		// get all the product details
		while($row = mysqli_fetch_array($sql)){
             $id =$_SESSION['id'];
             $id1 =$row['id'];
             $pic = $row["img"];
			 $product_name = $row["name"];
			 $price = $row["price"];
             $product_for = $row["cat"];
             $stock = $row["quantity"];
             $seller = $row["seller"];
             
         }

	} else {
		echo "That item does not exist.";
	    exit();
	}

} else {
	echo "Data to render this page is missing.";
	exit();
}



//total product
$sql = "SELECT * from newcart where user_id='$id'";
  
    if ($result = mysqli_query($conn, $sql)) {
  
    // Return the number of rows in result set
    $rowcount = mysqli_num_rows( $result );
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Image Change</title>
    <link rel = "stylesheet" href = "oneproductnew.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
<div class="promo">
    <p>25% Discount for second item</p> 
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

    <form action="" method="POST">
    <div class = "main-wrapper">
        <div class = "container">
            <div class = "product-div">
                <div class = "product-div-left">
                    <div class = "img-container">
                        <img src="uploads/<?php echo $pic; ?>" alt = "watch">
                    </div>
                    <!-- <div class = "hover-container">
                        <div><img src = "images/w1.png"></div>
                        <div><img src = "images/w2.png"></div>
                        <div><img src = "images/w3.png"></div>
                        <div><img src = "images/w4.png"></div>
                        <div><img src = "images/w5.png"></div>
                    </div> -->
                </div>
                <div class = "product-div-right">
                    <span class = "product-name" name="product-name"><?php echo $product_name; ?></span>
                    <span class = "product-price" ><?php echo "RM".$price; ?></span>
                    <!-- <div class = "product-rating">
                        <span><i class = "fas fa-star"></i></span>
                        <span><i class = "fas fa-star"></i></span>
                        <span><i class = "fas fa-star"></i></span>
                        <span><i class = "fas fa-star"></i></span>
                        <span><i class = "fas fa-star-half-alt"></i></span>
                        <span>(350 ratings)</span>
                    </div> -->
                    <!-- <input type="text" class="product_id" name="product_id" value=<?php echo $id; ?>> -->
                    <!-- <p class="product_id" name="product_id">Stock: <?php echo $id; ?></p> -->
                    <span class="stock">Stock: <?php echo $stock; ?></span>  
                    <input type="hidden" id="number" name="number" value="<?php echo $stock; ?>"/>  
                    <span class="quantity">Quantity: 
                    <input type='button' value='-' class='qtyminus' field='quantity' id="minus" />
                    <input type='text' name='quantity' value='0' class='qty' id="numberPlace" />
                    <input type='button' value='+' class='qtyplus' field='quantity' id="plus"/>
                    </span>
                    <span class="wish-section">Wish:
                    <input type="text" class="wish" name="wish">
                    </span>
</br>
                    <select name="card" class="card">
                     <option value="" disabled selected>Wrapping paper</option>
                     <option value="blue" style="color:blue; font-weight: bold" >Blue</option>
                     <option value="Black" style="color:black; font-weight: bold">Black</option>
                     <option value="Pink" style="color:pink; font-weight: bold">Pink</option>
                    </select> 
                    <select name="text_color" class="text_color">
                     <option value="" disabled selected>Text Color</option>
                     <option value="black" style="color:black; font-weight: bold">Black</option>
                     <option value="Midnight-Blue" style="color:#191970; font-weight: bold">Midnight-Blue</option>
                     <option value="choc" style="color:#7B3F00; font-weight: bold">Chocolate</option>
                    </select>
                    <br>
                <span class="card-section">Card Design:<span>
                <div class="card-design">
                <div class="card_image">
                <input type="radio" id="image1" name="fav_language" value="image/68e39712f1c30d88d8a932c6af95a5a8.jpg">
                <img src="image/new1.jpg" alt="Girl in a jacket"  >
                </div>

                <div class="card_image">
                <input type="radio" id="image2" name="fav_language" value="image/929a067821f2031377523c90f84a54be.jpg">
                <img src="image/929a067821f2031377523c90f84a54be.jpg" alt="Girl in a jacket" >
                </div>
                <div class="card_image">
                <input type="radio" id="image3" name="fav_language" value="image/2476c5dbe588d90cb65952822b0b62c8.jpg">
                <img src="image/2476c5dbe588d90cb65952822b0b62c8.jpg" alt="Girl in a jacket" >

                </div>
                <br>
            </div> 
     
                    <div class = "btn-groups">
                        <!-- <button type = "button" class = "add-cart-btn"><i class = "fas fa-shopping-cart"></i>add to cart</button>
                        <button type = "button" class = "buy-now-btn"><i class = "fas fa-wallet"></i>buy now</button> -->
                        <input type="submit" class="add_to_cart" value="ADD" name="add_to_cart">
                        <button class="buy_now">BUY NOW</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

    <script src = "script.js"></script>
    <script>
const minusButton = document.getElementById('minus');
const plusButton = document.getElementById('plus');
const inputField = document.getElementById('numberPlace');
var min =0;
var max = document.getElementById('number').value;
var max2 = 10;

minusButton.addEventListener('click', event => {
  event.preventDefault();

  const currentValue = Number(inputField.value) || 0;
  if(currentValue == min){
    inputField =min;
}else{
  inputField.value = currentValue - 1;
}
});

plusButton.addEventListener('click', event => {
  event.preventDefault();
  const currentValue = Number(inputField.value) || 0;
  if(currentValue >= max){
    inputField =max;
}else{
  inputField.value = currentValue + 1;
}
});
 

</script>
<?php  
//add item
if(isset($_POST['add_to_cart'])){
   
    $quantity = $_POST['quantity'];
    $wish =$_POST['wish'];
    $wrappingpaper = $_POST['card'];
    $text_color = $_POST['text_color'];
    $card_image = $_POST['fav_language'];
    $total_price = $quantity * $price;
    $selected = $_POST['card'];
    

 
        $insert_product = mysqli_query($conn, "INSERT INTO newcart (product_id,user_id,newcart_quan,wish,wrapping_paper,textcolor,carddesign, pricetotal) VALUES('$id1','$id','$quantity','$wish','$wrappingpaper','$text_color','$card_image', '$total_price')");
        $message[] = 'product added to cart succesfully';

} 
?>   
    
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