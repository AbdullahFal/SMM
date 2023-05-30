<?php
session_start();

if (!isset($_SESSION["user_id"])) {
  

}else{
    
   
    require_once "database.php";
    $sql = "SELECT * FROM users
            WHERE id = {$_SESSION["user_id"]}";
              $result = mysqli_query($conn, $sql);
              $user = mysqli_fetch_array($result, MYSQLI_ASSOC);
    
    
    
    
}


require_once "database.php";
if (isset($_POST["edit"])) {
    $CreditCard = mysqli_real_escape_string($conn, $_POST["CreditCard"]);
  
    $sqlUpdate = "UPDATE users SET CreditCard = '$CreditCard'";
    if(mysqli_query($conn,$sqlUpdate)){
        session_start();
        $_SESSION["update"] = "request Updated Successfully!";
        header("Location:ProfilePage.php");
    }else{
        die("Something went wrong");
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>Edit request</title>
</head>
<body>
    <div class="container my-5">
    <header class="d-flex justify-content-between my-4">
            <h1> Add Credit Card</h1>
            <div>
            <a href="ProfilePage.php" class="btn btn-primary">Back</a>
            </div>
        </header>
        <form action="" method="post">
         
            
           
                <div class="form-elemnt my-4">
                <input type="text" class="form-control" name="CreditCard" placeholder="CreditCard:" value="<?php echo $user["CreditCard"]; ?>">
            </div>
            <input type="hidden" value="<?php echo $id; ?>" name="id">
            <div class="form-element my-4">
                <input type="submit" name="edit"  value="add Credit Card" class="btn btn-primary">
            </div>
                
           
        </form>
        
        
    </div>
</body>
</html>