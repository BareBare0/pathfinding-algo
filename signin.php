<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="login-container">
<form method="post" autocomplete="off">
    <label for="Username">Username:</label>
    <input class="input-field" type="text" name="Username"><br>
   
    <label for="Password">Password:</label>
    <input class="input-field" type="password" name="Password"> <br>
   
    <input type="submit" class="submit" value="Create" name="submit">
</form>
 
    <p>click <a href="login.php">Here</a> if you have a user already.</p>
    </div>
<?php
    // Koden inne i denne blokken vil kjøre hvis skjemaet ble sendt (submit) via POST.
    // Du kan her håndtere skjemadata, validere det, lagre ydet i en database, osv.
    if(isset($_POST['submit'])){
 
     //dette gjør om data som er skrevet inn i tekstfeltene til variabler
       $username = $_POST['Username'];
       $password = $_POST['Password'];
 
       //denne linjen med kode lager en variabel og connecter den
       //til databasen
       $database = mysqli_connect('localhost', 'root', 'admin', 'mydb')
       or die('Error connecting to MySQL server.');
 
       $query = "INSERT INTO Users (Username, Password) VALUES ('$username', '$password')";
 
       
 
       $result = mysqli_query($database, $query)
       or die('error querying database');
 
     
     
       if ($result) {
        // Check if any rows were affected by the INSERT query
        if (mysqli_affected_rows($database) > 0) {
            // User created
            echo "<div class='sign-message'>User created! Press <a href='login.php'>here</a> to log in.</div>";
        } else {
            // No rows were affected, which means the user wasn't created
            echo "Unable to create user. Please try again.";
        }
    } else {
        // Query execution failed
        echo "Something went wrong. Please try again.";
    }
   
    mysqli_close($database);
}
?>
   
</body>
</html>