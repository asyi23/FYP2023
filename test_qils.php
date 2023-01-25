<?php
session_start();
include("connect.php");
?>

<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Add Restaurant</title>
  <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous"><link rel="stylesheet" href="./style.css">
</head>

<right>
	<h1> My Borneo Travel Guide </h1>
</right>


<center>
<div class="box-form2">
	<div class="center">

     <h4>Add Restaurant</h4>
    
    <form action="test_qils.php" method="post" enctype="multipart/form-data">

    <p>Restaurant Name: 
    <input type="text" name="rest_name" required></p>

    <p>Restaurant Description : 
    <input type="text" name="rest_desc" required></p>

    <p>Restaurant Image : 
    <input type="file" name="fileToUpload" id="fileToUpload" required></p>

    <p>Restaurant Location : 
    <input type="text" name="rest_loc" required></p>

    <button type="submit" name="save">Add</button>&nbsp;<input type="reset"> 

    <br></br>

    </form>

  </div>
</div>
      </div>
     </div>
  </div>
</div>
</div>
</div>
	</div>
	
</div>
<button><a href="admin_restaurant.php">BACK</a></button>
<!-- partial -->
  
 </center> 
</body>
</html>

<?php
		$msg= "";
		if(isset($_POST['save'])){

			$target="uploads/".basename($_FILES["fileToUpload"]["name"]);
			$REST_NAME = $_POST['rest_name'];
			$REST_DESC = $_POST['rest_desc'];
		    $REST_IMG = $_FILES['fileToUpload']['name'];
		    $REST_LOC = $_POST['rest_loc'];


		 if (!$conn)
        {
            die("Connection failed!" . mysqli_connect_error());
        }


		$sql="INSERT INTO restaurant(REST_ID,REST_NAME,REST_DESC,REST_IMG,REST_LOC) 
		VALUES('', '$REST_NAME','$REST_DESC' , '$target' ,'$REST_LOC') ";

		$result = mysqli_query($conn, $sql);
        if($result)
        {
            echo '<script type="text/javascript">';
		    echo 'alert("New restaurant added")';  //not showing an alert box.
		    echo '</script>';
			
		}else{
			echo"error".$sql."<br>".mysqli_error($conn);
		}
		
      //connection closed.
        mysqli_close($conn);

		//if(mysqli_query($conn,$sql)){
		//	echo '<script type="text/javascript">';
		//  echo ' alert("New record")';  //not showing an alert box.
		//    echo '</script>';
			
			
		//}else{
		//	echo"error".$sql."<br>".mysqli_error($conn);
		//}
		//mysqli_close($conn);
		}
	?>