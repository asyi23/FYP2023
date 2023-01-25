<?php
session_start();
include("connect.php");


$id=$_SESSION['id'];

//calcualte row

$sql = "SELECT * from newcart where user_id='$id'";
  
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

    $sql = "UPDATE product INNER JOIN newcart  on product.id = newcart.product_id SET product.quantity = product.quantity - newcart.newcart_quan WHERE user_id='$id'";
    if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully";
        header("Location:cart1.php");
      } else {
        echo "Error updating record: " . $conn->error;
      }
      
}

if(isset($_POST['submit1'])){

    if(!empty($_POST['lang'])) {
        $_SESSION['value'] = $_POST['lang'];
        header("Location:payment.php");
        // $type = $_POST['lang1'];
        // echo $type;
    
        // foreach($_SESSION['value'] as $value){
            
        //     echo "value : ".$value.'<br/>';
        //     $sql = "UPDATE product INNER JOIN newcart  on product.id = newcart.product_id SET product.quantity = product.quantity - newcart.newcart_quan WHERE user_id='$id' AND product.id=$value";
        //     if ($conn->query($sql) === TRUE) {
        //         echo "Record updated successfully";
        //         header("Location:payment.php");
        //       } else {
        //         echo "Error updating record: " . $conn->error;
        //       }
            
        // }

        // foreach($_POST['lang'] as $value){
        //     $sql= "delete from newcart where product_id = '$value'";
        //     if ($conn->query($sql) === TRUE) {
        //         echo "Record updated successfully";
                
        //       } else {
        //         echo "Error updating record: " . $conn->error;
        //       }
        // }
    
    }
    
    if(empty($_POST['lang'])){
        echo "No data";

        
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
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css"> -->
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css"> -->
    <!-- <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- custom css file link  -->
    <link rel="stylesheet" href="cart_test.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>


</head>
<body>
        <div class="intro">
        <p2>25% Discount for second item<p2>
    </div>

<header class="header">
        <div class="item">
            <a href="prac2.php"><img src="prezent.png"></a>
        </div>
        <div class="item">
            <input type="text" class="search" id="search"/>
        </div>
        <div class="item">
            <div class="icon">
            <p><?php echo $rowcount;?></p>
        <a href="cart_test.php" class="fas fa-shopping-cart" id="cart-btn"></a>
        <a href="profile.php"class="fas fa-user" id="menu-btn"></a>
        <a href="logout.php"class="fa fa-sign-out" id="menu-btn"></a>
        </div>
        </div>
</header>

<form  action="cart_test.php" method="post">
    <div class="shopping-cart">
    <span>Your Shopping cart</span>
    <div class="checkout">
    <p>Total Prodcuts:<?php echo $Total_product;?><p>
    <p>Price : RM<span id="total1">0.00</span></p>
    <!-- <a href="payment.php" class="check">checkout</a>
    <input type="submit" id="btn" name="checkout" value="checkout" /> -->
    <input type="submit" id="btn" class="check" name="submit1" value="Checkout" />
    </div>
    </div>


<!-- <form action="testing.php" method="post">
<input type="submit" id="btn" name="submit1" value="testing" />
</form> -->

    <div class="container">
            <div class="grid">
               <div class="col-1">
                <?php
                if(isset($_SESSION['id'])){

                    $id1= preg_replace('#[^0-9]#i', '', $_SESSION['id']);
                    $sql = mysqli_query($conn,"SELECT * FROM newcart INNER JOIN product on newcart.product_id=product.id WHERE newcart.user_id='$id'");
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
                                 <input type="checkbox" name="lang[]" class="checks1" value="<?php echo $productid?>" data-price1=<?php echo htmlentities($pricetotal); ?>>
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

} else {
echo "Data to render this page is missing.";
exit();
}?>

</div>
</form>

<?php
// if(isset($_POST['submit1'])){

//     if(!empty($_POST['lang'])) {    
//         foreach($_POST['lang'] as $value){
//             echo "value : ".$value.'<br/>';
//             $sql = "INSERT INTO testing (valuetest)
// VALUES ('$value')";

// if ($conn->query($sql) === TRUE) {
//   echo "New record created successfully";
// } else {
//   echo "Error: " . $sql . "<br>" . $conn->error;
// }

//         }
//     }

// }


// if(isset($_POST['submit1'])){

//     if(!empty($_POST['lang'])) {

//         $type = $_POST['value'];
//         echo $type;

//         // foreach($_POST['lang'] as $value){
//         //     echo "value : ".$value.'<br/>';
//         //     
//         // }

//     }

// }

// if(isset($_POST['submit1'])){

//     if(!empty($_POST['lang1'])) { 
//         echo implode(',',$_POST['lang1'])  ; 
//         echo '  if (confirm("Are you sure you want to open new URL")) {';  
//         foreach($_POST['lang1'] as $value){
//             echo "value : ".$value.'<br/>';
// //             $sql = "INSERT INTO payment (user_id, product_id)
// // VALUES ('$id1', '$value')";

// // if ($conn->query($sql) === TRUE) {
// //   echo "New record created successfully";
// // } else {
// //   echo "Error: " . $sql . "<br>" . $conn->error;
// // }

//         }
//     }

// }
// if(isset($_POST['submit1'])){

//     if(!empty($_POST['lang'])) {
//         $_SESSION['value'] = $_POST['lang'];
//         // $type = $_POST['lang1'];
//         // echo $type;
    
//         foreach($_SESSION['value'] as $value){
            
//             echo "value : ".$value.'<br/>';
//             $sql = "UPDATE product INNER JOIN newcart  on product.id = newcart.product_id SET product.quantity = product.quantity - newcart.newcart_quan WHERE user_id='$id' AND product.id=$value";
//             if ($conn->query($sql) === TRUE) {
//                 echo "Record updated successfully";
//                 header("Location:testing.php");
//               } else {
//                 echo "Error updating record: " . $conn->error;
//               }
            
//         }

//         // foreach($_POST['lang'] as $value){
//         //     $sql= "delete from newcart where product_id = '$value'";
//         //     if ($conn->query($sql) === TRUE) {
//         //         echo "Record updated successfully";
                
//         //       } else {
//         //         echo "Error updating record: " . $conn->error;
//         //       }
//         // }
    
//     }
    
//     if(empty($_POST['lang'])){
//         echo "No data";
    
        
        
//         echo '<script type = "text/javascript">';
//         echo 'alert("Welcome to prezent!")';
        
//     }
    
//     }
?>


<!-- 
<div class="checkout">
    <a href="payment.php" class="check">checkout</a>
    <p>Total Prodcuts:<?php echo $Total_product;?><p>
    <input type="text" id="total1">
</div> -->

<!-- <script>
$(document).ready(function() {
    function updateSum() {
      var total1 = 0;
      $(".checks:checked").each(function(i, n) {total1 += parseFloat($(n).val());})
      $("#total1").val(total1);
    }
    // run the update on every checkbox change and on startup
    $("input.checks").change(updateSum);
    updateSum();
})


$(document).on("change", ".checks", function() {
    var tots = 0;
var checked = $('.checks:checked'),
    sum = checked.get().reduce(function(prev, item) {
        return prev + parseFloat(item.getAttribute('data-price'));
    }, 0);
$('#tots').text( sum.toFixed(2) );
});
</script> -->


</div>

<script>
$(document).on("change", ".checks1", function() {
    var checked = $('.checks1:checked'),
        sum = checked.get().reduce(function(prev, item) {
            return prev + parseFloat(item.getAttribute('data-price1'));
        }, 0);

    $('#total1').text( sum.toFixed(2) );
});
</script>


<!-- <section id="extra-features">
<div class="checkbox">
<label><input type="checkbox" name="checkbox" id="outside" class="sum" value="10" data-toggle="checkbox"> Outside Wash</label>
</div><br/>
<div class="checkbox">
<label><input type="checkbox" name="checkbox" id="aclean" class="sum" value="39" data-toggle="checkbox"> A - Clean: Wash Vacuum, Windows, Wheels/Tires, Wax</label>
</div><br/>
<div class="checkbox">
<label><input type="checkbox" name="checkbox" id="bclean" class="sum" value="10" data-toggle="checkbox"> B - Clean: Same as A above <em>PLUS:</em> Shampoo Interior, Clean/Dress Interior Panels, Remove Bugs/Tar.</label>
</div><br/>
<div class="checkbox">
<label><input type="checkbox" name="checkbox" id="cclean" class="sum" value="109" data-toggle="checkbox"> C - Clean: Same as B above <em>PLUS:</em> Compound Polish Exterior, Clean/Dress Moldings as Needed.    </label>
</div>
</section>
<input type="text" id="total">

<script>
$(document).ready(function() {
    function updateSum() {
      var total = 0;
      $(".sum:checked").each(function(i, n) {total += parseInt($(n).val());})
      $("#total").val(total);
    }
    // run the update on every checkbox change and on startup
    $("input.sum").change(updateSum);
    updateSum();
})
</script> -->

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



<div class="footer">
    Final Year Project 
</br><span>Asyidatul Asindi</span>
    <strong>2023</strong>
</div>
        

    </body>
</html>