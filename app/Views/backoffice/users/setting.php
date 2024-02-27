<?php $session = session(); ?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>setting</title>

    <!-- Custom fonts for this template-->
    <link href="<?= base_url('backoffice/vendor/fontawesome-free/css/all.min.css') ?>" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?= base_url('backoffice/css/sb-admin-2.min.css') ?>" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?= $this->include('backoffice\users\navbar.php') ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?= $this->include('backoffice/users/topbar') ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid mb-2">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-3 text-gray-800">Setting</h1>
                    <!-- ทำแจ้งเตือ่น -->
                    <?php if ($session->getFlashdata('success')) : ?>
                        <div class="alert alert-success" role="alert">
                            <?= $session->getFlashdata('success'); ?>
                        </div>
                    <?php endif; ?>
                    <!-- ทำแจ้งเตือ่น -->
                    <!-- ทำแจ้งเตือ่น -->
                    <?php if ($session->getFlashdata('error')) : ?>
                        <div class="alert alert-danger" role="alert">
                            <?= $session->getFlashdata('error'); ?>
                        </div>
                    <?php endif; ?>
                    <div class="card">
                        <h6 class="card-header  text-dark">
                            <nav class="navbar navbar-expand-lg bg-body-tertiary">
                                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                                    <span class="navbar-toggler-icon"></span>
                                </button>
                                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                                    <ul class="navbar-nav">
                                        <li class="nav-item">
                                            <a class="nav-link active" aria-current="page" href="<?= base_url('reset_password_User/') . $session->get('id'); ?>">เปลี่ยนรหัสผ่าน</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="<?= site_url('/Setting'); ?>">รูป</a>
                                        </li>
                                    </ul>
                                </div>
                            </nav>
                        </h6>
                        <div class="card-body">
                            <!--  อัปรูปภาพ -->
                            <div class="mb-3">
                                <form action="<?= base_url('/setting') ?>" method="post" enctype="multipart/form-data">
                                    <h5 class="card-title">แก้ไขรูปภาพ</h5>
                                    <div class="mb-3">
                                        <input class="form-control" name="file" type="file" id="formFile">
                                    </div>
                                    <div class="mb-3">
                                        <button class="btn btn-primary" type="submit">ยืนยัน</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- /.container-fluid -->

                </div>
                <!-- End of Main Content -->

                <!-- Footer -->
                <footer class="sticky-footer bg-white">
                    <div class="container my-auto">
                        <div class="copyright text-center my-auto">
                            <span>Copyright &copy; Your Website 2021</span>
                        </div>
                    </div>
                </footer>
                <!-- End of Footer -->

            </div>
            <!-- End of Content Wrapper -->

        </div>
        <!-- End of Page Wrapper -->

        <!-- Scroll to Top Button-->
        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fas fa-angle-up"></i>
        </a>

        <!-- Logout Modal-->
        <?= $this->include('backoffice/users/logout') ?>

        <!-- Bootstrap core JavaScript-->
        <script src="<?= base_url('backoffice/vendor/jquery/jquery.min.js') ?>"></script>
        <script src="<?= base_url('backoffice/vendor/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>

        <!-- Core plugin JavaScript-->
        <script src="<?= base_url('backoffice/vendor/jquery-easing/jquery.easing.min.js') ?>"></script>

        <!-- Custom scripts for all pages-->
        <script src="<?= base_url('backoffice/js/sb-admin-2.min.js') ?>"></script>

        <!-- Page level plugins -->
        <script src="<?= base_url('backoffice/vendor/chart.js/Chart.min.js') ?>"></script>

        <!-- Page level custom scripts -->
        <script src="<?= base_url('backoffice/js/demo/chart-area-demo.js') ?>"></script>
        <script src="<?= base_url('backoffice/js/demo/chart-pie-demo.js') ?>"></script>
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>


</body>

</html>