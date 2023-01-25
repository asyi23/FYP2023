
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
        <link rel="stylesheet" href="index.css">
                
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
            <input type="text" class="search" id="search">
        </div>

        <div class="icon">
        <a href="#" class="fas fa-shopping-cart" id="cart-btn" onclick="showAlert()"></a>
        <a href="#" class="fas fa-user" id="menu-btn" onclick="showAlert()"></a>
        </div>

    </header>
        <div class="title">
            <h3 class="animate-charcter"> WELCOME TO PREZENT</h3> 
        </div>

        <div class="user">
            <div class="type">
                <p>Customer</p>
                <a href ="login.php" class="fas fa-user"></a>
            </div>
            <div class="type">
                <p>Seller</p>
                <a href="login_admin.php" class="fas fa-user"></a>
            </div>
        </div>
</div>


            
            <footer>
                <div class="social"><a href="#"><i class="icon ion-social-instagram"></i></a><a href="#"><i class="icon ion-social-snapchat"></i></a><a href="#"><i class="icon ion-social-twitter"></i></a><a href="#"><i class="icon ion-social-facebook"></i></a></div>
                <ul class="list-inline">
                    <li class="list-inline-item"><a href="#">Home</a></li>
                    <li class="list-inline-item"><a href="#">Services</a></li>
                    <li class="list-inline-item"><a href="#">About</a></li>
                    <li class="list-inline-item"><a href="#">Terms</a></li>
                    <li class="list-inline-item"><a href="#">Privacy Policy</a></li>
                </ul>
                </div>
                <p class="copyright">Asyidatul Asindi © 2022</p>
            </footer>
      

       

            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.bundle.min.js"></script>

    </body>
</html>
