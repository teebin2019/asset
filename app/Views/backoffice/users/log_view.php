<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>ประวัติการใช้งานระบบ</title>

    <!-- Custom fonts for this template-->
    <link href="<?= base_url('backoffice/vendor/fontawesome-free/css/all.min.css') ?>" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?= base_url('backoffice/css/sb-admin-2.min.css') ?>" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.css" />
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
                <div class="container-fluid">

                    <?php if (session()->getFlashdata('success')) : ?>
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <?php echo session()->getFlashdata('success'); ?>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    <?php elseif (session()->getFlashdata('edits')) : ?>
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <?php echo session()->getFlashdata('edits'); ?>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    <?php elseif (session()->getFlashdata('delece')) : ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <?php echo session()->getFlashdata('delece'); ?>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    <?php endif; ?>

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">ประวัติการใช้งานระบบ</h1>
                    </div>
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">ข้อมูลประวัติการใช้งานทั้งหมด</h6>
                        </div>
                        <div class="card-body">
                            <table id="myTable" class="table table-bordered border-dark" width="100%">
                                <thead class="table table-dark">
                                    <tr>
                                        <th>#</th>
                                        <th class="text-center">การเข้าออก</th>
                                        <th>วันที่</th>
                                        <th>เวลา</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 1;
                                    foreach ($log as $as) : ?>
                                        <tr>
                                            <td>
                                                <?= $i ?>
                                            </td>
                                            <td><?php if ($as['log_action'] == 0) : ?>
                                                    ออก
                                                <?php else : ?>
                                                    เข้า
                                                <?php endif; ?></td>
                                            <td><?php
                                                $date = thaidate('j F Y', $as['creart_at']);
                                                echo $date;

                                                ?></td>
                                            <td><?php
                                                $date = date_create($as['creart_at']);
                                                echo date_format($date, "H:i:s");
                                                ?></td>
                                        </tr>
                                        <?php $i++; ?>
                                    <?php endforeach ?>

                                </tbody>

                            </table>

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

                    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.js"></script>

                    <script>
                        $(document).ready(function() {
                            $('#myTable').DataTable();
                        });
                    </script>

</body>


</html>