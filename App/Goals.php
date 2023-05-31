<?php


session_start();
error_reporting(E_ERROR);
if (!isset($_SESSION["user_id"])) {
   header("Location: login.php");

}else{
    
   
    require_once "database.php";
    $sql = "SELECT * FROM users
            WHERE id = {$_SESSION["user_id"]}";
              $result = mysqli_query($conn, $sql);
              $user = mysqli_fetch_array($result, MYSQLI_ASSOC);
    
}

// Seting the goals




//only when submitting the code
if($_SERVER['REQUEST_METHOD'] === 'POST'){

	$UserId = $user['id'];
	$StartDate = $_POST['StartDate'];
	$EndDate = $_POST['EndDate'];
	$Saving = $_POST['Saving'];
    $message;


	$systemMessage = '';
	$errors = [
		'UserIdError' => '',
		'StartDateError' => '',
		'EndDateError' => '',
		'SavingError' => '',
	];


    if(empty($StartDate)){
        $errors['StartDateError']  = "Enter the start date";
        
    }

	if(empty($EndDate)){
        $errors['EndDateError']  = "Enter the end date";
        
    }

	if(empty($Saving)){
        $errors['SavingError']  = "Enter The amount to save ";
        
    }



    if(!empty($UserId) && !empty($StartDate) && !empty($EndDate) && !empty($Saving) ){

		          // Connect to the database
				  $conn = mysqli_connect("localhost", "root", "", "SpareMyMoney");

				  // Check connection
				  if (!$conn) {
					  die("Connection failed: " . mysqli_connect_error());
				  }

				 // Generate a random number
				$random_number = rand(1000, 9999);

				// Check if the random number already exists in the table
				$sql = "SELECT * FROM usersgoals WHERE id = $random_number";
				$result = mysqli_query($conn, $sql);

				// Loop until a unique random number is found
				while (mysqli_num_rows($result) > 0) {
				$random_number = rand(1000, 9999);
				$sql = "SELECT * FROM usersgoals WHERE id = $random_number";
				$result = mysqli_query($conn, $sql);
				}

				$sql = "INSERT INTO usersgoals VALUES ('$random_number','$UserId','$StartDate','$EndDate','$Saving')";

				if (mysqli_query($conn, $sql)) {
					$message = "New Goal created successfully";
                    // Close the connection
                    mysqli_close($conn);
                    // Redirect the user to the confirmation page with the message as a query parameter
                    // header("Location: confirmation.php?message=" . urlencode($message));
                    $systemMessage = "Goal set successfully";

                    // exit();
				} else {
					$systemMessage  = "Error: " . $sql . "<br>" . mysqli_error($conn);
				}

				// Close the connection
				// mysqli_close($conn);

    }
   
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>Goals</title>
</head>
<style>
    body{
        text-align: center;
    }
    nav{
   background-color: #720083;
        color: white;
        position: fixed;
        top: 0;
        width: 100%;
        height: 50px;
        z-index: 1;
    }
    .btn{
        background: none;
        float: right;
    }
    .btn:hover{
        background-color: #a560e6;
    }
    .btn a{
        color: white;
        text-decoration: none;
    }
    .btn a:hover{
        color: black;
        text-decoration: none;
    }
    .return a{
        color: black;
        float: center;
    }
</style>
<body>
<nav>
    <h3 style="float: left;">Spare My Money</h3>
    <div>
    <button type="button" class="btn"><a href="ProfilePage.php">Profile</a></button>
    <button type="button" class="btn"><a href="Wallet.php">Wallet</a></button>
    <button type="button" class="btn"><a href="RewardsP2.php">Rewards</a></button>
    <button type="button" class="btn"><a href="LandingPage.php">Home</a></button>
    <button type="button" class="btn"><a href="https://arehaili-dev.itch.io/sparemymoney">Try Our Game!</a></button>

</div>
</nav> 

<div class="container">

        <div class="position-relative  text-center ">
        <div class="col-md-5 p-lg-5 mx-auto my-5">

        <div  class="form-text error"><?php echo $systemMessage; ?></div>
        <form  action="<?php $_SERVER['PHP_SELF'] ?>" method = "POST" >
            <h3>Set goal</h3>
           
            <div class="mb-3">
                <label for="StartDate" class="form-label">Enter the Start Date</label>
                <input type="date" name="StartDate" class="form-control" id="StartDate" value ="<?php echo $email ?>" >
                <div  class="form-text error"><?php echo $errors['StartDateError']; ?></div>
            </div>
			<div class="mb-3">
                <label for="EndDate" class="form-label">Enter the end Date</label>
                <input type="date" name="EndDate" class="form-control" id="EndDate" value ="<?php echo $email ?>" >
                <div  class="form-text error"><?php echo $errors['EndDateError']; ?></div>
            </div>
			<div class="mb-3">
                <label for="Saving" class="form-label">Enter the amout to save</label>
                <input type="text" name="Saving" class="form-control" id="Saving" value ="<?php echo $email ?>" >
                <div  class="form-text error"><?php echo $errors['SavingError']; ?></div>
            </div>
            <button type="submit" name ="submit" class="btn-primary">Set goal</button>
        </form>
        </div>
    </div>
</div>
</body>
</html>


<?php

// Retrieve the message from the query parameter
// session_start();

// if (!isset($_SESSION["user_id"])) {
//    header("Location: login.php");

// }else{
    
//   require_once "database.php";
//   $sql = "SELECT * FROM users
//   WHERE id = {$_SESSION["user_id"]}";
//   $result = mysqli_query($conn, $sql);
//   $user = mysqli_fetch_array($result, MYSQLI_ASSOC);
// }
$user_id= $user['id'];
// Connect to the database
$conn = mysqli_connect("localhost", "root", "", "SpareMyMoney");

  // Check connection
  if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
 

if($_SERVER['REQUEST_METHOD'] === 'POST'){

  $goal_id = $_POST['goal_Id'];



       $systemMessage = "";
       $goal_id_Error = "";

       if(empty($goal_id)){

          $goal_id_Error = "goal Id is empty";
       }else{
              
              // delete the row from the database table based on the goal ID
              $sql = "DELETE FROM usersgoals WHERE id = $goal_id";
              if ($conn->query($sql) === TRUE) {
                // check if any rows were affected
                if ($conn->affected_rows > 0) {
                  $systemMessage = "Goal deleted successfully";
                } else {
                   $systemMessage = "Goal ID not found in database";
                }
              } else {
                  $systemMessage =  "Error deleting row: " . $conn->error;
              }
       }
    
}

?>



<!DOCTYPE html>
<html>
<head>
    <title>Display Rows from Database Table</title>
</head>
<body>
    <h3>User Goals</h3>
    <?php
     
      // retrieve rows from the database table based on user ID
      
      $sql = "SELECT * FROM usersgoals WHERE User_Id = $user_id";
      $result = $conn->query($sql);
      
      // check if any rows were returned
      if ($result->num_rows > 0) {
          // output data of each row
          while($row = $result->fetch_assoc()) {
              // do something with each row, such as display it in an HTML section
              echo "<p>" . "Goal ID: " .$row["id"] .", Goal start date:  " . $row["Start Date"]
               .", Goal end date:   " . $row["End Date"] .", The goal is to save " . $row["Amount to save"]. "</p>";
         }
      } else {
          echo "0 results";
      }
      
      // close the database connection
      mysqli_close($conn);
      
    ?>

      
        <div class="position-relative  text-center ">
        <div class="col-md-5 p-lg-5 mx-auto my-5">

        <div  class="form-text error"><?php echo $systemMessage; ?></div>
        <form  action="<?php $_SERVER['PHP_SELF'] ?>" method = "POST" >
            <h3>To delete a goal enter the goal ID</h3>
            <div class="mb-3">
                <label for="goal_Id" class="form-label">Goal Id</label>
                <input type="number" name="goal_Id" class="form-control" id="goal_Id" >
                <div  class="form-text error"><?php echo $goal_id_Error; ?></div>
            </div>
        
            <button type="submit" name ="submit" class="btn-primary">Delete</button>
            <br>
            <br>
            <div class="return"><a href="wallet.php" class="return">Back</a>
        </form>
        </div>
        </div>


        </div>

    
</body>
</html>