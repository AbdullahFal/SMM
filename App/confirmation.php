<?php
// Retrieve the message from the query parameter
$message = isset($_GET['message']) ? $_GET['message'] : '';
error_reporting(E_ERROR);
// Display the message to the user
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

        <!-- Display the message to the user --->
        <div  class="form-text error"><?php echo $message; ?></div>
       
        </div>
        </div>


        </div>
    
   
</body>
</html>