<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./CSS/bootstrap.rtl.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <title>Spare My Money</title>
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
.Title{
  width: 800px;
  margin: 0 auto;
  font-size: 30px;
  padding: 20px;
  
  position: absolute;
  top: 15%;
  left: 50%;
  transform: translate(-50%, -50%);
  display: flex;
  justify-content: center;
  color: white;
}

.Description{
  width: 1000px;
  margin: 0 auto;
  background-image: linear-gradient(to top, #bd5ccd, #ba5aca, #b758c6, #b556c3, #b254c0, #ac4eba, #a647b3, #a041ad, #9434a2, #892798, #7d178d, #720083);
  padding: 20px;
  box-shadow: 10px 10px gray;
  position: absolute;
  top: 55%;
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





<div class="Title"> <h1>Spare My Money</h1></div>

<div class="Description"><h3>Spare my money is a website where you can track your purchases to see your spending habits
to help you save your money. The website corporates with your bank company to get the records
of your transactions. The website allows you to set a goal and track your progress. The website
has a reward system, every time you transfer money to your saving account you get points which
you can then replace with discount coupons provided by the website sponsors. </h3>
</div>



</body>
</html><div class="footer-clean">
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