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

  $tampil = mysqli_query($conn, $query);
}

$sql = "SELECT * FROM apoteker";
$result = mysqli_query($conn, $sql);


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">

  <link rel="stylesheet" href="./css/bootstrap.min.css">
  <link rel="stylesheet" href="./style/style.css">
</head>

<body>
  <div class="container bt-5 mt-2 mb-5">

    <form class="profile" action="profile.php" method="post" enctype="multipart/form-data">
      <div class="container d-flex">
        <div class="col-md-4 mt-5 pd-5 ms-5">
          <label class="form-label mt-4">Profile Picture</label>
          <div class="card">
            <img src="img/<?php echo $_SESSION['aptk_photo']  ?>" class="card-body" alt="">
          </div>
        

        </div>
        <h4 class="display-4 fs-1 ms-5">PROFILE</h4><br>
        <div class="col-md-5 mt-5">


          <input type="hidden" name="aptik_id" value="<?php echo $_SESSION['aptk_id'] ?>">

          <div class="mb-3 mt-4">
            <label class="form-label">Name</label>
            <input type="text" class="form-control" disabled name="aptk_name" readonly value="<?php echo $_SESSION['aptk_name'] ?>">
          </div>

          <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="text" class="form-control" disabled name="aptk_email" readonly value="<?php echo $_SESSION['aptk_email'] ?>">
          </div>

          <div class="mb-3">
            <label class="form-label">No Telepon</label>
            <input type="text" class="form-control" disabled name="aptk_phone" readonly value="<?php echo $_SESSION['aptk_phone'] ?>">
          </div>

          <div class="mb-2">
            <label class="form-label">Spesialis</label>
            <input type="text" class="form-control" disabled name="major" readonly value="<?php echo $_SESSION['major'] ?>">
          </div>
          <a href="editprofile.php" class="btn btn-primary">Edit</a>
          <a href="home.php" class="btn btn-outline-secondary px-4 mt-3 ">Back</a>
        </div>
      </div>
    </form>


  </div>
  </div>
  <footer>
    <?php include('Layout/footer.php'); ?>
  </footer>

</body>

</html>