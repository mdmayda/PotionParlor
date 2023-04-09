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

//search by obat
if (isset($_POST['btnsearch'])) {
  $keyword = $_POST['txtsearch'];
  $query = "SELECT * FROM drug
  WHERE drug_name LIKE '%$keyword%'
  ORDER BY drug_id asc";
} else {
  $query = "SELECT * FROM drug ORDER BY drug_id asc";
}

//tampil semua
$tampil = mysqli_query($conn, $query);
?>
<!-- test -->

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="./style/style.css">
  <link rel="stylesheet" href="./css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css">
</head>


<body>

  <section>

    <div class="container d-flex">
      <div class="col-md-6">
        <form method="POST">
          <div class="input-group my-3">
            <input class="form-control" type="search" name="txtsearch" placeholder="Ketik Obat Yang Ingin Anda Cari" aria-label="Search">
            <button class="btn btn-outline-tertiary pt-2" type="submit" name="btnsearch">Search</button>
          </div>
        </form>
      </div>

      <div class="col-md-6 mx-md-5 py-3">
        <a class="crud" href="input_obat.php" align="center">
          <h5>Tambah Obat Baru <i class="bi bi-plus-circle"></i></h5>
        </a>
      </div>
    </div>
    <div class="card-grid" id="card-grid">
      <?php while ($row = $tampil->fetch_assoc()) { ?>
        <div class="card">
          <div class="img">
            <img src="img\loratadine.png">

          </div>
          <div class="card-body">
            <h5 class="card-title text-center"><?php echo $row['drug_name'] ?></h5>
            <?php echo "<a class='text-center text-align : center opacity-50' href='update_obat.php?drug_id=$row[drug_id]'>Obat Yang Tersedia</a>" ?>
            <div class="col-sm-12">
              <input type="text" readonly class="card-quantity text-center rounded opacity-50" id="staticQuantity" value="<?php echo $row['quantity'] ?>">
            </div>
          </div>
        </div>
      <?php } ?>
    </div>
  </section>

</body>

<footer>
  <?php include('Layout/footer.php'); ?>
</footer>

</html>