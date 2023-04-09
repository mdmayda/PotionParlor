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
    <title>Update Obat</title>

    <link rel="stylesheet" href="/css/bootstrap.css">
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
</head>

<body>
    <div class="container d-flex">
        <div class="col-md-6 py-5" align="center">
            <div class="card" style="width: 18rem; margin-top: 20%;">
                <img class="card-img-top" src="..." alt="Masukkan Foto Obat">
            </div>
            <form class="py-3">
                <div class="form-group">
                    <label for="exampleFormControlFile1"></label>
                    <input type="file" class="form-control-file" id="exampleFormControlFile1">
                </div>
            </form>
        </div>

        <div class="col-md-6 py-5">
            <form class="row g-3">
                <div class="col-md-6">
                    <label for="disableInputFactory" class="form-label">Nama Pabrik</label>
                    <input type="text" class="form-control" id="disabledInputFactory" placeholder="Masukkan Nama Pabrikan" disabled>
                </div>
                <div class="col-md-6">
                    <label for="inputForms" class="form-label">Bentuk Sediaan</label>
                    <div class="col-12">
                        <label class="visually-hidden" for="inlineFormSelectPref">Preference</label>
                        <select class="form-select" id="inlineFormSelectPref" disabled>
                            <option selected>--Pilih Bentuk--</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <label for="disabledInputContent" class="form-label">Kandungan</label>
                    <input type="text" class="form-control" id="disabledInputContent" placeholder="Masukkan Kandungan Obat" disabled>
                </div>
                <div class="col-md-6">
                    <label for="inputPackaging" class="form-label">Kemasan</label>
                    <div class="col-12">
                        <label class="visually-hidden" for="inlineFormSelectPref">Preference</label>
                        <select class="form-select" id="inlineFormSelectPref" disabled>
                            <option selected>--Pilih Kemasan--</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <label for="disabledInputDose" class="form-label">Dosis</label>
                    <input type="text" class="form-control" id="disabledInputDoseDose" placeholder="Masukkan Dosis Obat" disabled>
                </div>
                <div class="col-md-6">
                    <label for="inputQty" class="form-label">Quantity</label>
                    <input type="text" class="form-control" id="inputQty" placeholder="Masukkan Banyaknya">
                </div>
                <div class="d-grid gap-2 d-md-block">
                    <button class="btn btn-secondary shadow" type="button">Save</button>
                    <a class="btn btn-outline-secondary shadow mx-5" href="dashboard.php" role="button">Cancel</a>
                </div>
                <div class="d-grid gap-2 d-md-block">
                    <button class="btn btn-success shadow" type="button">Update</button>
                    <button class="btn btn-danger shadow mx-5" type="button">Delete</button>
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