<?php $subadmin_id = $this->session->userdata('subadmin_id'); ?>
<div id="main-wrapper">
    <div class="container-fluid">
        <div class="row sp">
            <div class="col-12">
                <div class="card">
                    <div style="border: none;" class="card-body">
                        <div class="page-header">
                            <h4 class="page-title" style="font-size: 1.5rem">
                                <span class="page-title-icon text-white mr-2" style="background-color: #C8a2c8;">
                                    <i class="mdi mdi-home"></i>
                                </span>
                                Dashboard
                            </h4>
                        </div>
                        <div class="row pt-2">
                            <div class="col-md-4 stretch-card grid-margin">
                                <div class="card bg-gradient-info card-img-holder text-white">
                                    <a href="#">
                                        <div class="card-body" style="padding: 0%">
                                            <img src="<?= base_url('assets/images/circle.svg') ?>" class="card-img-absolute" alt="circle-image" />
                                            <h5 class="font-weight-normal mb-3 text-white">Total Sales Person</h5>
                                            <h4 style="color:snow;"><?= $this->Crud_model->fetch('sales_person', array('user_id' => $subadmin_id))->num_rows(); ?>+</h4>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-4 stretch-card grid-margin">
                                <div class="card bg-gradient-success card-img-holder text-white">
                                    <a href="#">
                                        <div class="card-body" style="padding: 0%">
                                            <img src="<?= base_url('assets/images/circle.svg') ?>" class="card-img-absolute" alt="circle-image" />
                                            <h5 class="font-weight-normal mb-3 text-white">Total Active Sales Person</h5>
                                            <h4 style="color:snow;"><?= $this->Crud_model->fetch('sales_person', array('user_id' => $subadmin_id, 'status' => 0))->num_rows(); ?>+</h4>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-4 stretch-card grid-margin">
                                <div class="card bg-gradient-danger card-img-holder text-white">
                                    <a href="#">
                                        <div class="card-body" style="padding: 0%">
                                            <img src="<?= base_url('assets/images/circle.svg') ?>" class="card-img-absolute" alt="circle-image" />
                                            <h5 class="font-weight-normal mb-3 text-white">Total Inactive Sales Person</h5>
                                            <h4 style="color:snow;"><?= $this->Crud_model->fetch('sales_person', array('user_id' => $subadmin_id, 'status' => 1))->num_rows(); ?>+</h4>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>