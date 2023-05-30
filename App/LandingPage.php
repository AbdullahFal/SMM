<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./CSS/bootstrap.rtl.min.css">
    <title>Document</title>
</head>
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
.Title{
  width: 800px;
  margin: 0 auto;
  background-color: blueviolet;
  padding: 20px;
  box-shadow: 10px 10px gray;
  position: absolute;
  top: 20%;
  left: 50%;
  transform: translate(-50%, -50%);
  display: flex;
  justify-content: center;
  color: white;
}

.Description{
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
  color: white;
}

form {
  display: inline-block;
  margin: 0 10px;

}

.from-lablel{
    color: white;
}
</style>

<body>

<nav>
        <img src="" width="30" height="30" class="d-inline-block align-top" alt="Logo">
        Spare My Money
        <button type="button" class="btn"><a href="ProfilePage.php">Profile</a></button>
        <button type="button" class="btn"><a href="Wallet.php">Wallet</a></button>
        <button type="button" class="btn"><a href="RewardsP2.php">Rewards</a></button>
        <button type="button" class="btn"><a href="LandingPage.php">Home</a></button>
    </nav>  
<div class="Title"> <h1>Spare My Money</h1></div>

<div class="Description"><h3>Spare my money is a website where you can track your purchases to see your spending habits
to help you save your money. The website corporates with your bank company to get the records
of your transactions. The website allows you to set a goal and track your progress. The website
has a reward system, every time you transfer money to your saving account you get points which
you can then replace with discount coupons provided by the website sponsors. </h3>
</div>

</body>
</html>