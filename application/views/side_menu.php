    <div class="container-scroller">
        <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
            <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center pt-1">
                <a class="navbar-brand brand-logo pr-5 pt-5" href=""><img style="height: 100%; width:75%; padding-bottom: 50px;" src="<?php echo base_url('assets/images/demo.png'); ?>" alt="logo" /></a>
                <a class="navbar-brand brand-logo-mini" href=""><img style="height: 100%; width:95%; padding: 0px;" src="<?php echo base_url('assets/images/demo.png'); ?>" alt="logo" /></a>
            </div>
            <div class="navbar-menu-wrapper d-flex align-items-stretch">
                <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
                    <span class="mdi mdi-menu"></span>
                </button>
                <ul class="navbar-nav navbar-nav-right">
                    <li class="nav-item nav-profile dropdown">
                        <a class="nav-link dropdown-toggle" id="profileDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
                            <div class="nav-profile-img">
                                <img src="<?php echo base_url('assets/images/admin_logo1.png'); ?>" alt="image">
                                <span class="availability-status online"></span>
                            </div>
                            <div class="nav-profile-text">
                                <p class="mb-1 text-black">Admin</p>
                            </div>
                        </a>
                        <div class="dropdown-menu navbar-dropdown" aria-labelledby="profileDropdown">
                            <a class="dropdown-item" onclick="ajax_modal('modal/modal_user_profile', '', this)">
                                <i class="mdi mdi-account mr-2 text-success"></i> Profile </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="<?php echo base_url(); ?>admin/logout">
                                <i class="mdi mdi-power mr-2 text-danger"></i>Logout</a>
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
            <nav class="sidebar sidebar-offcanvas bg-light" id="sidebar">
                <ul class="nav">
                    <li class="nav-item"><br>
                        <a class="nav-link" href="<?php echo base_url('admin/dashboard'); ?>">
                            <span class="menu-title">Dashboard</span>
                            <i class="mdi mdi-home menu-icon"></i>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="collapse" href="#general-pages" aria-expanded="false" aria-controls="general-pages">
                            <span class="menu-title">Sub Admin</span>
                            <i class="menu-arrow"></i>
                            <i class="mdi mdi-calendar-text menu-icon"></i>
                        </a>
                        <div class="collapse" id="general-pages">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item"> <a class="nav-link" href="<?php echo base_url('admin/users'); ?>">All</a></li>
                                <li class="nav-item"> <a class="nav-link" href="<?php echo base_url('admin/active_users'); ?>">Active</a></li>
                                <li class="nav-item"> <a class="nav-link" href="<?php echo base_url('admin/inactive_users'); ?>">Inactive</a></li>

                            </ul>
                        </div>
                    </li>


                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="collapse" href="#general-pagess" aria-expanded="false" aria-controls="general-pages">
                            <span class="menu-title">Designation</span>
                            <i class="menu-arrow"></i>
                            <i class="mdi mdi-account menu-icon"></i>
                        </a>
                        <div class="collapse" id="general-pagess">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item"> <a class="nav-link" href="<?php echo base_url('admin/designation'); ?>">All</a></li>
                                <li class="nav-item"> <a class="nav-link" href="<?php echo base_url('admin/active_designation'); ?>">Active</a></li>
                                <li class="nav-item"> <a class="nav-link" href="<?php echo base_url('admin/inactive_designation'); ?>">Inactive</a></li>

                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="collapse" href="#general-pagesss" aria-expanded="false" aria-controls="general-pages">
                            <span class="menu-title">Sale Person</span>
                            <i class="menu-arrow"></i>
                            <i class="mdi mdi-account menu-icon"></i>
                        </a>
                        <div class="collapse" id="general-pagesss">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item"> <a class="nav-link" href="<?php echo base_url('admin/sale_person'); ?>">All</a></li>
                                <li class="nav-item"> <a class="nav-link" href="<?php echo base_url('admin/active_sale_person'); ?>">Active</a></li>
                                <li class="nav-item"> <a class="nav-link" href="<?php echo base_url('admin/inactive_sale_person'); ?>">Inactive</a></li>

                            </ul>
                        </div>
                    </li>
                </ul>
            </nav>