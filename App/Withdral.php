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


// withdrawal 

$cardNumber = $user['CreditCard'];
$amount = $_POST['amount'];
$systemMessage = '';
$message;
$errors = [
    'cardNumberError' => '',
    'amountError' => '',
];


//only when submitting the code
if($_SERVER['REQUEST_METHOD'] === 'POST'){

    if(empty($cardNumber)){
        $errors['cardNumberError'] = "card number empty";
        
    }


    if(empty($amount)){
        $errors['amountError']  = "amount empty";
        
    }


    if(!empty($cardNumber) && !empty($amount) ){

                    // Connect to the database
            $conn = mysqli_connect("localhost", "root", "", "SpareMyMoney");

            // Check connection
            if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
            }




            /// Query the websiteaccounts table
            $sql = "SELECT * FROM users WHERE CreditCard = '$cardNumber'";
            $result = mysqli_query($conn, $sql);

            // Check if a row was found
            if (mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_assoc($result);
                $balance = $row['balance'];

                // Check if the amount to withdraw is less than or equal to the account balance
                if ($amount <= $balance) {
                    // Store the amount to withdraw in a variable
                    $withdrawalAmount = $amount;

                    // Update the balance in the websiteaccounts table
                    $newBalance = $balance - $withdrawalAmount;
                    $updateSql = "UPDATE users SET balance = $newBalance WHERE CreditCard = '$cardNumber'";
                    $updateResult = mysqli_query($conn, $updateSql);

                    if ($updateResult) {
                        // Query the banckaccounts table
                        $bankSql = "SELECT * FROM banckaccounts WHERE CardNumber= '$cardNumber'";
                        $bankResult = mysqli_query($conn, $bankSql);

                        // Check if a row was found
                        if (mysqli_num_rows($bankResult) > 0) {
                            $bankRow = mysqli_fetch_assoc($bankResult);
                            $bankBalance = $bankRow['Balance'];

                            // Update the balance in the banckaccounts table
                            $newBankBalance = $bankBalance + $withdrawalAmount;
                            $bankUpdateSql = "UPDATE banckaccounts SET Balance = $newBankBalance WHERE CardNumber = '$cardNumber'";
                            $bankUpdateResult = mysqli_query($conn, $bankUpdateSql);

                            if ($bankUpdateResult) {
                                $message = "withdrawal transaction successful.";
                                // Close the connection
                                mysqli_close($conn);
                                // Redirect the user to the confirmation page with the message as a query parameter
                                header("Location: confirmation.php?message=" . urlencode($message));
                                exit();
                            } else {
                                $systemMessage = "Error updating balance in banckaccounts table.";
                            }
                        } else {
                            $systemMessage = "The card number entered does not exist in the banckaccounts table.";
                        }
                    } else {
                        $systemMessage = "Error updating balance in websiteaccounts table.";
                    }
                } else {
                    $systemMessage = "The amount to withdraw is greater than the account balance.";
                }
            } else {
                $systemMessage = "The card number entered does not exist in the websiteaccounts table.";
            }

            // Close the database connection
            mysqli_close($conn);
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
    <title>Withdraw</title>
</head>
<style>
    .btn{
        background-color: blueviolet;
        border: none;
    }
    .btn:hover{
        color: white;
        background: black;
    }
</style>
<body>
<div class="container my-5">
<div  class="form-text error"><?php echo $systemMessage; ?></div>
<header class="d-flex justify-content-between my-4"><h1>Withdraw</h1></header>
        <form  action="<?php $_SERVER['PHP_SELF'] ?>" method = "POST" >
            <div class="form-elemnt my-4">
                <input type="text" name="amount" class="form-control" placeholder="Enter the amout to withdraw" id="amount" value ="<?php echo $email ?>" >
                <div  class="form-text error"><?php echo $errors['amountError']; ?></div>
            </div>
            <button type="submit" name ="submit" class="btn btn-primary">withdraw</button>
            <a href="wallet.php" class="btn btn-primary">Back</a>

        </form>
</body>
</html>