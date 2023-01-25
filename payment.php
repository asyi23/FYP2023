<?php
session_start();
include("connect.php");
$id=$_SESSION['id'];
$id2=$_SESSION['value'];
foreach($id2 as $value){
echo ',';
echo $value;
}
//calcualte row

$sql = "SELECT * from carts where buyer='$id'";
  
    if ($result = mysqli_query($conn, $sql)) {
  
    // Return the number of rows in result set
    $rowcount = mysqli_num_rows( $result );
}

//calculate value row
//$add = mysqli_query($conn, "SELECT SUM(price) AS value_sum FROM orders where buyer='$id'"); 
//$row = mysqli_fetch_assoc($add); 
$sum =0;
$sum1 =0;
foreach($id2 as $value){
$result = mysqli_query($conn, "SELECT pricetotal as value_sum FROM newcart where product_id='$value'"); 
$row = mysqli_fetch_assoc($result); 
$sum += $row['value_sum'];
// echo $sum1;

}
$sum1 = $sum1+ $sum;
echo $sum1;


?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Paypal Payment</title>
    <link rel="stylesheet" href="payment.css">
    <link rel="stylesheet" href="cart_test.css" />
        <!-- font awesome cdn link  -->


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<!-- <header class="header">
        <div class="logo">
            <a href="prac2.php"><img src="prezent.png"></a>
        </div>
</header> -->
    <main id="cart-main">
        <div class="site-title text-center">
            <h1 class="font-title">Checkout</h1>
            
        </div>

        <div class="container">
            <div class="grid">
               <div class="col-1">
                <?php
                if(isset($_SESSION['id'])){
                    foreach($id2 as $value){
                    $id1= preg_replace('#[^0-9]#i', '', $_SESSION['id']);
                    $sql = mysqli_query($conn,"SELECT * FROM newcart INNER JOIN product on newcart.product_id=product.id WHERE newcart.user_id='$id' AND newcart.product_id=$value");
                    $productCount = mysqli_num_rows($sql);
                   
                    if ($productCount > 0) {
                        // get all the product details
                        while($row = mysqli_fetch_assoc($sql)){
                             $productid  = $row["id"]; 
                            $pic = $row["img"];
                            $product_name = $row["name"];
                             $quantity = $row["newcart_quan"];
                             $wish = $row["wish"];
                             $wrapping_paper = $row["wrapping_paper"];
                             $textcolor = $row["textcolor"];
                             $carddesign = $row["carddesign"];
                             $pricetotal = $row["pricetotal"];         
 
                ?>
                    
                <div class="box-item">
                     <div class="inside">
                       <div class="flex1">
                                 <!-- <input type="checkbox" name="lang[]" class="checks1" value="<?php echo $productid?>" data-price1=<?php echo htmlentities($pricetotal); ?>> -->
                        </div>
                        <div class="flex">
                            <div class="img text-center">
                                <img src="uploads/<?php echo htmlentities($pic); ?>" alt="">
                            </div>
                        </div>
                        <div class="flex2">       
                            <div class="title">
                                <h3><?php echo htmlentities($product_name);?></h3>
                                <h4 class="text-red">RM<?php echo htmlentities($pricetotal);?></h4>
                                <span><strong>Total item:</strong> <?php echo htmlentities($quantity);?></span></br>
                                <span><strong>Wish:</strong> <?php echo htmlentities($wish);?></span></br>
                                <span><strong>Wrapping paper color:</strong> <?php echo htmlentities($wrapping_paper);?></span></br>
                                <span><strong>Text color:</strong> <?php echo htmlentities($textcolor);?></span></br>
                                <span><strong>Card:</strong><img src=<?php echo htmlentities($carddesign); ?> alt=""></span></br>
                                
                            </div>
                        </div>
                        
                    </div> 
                 </div>
                 
                     
                
                <?php      
   }

  } 
else {
    echo "That item does not exist.";
    exit();
}
                    }

} else {
echo "Data to render this page is missing.";
exit();
}?>

</div>
                <div class="col-2">
                    <div class="subtotal text-center">
                        <h3>Price Details</h3>

                        <ul>
                            <li class="flex justify-content-between">
                                <label for="price">Products(<?php echo $rowcount;?> item) </label>
                                <span>RM<?php echo $sum;?></span>
                            </li>
                            <li class="flex justify-content-between">
                                <label for="price">Delivery Charges : </label>
                                <span>Free</span>
                            </li>
                            <hr>
                            <li class="flex justify-content-between">
                                <label for="price">Amout Payble : </label>
                                <span class="text-red font-title" id="price_product">RM<?php echo $sum;?></span>
                                <input type="hidden" id="pay" value="<?php echo $sum1;?>">
                            </li>
                        </ul>
                        <div id="paypal-payment-button">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>


    <script src="https://www.paypal.com/sdk/js?client-id=AUftswwNAuRe06dGkx_4Z0bogwu-jAR9xUAKAOfi9DvxN2tCIVoBcV5oizRYByTzETCHocTlx39mVW9H&disable-funding=credit,card"></script>
    <script src="index.js"></script>


    <!-- <div class="footer-basic">
            
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
        <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.bundle.min.js"></script> -->
</body>
</html>