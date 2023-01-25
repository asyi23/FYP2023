<?php
session_start();
include("connect.php");
$id=$_SESSION['id'];

$id2=$_SESSION['value'];

if(isset($_SESSION['id'])){

  foreach($id2 as $value){
            
    echo "value : ".$value.'<br/>';
    $sql = "UPDATE product INNER JOIN newcart  on product.id = newcart.product_id SET product.quantity = product.quantity - newcart.newcart_quan WHERE user_id='$id' AND product.id=$value";
    if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully";
        // header("Location:payment.php");
      } else {
        echo "Error updating record: " . $conn->error;
      }
    
   }

foreach($id2 as $value){
   $sql = mysqli_query($conn,"SELECT * FROM newcart WHERE user_id='$id' AND product_id='$value'");
  //  $sql = mysqli_query($conn,"SELECT * FROM newcart WHERE id='$id' LIMIT 1");
  //  $result = $conn->query($sql);
  $row = mysqli_fetch_array($sql);
  // while($row = mysqli_fetch_array($sql)){

  $productid =$row['product_id'];
   $quantity = $row["newcart_quan"];
   $wish = $row["wish"];
   $wrapping_paper = $row["wrapping_paper"];
   $textcolor = $row["textcolor"];
   $carddesign = $row["carddesign"];
   $pricetotal = $row["pricetotal"];         
  // }
// if ($result->num_rows > 0) {
//     // output data of each row
//     while($row = $result->fetch_assoc()) {
//         $id = $row["id"];
//         $name = $row["name"];
//         $price = $row["price"];
//         $image = $row["image"];
//         $quantity = $row["quantity"];
//         $wrapping_card_color = $row["wrapping_card_color"];
//         $wish = $row["wish"];
//         $buyer = $row["buyer"];
//         $seller = $row["seller"];


        $sql1 = "INSERT INTO neworder (user_id,product_id,quantity,order_wish,order_wrapping_paper,order_text_color,order_card_design,order_total,order_status)
        VALUES ('$id','$productid','$quantity','$wish','$wrapping_paper','$textcolor','$carddesign','$pricetotal','Pending');";
      if (mysqli_query($conn, $sql1)) {
        echo "Record updated successfully";
      } else {
        echo "Error: " . $sql1 . "<br>" . mysqli_error($conn);
      }

//       // echo "id: " . $row["id"]. " - Name: " . $row["name"]. " " . $row["price"]. "<br>";
//     }
//   } else {
//     echo "0 results";
//   }
// }
}

foreach($id2 as $value){
  $sql= "delete from newcart where product_id = '$value'";
  if ($conn->query($sql) === TRUE) {
      echo "Record updated successfully";
      
    } else {
      echo "Error updating record: " . $conn->error;
    }
}
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Successful</title>

    <!-- FONT AWESOME ICONS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css" integrity="sha512-1PKOgIY59xJ8Co8+NE6FZ+LOAZKjy+KY8iq0G4B3CyeY6wYHN3yt9PW0XpSriVlkMXe40PTKnXrLnZ9+fkDaog==" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="style.css">

</head>
<body>
<header class="header">
        <div class="logo">
            <a href="prac2.php"><img src="prezent.png"></a>
        </div>
</header>

<main id="cart-main">
    <i class="fa fa-check-circle-o"></i>

    <div class="confirm">
        <div><img src="./assets/checked.png" alt=""></div>
        <h1 class="font-title">Payment Done Successfully...!</h1>
        <a href="after_success.php">Back</a>
    </div>

</main>

</body>
</html>
