<?php
include 'server/connection.php';

if (isset($_POST['register_btn'])) {
    $name = $_POST['aptk_name'];
    $email = $_POST['aptk_email'];
    $password = $_POST['aptk_password'];
      
  //  $query = "SELECT aptk_id, aptk_name, aptk_email, aptk_password, aptk_phone,
       // major, aptk_photo FROM apoteker";
       // WHERE aptk_email = ? AND aptk_password = ? LIMIT 1";
}

$query = "INSERT into apoteker values ('$aptk_name','$aptk_email','$aptk_password','','','')";

mysqli_query($conn,$query);

if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Form</title>
    <link rel="stylesheet" href="style/registerStyle.css">
</head>

<body>
    <nav class="navbar">
        <div class="brand">
            <img class="logo" src="img\tubes.png">
        </div>

    </nav>

    <div class="center">
        <h1>REGISTER</h1>
        <form form id="Register-form" method="POST" action="Register.php">
                <div class="txt_field">
                    <input type="name" name="aptk_name" class="form-control" id="aptk_Name" required>
                    <label>Username</label>
                </div>
                <div class="txt_field">
                    <input type="email" name="aptk_email" class="form-control" id="aptk_email" required>
                    <label>Email</label>
                </div>
                <div class="txt_field">
                    <input type="password" name="aptk_password" class="form-control" required>
                    <label>Password</label>
                </div>
                <input type="submit" id="register-btn" name="register_btn" value="register">
                <div class="login_link">
                    sudah Punya Akun? <a href="login.php">Login</a>
                    
                </div>
        </form>
    </div>
</body>

</html>