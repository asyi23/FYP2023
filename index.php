<?php
session_start();
include("connect.php");




/*if(isset($_POST['user']) && isset($_POST['password'])){
    $user = $_POST['user'];
    $pass = $_POST['password'];
    $sql = "select * from user where email ='$user' AND password ='$pass'";
    $result = mysqli_query($conn,$sql);

    if(mysqli_num_rows($result) === 1){
        $row = mysqli_fetch_assoc($result);
        if($row['email'] = $_SESSION("user") && $row['password'] = $_SESSION("pass")){
           
            echo 'Logged in!';
            header('Location:prac2.php');
        }
        else{
            echo 'Incorrect email or password';
            exit();
            
        }
    }

}*/

if(isset($_POST['login'])){
    if(!empty($_POST['radio'])){
    $Username = $_POST['user'];
    $Pass = $_POST['password'];
    $radio = $_POST['radio'];

    if($radio == "Customer"){
        $select = mysqli_query($conn,"SELECT * FROM user WHERE email='$Username' and password='$Pass'");
        $row= mysqli_fetch_array($select);
    
        if(is_array($row)){
            $_SESSION["user"] = $row["email"];
            $_SESSION["password"] = $row["password"];
            $_SESSION["id"] = $row["id"];
            $_SESSION["name"] = $row["name"];
            $_SESSION["address"] = $row["address"];
            $_SESSION["phone_num"] = $row["phone_num"];
            $_SESSION["type"] = $row["type"];
    
        }else{
            echo '<script type = "text/javascript">';
            echo 'alert("Invalid Username or Password!")';
            echo '</script>'; 
        }
        
        if(isset($_SESSION["user"])){
            echo '<script type = "text/javascript">';
            echo 'alert("Welcome to prezent!")';
            header("Location:prac2.php");
        }
    } 

    if($radio == "Seller"){
        $select = mysqli_query($conn,"SELECT * FROM admin WHERE email='$Username' and password='$Pass'");
        $row= mysqli_fetch_array($select);
    
        if(is_array($row)){
            $_SESSION["user"] = $row["email"];
            $_SESSION["password"] = $row["password"];
            $_SESSION["id"] = $row["id"];
            $_SESSION["name"] = $row["name"];
            $_SESSION["address"] = $row["address"];
            $_SESSION["phone_num"] = $row["phone_num"];
            $_SESSION["type"] = $row["type"];
    
        }else{
            echo '<script type = "text/javascript">';
            echo 'alert("Invalid Username or Password!")';
            echo '</script>'; 
        }
        
        if(isset($_SESSION["user"])){
            echo '<script type = "text/javascript">';
            echo 'alert("Welcome to prezent!")';
            echo '</script>';
            header("Location:seller.php");
            
        }
    }

}else{
    echo '<script type ="text/JavaScript">';  
    echo 'alert("Choose your role first")';  
    echo '</script>'; 
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
                    <header>Login</header>
                    <form name="f1" action="index.php" onsubmit = "return validation()" method="post">
                        <div class="cat">
                             <input type="radio" name="radio" value="Seller">  
                             <span>Seller</span>
                             <input type="radio" name="radio" value="Customer">  
                             <span>Customer</span>
                        </div>
                        <div class="field-input-field" id="email">
                            <input type="email" placeholder="Email" class="input" id="user" name="user" onclick="emailFunction()">
                        </div>

                        <div class="field-input-field-password">
                           <input type="password" placeholder="Password" class="password" id="password" name="password">
    
                        </div>

                        <div class="form-link">
                            <a href="forgot_password.php" class="forgot-pass">Forgot password?</a>
                        </div>

                        <div class="field-button-field">
                            <input type="submit" id="btn" name="login" value="login"/>
                        </div>
                    </form>

                    <div class="form-link">
                        <span>Don't have an account? <a href="#" class="link-signup-link" id="loginButton">Signup</a></span>
                    </div>
                </div>

                <div class="line"></div>

                <div class="media-options-facebook">
                    <a href="#" class="field-facebook">
                        <i class='bx bxl-facebook facebook-icon'></i>
                        <span>Login with Facebook</span>
                    </a>
                </div>

                <div class="media-options-google">
                    <a href="#" class="field-google">
                        <img src="#" alt="" class="google-img">
                        <span>Login with Google</span>
                    </a>
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
