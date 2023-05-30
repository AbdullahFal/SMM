<?php 

if(isset($_POST["submit1"]))
{
header("location:Deposit.php");
}
if(isset($_POST["submit2"]))
{
header("location:Goals.php");
}
if(isset($_POST["submit3"]))
{
header("location:Withdral.php");
}
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Home page</title>
</head>

<body>
    
<style>
  body {
    
  }
  nav{
        background-color: blueviolet;
        color: white;
        position: fixed;
        top: 0;
        width: 100%;
    }
    .btn{
        background: none;
        float: right;
    }
    .btn:hover{
        background-color: #a560e6;
    }
    button a{
        color: white;
    }
    button a:hover{
        color: black;
        text-decoration: none;
    }
    .container{
  width: 800px;
  margin: 0 auto;
  background-color: blueviolet;
  padding: 20px;
  box-shadow: 10px 10px gray;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  display: flex;
  justify-content: center;
}

form {
  display: inline-block;
  margin: 0 10px;

}


  </style>

<nav>
        <img src="" width="30" height="30" class="d-inline-block align-top" alt="Logo">
        Spare My Money
        <button type="button" class="btn"><a href="ProfilePage.php">Profile</a></button>
        <button type="button" class="btn"><a href="Wallet.php">Wallet</a></button>
        <button type="button" class="btn"><a href="rewards.html">Rewards</a></button>
        <button type="button" class="btn"><a href="LandingPage.php">Home</a></button>
    </nav>  
    <div class="container">

    <form name= "form1" action="" method="post">
    <input type="submit" name="submit1" value="Deposit">
</form>

<form name= "form2" action="" method="post">
    <input type="submit" name="submit2" value="Manage Goals">
</form>

<form name= "form2" action="" method="post">
    <input type="submit" name="submit3" value="Withdraw">
</form>

</div>

</body>
</html>