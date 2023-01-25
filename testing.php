<?php
session_start();
include("connect.php");


$id=$_SESSION['id'];
$id2=$_SESSION['value'];
foreach($id2 as $value){
echo ',';
echo $value;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="cart_test.css" />
</head>
<body>

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
                    }

} else {
echo "Data to render this page is missing.";
exit();
}?>

</div>
    
</body>
</html>