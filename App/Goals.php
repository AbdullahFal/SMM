<?php


session_start();

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
                    header("Location: confirmation.php?message=" . urlencode($message));
                    exit();
				} else {
					$systemMessage  = "Error: " . $sql . "<br>" . mysqli_error($conn);
				}

				// Close the connection
				mysqli_close($conn);

    }
   
}

?>






<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./CSS/bootstrap.rtl.min.css">
    <link rel="stylesheet" href="./CSS/style.css">
    <title>Document</title>
</head>
<body>


<div class="container">

        <div class="position-relative  text-center ">
        <div class="col-md-5 p-lg-5 mx-auto my-5">

        <div  class="form-text error"><?php echo $systemMessage; ?></div>
        <form  action="<?php $_SERVER['PHP_SELF'] ?>" method = "POST" >
            <h3>Set the goal</h3>
           
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
            <button type="submit" name ="submit" class="btn btn-primary">Set goal</button>
        </form>
        </div>
        </div>


        </div>
    
   
</body>
</html>