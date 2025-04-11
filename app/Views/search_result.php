<?php
$session = session();
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>ค้นหาข้อมูล</title>

    <!-- Custom fonts for this template-->
    <link href="<?= base_url('backoffice/vendor/fontawesome-free/css/all.min.css') ?>" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?= base_url('backoffice/css/sb-admin-2.min.css') ?>" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.css" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>

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
                    <?php if (empty($results)): ?>
                        <h1>ไม่มีข้อมูล</้>
                        <?php else: ?>
                            <!-- Page Heading -->
                            <?php if (!empty($searchTerm)): ?>
                                <h1 class="h3 mb-0 text-gray-800 mb-2">ผลลัพธ์ที่ค้นหา :
                                    <?= "ชื่อครุภัณฑ์" . " " . $searchTerm ?>
                                </h1>
                            <?php elseif (!empty($searchid)): ?>
                                <h1 class="h3 mb-0 text-gray-800 mb-2">ผลลัพธ์ที่ค้นหา :
                                    <?= "เลขครุภัณฑ์" . " " . $searchid ?>
                                </h1>
                            <?php elseif (!empty($searchdepartment)): ?>
                                <h1 class="h3 mb-0 text-gray-800 mb-2">ผลลัพธ์ที่ค้นหา :
                                    <?= "สาขา" . " " . $dep['department_name'] ?>
                                </h1>
                            <?php elseif (!empty($searchyear)): ?>
                                <h1 class="h3 mb-0 text-gray-800 mb-2">ผลลัพธ์ที่ค้นหา :
                                    <?= "ปี" . " " . ($searchyear + 543) ?>
                                </h1>
                            <?php elseif (!empty($search_month)): ?>
                                <h1 class="h3 mb-0 text-gray-800 mb-2">ผลลัพธ์ที่ค้นหา :
                                    <?= "เดือน" . " " ?>
                                    <?php if ($search_month == 1): ?>
                                        มกราคม
                                    <?php elseif ($search_month == 2): ?>
                                        กุมภาพ
                                    <?php elseif ($search_month == 3): ?>
                                        มีนาคม
                                    <?php elseif ($search_month == 4): ?>
                                        เมษายน
                                    <?php elseif ($search_month == 5): ?>
                                        พฤษภาคม
                                    <?php elseif ($search_month == 6): ?>
                                        มิถุนายน
                                    <?php elseif ($search_month == 7): ?>
                                        กรกฎาคม
                                    <?php elseif ($search_month == 8): ?>
                                        สิงหาคม
                                    <?php elseif ($search_month == 9): ?>
                                        กันยายน
                                    <?php elseif ($search_month == 10): ?>
                                        ตุลาคม
                                    <?php elseif ($search_month == 11): ?>
                                        พฤศจิกายน
                                    <?php elseif ($search_month == 12): ?>
                                        ธันวาคม
                                    <?php endif; ?>
                                </h1>
                            <?php elseif (!empty($search_day)): ?>
                                <h1 class="h3 mb-0 text-gray-800 mb-2">ผลลัพธ์ที่ค้นหา :
                                    <?= "วันที่" . " " . $search_day ?>
                                </h1>
                            <?php else: ?>
                                <h1 class="h3 mb-2 text-gray-800">ไม่ได้กรอกข้อมูล</h1>
                            <?php endif ?>
                            <p class="d-flex justify-content-start mt-3 ">
                                <a class="btn btn-info mx-2" data-bs-toggle="collapse" href="#collapseExample" role="button"
                                    aria-expanded="false" aria-controls="collapseExample">
                                    ค้นหา
                                </a>
                                <a class="btn btn-info" data-bs-toggle="collapse" href="#print" role="button"
                                    aria-expanded="false" aria-controls="print">
                                    ปริ้น
                                </a>
                            </p>
                            <div class="collapse" id="collapseExample">
                                <div class="card card-body">
                                    <form action="<?= base_url('search/search') ?>" method="post">
                                        <div class="container text-center">
                                            <div class="row align-items-start">
                                                <div class="col mt-2 mb-2">
                                                    <label for="inputEmail4" class="form-label">รหัสครุภัณฑ์</label>
                                                    <input type="text" class="form-control" name="search_id"
                                                        id="inputEmail4" value="<?= $_POST['search_id'] ?>">
                                                </div>
                                                <div class="col mt-2 mb-2">
                                                    <label for="inputPassword4" class="form-label">ชื่อครุภัณฑ์</label>
                                                    <input type="text" name="search_name" class="form-control"
                                                        id="inputPassword4" value="<?= $_POST['search_name'] ?>">
                                                </div>
                                                <div class="col mt-2 mb-2">
                                                    <label for="inputState" class="form-label">สาขาวิชา</label>
                                                    <br>
                                                    <select id="inputState" name="search_department" class="form-select">
                                                        <option value="<?= $_POST['search_department'] ?>" hidden>
                                                            <?= $dep['department_name'] ?>
                                                        </option>
                                                        <?php foreach ($department as $row): ?>
                                                            <option value="<?= $row['department_id'] ?>">
                                                                <?= $row['department_name'] ?>
                                                            </option>
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

                                                        <option value="<?= $_POST['search_year'] ?>" hidden>
                                                            <?= $_POST['search_year'] ?>
                                                        </option>


                                                        <?php for ($i = 2006; $i <= date("Y"); $i++): ?>
                                                            <option value="<?= $i ?>">
                                                                <?= $i + 543 ?>
                                                            </option>
                                                        <?php endfor; ?>
                                                    </select>

                                                </div>
                                                <div class="col mt-2 mb-2">
                                                    <label for="inputAddress2" class="form-label">เดือน</label><br>
                                                    <select name="search_month">

                                                        <option value="<?= $_POST['search_month'] ?>" hidden>
                                                            <?= $_POST['search_month'] ?>
                                                        </option>
                                                        <?php for ($i = 1; $i <= 12; $i++): ?>
                                                            <option value="<?= $i ?>">
                                                                <?= $i ?>
                                                            </option>
                                                        <?php endfor; ?>
                                                    </select>

                                                </div>
                                                <div class="col mt-2 mb-2">
                                                    <label for="inputAddress2" class="form-label">วันที่</label><br>
                                                    <select name="search_day">
                                                        <option value="<?= $_POST['search_day'] ?>" hidden>
                                                            <?= $_POST['search_day'] ?>
                                                        </option>
                                                        <?php for ($i = 1; $i <= 31; $i++): ?>
                                                            <option value="<?= $i ?>">
                                                                <?= $i ?>
                                                            </option>
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
                            </div>
                            <div class="collapse" id="print">
                                <div class="card card-body">
                                    <form action="<?= base_url('/print_pdf_value') ?>" method="post">
                                        <div class="container text-center">
                                            <div class="row align-items-start">
                                                <div class="col mt-2 mb-2">
                                                    <label for="inputEmail4" class="form-label">รหัสครุภัณฑ์</label>
                                                    <input type="text" class="form-control" name="search_id"
                                                        id="inputEmail4" value="<?= $_POST['search_id'] ?>">
                                                </div>
                                                <div class="col mt-2 mb-2">
                                                    <label for="inputPassword4" class="form-label">ชื่อครุภัณฑ์</label>
                                                    <input type="text" name="search_name" class="form-control"
                                                        id="inputPassword4" value="<?= $_POST['search_name'] ?>">
                                                </div>
                                                <div class="col mt-2 mb-2">
                                                    <label for="inputState" class="form-label">สาขาวิชา</label>
                                                    <br>
                                                    <select id="inputState" name="search_department" class="form-select">
                                                        <option value="<?= $_POST['search_department'] ?>" hidden>
                                                            <?= $dep['department_name'] ?>
                                                        </option>
                                                        <?php foreach ($department as $row): ?>
                                                            <option value="<?= $row['department_id'] ?>">
                                                                <?= $row['department_name'] ?>
                                                            </option>
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

                                                        <option value="<?= $_POST['search_year'] ?>" hidden>
                                                            <?= $_POST['search_year'] ?>
                                                        </option>


                                                        <?php for ($i = 2006; $i <= date("Y"); $i++): ?>
                                                            <option value="<?= $i ?>">
                                                                <?= $i + 543 ?>
                                                            </option>
                                                        <?php endfor; ?>
                                                    </select>

                                                </div>
                                                <div class="col mt-2 mb-2">
                                                    <label for="inputAddress2" class="form-label">เดือน</label><br>
                                                    <select name="search_month">

                                                        <option value="<?= $_POST['search_month'] ?>" hidden>
                                                            <?= $_POST['search_month'] ?>
                                                        </option>
                                                        <?php for ($i = 1; $i <= 12; $i++): ?>
                                                            <option value="<?= $i ?>">
                                                                <?= $i ?>
                                                            </option>
                                                        <?php endfor; ?>
                                                    </select>

                                                </div>
                                                <div class="col mt-2 mb-2">
                                                    <label for="inputAddress2" class="form-label">วันที่</label><br>
                                                    <select name="search_day">
                                                        <option value="<?= $_POST['search_day'] ?>" hidden>
                                                            <?= $_POST['search_day'] ?>
                                                        </option>
                                                        <?php for ($i = 1; $i <= 31; $i++): ?>
                                                            <option value="<?= $i ?>">
                                                                <?= $i ?>
                                                            </option>
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
                            </div>





                            <div class="card-body">
                                <table id="myTable" class="table table-bordered border-dark" width="100%">
                                    <thead class="table table-dark">
                                        <tr>
                                            <th>รหัสครุภัณฑ์</th>
                                            <th>ชื่อ</th>
                                            <th width="8%">วิธีการได้รับมา</th>
                                            <th>สถานะปัจจุบัน</th>
                                            <?php $role = $session->get('role');
                                            if (isset($role)) { ?>
                                                <th>ดาวน์โหลด</th>
                                            <?php } ?>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($results as $as): ?>
                                            <tr>
                                                <td width="23%"><a
                                                        href="<?php echo site_url('asset-detail/' . $as['asset_id']) ?>">
                                                        <?= $as['asset_id'] ?>
                                                    </a> </td>
                                                <td>
                                                    <?= $as['name'] ?>
                                                </td>

                                                <td width="18%">
                                                    <?= $as['acquisition_method_name'] ?>
                                                </td>

                                                <td> <!-- หมดอายุ -->
                                                    <?php if ($as['end'] < date("Y-m-d")): ?>
                                                        <span class="badge badge-danger">หมดอายุ</span>
                                                    <?php else: ?>
                                                        <span class="badge badge-success">ไม่หมดอายุ</span>
                                                    <?php endif; ?>
                                                </td>
                                                <?php if (isset($role)) { ?>
                                                    <td>
                                                        <a href="<?= base_url('/print_pdf/' . $as['asset_id']) ?>">ดาวน์โหลด</a>
                                                    </td>
                                                <?php } ?>
                                            </tr>
                                        <?php endforeach ?>
                                    </tbody>
                                </table>
                            </div>
                        <?php endif; ?>
                        <!-- ทำปุ่มย้อนกับ -->
                        <div class="col-md-12 text-center">
                            <div class="btn-group">
                                <a href="<?= site_url('search') ?>"> <button type="button"
                                        class="btn btn-primary">ย้อนกลับ</button></a>
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
            <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.js"></script>
            <script>
                $(document).ready(function () {
                    $('#myTable').DataTable();
                });
            </script>

            <script>
                const bsCollapse = new bootstrap.Collapse('#myCollapse', {
                    toggle: false
                });
                const bsCollapse = new bootstrap.Collapse('#print', {
                    toggle: false
                });
            </script>

</body>

</html>