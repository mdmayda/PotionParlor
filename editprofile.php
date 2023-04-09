<?php
session_start();
include('server/connection.php');
include('Layout/header.php');

if (!isset($_SESSION['logged_in'])) {
    header('location: dashboard.php');
    exit;
}

if (isset($_GET['logout'])) {
    if (isset($_POST['aptk_name']) &&
        isset($_POST['aptk_email'])&&
        isset($_POST['aptk_phone'])&&
        isset($_POST['major'])){
        header('location: dashboard.php');
        exit;
    }else{
        if(isset($_FILE['aptk_photo'])){

        }else{

        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
   <link rel="stylesheet" href="/css/bootstrap.css">
</head>
<body>
    <div class="container bt-5 mt-2 mb-5">
    <div class="container d-flex">
    <div class="col-md-4 mt-5 pd-5 ms-5">
    <label class="form-label mt-4">Profile Picture</label>
        <div class="card">
    <img src="img/Girl portrait 1.png" class="card-body" alt="">
    </div>
		    <label class="form-label mt-2">Choose Your Photo</label>
		    <input type="file" 
		           class="form-control"
		           name="aptk_photo">
        </form>
    </div>
    <h4 class="display-4 fs-1 ms-5">PROFILE</h4><br>
    <div class="col-md-5 mt-5">
    	<form class="profile" 
    	      action="php/profile.php" 
    	      method="post"
    	      enctype="multipart/form-data">
    	
		  <div class="mb-3 mt-4">
		    <label class="form-label">Name</label>
		    <input type="text" 
		           class="form-control"
		           name="name"
		           value="<?php echo (isset($_GET['aptk_name']))?$_GET['aptk_name']:"" ?>">
		  </div>

		  <div class="mb-3">
		    <label class="form-label">Email</label>
		    <input type="text" 
		           class="form-control"
		           name="email"
		           value="<?php echo (isset($_GET['aptk_email']))?$_GET['aptk_email']:"" ?>">
		  </div>

          <div class="mb-3">
		    <label class="form-label">No Telepon</label>
		    <input type="text" 
		           class="form-control"
		           name="no telepon"
		           value="<?php echo (isset($_GET['aptk_phone']))?$_GET['aptk_phone']:"" ?>">
		  </div>

		  <div class="mb-2">
		    <label class="form-label">Spesialis</label>
		    <input type="text" 
		           class="form-control"
		           name="spesialis"
		           value="<?php echo (isset($_GET['major']))?$_GET['aptk_phone']:"" ?>">
          </div>
		  <button type="submit" class="btn btn-primary px-4 me-5 mt-3">
            <a href="#">Save</button>
		  <a href="dashboard.php" class="btn btn-outline-secondary px-4 mt-3 ms-5 ">Back</a>
        </div>
		</form>
    </div>
    </div>
</div>
    <footer>
    <?php include('Layout/footer.php'); ?>
</footer>

</body>
</html>