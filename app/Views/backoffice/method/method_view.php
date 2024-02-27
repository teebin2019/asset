

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>วิธีการที่ได้มา</title>

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
                    <!--แจ้งเตื่อนแก้ไขข้อมูลสำเร็จ -->
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
                    <!--End แจ้งเตือนแก้ไขข้อมูลสำเร็จ -->


                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">วิธีการที่ได้มา</h1>
                        <a href="<?= site_url('Method_add') ?>" class="d-none d-sm-inline-block btn btn-sm btn-info shadow-sm" id="method_add"><i class="fas fa-download fa-sm text-white-50"></i> เพิ่มข้อมูล</a>
                    </div>
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">ข้อมูลวิธีการที่ได้มาทั้งหมด</h6>
                        </div>
                        <div class="card-body">
                            <table id="myTable" class="table table-bordered border-dark" width="100%">
                                <thead class="table table-dark">
                                    <tr>
                                        <th>ลำดับ</th>
                                        <th>วิธีการ</th>
                                        <th>action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($method as $as) : ?>
                                        <tr>
                                            <td width="23%"><?= $as['method_id'] ?></td>
                                            <td><?= $as['acquisition_method_name'] ?></td>
                                            <td><a href="<?= site_url('Method_edit/' . $as['method_id']) ?>" class="btn btn-primary btn-sm" id="edit_method">แก้ไข</a> <a href="<?= site_url('Method_delect/' . $as['method_id']) ?>" class="btn btn-danger btn-sm" id="method_delect">ลบ</a></td>
                                        </tr>
                                    <?php endforeach ?>

                                </tbody>

                            </table>
                            <a href="<?= base_url('Dashboard') ?>">ย้อนกลับ</a>

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
                    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


                    <script>
                        // เมื่อกดปุ่มเพิ่ม แบบ SweetAlert2
                        $('#method_add').click(function(e) {
                            // deleteUrl 
                            var AddUrl = $(this).attr('href');
                            var id = $(this).attr('method_id');
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
                        // เมื่อกดปุ่มแก้ไข แบบ SweetAlert2
                        $('#edit_method').click(function(e) {
                            // deleteUrl 
                            var AddUrl = $(this).attr('href');
                            var id = $(this).attr('method_id');
                            e.preventDefault();
                            Swal.fire({
                                title: 'คุณต้องการแก้ไขข้อมูลใช่หรือไม่?',
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
                        $(document).on('click', '#method_delect', function(e) {
                            e.preventDefault();
                            // deleteUrl 
                            var deleteUrl = $(this).attr('href');
                            var id = $(this).attr('method_id');

                            Swal.fire({
                                title: 'คุณแน่ใจหรือไม่?',
                                text: "คุณต้องการลบข้อมูลนี้หรือไม่!",
                                icon: 'warning',
                                showCancelButton: true,
                                confirmButtonColor: '#3085d6',
                                cancelButtonColor: '#d33',
                                confirmButtonText: 'ใช่, ลบเลย!'
                            }).then((result) => {
                                //    ถ้ากดใช่, ลบเลยให้ลบข้อมูลที่เลือก
                                if (result.isConfirmed) {
                                    window.location.href = deleteUrl;
                                }
                            })
                        });
                    </script>

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

</body>


</html>

