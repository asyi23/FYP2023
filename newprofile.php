<?php

session_start();
include("connect.php");
$id=$_SESSION['id'];
//total user cart
$sql = "SELECT * from newcart where user_id='$id'";
  
    if ($result = mysqli_query($conn, $sql)) {
  
    // Return the number of rows in result set
    $rowcount = mysqli_num_rows( $result );
}

//fetch user data
$sql = mysqli_query($conn,"SELECT * FROM user WHERE id='$id'");
$user = mysqli_num_rows($sql);
if ($user > 0) {
  // get all the product details
  while($row = mysqli_fetch_array($sql)){
           $name = $row["name"];
           $email = $row["email"];
           $phonenumber = $row["phone_num"];
           $address = $row["address"];
           $date = $row["date"];
       }

} else {
  echo "That item does not exist.";
    exit();
}


//insert birthday reminder
if(isset($_POST['birthday'])){

    $name= $_POST['name'];
    $enterdate = $_POST['date'];
    $id=$_SESSION['id'];
  
   
    $sql = "INSERT INTO birthday_reminder (name, birthday, userID)
  VALUES ('$name', '$enterdate', '$id')";
    // $insert_date = mysqli_query($conn, "INSERT INTO birthday_reminder(name, birthday, userID) VALUES('$name', '$enterdate', '$id')");
    // $message[] = 'reminder added succesfully';
    // if($insert_date){
    //   echo "Success"; 
    // }else{
    //   echo '<script>alert("Fail")</script>';
    // }
  
    if (mysqli_query($conn, $sql)) {
      echo "New record created successfully";
      header("Location:newprofile.php");
    } else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
  }


                               //delete

                     
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="profile.css">
    
    <title>Document</title>
</head>
<body>

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
        <p class="total_count"><?php echo $rowcount;?></p>
        <a href="cart.php" class="fas fa-shopping-cart" id="cart-btn"></a>
        <a href="profile.php"class="fas fa-user" id="menu-btn"></a>
        <a href="logout.php"class="fa fa-sign-out" id="menu-btn"></a>
    
        </div>
        </div>
</header>

<div class="customer_section">
<button class="tablink" onclick="openPage('profile', this,'#d2c6b4')" id="defaultOpen">My Profile</button>
<button class="tablink" onclick="openPage('purchase', this,'#d2c6b4')">My Purchase</button>
<button class="tablink" onclick="openPage('Contact', this,'#d2c6b4')">Birthday Notification</button>
</div>

<div id="profile" class="tabcontent">
  <h3>My Account</h3>
  <p contenteditable="true">Name: <?php echo $name?></p>
  <p contenteditable="true">Email: <?php echo $email?></p>
  <p contenteditable="true">Phone Number: <?php echo $phonenumber?></p>
  <p contenteditable="true">Address: <?php echo $address?></p>
  <p contenteditable="true">Birthday Date: <?php echo $date?></p>
  <a href="#">Edit</a>
</div>

<div id="purchase" class="tabcontent">
<p>My Purchase<p>
<?php
                if(isset($_SESSION['id'])){

                    $id1= preg_replace('#[^0-9]#i', '', $_SESSION['id']);
                    $sql = mysqli_query($conn,"SELECT * FROM neworder INNER JOIN product on neworder.product_id=product.id WHERE neworder.user_id='$id'");
                    $productCount = mysqli_num_rows($sql);

                    if ($productCount > 0) {
                        // get all the product details
                        while($row = mysqli_fetch_assoc($sql)){
                             $productid  = $row["id"]; 
                             $pic = $row["img"];
                             $product_name = $row["name"];
                             $quantity = $row["quantity"];
                             $wish = $row["order_wish"];
                             $wrapping_paper = $row["order_wrapping_paper"];
                             $textcolor = $row["order_text_color"];
                             $carddesign = $row["order_card_design"];
                             $pricetotal = $row["order_total"];
                             $status = $row["order_status"];         
?>
                    
                <div class="box-item">
                    <span><strong>Status:</strong><?php echo htmlentities($status);?></span></br>
                     <div class="inside">
                        <div class="flex">
                            <div class="img text-center">
                                <img src="uploads/<?php echo htmlentities($pic); ?>" alt="">
                            </div>
                        </div>
                        <div class="flex2">       
                            <div class="title">
                                <h3><?php echo htmlentities($product_name);?></h3>
                                <h4><?php echo htmlentities($pricetotal);?></h4>
                                <span><strong>Total item:</strong> <?php echo htmlentities($quantity);?></span></br>
                                <span><strong>Wish:</strong> <?php echo htmlentities($wish);?></span></br>
                                <span><strong>Wrapping paper color:</strong> <?php echo htmlentities($wrapping_paper);?></span></br>
                                <span><strong>Text color:</strong> <?php echo htmlentities($textcolor);?></span></br>
                                <span><strong>Card:</strong></span><br>
                                <img src=<?php echo htmlentities($carddesign);?> alt=""> 
                            </div>
                        </div>
                        
                    </div> 
                 </div>
                 
                     
                
<?php      
   }

  } 
else {
    echo "You do not have purchased anything";
    
}

} else {
echo "Data to render this page is missing.";

}?>

