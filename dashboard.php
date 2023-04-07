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

$sql = "SELECT * FROM  drug";
$result = mysqli_query($conn, $sql);
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
    <div class="test">
      <a class="crud" href="crudobat.php">
        Tambah Obat Baru<i class="bi bi-plus-circle"></i>
      </a>
    </div>
    <div class="card-grid" id="card-grid">
      <?php while ($row = $result->fetch_assoc()) { ?>
        <div class="card">
          <div class="img">
            <img src="img\loratadine.png">
          </div>
          <div class="card-body">
            <h5 class="card-title text-center"><?php echo $row['drug_name'] ?></h5>
            <p class="text-center opacity-50">Obat Yang Tersedia</p>
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
  <!-- <?php include('Layout/footer.php'); ?> -->
</footer>

</html>