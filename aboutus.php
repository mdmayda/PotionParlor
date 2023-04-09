<?php
session_start();
include('connection.php');
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
	<title>About Us</title>
    <link rel="stylesheet" href="style/aboutus.css\">
    <link rel="stylesheet" href="/css/bootstrap.css">
</head>
<body>
    
	<div class="container">
		<h1 class="title">POTION PARLOR</h1>
		<p class="paragraph">Potion Parlor merupakan Apotek yang buka 24 jam non stop setiap hari dan berkomitmen untuk menyediakan kebutuhan obat-obatan yang komplit dengan harga yang wajar. Dedikasi untuk melayani masyarakat dengan manajemen yang modern dan kebijakan harga yang tetap sama pada Pagi, Siang, Sore, Malam, hari biasa maupun hari libur, menjadikan Potion Parlor menjadi apotek favorit di Indonesia.</p>
		<p class="paragraph">Potion Parlor dibuat untuk memenuhi tugas Rekayasa Perangkat Lunak Praktikum sebagaimana dapat membantu apoteker mengelola obat yang terdapat dalam Apotek. Dalam pengelolaan obat, masing-masing apoteker memiliki spesialisasi dalam menangani berbagai jenis obat sesuai dengan kegunaanya. Dengan menggunakan sistem ini, kami bertujuan untuk meningkatkan efisiensi dan efektivitas pengelolaan obat sehingga pasien dapat menerima pengobatan yang tepat dan aman. Sistem ini juga membantu meningkatkan transparansi pengelolaan obat, meminimalkan kesalahan dosis obat, dan secara konsisten menjaga kualitas obat yang tersedia.</p>
	</div>
</body>
<footer>
    <?php include('Layout/footer.php'); ?>
</footer>
</html>
