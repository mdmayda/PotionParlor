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


if (isset($_POST['update'])) {

	
	$name = $_POST['aptk_name'];
	$email = $_POST['aptk_email'];
	$phone = $_POST['aptk_phone'];
	$major = $_POST['major'];
	$aptk_photo = $_FILES['aptk_photo']['name'];
	$aptk_photo_temp = $_FILES['aptk_photo']['tmp_name'];
	move_uploaded_file($aptk_photo_temp, "img/" . $aptk_photo);

	// Query untuk update data dan gambar
	$query = "UPDATE apoteker SET  ptk_phone = '$phone', major = '$major'";

	if (!empty($aptk_photo)) {
		$query .= ", aptk_photo = '$aptk_photo'";
	} else {
		$query .= ", aptk_photo = '" . $_SESSION['aptk_photo'] . "'";
	  }

	$query .= " WHERE aptk_id = '" . $_SESSION['aptk_id'] . "'";

	$result = $conn->query($query);

	$_SESSION['aptk_name'] = $name;
	$_SESSION['aptk_email'] = $email;
	$_SESSION['aptk_phone'] = $phone;
	$_SESSION['major'] = $major;
	$_SESSION['aptk_photo'] = !empty($aptk_photo) ? $aptk_photo : $_SESSION['aptk_photo'];

	if (!empty($aptk_photo)) {
		$_SESSION['aptk_photo'] = $aptk_photo;
	}

	// Redirect ke halaman terkait atau muat ulang halaman
	header('location: profile.php');
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Edit Profile</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">

	<link rel="stylesheet" href="./css/bootstrap.min.css">
	<link rel="stylesheet" href="./style/style.css">
</head>

<body>
	<div class="container bt-5 mt-2 mb-5">

		<form class="profile" action="editprofile.php" method="post" enctype="multipart/form-data">
			<div class="container d-flex">
				<div class="col-md-4 mt-5 pd-5 ms-5">
					<label class="form-label mt-4">Profile Picture</label>
					<div class="card">
						<img src="img/<?php echo $_SESSION['aptk_photo']  ?>" class="card-body" alt="">
					</div>
					<label class="form-label mt-2">Choose Your Photo</label>
					<input type="file" accept="image/*" class="form-control" name="aptk_photo">

				</div>
				<h4 class="display-4 fs-1 ms-5">EDIT</h4><br>
				<div class="col-md-5 mt-5">


					<input type="hidden" name="aptik_id" value="<?php echo $_SESSION['aptk_id'] ?>">

					<div class="mb-3 mt-4">
						<label class="form-label">Name</label>
						<input type="text" class="form-control"  name="aptk_name" value="<?php echo $_SESSION['aptk_name'] ?>">
					</div>

					<div class="mb-3">
						<label class="form-label">Email</label>
						<input type="text" class="form-control"  name="aptk_email" value="<?php echo $_SESSION['aptk_email'] ?>">
					</div>

					<div class="mb-3">
						<label class="form-label">No Telepon</label>
						<input type="text" class="form-control" name="aptk_phone" value="<?php echo $_SESSION['aptk_phone'] ?>">
					</div>

					<div class="mb-2">
						<label class="form-label">Spesialis</label>
						<input type="text" class="form-control"  name="major" value="<?php echo $_SESSION['major'] ?>">
					</div>
					<button type="submit" name="update" class="btn btn-primary px me-5 mt-3">
						Save
					</button>
					<!-- <a href="home.php" class="btn btn-outline-secondary px-4 mt-3 ">Back</a> -->
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