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
$user_id= $user['id'];


// claming rewards 
$message;


//only when submitting the code
if($_SERVER['REQUEST_METHOD'] === 'POST'){


            

             // Connect to the database
            $conn = mysqli_connect("localhost", "root", "", "SpareMyMoney");

            // Check connection
            if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
            }


            // Retrieve the button value from the POST request
            $buttonName = $_POST['buttonName'];

           

            // Search the database table for the button value
            $sql = "SELECT * FROM coupons WHERE snum='$buttonName'";
            $result = mysqli_query($conn, $sql);

            // Check if any rows were returned
            if (mysqli_num_rows($result) > 0) {
                // Get the value of the "value" column from the first row
                $row = mysqli_fetch_assoc($result);
                $value = $row['value'];
                
                // Query the websiteaccounts table
                $sql = "SELECT * FROM users WHERE id = '$user_id '";
                $result2 = mysqli_query($conn, $sql);

                 // Check if a row was found
                if (mysqli_num_rows($result2) > 0) {
                    $row2 = mysqli_fetch_assoc($result2);
                    $points = $row2['points'];

                            // Check if the value is less than or equal to the account points
                            if ($value <= $points) {
                            
                                // Update the points in the websiteaccounts table
                                $newPointsBalance = $points - $value;
                                $updateSql = "UPDATE users SET points = $newPointsBalance WHERE id = '$user_id '";
                                $updateResult = mysqli_query($conn, $updateSql);

                                $message = "Here is your code: " . $buttonName;
                                header("Location: confirmation.php?message=" . urlencode($message));
                                exit();

                                    
                            } else {
                                $systemMessage = "You don't have enough points." . $points;
                            }
            
                }else{
                    $systemMessage = 'No results found points.';
                }

            } else {
                $systemMessage = 'No results found value.';
            }



            

            

            // Close the database connection
             mysqli_close($conn);
             
    
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

        <div  class="form-text error"><?php echo $systemMessage; ?><br></div>
        <form method="post" action="RewardsP2.php">
        <input type="hidden" name="user_id" value="<?php $user_id; ?>">
        <input type="hidden" name="buttonName" value="123">
        <button type="submit">Jarier 20% off</button>
        </form>

        <form method="post" action="RewardsP2.php">
        <input type="hidden" name="user_id" value="<?php $user_id; ?>">
        <input type="hidden" name="buttonName" value="1">
        <button type="submit">KFC 20% off</button>
        </form>
    
   
</body>
</html>