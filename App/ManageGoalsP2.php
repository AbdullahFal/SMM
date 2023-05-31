<?php

// Retrieve the message from the query parameter
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
    <h1>User Goals</h1>
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
        
            <button type="submit" name ="submit" class="btn btn-primary">Delete</button>
        </form>
        </div>
        </div>


        </div>

    
</body>
</html>