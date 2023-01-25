<?php
session_start();
include("connect.php");
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

//add item
if(isset($_POST['add_to_cart'])){
    $quantity = $_POST['quantity'];
    $total_price = $quantity * $price;
    $selected = $_POST['card'];
    $wish =$_POST['wish'];

 
        $insert_product = mysqli_query($conn, "INSERT INTO carts (buyer,seller, name, price, image,cat, wrapping_card_color,wish,quantity) VALUES('$id','$seller','$product_name', '$total_price', '$pic','$product_for','$selected','$wish','$quantity')");
        $message[] = 'product added to cart succesfully';

}

//total product
$sql = "SELECT * from carts where buyer='$id'";
  
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
    <title>Birthday</title>

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="oneproduct.css">

</head>
<body>

<div class="promo">
    <p>25% Discount for second item</p> 
 </div>
  <header class="header">
        <div class="logo">
            <a href="prac2.php"><img src="prezent.png"></a>
        </div>
        <div class="search">
            <input type="text" class="search" id="search">
        </div>

        <div class="icon">
        <p><?php echo $rowcount;?></p>
        <a href="cart1.php" class="fas fa-shopping-cart" id="cart-btn"></a>
        <a href="profile.php" class="fas fa-user" id="menu-btn"></a>
        </div>

    </header>

    <div class="for">
            <a href="prac2.php">Product ></a>
            <p1><?php echo $product_for; ?></p1>
    </div>
 


    <form action="" method="post">
    <div class="detail">
       <!-- <div class="quan"> -->
           <div class="content">
               <img class="product_image" name="product_image" src="uploads/<?php echo $pic; ?>" alt=" " />
           </div>
           <div class="content">
           <p name="product_name"><?php echo $product_name; ?></p>
           <p1 name="product_price" class="price"><?php echo "RM".$price; ?></p1><br>
           <p2>Stock: </p2>  
           <p2 id="stock"><?php echo $stock; ?></p2><br>
           <input type="hidden" id="number" name="number" value="<?php echo $stock; ?>"/>  
           <p2>Quantity: </p2>
           <input type='button' value='-' class='qtyminus minus' field='quantity' id="minus" />
           <input type='text' name='quantity' value='0' class='qty' id="numberPlace" />
           <input type='button' value='+' class='qtyplus plus' field='quantity' id="plus"/>
           <p>Wish:</p>
           <input type="text" class="wish" name="wish">
           <select name="card" class="card">
                     <option value="" disabled selected>Wrapping paper</option>
                     <option value="blue">Blue</option>
                     <option value="Black">Black</option>
                     <option value="Pink">Pink</option>
            </select>
</br>
            <select name="text-color" class="text-color">
                     <option value="" disabled selected>Text Color</option>
                     <option value="black" style="color:black; font-weight: bold">Black</option>
                     <option value="Midnight-Blue" style="color:#191970; font-weight: bold">Midnight-Blue</option>
                     <option value="choc" style="color:#7B3F00; font-weight: bold">Chocolate</option>
            </select>
            <div class="card-design">
                <p2>Select card design:</p2>
                <div class="card-image">
                     <img src="image/68e39712f1c30d88d8a932c6af95a5a8.jpg" alt="Girl in a jacket" width="80" height="90">
                     <img src="image/929a067821f2031377523c90f84a54be.jpg" alt="Girl in a jacket" width="80" height="90">
                     <img src="image/2476c5dbe588d90cb65952822b0b62c8.jpg" alt="Girl in a jacket" width="80" height="90">
                </div>
            </div>
</br>
                     <input type="submit" class="buy_now" value="add to cart" name="add_to_cart">
                     <button class="buy_now">Buy Now</button>
         </div>
             
         <!-- </div> -->
    </div>
   </form>
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
   



</body>
</html>
