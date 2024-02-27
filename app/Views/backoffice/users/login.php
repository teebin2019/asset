<!DOCTYPE html>
<html lang="en">

<head>
	<title>เข้าสู่ระบบ</title>
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

				<form class="login100-form validate-form" action="<?= base_url('Login/loginAuth') ?>" method="post">
					<span class="login100-form-title">
						เข้าสู่ระบบ
					</span>
					<?php if (session()->getFlashdata('success')) : ?>
						<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
						<script>
							Swal.fire({
								position: "top-end",
								icon: "success",
								title: "<?= session()->getFlashdata('success') ?>",
								showConfirmButton: false,
								timer: 1500
							});
						</script>
					<?php endif; ?>
					<?php if (session()->getFlashdata('msg')) : ?>
						<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
						<script>
							Swal.fire({
								position: "top-end",
								icon: "error",
								title: "<?= session()->getFlashdata('msg') ?>",
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

					<div class="wrap-input100 validate-input" data-validate="Password is required">
						<input class="input100" type="password" name="password" placeholder="Password" name="">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>

					<div class="container-login100-form-btn">
						<button class="login100-form-btn">
							Login
						</button>
					</div>

					<div class="text-center p-t-12">
						<span class="txt1">
							ลืม
						</span>
						<a class="txt2" href="<?= base_url('/forget_password') ?>">
							รหัสผ่าน
						</a>
					</div>

					<div class="text-center p-t-20">
						<a class="txt2" href="<?= base_url('/logup') ?>">
							สร้างบัญชีของคุณ
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

</body>

</html>