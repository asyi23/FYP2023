<?php

session_start();
include("connect.php");
$id=$_SESSION['id'];

$sql = "SELECT * from newcart where user_id='$id'";
  
    if ($result = mysqli_query($conn, $sql)) {
  
    // Return the number of rows in result set
    $rowcount = mysqli_num_rows( $result );
}
//fetch data
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
    header("Location:profile.php");
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
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

    <!-- css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="profile.css">

    
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
        <a href="logout.php"class="fas fa-sign-out" id="menu-btn"></a>
    
        </div>
        </div>
</header>


<div class="customer_section">
<button class="tablink" onclick="openPage('Home', this,'#d2c6b4')" id="defaultOpen">My Profile</button>
<button class="tablink" onclick="openPage('News', this,'#d2c6b4')">My Purchase</button>
<button class="tablink" onclick="openPage('Contact', this,'#d2c6b4')">Birthday Notification</button>
</div>

<div id="Home" class="tabcontent">
  <h3>My Account</h3>
  <p>Name: <?php echo $name?></p>
  <p>Email: <?php echo $email?></p>
  <p>Phone Number: <?php echo $phonenumber?></p>
  <p>Address: <?php echo $address?></p>
  <p>Birthday Date: <?php echo $date?></p>
  <a href="#">Edit</a>
</div>

<div id="News" class="tabcontent">
<table class="cart">
            <tr>
                <th>Image</th>
                <th>Name</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Status</th>
            </tr>
            <?php
            if(isset($_SESSION['id'])){
              $id = $_SESSION['id'];
              $sql = mysqli_query($conn,"SELECT * FROM ordercust WHERE buyer='$id'");
              $product =mysqli_num_rows($sql);

              if($product >0){
                while($row = mysqli_fetch_assoc($sql)){
                  $id  = $row["order_id"]; 
                  $seller = $row["seller"];
                  $product_name = $row["product_name"];
                  $quantity = $row["quantity"];
                  $price = $row["price"];   
                  $status= $row["status"];
                  $pic = $row["image"];
             ?>
              <tr>
              <td><img id="image" src="uploads/<?php echo htmlentities($pic); ?>" /><br /></td>
              <td><p> <?php echo htmlentities($product_name);?></p></td>
              <td><p>RM<?php echo htmlentities($quantity);?></p> </td>
              <td><p><?php echo htmlentities($price);?></p></td>
              <td><p><?php echo htmlentities($status);?></p></td>
       
              </tr>
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
          }

            ?>
</table>
</div>

<div id="Contact" class="tabcontent">
  <div class="row1">
    <p>Birthday reminder</p>
    <form action="profile.php" method="post">
    <label for="name" >Name</label>
    <input type="text" name="name">
    <label for="name">Date</label>
    <input type="date" name="date">
    </br>
    <input type="submit" value="submit" name="birthday">
   </form>

   <p>List of people</p>
   <table class="birthday">
            <tr>
                <th>Name</th>
                <th>Date</th>
                <th>Action</th>
            </tr>
            <?php
            if(isset($_SESSION['id'])){
              $id = $_SESSION['id'];
              $sql = mysqli_query($conn,"SELECT * FROM birthday_reminder WHERE userID='$id'");
              $product =mysqli_num_rows($sql);

              if($product >0){
                while($row = mysqli_fetch_assoc($sql)){
                  $id  = $row["id"]; 
                  $name = $row["name"];
                  $birthday = $row["birthday"];

             ?>
              <tr>
              <td><p><?php echo htmlentities($name);?></p></td>
              <td><p><?php echo htmlentities($birthday);?></p></td>
              <td><input type="submit" value="Delete" name="date-birthday"></td>

              </tr>
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
          }

            ?>
           
   </table>
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

<?php


?>

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