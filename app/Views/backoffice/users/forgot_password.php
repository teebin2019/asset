<!DOCTYPE html>
<html lang="en">

<head>
    <title>ลืมรหัสผ่าน</title>
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
                    <img src="https://static8.depositphotos.com/1024768/833/v/600/depositphotos_8338112-stock-illustration-confused-boss.jpg" alt="IMG" width="80%">
                </div>

                <form class="login100-form validate-form" action="<?= base_url('sendresetlink') ?>" method="post">
                    <span class="login100-form-title">
                        ลืมรหัสผ่าน
                    </span>
                    <?php if (session()->getFlashdata('error')) : ?>
                        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                        <script>
                            Swal.fire({
                                position: "top-center",
                                icon: "error",
                                title: "<?= session()->getFlashdata('error') ?>",
                                showConfirmButton: false,
                                timer: 1500
                            });
                        </script>
                    <?php endif; ?>

                    <div class="wrap-input100 validate-input" data-validate="Valid email is required: ex@abc.xyz">
                        <input class="input100" type="email" name="email" placeholder="Email">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-envelope" aria-hidden="true"></i>
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