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
    <input class="input-field" type="text" name="Username">
    <br>
    <label for="Password">Password:</label>
    <input class="input-field" type="password" name="Password"> <br>
 
    <input type="submit" class="submit" value="Log in" name="submit">
</form>
 
    <p>click <a href="signin.php">Here</a> if you don't have a user.</p>
    </div>
 
    <?php
    // Koden inne i denne blokken vil kjøre hvis skjemaet ble sendt (submit) via POST.
    // Du kan her håndtere skjemadata, validere det, lagre det i en database, osv.
    if(isset($_POST['submit'])){
 
     //dette gjør om data som er skrevet inn i tekstfeltene til data
       $username = $_POST['Username'];
       $password = $_POST['Password'];
 
       //denne linjen med kode lager en variabel og connecter den
       //til databasen
       $database = mysqli_connect('localhost', 'root', '', 'mydb')
       or die('Error connecting to MySQL server.');
 
       //Den koden utfører en SQL SELECT-spørring for å hente brukernavnet og passordet fra en database-tabell
       //med navnet "Users" der brukernavnet (Username) og passordet (Password) tilsvarer spesifikke verdier
       //som er gitt i variablene $Username og $password. Med andre ord, den søker etter en spesifikk bruker i
       //databasen basert på brukernavn og passord som er lagret i variablene $Username og $password. Hvis det finnes
       //en rad i databasen som samsvarer med disse verdiene, vil spørringen returnere den.
       $query = "SELECT Username, Password from Users where Username= '$username' and Password= '$password'";
       
       $result = mysqli_query($database, $query)
       or die('error querying database.');
 
       mysqli_close($database);
 
       if ($result->num_rows == 1) {
        // Correct login
        header('location: my-app/src/app.js');
        exit; // Always use exit/die after a header redirect to ensure no further code is executed
    } else {
        // Invalid login
        echo "The information you provided is incorrect";
    }
}
?>
 
</body>
</html>