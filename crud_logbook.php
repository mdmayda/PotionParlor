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
        unset($_SESSION['aptk_email']);
        unset($_SESSION['aptk_name']);
        unset($_SESSION['aptk_photo']);
        header('location: login.php');
        exit;
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input Logbook</title>
    <link rel="stylesheet" href="/css/bootstrap.css">
</head>

<body>
    <div class="container">
        <div class="hero">

        </div>
        <h1 align="center">Tambahkan Aktivitas Baru</h1>

        <table class="table table-hover" style="box-shadow: 0 1px 1px 1px #333333">
            <thead>
                <tr>
                    <th scope="col">ID LOGBOOK</th>
                    <th scope="col">ID APOTEKER</th>
                    <th scope="col">ID OBAT</th>
                    <th scope="col">TANGGAL</th>
                    <th scope="col">ACTIVITY</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">1</th>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>@mdo</td>
                    <td>Mengubah kandungan obat</td>
                </tr>
                <tr>
                    <th scope="row">2</th>
                    <td>Jacob</td>
                    <td>Thornton</td>
                    <td>@fat</td>
                </tr>
                <tr>
                    <th scope="row">3</th>
                    <td colspan="2">Larry the Bird</td>
                    <td>@twitter</td>
                </tr>
            </tbody>
        </table>
    </div>
</body>
<footer>
    <?php include('Layout/footer.php'); ?>
</footer>

</html>