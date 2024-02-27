<!DOCTYPE html>
<html lang="en">

<head>
    <title>สมัครสมาชิก</title>
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
                    <img src="<?= base_url('login/images/img-01.png') ?>" alt="IMG">
                </div>

                <form class="login100-form validate-form" action="<?= base_url('Logup/store') ?>" method="post">
                    <span class="login100-form-title">
                        สมัครสมาชิก
                    </span>
                    <?php if (isset($validation)) : ?>
                        <div class="alert alert-warning">
                            <?= $validation->listErrors() ?>
                        </div>
                    <?php endif; ?>

                    <div class="wrap-input100 validate-input" data-validate="กรุณากรอกข้อมูล">
                        <input class="input100" type="text" name="username" placeholder="Username">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-user" aria-hidden="true"></i>
                        </span>
                    </div>
                    <div class="wrap-input100 validate-input" data-validate="กรุณากรอกอีเมลล์">
                        <input class="input100" type="email" name="email" placeholder="Email">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-envelope" aria-hidden="true"></i>
                        </span>
                    </div>


                    <div class="wrap-input100 validate-input" data-validate="กรุณากรอกรหัสผ่าน">
                        <input class="input100" type="password" name="password" placeholder="Password" name="">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-lock" aria-hidden="true"></i>
                        </span>
                    </div>
                    <div class="wrap-input100 validate-input" data-validate="กรุณากรอกรหัสผ่าน">
                        <input class="input100" type="password" name="confirmpassword" placeholder="confirmpassword" name="">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-lock" aria-hidden="true"></i>
                        </span>
                    </div>

                    <div class="container-login100-form-btn">
                        <button class="login100-form-btn" id="summit">
                            Logup
                        </button>
                    </div>

                    <div class="text-center p-t-20">
                        <a class="txt2" href="<?= site_url('/Dashboard') ?>" id="login">
                            เข้าสู่ระบบ
                            <i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
                        </a>
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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


</body>

</html>