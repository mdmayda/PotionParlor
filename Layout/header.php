<head>
  <link rel="stylesheet" href="homeStyle.css">
  <link rel="stylesheet" href="/css/bootstrap.css">
</head>

<header>
    <nav>
        <a><img src="img\tubes.png" class="logo"></a>
        <ul class="nav-ul">
            <li class="nav-item active">
                <a class="nav-link" href="home.php">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="dashboard.php">Dashboard</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="logbook.php">Logbook</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="aboutus.php">About Us</a>
            </li>
            <a class="nav-link" href="/"><?php echo $_SESSION['aptk_name'] ?></a>
            <a>
                <img class = "profile_photo" src= "img\pngwing.com.png" >
            </a>
        </ul>
        </div>
    </nav>
</header>
<script src="../js/bootstrap.bundle.min.js"></script>