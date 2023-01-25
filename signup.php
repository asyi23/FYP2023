<?php
session_start();
include("connect.php");


if(isset($_POST['sign'])){
    $email = $_POST['user'];
    $Pass = $_POST['password'];
    $name = $_POST['Name'];
    $address = $_POST['Address'];
    $radio = $_POST['radio1'];
    $pm = $_POST['phonenumber'];
    $date = $_POST['date'];

    if($radio == 'Seller'){
        $sql = "INSERT INTO admin (admin_name, phonenumber, email,address,birthday,password)
        VALUES ('$name', '$pm', '$email','$address','$date','$Pass')";

       if ($conn->query($sql) === TRUE) {
            echo "New record created successfully";
      } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
      }
    }

    if($radio == 'Customer'){
        $sql = "INSERT INTO user (name, phone_num, email,address,date,password)
        VALUES ('$name', '$pm', '$email','$address','$date','$Pass')";

       if ($conn->query($sql) === TRUE) {
            echo "New record created successfully";
      } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
      }
    }
}
?>


<!DOCTYPE html>

    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!--<title> Responsive Login and Signup Form </title>-->

        <!-- CSS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
        <link rel="stylesheet" href="login.css">
                
        <!-- Boxicons CSS -->
        <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
         <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
                        
    </head>
    <body>
    <header class="header">
        <div class="logo">
            <img src="prezent.png">
        </div>
        <div class="search">
            <input type="text" class="search-bar" id="search">
        </div>

        <div class="icon">
        <a href="#" class="fas fa-shopping-cart" id="cart-btn" onclick="showAlert()"></a>
        <a href="#" class="fas fa-user" id="menu-btn" onclick="showAlert()"></a>
        </div>

    </header>
        <div class="title">
            <h3 class="animate-charcter"> WELCOME TO PREZENT</h3> 
        </div>
 
        <section class="container-forms">
            <div class="form-login">
                <div class="form-content">
                    <header>Sign Up</header>
                    <form name="f1" action="signup.php" onsubmit = "return validation()" method="post">
                        <div class="cat">
                             <input type="radio" name="radio1" value="Seller">  
                             <span>Seller</span>
                             <input type="radio" name="radio1" value="Customer">  
                             <span>Customer</span>
                        </div>
                        <div class="field-input-field-name">
                           <input type="text" placeholder="Name" class="Name" id="Name" name="Name">
                        </div>

                        <div class="field-input-field" id="email">
                            <input type="email" placeholder="Email" class="input" id="user" name="user" onclick="emailFunction()">
                        </div>

                        <div class="field-input-field-password">
                           <input type="password" placeholder="Password" class="password" id="password" name="password">
                        </div>

                        <div class="field-input-field">
                           <input type="text" placeholder="Address" class="Address" id="Address" name="Address">
                        </div>

                        <div class="field-input-field">
                           <input type="text" placeholder="Phone Number" class="phonenumber" id="phonenumber" name="phonenumber">
                        </div>

                        <div class="field-input-field">
                            <p>Birthday<input type="date" placeholder="date" class="date" id="date" name="date"></p>
                        </div>


          
                        <div class="field-button-field">
                            <input type="submit" id="btn" name="sign" value="sign"/>
                        </div>
                    </form>
                    <div class=""></div>

                </div>

               
                <!-- <p>OR</p> -->
                <!-- <div class="seller">
                    <a href="login.php">Seller</a>
                </div> -->

            </div>

            <script>
                function validation(){
                    var id=document.f1.user.value;
                    var ps=document.f1.password.value;
                    if(id.length=="" && ps.length=="") {  
                    alert("User Name and Password fields are empty");  
                    return false;  
                }  
                else  
                {  
                    if(id.length=="") {  
                        alert("User Name is empty");  
                        return false;  
                    }   
                    if (ps.length=="") {  
                    alert("Password field is empty");  
                    return false;  
                    }  
                }                             
            }  
            </script>
            </section>
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
    <script>
  function showAlert() {
    var myText = "You need to log in first";
    alert (myText);
  }
  </script>
       



    </body>
</html>
