<?php 
error_reporting(E_ERROR);
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
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./CSS/bootstrap.rtl.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <title>Wallet</title>
</head>
<style>
  body {
    background-image: linear-gradient(to top, #cdcdcd, #d1d1d1, #d6d6d6, #dadada, #dfdfdf, #e3e3e3, #e7e7e7, #ebebeb, #f0f0f0, #f5f5f5, #fafafa, #ffffff);
  }
  nav{
   background-color: #720083;
        color: white;
        position: fixed;
        top: 0;
        width: 100%;
        height: 50px;
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

.Content{
  width: auto;
  margin: auto;
  background-image: linear-gradient(to top, #bd5ccd, #ba5aca, #b758c6, #b556c3, #b254c0, #ac4eba, #a647b3, #a041ad, #9434a2, #892798, #7d178d, #720083);
  padding: 20px;
  box-shadow: 10px 10px gray;
  position: absolute;
  top: 55%;
  left: 50%;
  transform: translate(-50%, -50%);
  color: white;
  text-align: center;
  justify-content: center;
}
.Content input{
    background: none;
    border: none;
    color: white;
}
.Content input:hover{
    background-color: #a560e6;
    color: black;
}
form {
  display: inline-block;
  margin: 0 10px;

}

.from-lablel{
    color: white;
}

.footer-clean {
  padding:50px 0;
  background-image: linear-gradient(to top, #bd5ccd, #ba5aca, #b758c6, #b556c3, #b254c0, #ac4eba, #a647b3, #a041ad, #9434a2, #892798, #7d178d, #720083);
  color:white;
  bottom: 10px;

  
}

.footer-clean h3 {
  margin-top:0;
  margin-bottom:12px;
  font-weight:bold;
  font-size:16px;
}

.footer-clean ul {
  padding:0;
  list-style:none;
  line-height:1.6;
  font-size:14px;
  margin-bottom:0;
}

.footer-clean ul a {
  color:inherit;
  text-decoration:none;
  opacity:0.8;
}

.footer-clean ul a:hover {
  opacity:1;
}

.footer-clean .item.social {
  text-align:right;
}

.footer-clean .item.social > a {
  font-size:24px;
  width:40px;
  height:40px;
  line-height:40px;
  display:inline-block;
  text-align:center;
  border-radius:50%;
  border:1px solid #ccc;
  margin-left:10px;
  margin-top:22px;
  color:inherit;
  opacity:0.75;
}

.footer-clean .item.social > a:hover {
  opacity:0.9;
}



.footer-clean .copyright {
  margin-top:14px;
  margin-bottom:0;
  font-size:13px;
  opacity:0.6;
}
</style>

<body>

<nav>
        Spare My Money
        <button type="button" class="btn"><a href="ProfilePage.php">Profile</a></button>
        <button type="button" class="btn"><a href="Wallet.php">Wallet</a></button>
        <button type="button" class="btn"><a href="RewardsP2.php">Rewards</a></button>
        <button type="button" class="btn"><a href="LandingPage.php">Home</a></button>
        <button type="button" class="btn" style="float: center;"><a href="https://arehaili-dev.itch.io/sparemymoney">Try Our Game!</a></button>

    </nav>  



    
    <svg viewBox="0 0 500 200">
  <path d="M 0 50 C 150 150 300 0 500 80 L 500 0 L 0 0" fill="#720083"></path>
  <path d="M 0 50 C 150 150 330 -30 500 50 L 500 0 L 0 0" fill="##AF51BC" opacity="0.8"></path>
 <path d="M 0 50 C 215 150 250 0 500 100 L 500 0 L 0 0" fill="#BD5CCD" opacity="0.5"></path>
</svg>

<div class="Content">
                <h2>Balance</h2>
                <?php if(isset($user)) ?>
                <h1><?= htmlspecialchars($user["balance"])?></h1>
                <br>
                <br>
                <h2>Points</h2>
                <h1><?= htmlspecialchars($user["points"])?></h1>
                <br>
                <br>
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

<div class="footer-clean">
        <footer>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-sm-4 col-md-3 item">
                        <h3>Services</h3>
                        <ul>
                            <li><a href="#">Web design</a></li>
                            <li><a href="#">Development</a></li>
                            <li><a href="#">Hosting</a></li>
                        </ul>
                    </div>
                    <div class="col-sm-4 col-md-3 item">
                        <h3>About</h3>
                        <ul>
                            <li><a href="#">Company</a></li>
                            <li><a href="#">Team</a></li>
                            <li><a href="#">Legacy</a></li>
                        </ul>
                    </div>
                    <div class="col-sm-4 col-md-3 item">
                        <h3>Careers</h3>
                        <ul>
                            <li><a href="#">Job openings</a></li>
                            <li><a href="#">Employee success</a></li>
                            <li><a href="#">Benefits</a></li>
                        </ul>
                    </div>
                    <div class="col-lg-3 item social"><a href="#"><i class="icon ion-social-facebook"></i></a><a href="#"><i class="icon ion-social-twitter"></i></a><a href="#"><i class="icon ion-social-snapchat"></i></a><a href="#"><i class="icon ion-social-instagram"></i></a>
                        <p class="copyright">Spare My Money © 2023</p>
                    </div>
                </div>
            </div>
        </footer>
    </div>

</body>
</html>
