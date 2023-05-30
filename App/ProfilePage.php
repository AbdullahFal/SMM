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
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="style.css" />
    <title>Profile page</title>
</head>

<body>
    <nav class="navbar">
        <img src="img/wallet.png" alt="Logo">
        <!-- LOGO -->
        <div class="logo">Spare My Money</div>

        <!-- NAVIGATION MENU -->
        <ul class="nav-links">

            <!-- NAVIGATION MENUS -->
            <div class="menu">

                <li><a href="index.html">Home</a></li>
                <li><a href="AboutUs.html">About us</a></li>
                <li><a href="ContactUs.html">Contact us</a></li>
                <li><a href="Wallet.html">Wallet</a></li>
                <li><a href="Profile.html">Profile</a></li>
            
            </div>


        </ul>
    </nav>

    <div class="container">
        
        <div class="content">
            <div class="text">
                <h2>name</h2>
                <?php if(isset($user)) ?>
        <h1> <?= htmlspecialchars($user["full_name"]) ?> 
                <br>
                <br>
                <h2>Email</h2>
                <?= htmlspecialchars($user["email"]) ?> 
                <br>
                <br>
                <h2>Credit Card</h2>
                <?= htmlspecialchars($user["CreditCard"]) ?> 
                <br>
                <a href="CreditCard.php" class="btn btn-primary">Change Credit Card</a>


           
        </div>
</body>

</html>