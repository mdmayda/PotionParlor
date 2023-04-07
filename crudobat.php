<!-- <?php
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
        ?> -->


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style/style.css">
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <title>Document</title>
</head>


<body>
    <section>
        <div class="Container">
            <div class="row">
                <form>
                    <div class="form-group">
                        <label for="exampleFormControlFile1">Example file input</label>
                        <input type="file" class="form-control-file" id="exampleFormControlFile1">
                    </div>
                    <div>
                        <label>Nama Pabrik</label>
                        <input class="form-control" type="text" placeholder="Default input">
                        <label>Kandung</label>
                        <input class="form-control" type="text" placeholder="Default input">
                        <label>Dosis</label>
                        <input class="form-control" type="text" placeholder="Default input">

                        <label>Bentuk Sediaan</label>
                        <div class="dropdown">
                            <button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Dropdown
                            </button>
                            <ul class="dropdown-menu">
                                <li><button class="dropdown-item" type="button">Tablet</button></li>
                                <li><button class="dropdown-item" type="button">Kapsul</button></li>
                                <li><button class="dropdown-item" type="button">Sirup</button></li>
                            </ul>
                        </div>

                        <label>Kemasan</label>
                        <div class="dropdown">
                            <button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Dropdown
                            </button>
                            <ul class="dropdown-menu">
                                <li><button class="dropdown-item" type="button">Botol</button></li>
                                <li><button class="dropdown-item" type="button">Strip</button></li>
                                <li><button class="dropdown-item" type="button">Sachet</button></li>
                            </ul>
                        </div>
                        <label>Quantity</label>
                        <input class="form-control" type="text" placeholder="Default input">
                    </div>

                    <button type="button" class="btn btn-outline-primary">Create</button>
                    <button type="button" class="btn btn-outline-secondary">Cancel</button>
                </form>
            </div>
        </div>

    </section>

    <script src="../js/bootstrap.bundle.min.js">

    </script>
</body>

</html>