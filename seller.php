<?php

session_start();
include("connect.php");
$seller =$_SESSION['id'];

//fetch data

$sql = mysqli_query($conn,"SELECT * FROM admin WHERE id='$seller'");
$user = mysqli_num_rows($sql);
if ($user > 0) {
  // get all the product details
  while($row = mysqli_fetch_array($sql)){
           $name = '"'.$row['admin_name'].'"';
           $email = $row["email"];
           $phonenumber = $row["phonenumber"];
          //  $address = $row["address"];
           $date = $row["birthday"];
           $address = '"'.$row['address'].'"';
         
       }

} else {
  echo "That item does not exist.";
    exit();
}

//update data

if(isset($_POST['edit'])){
  $id =$_SESSION['id'];
  $email=$_POST['email'];
  $name=$_POST['name'];
  $phonenumber=$_POST['phonenumber'];
  $address=$_POST['address'];


  $insert = "UPDATE admin SET email = '$email', admin_name = '$name', phonenumber='$phonenumber', address='$address' WHERE id = '$id'";
  if (mysqli_query($conn, $insert)) {
    echo "New record created successfully";
    header("Location:seller.php");
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
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.7/css/all.min.css">
    <link 
  href="https://fontawesome.com/v5/icons/sign-out-alt?s=solid&f=classic" 
  rel="stylesheet"  type='text/css'>

    
    <link rel="stylesheet" href="seller.css">

    
</head>
<body>
<header class="header">
        <div class="logo">
            <a><img src="prezent.png"></a>
        </div>
        <div class="icon">
        <a href="logout_admin.php"class="fas fa-sign-out" id="menu-btn"></a>
        <a href="seller.php"class="fas fa-user" id="menu-btn"></a>
        <a href="logout_admin.php" class="fas fa-sign-out-alt" style="text-decoration:none;color:#d76872"></a>
        
        </div>

    </header>


<div class="tab">
  <button class="tablink" onclick="openPage('dashboard', this,'#d2c6b4')" id="defaultOpen">Dashboard</button>
  <button class="tablink" onclick="openPage('profile', this,'#d2c6b4')" >My Profile</button>
  <button class="tablink" onclick="openPage('product', this,'#d2c6b4')">My Product</button>
  <button class="tablink" onclick="openPage('order', this,'#d2c6b4')">Orders</button>
</div>


<div id="profile" class="tabcontent">
<form action="seller.php" method="post">
  <p>Email:</P>
  <input type="email" placeholder="Email" class="input" id="email" name="email" value=<?php echo $email?>>
  <P>Name:</P>
  <input type="text" placeholder="Email" class="input" id="name" name="name" value=<?php echo $name?>>
  <P>Phone Number:</P>
  <input type="text" placeholder="Email" class="input" id="phonenumber" name="phonenumber" value=<?php echo $phonenumber?>>
  <P>Address:</P>
  <input type="text" placeholder="Email" class="input" id="address" name="address" value=<?php echo $address?>></br>
  
  <input type="submit" id="btn" name="edit" value="update" class="profile"/>
  </form>
</div>

<div id="dashboard" class="tabcontent">

  
  <div class="list1">
    <p>To Do List</p>
    <i class='fas fa-book-open'  style='font-size:40px;'></i></br>
    <p1>What do you want to get done today?</p1></br>
    <label for="list">Activity:</label>
    <input type="text" id="myInput" name="list"></br>
    <span onclick="newElement()" class="addBtn">Add</span>
  </div>

  <ul class="myUL" id="myUL">

  </ul>


<script>
// Create a "close" button and append it to each list item
var myNodelist = document.getElementsByTagName("LI");
var i;
for (i = 0; i < myNodelist.length; i++) {
  var span = document.createElement("SPAN");
  var txt = document.createTextNode("\u00D7");
  span.className = "close";
  span.appendChild(txt);
  myNodelist[i].appendChild(span);
}

// Click on a close button to hide the current list item
var close = document.getElementsByClassName("close");
var i;
for (i = 0; i < close.length; i++) {
  close[i].onclick = function() {
    var div = this.parentElement;
    div.style.display = "none";
  }
}

// Add a "checked" symbol when clicking on a list item
var list = document.querySelector('ul');
list.addEventListener('click', function(ev) {
  if (ev.target.tagName === 'LI') {
    ev.target.classList.toggle('checked');
  }
}, false);

// Create a new list item when clicking on the "Add" button
function newElement() {
  var li = document.createElement("li");
  var inputValue = document.getElementById("myInput").value;
  var t = document.createTextNode(inputValue);
  li.appendChild(t);
  if (inputValue === '') {
    alert("You must write something!");
  } else {
    document.getElementById("myUL").appendChild(li);
  }
  document.getElementById("myInput").value = "";

  var span = document.createElement("SPAN");
  var txt = document.createTextNode("\u00D7");
  span.className = "close";
  span.appendChild(txt);
  li.appendChild(span);

  for (i = 0; i < close.length; i++) {
    close[i].onclick = function() {
      var div = this.parentElement;
      div.style.display = "none";
    }
  }
}
</script>

<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
</div>




<div id="product" class="tabcontent">
<a href="addproduct.php"><button>Add Product</button></a>
<table class="cart">
            <tr>
                <th>Image</th>
                <th>Name</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Category</th>
              
            </tr>
            <?php
            if(isset($_SESSION['id'])){
              $id = $_SESSION['id'];
              $sql = mysqli_query($conn,"SELECT * FROM product WHERE seller='$id'");
              $product =mysqli_num_rows($sql);

              if($product >0){
                while($row = mysqli_fetch_assoc($sql)){
                  $id  = $row["id"]; 
                  $pic = $row["img"];
                  $product_name = $row["product_name"];
                  $quantity = $row["quantity"];
                  $price = $row["price"]; 
                  $cat = $row["cat"];   
             ?>
              <tr>
              <td><img id="image" src="uploads/<?php echo htmlentities($pic); ?>" /><br /></td>
              <td><p> <?php echo htmlentities($product_name);?></p></td>
              <td><p>RM<?php echo htmlentities($quantity);?></p> </td>
              <td><p><?php echo htmlentities($price);?></p></td>
              <td><p><?php echo htmlentities($cat);?></p></td>
       
              </tr>
              <?php

              }
            }
            else {
              echo "No product yet";
            
          }
          
          } else {
            echo "Seller do not exist";
          }

            ?>
</table>
</div>

<div id="order" class="tabcontent">

<table class="cart">
            <tr>
                <th>Buyer</th>
                <th>Image</th>
                <th>Name</th>
                <th>Quantity</th>
                <th>Order wish</th>
                <th>Card</th>
                <th>Text color</th>
                <th>Total</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
            <?php
            if(isset($_SESSION['id'])){
              $id1 = $_SESSION['id'];
              $sql = mysqli_query($conn,"SELECT * FROM neworder inner join user on user.id=neworder.user_id INNER JOIN product on neworder.product_id=product.id  WHERE product.seller='$id1'");
           //   $sql = mysqli_query($conn,"SELECT * FROM ordercust where seller='1'");
              $product =mysqli_num_rows($sql);

              if($product >0){
                while($row = mysqli_fetch_assoc($sql)){
                  $order_id= $row['order_id'];
                  $buyer_id = $row['name'];
                  $_SESSION['order_id']  = $row["order_id"]; 
                  $img = $row["img"];
                  $buyer = $row["name"];
                  $product_name = $row["product_name"];
                  $quantity = $row["order_quantity"];
                  $price = $row["price"]; 
                  $status = $row["order_status"]; 
                  $wish = $row['order_wish'];
                  $textcolor = $row['order_text_color'];
                  $card = $row['order_card_design'];
                  $order_total = $row['order_total'];

             ?>
             <form action="update_status.php" method="post">
              <tr>
              <td><p> <?php echo htmlentities($buyer_id);?></p><br /></td>
              <td><img id="image" src="uploads/<?php echo htmlentities($img); ?>" /><br /></td>
              <td><p> <?php echo htmlentities($product_name);?></p></td>
              <td><p><?php echo htmlentities($quantity);?></p> </td>
              <td><p><?php echo htmlentities($wish);?></p></td>
              <td><img id="image" src=<?php echo htmlentities($card);?> /><br /></td>
              <td><p><?php echo htmlentities($textcolor);?></p></td>
              <td><p><?php echo htmlentities($order_total);?></p></td>
              <td><input type="text" id="status" name="status" value=<?php echo htmlentities($status);?>></td>
              <!-- <td><input type="submit" class="Update" value="Update" name="Update"></td> -->
              <td><button name="update" type="submit" value=<?php echo htmlentities($order_id);?>>update</button></td>
              </tr>
              </form>
              <?php

              }
            }
            else {
              echo "No order";
              
              if(isset($_POST['update'])){
                
                $newstatus = $_POST['status'];
                $id2 = $_POST['update'];
                echo $id2;
                $update = "UPDATE neworder SET order_status = 'aaa' WHERE order_id = '$id2'";
              if (mysqli_query($conn, $update)) {
                echo "New updated created successfully";
                
                header("Location:seller.php");
              } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
              }
              
              
              }
          }
          
          } else {
          echo "Data to render this page is missing.";
          
          }



            ?>
</table>

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