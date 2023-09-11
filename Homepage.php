<?php
@include 'db.php';

session_start();

if(!isset($_SESSION['Email'])){
   header('location: login.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">

        <h1>Homepage</h1>
        <h2>Welcome! <?php echo $_SESSION['Email']; ?> </h2>
        <a href="logout.php" class="logout">Logout</a>

    </div>
    
</body>
</html>