</div>

<div id="Contact" class="tabcontent">
    <div class="row1">
        <p>Birthday reminder</p>
           <form action="" method="post">
               <label for="name" >Name</label>
               <input type="text" name="name">
                <label for="name">Date</label>
               <input type="date" name="date">
                </br>
                <input type="submit" value="submit" name="birthday">
           </form>
        <p>List of people</p>
           <form action="newprofile.php" method="post">
             <table class="birthday">
                 <tr>
                     <th>Name</th>
                     <th>Date</th>
                     <th>Action</th>
                 </tr>
<?php
                          $sql = "SELECT * FROM birthday_reminder WHERE userID='$id'";
                          $result = $conn->query($sql);
                 
                          if ($result->num_rows > 0) {
                        // output data of each row
                             while($row = $result->fetch_assoc()) {
                                  $reminder_id  = $row["id"]; 
                                  $name = $row["name"];
                                  $birthday = $row["birthday"];
?>  
                            <tr>
                               <td><?php echo htmlentities($name);?></td>
                               <td><?php echo htmlentities($birthday);?></td>
                               <td><a href="newprofile.php">
                               <input type="submit" value="Delete" name="date_birthday">
                               </a></td>

                            </tr>
<?php  
                             
                              }
                            } else {
                                  echo "0 results";
                             }

                             if(isset($_POST['date_birthday'])){
                                $sql = "DELETE FROM birthday_reminder WHERE id='$reminder_id'";
                            
                            if ($conn->query($sql) === TRUE) {
                              
                              header('location:newprofile.php');
                            } else {
                              echo "Error deleting record: " . $conn->error;
                            }
                            
                            }
                
?>
             </table>
          </form>
              
      </div>

      

     <div class="row1" id="display">
         <p>Reminder</p>
             <div class="remind">
                 <?php
                     date_default_timezone_set("Asia/Kuala_Lumpur");
                     $date = date('Y-m-d');
                     if(isset($_SESSION['id'])){
                     $id = $_SESSION['id'];
                     $sql = mysqli_query($conn,"SELECT * FROM birthday_reminder WHERE userID='$id' AND birthday ='$date'");
                     $product =mysqli_num_rows($sql);
                     if($product >0){
                         while($row = mysqli_fetch_assoc($sql)){
                             $name = $row["name"];
                            $birthday = $row["birthday"];
                  ?>
                     <div class="board">
                          <p class="fas fa-bell" id="bell"></i>Today is <?php echo $name?> birthday. Dont forget to wish them!</p>
                          <p><?php echo $birthday?></p>  
                      </div>
                  <?php
                   }
                     }
                   }
                    ?>
             </div>
        </div>

</div>

<script>
function openPage(pageName,elmnt,color) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablink");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].style.backgroundColor = "";
  }
  document.getElementById(pageName).style.display = "block";
  elmnt.style.backgroundColor = color;
}

// Get the element with id="defaultOpen" and click on it
document.getElementById("defaultOpen").click();
</script>
    
</body>
</html>


