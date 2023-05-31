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







<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Rewards</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
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
        z-index: 1;
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
        text-decoration: none; 
    }
    button a:hover{
        color: black;
        text-decoration: none;
    }

.footer-clean {
  padding:50px 0;
  background-image: linear-gradient(to top, #bd5ccd, #ba5aca, #b758c6, #b556c3, #b254c0, #ac4eba, #a647b3, #a041ad, #9434a2, #892798, #7d178d, #720083);
  color:white;
  width: 100%;
  bottom: 0px;
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


    <div  class="form-text error" style="z-index: 1; text-align: center; top: 15%; color: black;"><br><br><br><h3><?php echo $systemMessage; ?></h3></div>
    
    <div class="row row-cols-1 row-cols-md-3 g-4" style="margin: 15px;">
        <div class="col">
            <div class="card">
                <img src="./inc/img/Amazon-Logo.png" class="card-img-top" style="height: 300px;">
                <div class="card-body">
                    <h5 class="card-title">25%</h5>
                    <p class="card-text">
                    When spending more than 400 SR <br>    
                    Claim this offer now! It is available globally.</p>
                    <p class="card-text"><small class="text-body-secondary">Until 16th June</small></p>
        <form method="post" action="RewardsP2.php">
        <input type="hidden" name="user_id" value="<?php $user_id; ?>">
        <input type="hidden" name="buttonName" value="123">
        <button type="submit" class="btn btn-primary" style="background-color:rgb(102, 26, 109);">600 Points</button>
        </form>              
                </div>
            </div>
        </div>

        <div class="col">
            <div class="card">
                <img src="./inc/img/addidas.webp" class="card-img-top"  style="height: 300px;">
                <div class="card-body">
                    <h5 class="card-title">5%</h5>
                    <p class="card-text">
                    On running shoes <br>   
                    Only available in Saudi Arabia</p>
                    <p class="card-text"><small class="text-body-secondary">Until 1st July</small></p>
                    <form method="post" action="RewardsP2.php">
                        <input type="hidden" name="user_id" value="<?php $user_id; ?>">
                        <input type="hidden" name="buttonName" value="123">
                        <button type="submit" class="btn btn-primary" style="background-color:rgb(102, 26, 109);">250 Points</button>
                    </form>                </div>
            </div>
        </div>
        
        <div class="col">
            <div class="card">
                <img src="./inc/img/razer.webp" class="card-img-top"  style="height: 300px;">
                <div class="card-body">
                    <h5 class="card-title">30%</h5>
                    <p class="card-text">On gaming headsets and keyboards.</p>
                    <p class="card-text"><small class="text-body-secondary">Until 13th July</small></p>
                    <form method="post" action="RewardsP2.php">
                        <input type="hidden" name="user_id" value="<?php $user_id; ?>">
                        <input type="hidden" name="buttonName" value="123">
                        <button type="submit" class="btn btn-primary" style="background-color:rgb(102, 26, 109);">730 Points</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card">
                <img src="./inc/img/namshi-logo.png" class="card-img-top" style="height: 300px;">
                <div class="card-body">
                    <h5 class="card-title">15%</h5>
                    <p class="card-text">On all men and women essentials.</p>
                    <p class="card-text"><small class="text-body-secondary">Until 3rd August</small></p>
                    <form method="post" action="RewardsP2.php">
                        <input type="hidden" name="user_id" value="<?php $user_id; ?>">
                        <input type="hidden" name="buttonName" value="123">
                        <button type="submit" class="btn btn-primary" style="background-color:rgb(102, 26, 109);">900 Points</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card">
                <img src="./inc/img/1005796-1410384298.jpg" class="card-img-top" style="height: 300px;">
                <div class="card-body">
                    <h5 class="card-title">Free Delivery</h5>
                    <p class="card-text">On Noon Express Items.</p>
                    <p class="card-text"><small class="text-body-secondary">Until 20th July</small></p>
                    <form method="post" action="RewardsP2.php">
                        <input type="hidden" name="user_id" value="<?php $user_id; ?>">
                        <input type="hidden" name="buttonName" value="123">
                        <button type="submit" class="btn btn-primary" style="background-color:rgb(102, 26, 109);">150 Points</button>
                    </form>
              </div>
            </div>
        </div>
        <div class="col">
            <div class="card">
                <img src="./inc/img/KFC_logo.svg.png" class="card-img-top" style="height: 300px;">
                <div class="card-body">
                    <h5 class="card-title">Make it a meal!</h5>
                    <p class="card-text">Turn your burger into a meal when buying two burgers</p>
                    <p class="card-text"><small class="text-body-secondary">Until 11th June</small></p>
                    <form method="post" action="RewardsP2.php">
                        <input type="hidden" name="user_id" value="<?php $user_id; ?>">
                        <input type="hidden" name="buttonName" value="123">
                        <button type="submit" class="btn btn-primary" style="background-color:rgb(102, 26, 109);">450 Points</button>
                    </form>                </div>
            </div>
        </div>
        <div class="col">
            <div class="card">
                <img src="./inc/img/Nike-Logo.png" class="card-img-top" style="height: 300px;">
                <div class="card-body">
                    <h5 class="card-title">35%</h5>
                    <p class="card-text">On Men clothing and shoes</p>
                    <p class="card-text"><small class="text-body-secondary">Until 2nd September</small></p>
                    <form method="post" action="RewardsP2.php">
                        <input type="hidden" name="user_id" value="<?php $user_id; ?>">
                        <input type="hidden" name="buttonName" value="123">
                        <button type="submit" class="btn btn-primary" style="background-color:rgb(102, 26, 109);">1200 Points</button>
                    </form>                </div>
            </div>
        </div>
        <div class="col">
            <div class="card">
                <img src="./inc/img/Under_armour_logo.svg.png" class="card-img-top" style="height: 300px;">
                <div class="card-body">
                    <h5 class="card-title">27%</h5>
                    <p class="card-text">On all items when spending more than 500 SR</p>
                    <p class="card-text"><small class="text-body-secondary">Until 25th December</small></p>
                    <form method="post" action="RewardsP2.php">
                        <input type="hidden" name="user_id" value="<?php $user_id; ?>">
                        <input type="hidden" name="buttonName" value="123">
                        <button type="submit" class="btn btn-primary" style="background-color:rgb(102, 26, 109);">900 Points</button>
                    </form>                </div>
            </div>
        </div>
        <div class="col">
            <div class="card">
                <img src="./inc/img/nvidia.png" class="card-img-top" style="height: 300px;">
                <div class="card-body">
                    <h5 class="card-title">7%</h5>
                    <p class="card-text">On RTX 4070!!</p>
                    <p class="card-text"><small class="text-body-secondary">Until 1st July</small></p>
                    <form method="post" action="RewardsP2.php">
                        <input type="hidden" name="user_id" value="<?php $user_id; ?>">
                        <input type="hidden" name="buttonName" value="123">
                        <button type="submit" class="btn btn-primary" style="background-color:rgb(102, 26, 109);">2500 Points</button>
                    </form>                </div>
            </div>
        </div>
        <div class="col">
            <div class="card">
                <img src="./inc/img/LG-Symbol.jpg" class="card-img-top" style="height: 300px;">
                <div class="card-body">
                    <h5 class="card-title">15%</h5>
                    <p class="card-text">On TVs and sound systems</p>
                    <p class="card-text"><small class="text-body-secondary">Until 3rd August</small></p>
                    <form method="post" action="RewardsP2.php">
                        <input type="hidden" name="user_id" value="<?php $user_id; ?>">
                        <input type="hidden" name="buttonName" value="123">
                        <button type="submit" class="btn btn-primary" style="background-color:rgb(102, 26, 109);">1100 Points</button>
                    </form>                </div>
            </div>
        </div>
        <div class="col">
            <div class="card">
                <img src="./inc/img/Apple-Logo.png" class="card-img-top" style="height: 300px;">
                <div class="card-body">
                    <h5 class="card-title">4%</h5>
                    <p class="card-text">On Apple watches and accessories</p>
                    <p class="card-text"><small class="text-body-secondary">Until 19th June</small></p>
                    <form method="post" action="RewardsP2.php">
                        <input type="hidden" name="user_id" value="<?php $user_id; ?>">
                        <input type="hidden" name="buttonName" value="123">
                        <button type="submit" class="btn btn-primary" style="background-color:rgb(102, 26, 109);">300 Points</button>
                    </form>                </div>
            </div>
        </div>
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