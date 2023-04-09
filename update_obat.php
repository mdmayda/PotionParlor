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



// $sql = "SELECT * FROM drug";
// $result = mysqli_query($conn, $sql);

// $drug_id = $_GET['drug_id'] ;
// $sql = "SELECT * FROM drug WHERE drug_id = $drug_id";
// $result = mysqli_query($conn, $sql);
// $data = mysqli_fetch_assoc($result);

//ambil data
$drug_id = $_GET['drug_id'];
$sql = "SELECT * FROM drug WHERE drug_id = $drug_id";
$result = mysqli_query($conn, $sql);
$data = mysqli_fetch_assoc($result);
if (isset($_POST['update'])) {
    $drug_id = $_POST['drug_id'];

    $quantity = $_POST['quantity'];

    $sql = "UPDATE drug SET quantity = $quantity WHERE drug_id=$drug_id";

    $result = mysqli_query($conn, $sql);
    if ($result) {
        header('Location:dashboard.php');
    } else {
        die("gagal");
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
        <div class="col-md-6 py-5" alig="center">
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
            <form class="row g-3" action="update_obat.php" method="post">
                <div class="col-md-6">
                    <input type="hidden" name="drug_id" value="<?php echo $data['drug_id']; ?>" />
                    <label for="disableInputFactory" class="form-label">Nama Pabrik</label>
                    <input type="text" class="form-control" id="disabledInputFactory" value="<?php echo $data['factory'] ?>" disabled>
                </div>
                <div class="col-md-6">
                    <label for="inputForms" class="form-label">Bentuk Sediaan</label>
                    <div class="col-12">
                        <label class="visually-hidden" for="inlineFormSelectPref">Preference</label>
                        <select class="form-select" id="inlineFormSelectPref" disabled>
                            <option selected><?php echo $data['drug_forms'] ?></option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <label for="disabledInputContent" class="form-label">Kandungan</label>
                    <input type="text" class="form-control" id="disabledInputContent" value="<?php echo $data['drug_content'] ?>" disabled>
                </div>
                <div class="col-md-6">
                    <label for="inputPackaging" class="form-label">Kemasan</label>
                    <div class="col-12">
                        <label class="visually-hidden" for="inlineFormSelectPref">Preference</label>
                        <select class="form-select" id="inlineFormSelectPref" disabled>
                            <option selected><?php echo $data['drug_packaging'] ?></option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <label for="disabledInputDose" class="form-label">Dosis</label>
                    <input type="text" class="form-control" id="disabledInputDoseDose" value="<?php echo $data['drug_dose'] ?>" disabled>
                </div>
                <div class="col-md-6">
                    <label for="inputQty" class="form-label">Quantity</label>
                    <input type="text" class="form-control" id="inputQty" value="<?php echo $data['quantity'] ?>">
                </div>
                <div class="d-grid gap-2 d-md-block">
                    <button class="btn btn-secondary shadow" type="submit" name="update">Save</button>
                    <a class="btn btn-outline-secondary shadow mx-5" href="dashboard.php" role="button">Cancel</a>
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