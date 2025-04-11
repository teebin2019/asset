<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

    <!-- Sidebar Toggle (Topbar) -->
    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
        <i class="fa fa-bars"></i>
    </button>

    <!-- Topbar Search -->
   

    <!-- Topbar Navbar -->
    <ul class="navbar-nav ml-auto">

        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
        <li class="nav-item dropdown no-arrow d-sm-none">
            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
            </a>
            <!-- Dropdown - Messages -->
            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                <form class="form-inline mr-auto w-100 navbar-search">
                    <div class="input-group">
                        <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="button">
                                <i class="fas fa-search fa-sm"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </li>


        <!-- Nav Item - User Information -->
        <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php
                                                                            $session = session();
                                                                            echo  $session->get('username');
                                                                            if ($session->get('log_action') == 1) {
                                                                                // มีวงกลมสีเขียวแล้วเขียนว่าใช้งานได้
                                                                                echo '<br>';
                                                                                echo '<svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" fill="currentColor" class="bi bi-circle-fill text-success" viewBox="0 0 16 16">
                                                                                <circle cx="8" cy="8" r="8"/>
                                                                              </svg>';
                                                                                echo " " . 'online';
                                                                            } else {
                                                                                // มีวงกลมสีแดงแล้วเขียนว่าไม่ใช้งานได้
                                                                                echo '<svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" fill="currentColor" class="bi bi-circle-fill text-danger" viewBox="0 0 16 16">
                                                                                <circle cx="8" cy="8" r="8"/>
                                                                              </svg>';
                                                                                echo " " . 'Offline';
                                                                            }
                                                                            ?></span>
                <?php 
                if (isset($user)): ?>
                <img class="img-profile rounded-circle" src="<?= base_url('uploads/') . $user['image'] ?>">
                <?php else: ?>
                <img class="img-profile rounded-circle" src="<?= base_url('backoffice/img/undraw_profile_2.svg') ?>">
                <?php endif; ?>
            </a>
            <!-- Dropdown - User Information -->
            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="<?= site_url('/profile') ?>">
                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                    ประวัติส่วนตัว
                </a>
                <a class="dropdown-item" href="<?= site_url('/Setting') ?>">
                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                    การตั้งค่า
                </a>
                <a class="dropdown-item" href="<?= base_url('/log_view') ?>">
                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                    ประวัติการใช้งาน
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                    ออกจากระบบ
                </a>
            </div>
        </li>

    </ul>

</nav>