<!DOCTYPE html>
<html lang="en">

<head>
    <title>เปลี่ยนรหัสผ่าน</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="<?= base_url('login/image/png') ?>" href="<?= base_url('login/images/icons/favicon.ico') ?>" />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?= base_url('login/vendor/bootstrap/css/bootstrap.min.css') ?>">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?= base_url('login/fonts/font-awesome-4.7.0/css/font-awesome.min.css') ?>">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?= base_url('login/vendor/animate/animate.css') ?>">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?= base_url('login/vendor/css-hamburgers/hamburgers.min.css') ?>">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?= base_url('login/vendor/select2/select2.min.css') ?>">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?= base_url('login/css/util.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?= base_url('login/css/main.css') ?>">
    <!--===============================================================================================-->
</head>

<body>

    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                <div class="login100-pic js-tilt" data-tilt>
                    <img src="https://st3.depositphotos.com/10376142/34393/v/600/depositphotos_343938678-stock-illustration-orange-refresh-icon-isolated-white.jpg" alt="IMG">
                </div>

                <form class="login100-form validate-form" action="<?= base_url('reset-password') ?>" method="post">
                    <span class="login100-form-title">
                        เปลี่ยนรหัสผ่าน
                    </span>
                    <?php if (session()->getFlashdata('success')) : ?>
                        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                        <script>
                            Swal.fire({
                                position: "top-end",
                                icon: "success",
                                title: "<?= session()->getFlashdata('success') ?>",
                                showConfirmButton: false,
                            });
                        </script>
                    <?php endif; ?>
                    <input type="hidden" name="token" value="<?php echo $token; ?>">
                    <div class="wrap-input100 validate-input">
                        <input class="input100" type="password" name="password" placeholder="New Password">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-lock" aria-hidden="true"></i>
                        </span>
                    </div>
                    <div class="wrap-input100 validate-input">
                        <input class="input100" type="password" name="confirm_password" placeholder="Confirm Password">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-lock" aria-hidden="true"></i>
                        </span>
                    </div>
                    <div class="container-login100-form-btn">
                        <button class="login100-form-btn">
                            ยืนยัน
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>




    <!--===============================================================================================-->
    <script src="<?= base_url('login/vendor/jquery/jquery-3.2.1.min.js') ?>"></script>
    <!--===============================================================================================-->
    <script src="<?= base_url('login/vendor/bootstrap/js/popper.js') ?>"></script>
    <script src="<?= base_url('login/vendor/bootstrap/js/bootstrap.min.js') ?>"></script>
    <!--===============================================================================================-->
    <script src="<?= base_url('login/vendor/select2/select2.min.js') ?>"></script>
    <!--===============================================================================================-->
    <script src="<?= base_url('login/vendor/tilt/tilt.jquery.min.js') ?>"></script>
    <script>
        $('.js-tilt').tilt({
            scale: 1.1
        })
    </script>
    <!--===============================================================================================-->
    <script src="<?= base_url('login/js/main.js') ?>"></script>

</body>

</html>