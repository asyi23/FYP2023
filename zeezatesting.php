<?php

//check login
session_start();
include("connect.php");


$id=$_SESSION['id'];
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



<!-- Page Content: Display Checked out Items -->
<div class="row">
<h1>RECEIPT</h1>

<?php
if(!empty($_GET["price"])) {
	$order_amt = $_GET["price"];
	$order_status = "PENDING";
	//$order_id = $_GET["order_id"];

	//sql for order_invoice table
	$sql = "INSERT INTO order_invoice (Order_Status, Order_Amount, Cust_ID)
		VALUES ('" . $order_status . "','" . $order_amt . "','" . $_SESSION["UID"] . "')";
	
		if (mysqli_query($conn, $sql)) {	
			
			$order_id = mysqli_insert_id($conn);
		} else {
		echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}	
		
	foreach ($_SESSION["cart_item"] as $item){	
		//sql for order_line table
		$sql2 = "INSERT INTO order_line (Order_ID, Product_ID, Product_Qty)
		VALUES ('" . $order_id . "','" . $item["prodID"] . "','" . $item["quantity"] . "')"; 
	
	if (mysqli_query($conn, $sql2)) {
			//echo "<p>New customer order record created successfully.";	
			$line_id = mysqli_insert_id($conn);
		} else {
		echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}
	}

}

?>


<?php
if(isset($_SESSION["id"])){
    $total_quantity = 0;
    $total_price = 0;
    $delievery_charges = 3;


?>
	
<table cellpadding="10" cellspacing="1" id="carttable" width="60%" style="margin: 0 10px 0 10px;">
<tbody>
<tr id="carttable tr">
	<th style="padding-top: 12px; padding-bottom: 12px; text-align: left; background-color: #909090; color: white;">Item</th>
	<th style="padding-top: 12px; padding-bottom: 12px; text-align: center; background-color: #909090; color: white;">Code</th>
	<th style="padding-top: 12px; padding-bottom: 12px; text-align: center; background-color: #909090; color: white;" width="15%">Quantity</th>
	<th style="padding-top: 12px; padding-bottom: 12px; text-align: center; background-color: #909090; color: white;" width="15%">Unit Price (RM)</th>
	<th style="padding-top: 12px; padding-bottom: 12px; text-align: center; background-color: #909090; color: white;" width="15%">Price (RM)</th>
	<th style="padding-top: 12px; padding-bottom: 12px; text-align: center; background-color: #909090; color: white;" width="15%">Order Id</th>
	<th style="padding-top: 12px; padding-bottom: 12px; text-align: center; background-color: #909090; color: white;" width="15%">Delivery Charges</th>
	
</tr>	


<?php		
foreach ($_SESSION["cart_item"] as $item){
	$item_price = $item["quantity"]*$item["price"];
	?>
	<tr>
	<td id="#carttable td" style="text-align:left;"><?php echo $item["name"];?></td>				
	<td id="#carttable td" style="text-align:center;"><?php echo $item["prodID"]; ?></td>
	<td id="#carttable td" style="text-align:center;"><?php echo $item["quantity"]; ?></td>
	<td id="#carttable td" style="text-align:center;"><?php echo $item["price"]; ?></td>
	<td id="#carttable td" style="text-align:center;"><?php echo number_format($item_price,2); ?></td>
	<td id="#carttable td" style="text-align:center;"><?php echo $order_id; ?></td>
	<td id="#carttable td" style="text-align:center;"><?php echo "RM ".number_format($delievery_charges, 2); ?></td>
	
	</tr>

	<?php
	$total_quantity += $item["quantity"];
	$total_price += ($item["price"]*$item["quantity"]) + $delievery_charges;
	}
	?>
Your
<tr>
<td colspan="2" text-align="center"><b>Total:</b></td>
<td style="text-align:center;"><?php echo $total_quantity; ?></td>
<td style="text-align:center;" colspan="4"><strong><?php echo "RM ".number_format($total_price, 2); ?></strong></td>
<input type = "hidden" name = "tot_price" value = "<?php echo $total_price;?>">
<!--<td style="text-align:center;"><button onclick="continuepayment(price=<?php echo $total_price;?>)" type="submit">Continue to Payment</button></td>-->
<td style="text-align:center;"><button onclick="continuepayment(price=56)" type="submit">Continue to Payment</button></td>
<p><?php echo htmlentities($row['Order_Amount']);?></p>
<script>
function continuepayment(price) {
  var r = confirm("Are you sure you want to continue to payment?");
  if (r == true) {
    //location.replace("payment.php?price=<?php //echo $total_price;?>")
    location.replace("payment.php?price=56")
	echo var_dump($row['Order_Amount']);
  } else {
    location.replace("checkout.php")
  }
}
</script>

</tr>
</tbody>
</table>	
	
<p style="margin: 15px; float:left;"><a href="home.php"><i class="fa fa-shopping-cart" style="font-size:24px;"></i>Continue Shopping</a></p>
<?php
unset($_SESSION["cart_item"]);//unset cart
?> 

<?php
} else {
?>
<p>Your Receipt is Empty</p>
<?php 
}

?>
</div>
<!-- Footer -->

</body>

</html>