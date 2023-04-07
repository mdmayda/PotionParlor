<?php
session_start();
include('server/connection.php');
include('Layout/header.php');

if (!isset($_SESSION['logged_in'])) {
    header('location: login.php');
    exit;
}

if (isset($_GET['logout'])) {
    if (isset($_SESSION['logged_in'])) {
        unset($_SESSION['logged_in']);
        unset($_SESSION['user_email']);
        unset($_SESSION['user_name']);
        unset($_SESSION['user_photo']);
        header('location: login.php');
        exit;
    }
}
?>

<!-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style/style.css">
    <link rel="stylesheet" href="/css/bootstrap.css">
</head>

<body>
    <div class="fContainer">
        <nav class="wrapper">
            <span>
                <img src="img/tubes.png" class="logo">POTION PARLOR
            </span>

            <ul class="navigation">
                <li><a href="home.php" >HOME</a></li>
                <li><a href="dashboard.php">DASHBOARD</a></li>
                <li><a href="logbook.php">LOG BOOK</a></li>
                <li><a href="aboutus.php">ABOUT US</a></li>
                <li><a href="/">
                      
                    </a></li>
                <span><a href="home.php?logout=1" id="logout-btn" class="btn btn-danger">LOG OUT</a></span>
            </ul>
        </nav>
        <div class="main-content">
            <img class="image" src="img\cuate.png">
            <h2>
                TEST
            </h2>
        </div>
    </div>


</body>
<footer>
    <center>
        <div class="footer">
            <p>
                POTION PARLOR
            </p>
        </div>
    </center>
</footer>

</html> -->


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel="stylesheet" href="./style/style.css">
    <title>Home</title>
</head>

<body>
    <div class="hero">


        <div class="left-hero">
            <img class="image" src="img\cuate.png" width="30px" height="30px">
        </div>

        <div class="right-hero">
            <h1>
                WELCOME, <?php echo $_SESSION['aptk_name'] ?>
            </h1> <br>
            <h4>
                Selamat Datang di web Potion Parlor! </h4> 
                Web ini dapat membantu anda untuk mencari serta memanajemen obat yang tersedia pada Potion Parlor Di web Potion Parlor, Anda dapat dengan mudah mencari dan menemukan obat yang Anda butuhkan dengan menggunakan fitur pencarian yang disediakan.
        </div>

    </div>
</body>

<footer>
    <?php include('Layout/footer.php'); ?>
</footer>

</html>