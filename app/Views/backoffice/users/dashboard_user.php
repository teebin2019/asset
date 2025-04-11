<?php $session = session(); ?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="<?= base_url('backoffice/vendor/fontawesome-free/css/all.min.css') ?>" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

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

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Dashboard </h1>
                        <a href="<?= base_url('/printpdf') ?>"
                            class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i> Report PDF</a>
                    </div>

                    <?php if ($session->get('role') == 0): ?>

                        <!-- Content Row -->
                        <div class="row">
                            <!-- Earnings (Monthly) Card Example -->
                            <div class="col-xl-3 col-md-6 mb-4">
                                <div class="card border-left-primary shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class=" text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                    <h5>เงินรวมค่าครุภัณฑ์</h5>
                                                </div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                    <?php echo number_format($sum_assets['purchase_price'], 2); ?>บาท
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="58"
                                                    fill="currentColor" class="bi bi-coin" viewBox="0 0 16 16">
                                                    <path
                                                        d="M5.5 9.511c.076.954.83 1.697 2.182 1.785V12h.6v-.709c1.4-.098 2.218-.846 2.218-1.932 0-.987-.626-1.496-1.745-1.76l-.473-.112V5.57c.6.068.982.396 1.074.85h1.052c-.076-.919-.864-1.638-2.126-1.716V4h-.6v.719c-1.195.117-2.01.836-2.01 1.853 0 .9.606 1.472 1.613 1.707l.397.098v2.034c-.615-.093-1.022-.43-1.114-.9zm2.177-2.166c-.59-.137-.91-.416-.91-.836 0-.47.345-.822.915-.925v1.76h-.005zm.692 1.193c.717.166 1.048.435 1.048.91 0 .542-.412.914-1.135.982V8.518z" />
                                                    <path
                                                        d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16" />
                                                    <path
                                                        d="M8 13.5a5.5 5.5 0 1 1 0-11 5.5 5.5 0 0 1 0 11m0 .5A6 6 0 1 0 8 2a6 6 0 0 0 0 12" />
                                                </svg>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Pending Requests Card Example -->
                            <div class="col-xl-3 col-md-6 mb-4">
                                <div class="card border-left-warning shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                    <h5>จำนวนครุภัณฑ์</h5>
                                                </div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                    <?= $count_assets ?>
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-comments fa-2x text-gray-300"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Pending Requests Card Example -->
                            <div class="col-xl-3 col-md-6 mb-4">
                                <div class="card border-left-success shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                    <h5>จำนวนผู้ใช้งาน</h5>
                                                </div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                    <?= $count_users ?>
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30"
                                                    fill="currentColor" class="bi bi-people fa-2x text-gray-300"
                                                    viewBox="0 0 16 16">
                                                    <path
                                                        d="M15 14s1 0 1-1-1-4-5-4-5 3-5 4 1 1 1 1zm-7.978-1L7 12.996c.001-.264.167-1.03.76-1.72C8.312 10.629 9.282 10 11 10c1.717 0 2.687.63 3.24 1.276.593.69.758 1.457.76 1.72l-.008.002-.014.002zM11 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4m3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0M6.936 9.28a6 6 0 0 0-1.23-.247A7 7 0 0 0 5 9c-4 0-5 3-5 4q0 1 1 1h4.216A2.24 2.24 0 0 1 5 13c0-1.01.377-2.042 1.09-2.904.243-.294.526-.569.846-.816M4.92 10A5.5 5.5 0 0 0 4 13H1c0-.26.164-1.03.76-1.724.545-.636 1.492-1.256 3.16-1.275ZM1.5 5.5a3 3 0 1 1 6 0 3 3 0 0 1-6 0m3-2a2 2 0 1 0 0 4 2 2 0 0 0 0-4" />
                                                </svg>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>




                        <div class="mt-3 mb-3">
                            <div id="GoogleLineChart" style="height: 400px; width: 100%"></div>
                        </div>
                        <div class="mt-3 mb-3">
                            <div id="GoogleBarChart" style="height: 400px; width: 100%"></div>
                        </div>
                        <div class="mt-3 mb-3">
                            <div id="GooglePieChart" style="height: 600px; width: 100%"></div>
                        </div>






                    </div>
                    <!-- /.container-fluid -->

                </div>
                <!-- End of Main Content -->
            <?php endif ?>
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
    <script>
        google.charts.load('current', {
            'packages': ['corechart', 'bar']
        });
        google.charts.setOnLoadCallback(drawLineChart);
        google.charts.setOnLoadCallback(drawBarChart);
        // Line Chart
        function drawLineChart() {
            var data = google.visualization.arrayToDataTable([
                ['ปี', 'ราคาครุภัณฑ์'],
                <?php
                foreach ($products as $row) {
                    echo "['" . $row['year'] . "'," . $row['sell'] . "],";
                } ?>
            ]);
            var options = {
                title: 'สถิตราคาครุภัณฑ์ประจำปี',
                curveType: 'function',
                legend: {
                    position: 'top'
                }
            };
            var chart = new google.visualization.LineChart(document.getElementById('GoogleLineChart'));
            chart.draw(data, options);
        }


        // Bar Chart
        google.charts.setOnLoadCallback(showBarChart);

        function drawBarChart() {
            var data = google.visualization.arrayToDataTable([
                ['ปี', 'ราคาครุภัณฑ์'],
                <?php
                foreach ($products as $row) {
                    echo "['" . $row['year'] . "'," . $row['sell'] . "],";
                }
                ?>
            ]);
            var options = {
                title: 'สถิตราคาครุภัณฑ์ประจำปี',
                is3D: true,
            };
            var chart = new google.visualization.BarChart(document.getElementById('GoogleBarChart'));
            chart.draw(data, options);
        }
    </script>
    <script>
        google.charts.load('visualization', "1", {
            packages: ['corechart']
        });
        google.charts.setOnLoadCallback(drawBarChart);

        // Pie Chart
        google.charts.setOnLoadCallback(showBarChart);

        function drawBarChart() {
            var data = google.visualization.arrayToDataTable([
                ['ปี', 'ราคาครุภัณฑ์'],
                <?php
                foreach ($products as $row) {
                    echo "['" . $row['year'] . "'," . $row['sell'] . "],";
                }
                ?>
            ]);
            var options = {
                title: 'สถิตราคาครุภัณฑ์ประจำปี',
                is3D: true,
            };
            var chart = new google.visualization.PieChart(document.getElementById('GooglePieChart'));
            chart.draw(data, options);
        }
    </script>

</body>

</html>