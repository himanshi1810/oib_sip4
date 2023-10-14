<?php
session_start();

if(!isset($_SESSION['name'])){
    ?>
    <script>
        alert("You are logged Out");
    </script>
    
    <?php
    header('location:login.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php include 'Links/links.php'?>
    <title>Registration Form</title>
    <style>
        body{
            background-color: grey;
            color:white;
        }
        .container {
            width: 100vw;
            height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center; /* Center text within the container */
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Hello, this is <?php echo $_SESSION['name']; ?>'s Home Page</h1>
        <a href="logout.php" class="btn btn-primary btn-lg">Log Out</a>
    </div>
</body>
</html>
