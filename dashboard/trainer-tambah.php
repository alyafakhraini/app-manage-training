<?php
session_start();
include "../koneksi.php";

if (!isset($_SESSION['id_user'])) {
    header("Location: ../login.php");
    exit;
}

$level = $_SESSION['level'];

if ($level != 'admin' && $level != 'panitia') {
    header("Location: ../login.php");
    exit;
}

if (isset($_POST["submit"])) {

    $nama_trainer = $_POST["nama_trainer"];
    $keahlian = $_POST["keahlian"];
    $sertifikasi = $_POST["sertifikasi"];
    $npwp_trainer = intval($_POST["npwp_trainer"]); // Konversi ke integer
    $fee_trainer = intval($_POST["fee_trainer"]);
    $bank = $_POST["bank"];
    $rekening = intval($_POST["rekening"]);
    $kontak_trainer = intval($_POST["kontak_trainer"]);

    $simpan = mysqli_query($conn, "INSERT INTO tbl_trainer VALUES(NULL, '$nama_trainer', '$keahlian', '$sertifikasi', $npwp_trainer, $fee_trainer, '$bank', $rekening, $kontak_trainer)");

    if ($simpan) {
        header("Location: trainer.php");
    } else {
        header("Location: trainer-tambah.php");
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="../image/bcti_logo.png" type="image/png">
    <title> Tambah Data Trainer</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="../assets/vendors/feather/feather.css">
    <link rel="stylesheet" href="../assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="../assets/vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" href="../assets/vendors/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="../assets/vendors/typicons/typicons.css">
    <link rel="stylesheet" href="../assets/vendors/simple-line-icons/css/simple-line-icons.css">
    <link rel="stylesheet" href="../assets/vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="../assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="../assets/vendors/datatables.net-bs4/dataTables.bootstrap4.css">
    <link rel="stylesheet" type="text/css" href="../assets/js/select.dataTables.min.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="../assets/css/style.css">
    <!-- endinject -->
    <style>
        .breadcrumb-container {
            background-color: #e4eefc;
            padding: 0.2rem 1rem 0.2rem 1rem;
            border-radius: 0.375rem;
            margin-bottom: 1rem;
        }

        .breadcrumb-container h4 {
            margin-bottom: 0.5rem;
        }
    </style>
</head>

<body class="with-welcome-text">
    <div class="container-scroller">

        <?php include "navbar.php"; ?>

        <div class="container-fluid page-body-wrapper">

            <?php include "sidebar.php"; ?>

            <div class="main-panel">
                <div class="content-wrapper">

                    <div class="col-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <div class="breadcrumb-container">
                                    <h3 class="mt-4"><b>Tambah Data Trainer</b></h3>
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                                        <li class="breadcrumb-item"><a href="trainer.php">Data Trainer</a></li>
                                        <li class="breadcrumb-item active">Tambah Data Trainer</li>
                                    </ol>
                                </div>
                                <form action="" method="post" enctype="multipart/form-data" class="forms-sample">
                                    <div class="form-group row">
                                        <label for="nama_trainer" class="col-sm-2 col-form-label">Nama Trainer</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="nama_trainer" id="nama_trainer" placeholder="Masukkan nama trainer" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="keahlian" class="col-sm-2 col-form-label">Keahlian</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="keahlian" id="keahlian" placeholder="Masukkan keahlian" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="nama_trainer" class="col-sm-2 col-form-label">Nama Trainer</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="nama_trainer" id="nama_trainer" placeholder="Masukkan nama trainer" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="sertifikasi" class="col-sm-2 col-form-label">Sertifikasi</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="sertifikasi" id="sertifikasi" placeholder="Masukkan sertifikasi" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="npwp_trainer" class="col-sm-2 col-form-label">NPWP Trainer</label>
                                        <div class="col-sm-10">
                                            <input type="number" class="form-control" name="npwp_trainer" id="npwp_trainer" placeholder="Masukkan Nomor NPWP Trainer" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="fee_trainer" class="col-sm-2 col-form-label">Fee Trainer</label>
                                        <div class="col-sm-10">
                                            <input type="number" class="form-control" name="fee_trainer" id="fee_trainer" placeholder="Masukkan jumlah fee trainer (tanpa titik, contoh:200000)" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="bank" class="col-sm-2 col-form-label">Bank</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="bank" id="bank" placeholder="Masukkan nama bank yang terhubung dengan rekening trainer" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="rekening" class="col-sm-2 col-form-label">Rekening Trainer</label>
                                        <div class="col-sm-10">
                                            <input type="number" class="form-control" name="rekening" id="rekening" placeholder="Masukkan nomor rekening trainer" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="kontak_trainer" class="col-sm-2 col-form-label">Kontak Trainer</label>
                                        <div class="col-sm-10">
                                            <input type="number" class="form-control" name="kontak_trainer" id="kontak_trainer" placeholder="Masukkan kontak trainer" required>
                                        </div>
                                    </div>
                                    <button type="submit" name="submit" class="btn btn-primary me-2">Tambah</button>
                                    <a href="trainer.php" class="btn btn-light">Cancel</a>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <?php include "footer.php"; ?>

    </div>

    <!-- plugins:js -->
    <script src="../assets/vendors/js/vendor.bundle.base.js"></script>
    <script src="../assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="../assets/vendors/chart.js/chart.umd.js"></script>
    <script src="../assets/vendors/progressbar.js/progressbar.min.js"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="../assets/js/off-canvas.js"></script>
    <script src="../assets/js/template.js"></script>
    <script src="../assets/js/settings.js"></script>
    <script src="../assets/js/hoverable-collapse.js"></script>
    <script src="../assets/js/todolist.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page-->
    <script src="../assets/js/jquery.cookie.js" type="text/javascript"></script>
    <script src="../assets/js/dashboard.js"></script>
    <!-- End custom js for this page-->
</body>

</html>