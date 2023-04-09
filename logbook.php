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

//search by activity
if (isset($_POST['btnsearch'])) {
    $keyword = $_POST['txtsearch'];
    $query = "SELECT * FROM logbook
    WHERE logbook_activity LIKE '%$keyword%'
    ORDER BY logbook_id asc";
} else {
    $query = "SELECT * FROM logbook ORDER BY logbook_id asc";
}

//tampil semua
$tampil = mysqli_query($conn, $query);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logbook</title>
    <link rel="stylesheet" href="/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css">
</head>

<body>
    <div class="container d-flex">
        <div class="col-md-6">
            <form method="POST">
                <div class="input-group my-3">
                    <input class="form-control" type="search" name="txtsearch" value="<?= $_POST['txtsearch'] ?>" placeholder="Cari Aktivitas" aria-label="Search">
                    <button class="btn btn-outline-tertiary pt-2" type="submit" name="btnsearch">Search</button>
                </div>
            </form>
        </div>

        <div class="col-md-6 mx-md-5 py-3">
            <a class="crud" href="crud_logbook.php" align="center">
                <h5>Tambah Aktivitas Baru <i class="bi bi-plus-circle"></i></h5>
            </a>
        </div>
    </div>

    <div class="container">
        <table class="table table-hover-my-5" style="box-shadow: 0 1px 1px 1px #333333">
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
                <?php
                while ($data = mysqli_fetch_array($tampil)) {
                ?>
                    <tr>
                        <td><?php echo $data['logbook_id'] ?></td>
                        <td><?php echo $data['aptk_id'] ?></td>
                        <td><?php echo $data['drug_id'] ?></td>
                        <td><?php echo $data['logbook_date'] ?></td>
                        <td><?php echo $data['logbook_activity'] ?></td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
<footer>
    <?php include('Layout/footer.php'); ?>
</footer>

</html>