<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>ครุภัณฑ์</title>

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
                    <?php elseif (session()->getFlashdata('delect')) : ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <?php echo session()->getFlashdata('delect'); ?>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    <?php endif; ?>



                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">ครุภัณฑ์</h1>
                        <a href="<?= site_url('/asset_add') ?>" class="d-none d-sm-inline-block btn btn-sm btn-info shadow-sm" id="assets_add"><i class="fas fa-download fa-sm text-white-50"></i>เพิ่มข้อมูล</a>
                    </div>
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">ข้อมูลครุภัณฑ์ทั้งหมด</h6>
                        </div>
                        <div class="card-body">
                            <table id="myTable" class="table table-bordered border-dark" width="100%">
                                <thead class="table table-dark">
                                    <tr>
                                        <th>รหัสครุภัณฑ์</th>
                                        <th>ชื่อครุภัณฑ์</th>
                                        <th class="text-center">วันที่ซื้อ</th>
                                        <th>ราคาที่ซื้อ</th>
                                        <th class="text-center">สถานะปัจจุบัน</th>
                                        <th>รายละเอียด</th>
                                        <th>แก้ไข</th>
                                        <th>ลบ</th>

                                    </tr>
                                </thead>
                                <tbody class="table-active">
                                    <?php foreach ($asset as $as) : ?>
                                        <tr>
                                            <td width="23%"><?= $as['asset_id'] ?></td>
                                            <td><?= $as['name'] ?></td>
                                            <td class="text-center" width="15%">
                                                <?php
                                                if ($as['purchase_date'] == null) {
                                                    echo "ไม่ระบุ";
                                                } else {
                                                    $date =   thaidate('j F Y', $as['purchase_date']);
                                                    echo $date;
                                                }  ?>
                                            </td>
                                            <td><?= $as['purchase_price'] ?></td>
                                            <td class="text-center">
                                                <!-- หมดอายุ -->
                                                <?php if ($as['end_date'] < date("Y-m-d")) : ?>
                                                    <span class="badge badge-danger">หมดอายุ</span>
                                                <?php else : ?>
                                                    <span class="badge badge-success">ไม่หมดอายุ</span>
                                                <?php endif; ?>

                                            </td>

                                            <td class="text-center "><a href="<?php echo site_url('asset-detail/' . $as['asset_id']) ?>"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                                                        <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8M1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z" />
                                                        <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5M4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0" />
                                                    </svg></a></td>
                                            <td>
                                                <a href="<?php echo base_url('asset-edit-view/' . $as['asset_id']); ?>" class="btn btn-primary btn-sm" id="edit">แก้ไข</a>
                                            </td>
                                            <td>
                                                <a href="<?php echo base_url('assets-delete/' . $as['asset_id']); ?>" class="btn btn-danger btn-sm" id="delete">ลบ</a>
                                            </td>
                                        </tr>
                                    <?php endforeach ?>

                                </tbody>
                                <tr>
                                    <!-- ให้ 1 colom รวมกันไปเลย -->
                                    <td colspan="3" class="text-center">รวม</td>

                                    <?php foreach ($total_price as $t) : ?>
                                        <td class="text-center"><?= $t['purchase_price'] ?></td>
                                    <?php endforeach ?>
                                    <td colspan="4" class="text-center">บาท</td>
                                </tr>
                            </table>



                            <a href="<?= base_url('Dashboard') ?>">ย้อนกลับ</a>



                            <!-- End of Main Content -->

                            <!-- Footer -->

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



                    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.js"></script>
                    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


                    <script>
                        $(document).ready(function() {
                            $('#myTable').DataTable({
                                "language": {
                                    "lengthMenu": "แสดง _MENU_ รายการ",
                                    "zeroRecords": "ไม่พบข้อมูล",
                                    "info": "แสดง _START_ ถึง _END_ จาก _TOTAL_ รายการ",
                                    "infoEmpty": "แสดง 0 ถึง 0 จาก 0 รายการ",
                                    "infoFiltered": "(กรองข้อมูล _MAX_ ทุกรายการ)",
                                    "search": "ค้นหา:",
                                    "paginate": {
                                        "first": "หน้าแรก",
                                        "last": "หน้าสุดท้าย",
                                        "next": "หน้าต่อไป",
                                        "previous": "หน้าก่อน"
                                    },
                                }

                            });
                        });
                    </script>

                    <script>
                        // เมื่อกดปุ่มเพิ่ม แบบ SweetAlert2
                        $('#assets_add').click(function(e) {
                            // deleteUrl 
                            var AddUrl = $(this).attr('href');
                            var id = $(this).attr('asset_id');
                            e.preventDefault();
                            Swal.fire({
                                title: 'คุณต้องการเพิ่มข้อมูลใช่หรือไม่?',
                                icon: 'warning',
                                showCancelButton: true,
                                confirmButtonColor: '#3085d6',
                                cancelButtonColor: '#d33',
                                confirmButtonText: 'ใช่',
                                cancelButtonText: 'ไม่'
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    // ส่งข้อมูลไปหา controller ที่จะเพิ่มข้อมูล โดยใช้ Ajax หรือส่ง form ไปก็ได้
                                    window.location.href = AddUrl;
                                }
                            })
                        });
                    </script>

                    <script>
                        // เมื่อกดปุ่มลลบ แล้วถามว่าต้องการลบหรือไม่ แบบ SweetAlert2 
                        // ใช้ id
                        $(document).on('click', '#edit', function(e) {
                            e.preventDefault();
                            // deleteUrl 
                            var EditUrl = $(this).attr('href');
                            var id = $(this).attr('asset_id');

                            Swal.fire({
                                title: 'คุณแน่ใจหรือไม่?',
                                text: "คุณต้องการแก้ไขข้อมูลนี้หรือไม่!",
                                icon: 'warning',
                                showCancelButton: true,
                                confirmButtonColor: '#3085d6',
                                cancelButtonColor: '#d33',
                                confirmButtonText: 'ใช่',
                                cancelButtonText: 'ไม่',
                            }).then((result) => {
                                //    ถ้ากดใช่, ลบเลยให้ลบข้อมูลที่เลือก
                                if (result.isConfirmed) {
                                    window.location.href = EditUrl;
                                }
                            })
                        });
                    </script>

                    <script>
                        // เมื่อกดปุ่มลลบ แล้วถามว่าต้องการลบหรือไม่ แบบ SweetAlert2 
                        // ใช้ id
                        $(document).on('click', '#delete', function(e) {
                            e.preventDefault();
                            // deleteUrl 
                            var EditUrl = $(this).attr('href');
                            var id = $(this).attr('asset_id');

                            Swal.fire({
                                title: 'คุณแน่ใจหรือไม่?',
                                text: "คุณต้องการลบข้อมูลนี้หรือไม่!",
                                icon: 'warning',
                                showCancelButton: true,
                                confirmButtonColor: '#3085d6',
                                cancelButtonColor: '#d33',
                                confirmButtonText: 'ใช่, ไม่'
                            }).then((result) => {
                                //    ถ้ากดใช่, ลบเลยให้ลบข้อมูลที่เลือก
                                if (result.isConfirmed) {
                                    window.location.href = EditUrl;
                                }
                            })
                        });
                    </script>


</body>


</html>