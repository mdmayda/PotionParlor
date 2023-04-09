<?php
include 'server/connection.php';

if (isset($_POST['register_btn'])) {
    $name = mysqli_real_escape_string($conn, $_POST['aptk_name']);
    $email = mysqli_real_escape_string($conn, $_POST['aptk_email']);
    $password = mysqli_real_escape_string($conn, $_POST['aptk_password']);
    $phone = mysqli_real_escape_string($conn, $_POST['aptk_phone']);
    $major = mysqli_real_escape_string($conn, $_POST['major']);

    if (strlen($password) < 5) {
        echo "<p>Password harus minimal terdiri dari 5 karakter.</p>";
    } else {
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        $query = "INSERT INTO apoteker (aptk_name, aptk_email, aptk_password, aptk_phone, major, aptk_photo) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = mysqli_prepare($conn, $query);
        mysqli_stmt_bind_param($stmt, "ssssss", $name, $email, $password, $phone, $major, $photo);
        mysqli_stmt_execute($stmt);

        if(mysqli_stmt_affected_rows($stmt) > 0){
            header("Location: login.php");
            exit();
        }
    }
}

mysqli_close($conn);
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
                <div class="txt_field">
                    <input type="tel" name="aptk_phone" class="form-control" id="aptk_phone" required>
                    <label>Phone</label>
                </div>
                <div class="txt_field">
                    <input type="text" name="major" class="form-control" id="major" required>
                    <label>Major</label>
                </div>
                <div class="txt_field">
                    <input type="file" name="aptk_photo" class="form-control" id="aptk_photo" required>

                </div>
                <input type="submit" id="register-btn" name="register_btn" value="register">
                <div class="login_link">
               sudah Punya Akun? <a href="login.php">Login</a>
                    
                </div>
        </form>
    </div>
</body>

</html>