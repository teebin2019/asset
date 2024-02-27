<?php $session = session(); ?>

<header class="p-3" style="background-color:#890a0a;">
    <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">

        <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
            <li><a href="<?= site_url('/') ?>" class="nav-link px-2 text-white">หน้าหลัก</a></li>
            <li><a href="<?= site_url('/Dashboard') ?>" class="nav-link px-2 text-white">แผงควบคุม</a></li>
            <li><a href="<?= site_url('/search') ?>" class="nav-link px-2 text-white">ค้นหาข้อมูล</a></li>
            <li><a href="<?= site_url('/guide') ?>" class="nav-link px-2 text-white">คู่มือของระบบ</a></li>
        </ul>



        <div class="text-end">
            <?php if (empty($session->get('username'))) : ?>
                <a href="<?= site_url('/login') ?>"><button type="button" class="btn btn-light me-2">Login</button></a>
                <a href="<?= site_url('/logup') ?>"> <button type="button" class="btn btn-warning">Sign-up</button></a>
            <?php else : ?>
                <div class="btn-group">
                    <button type="button" class="btn btn-danger dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                        <?php echo $session->get('username') ?>
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="<?= site_url('/profile') ?>">ประวัติส่วนตัว</a></li>
                        <li><a class="dropdown-item" href="#">การตั้งค่า</a></li>
                        <li><a class="dropdown-item" href="<?= base_url('/log_view') ?>">ประวัติการใช้งาน</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="<?= site_url('/logout') ?>">ออกจากระบบ</a></li>
                    </ul>
                </div>

            <?php endif; ?>
        </div>
    </div>
</header>