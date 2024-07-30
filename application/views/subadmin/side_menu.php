<div class="container-scroller">
    <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
        <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center pt-1">
            <a class="navbar-brand brand-logo pr-5 pt-5" href=""><img style="height: 100%; width:75%;" src="<?php echo base_url('assets/images/demo.png'); ?>" alt="logo" /></a>
            <a class="navbar-brand brand-logo-mini" href=""><img style="height: 100%; width:80%;" src="<?php echo base_url('assets/images/demo.png'); ?>" alt="logo" /></a>
        </div>
        <div class="navbar-menu-wrapper d-flex align-items-stretch">
            <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
                <span class="mdi mdi-menu"></span>
            </button>
            <ul class="navbar-nav navbar-nav-right">
                <li class="nav-item nav-profile dropdown">
                    <?php $subadmin_id = $this->session->userdata('subadmin_id');
                    $user_id = $this->input->get('user_id');
                    $get_table = $this->Crud_model->fetch('users', array('id' => $subadmin_id));
                    ?>

                    <a class="nav-link dropdown-toggle" id="profileDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
                        <div class="nav-profile-img">
                            <img src="<?= base_url($get_table->row('image')) ?>" alt="image">
                            <span class="availability-status online"></span>
                        </div>
                        <div class="nav-profile-text">
                            <p class="mb-1 text-black"><?= $get_table->row('compony_name') ?></p>
                        </div>
                    </a>
                    <div class="dropdown-menu navbar-dropdown" aria-labelledby="profilesDropdown">
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="<?php echo base_url(); ?>subadmin/subadmin_logout"><i class="mdi mdi-power mr-2 text-danger"></i> Logout </a>
                    </div>
                </li>
                <li class="nav-item d-none d-lg-block full-screen-link">
                    <a class="nav-link">
                        <i class="mdi mdi-fullscreen" id="fullscreen-button"></i>
                    </a>
                </li>
            </ul>
            <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
                <span class="mdi mdi-menu"></span>
            </button>
        </div>
    </nav>
    <div class="container-fluid page-body-wrapper">
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
            <ul class="nav">
                <li class="nav-item"><br>
                    <a class="nav-link" href="<?php echo base_url('subadmin/dashboard'); ?>">
                        <span class="menu-title">Dashboard</span>
                        <i class="mdi mdi-home menu-icon"></i>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="<?php echo base_url('subadmin/my_sales_person'); ?>">
                        <span class="menu-title">Sales Person</span>
                        <i class="mdi mdi-bank menu-icon"></i>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="collapse" href="#general-pagess" aria-expanded="false" aria-controls="general-pages">
                        <span class="menu-title">Report</span>
                        <i class="menu-arrow"></i>
                        <i class="mdi mdi-calendar-text menu-icon"></i>
                    </a>
                    <div class="collapse" id="general-pagess">
                        <ul class="nav flex-column sub-menu">
                            <li class="nav-item"> <a class="nav-link" href="<?= base_url('subadmin/tracklocation'); ?>">Track Location</a></li>
                        </ul>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="<?php echo base_url('subadmin/profile'); ?>">
                        <span class="menu-title">Profile</span>
                        <i class="mdi mdi-bank menu-icon"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo base_url('subadmin/shop_list'); ?>">
                        <span class="menu-title">Shop List</span>
                        <i class="mdi mdi-account menu-icon"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo base_url('subadmin/order_list'); ?>">
                        <span class="menu-title">Order List</span>
                        <i class="mdi mdi-account menu-icon"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo base_url('subadmin/comptiter_List'); ?>">
                        <span class="menu-title">Comptiter Box</span>
                        <i class="mdi mdi-account menu-icon"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo base_url('subadmin/message_box'); ?>">
                        <span class="menu-title">Message Box</span>
                        <i class="mdi mdi-account menu-icon"></i>
                    </a>
                </li>
            </ul>
        </nav>