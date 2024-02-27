<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>ค้นหาครุภัณฑ์</title>

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
                <div class="container-fluid">

                    <div class="text-center mb-4">
                        <h1>ระบบค้นหาครุภัณฑ์</h1>
                    </div>
                    <form action="<?= base_url('search/search')  ?>" method="post">
                        <div class="container text-center">
                            <div class="row align-items-start">
                                <div class="col mt-2 mb-2">
                                    <label for="inputEmail4" class="form-label">รหัสครุภัณฑ์</label>
                                    <input type="text" class="form-control" name="search_id" id="inputEmail4" value="<?= session('search_id')  ?>">
                                </div>
                                <div class="col mt-2 mb-2">
                                    <label for="inputPassword4" class="form-label">ชื่อครุภัณฑ์</label>
                                    <input type="text" name="search_name" class="form-control" id="inputPassword4" value="<?= set_value('search_name') ?>">
                                </div>
                                <div class="col mt-2 mb-2">
                                    <label for="inputState" class="form-label">สาขาวิชา</label>
                                    <br>
                                    <select id="inputState" name="search_department" class="form-select">
                                        <option value="" >--เลือกสาขา--</option>
                                        <?php foreach ($department as $row) : ?>
                                            <option value="<?= $row['department_id'] ?>"><?= $row['department_name'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="container text-center">
                            <div class="row align-items-center">
                                <div class="col mt-2 mb-2">
                                    <label for="inputAddress2" class="form-label">ปี</label><br>
                                    <select name="search_year">
                                        <option value="">--เลือกปี--</option>
                                        <?php for ($i = 2006; $i <= date("Y"); $i++) : ?>
                                            <option value="<?= $i ?>"><?= $i + 543 ?></option>
                                        <?php endfor; ?>
                                    </select>

                                </div>
                                <div class="col mt-2 mb-2">
                                    <label for="inputAddress2" class="form-label">เดือน</label><br>
                                    <select name="search_month">
                                        <option value="">--เลือกเดือน--</option>
                                        <?php for ($i = 1; $i <= 12; $i++) : ?>
                                            <option value="<?= $i ?>"><?= $i  ?></option>
                                        <?php endfor; ?>
                                    </select>
                                </div>
                                <div class="col mt-2 mb-2">
                                    <label for="inputAddress2" class="form-label">วันที่</label><br>
                                    <select name="search_day">
                                        <option value="">--วันที่--</option>
                                        <?php for ($i = 1; $i <= 31; $i++) : ?>
                                            <option value="<?= $i ?>"><?= $i  ?></option>
                                        <?php endfor; ?>
                                    </select>

                                </div>
                            </div>
                        </div>

                        <div class="form-group mt-3 text-center ">
                            <button type="submit" class="btn btn-primary text-center">ค้นหาครุภัณฑ์</button>
                        </div>
                    </form>



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

</body>

</html>