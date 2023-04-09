<?php
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
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
</head>

<body>
    <div class="container py-3">
        <h2 align="center">Tambahkan Aktivitas Baru</h2>
    </div>

    <div class="container d-flex justify-content-around">
        <div class="col-md-6">
            <img src="img/notebook.png" alt="" width="400px" height="450px">
        </div>

        <div class="col-md-6 py-5">
            <form class="row g-3">
                <div class="col-md-6">
                    <label for="inputIdAptk" class="form-label">ID Apoteker</label>
                    <div class="col-12">
                        <label class="visually-hidden" for="inlineFormSelectPref">Preference</label>
                        <select class="form-select" id="inlineFormSelectPref">
                            <option selected>--Pilih ID--</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <label for="inputNamaAptk" class="form-label">Nama Apoteker</label>
                    <input type="text" class="form-control" id="inputNamaAptk" placeholder="Masukkan Nama Apoteker">
                </div>
                <div class="col-md-6">
                    <label for="inputIdObt" class="form-label">ID Obat</label>
                    <div class="col-12">
                        <label class="visually-hidden" for="inlineFormSelectPref">Preference</label>
                        <select class="form-select" id="inlineFormSelectPref">
                            <option selected>--Pilih ID--</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <label for="inputNamaObt" class="form-label">Nama Obat</label>
                    <input type="text" class="form-control" id="inputNamaObt" placeholder="Masukkan Nama Obat">
                </div>
                <div class="col-md-6">
                    <label for="inputAktivitas" class="form-label">Aktivitas</label>
                    <input type="text" class="form-control" id="inputAktivitas" placeholder="Masukkan Aktivitas">
                </div>
                <div class="col-md-6">
                    <label for="inputTgl">Tanggal</label>
                    <input type="Date" class="form-control">
                </div>
                <div class="d-grid gap-2 d-md-block">
                    <button class="btn btn-secondary shadow" type="button">Save</button>
                    <a class="btn btn-outline-secondary shadow mx-5" href="logbook.php" role="button">Back</a>
                </div>
            </form>
        </div>
    </div>
    </div>
</body>
<footer>
    <?php include('Layout/footer.php'); ?>
</footer>

</html>