<!-- <div id="main-wrapper"> -->
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

                        <div class="page-header">
                            <h4 class="page-title" style="font-size: 1.0rem">
                                Sub Admin
                            </h4>
                        </div>
                        <div class="row">
                            <div class="col-md-4 stretch-card grid-margin">
                                <div class="card bg-gradient-info card-img-holder text-white">
                                    <div class="card-body" style="padding: 0%">
                                        <img src="https://panel.speakify.co.in/assets/images/circle.svg" class="card-img-absolute" alt="circle-image" />
                                        <h5 class="font-weight-normal text-white">All</h5>
                                        <h4 style='color:snow;'>+<?= $this->Crud_model->fetch('users')->num_rows(); ?></h4>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 stretch-card grid-margin">
                                <div class="card bg-gradient-success card-img-holder text-white">
                                    <div class="card-body" style="padding: 0%">
                                        <img src="https://panel.speakify.co.in/assets/images/circle.svg" class="card-img-absolute" alt="circle-image" />
                                        <h5 class="font-weight-normal text-white">Active</h5>
                                        <h4 style='color:snow;'>+<?= $this->Crud_model->fetch('users', array('status' => 0))->num_rows(); ?></h4>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 stretch-card grid-margin">
                                <div class="card bg-gradient-danger card-img-holder text-white">
                                    <div class="card-body" style="padding: 0%">
                                        <img src="https://panel.speakify.co.in/assets/images/circle.svg" class="card-img-absolute" alt="circle-image" />
                                        <h5 class="font-weight-normal text-white">Inactive</h5>
                                        <h4 style='color:snow;'>+<?= $this->Crud_model->fetch('users', array('status' => 1))->num_rows(); ?></h4>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="page-header">
                            <h4 class="page-title" style="font-size: 1.0rem">
                                Sales Person
                            </h4>
                        </div>
                        <div class="row">
                            <div class="col-md-4 stretch-card grid-margin">
                                <div class="card bg-gradient-info card-img-holder text-white">
                                    <div class="card-body" style="padding: 0%">
                                        <img src="https://panel.speakify.co.in/assets/images/circle.svg" class="card-img-absolute" alt="circle-image" />
                                        <h5 class="font-weight-normal text-white">All</h5>
                                        <h4 style='color:snow;'>+<?= $this->Crud_model->fetch('sales_person')->num_rows(); ?></h4>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 stretch-card grid-margin">
                                <div class="card bg-gradient-success card-img-holder text-white">
                                    <div class="card-body" style="padding: 0%">
                                        <img src="https://panel.speakify.co.in/assets/images/circle.svg" class="card-img-absolute" alt="circle-image" />
                                        <h5 class="font-weight-normal text-white">Active</h5>
                                        <h4 style='color:snow;'>+<?= $this->Crud_model->fetch('sales_person', array('status' => 0))->num_rows(); ?></h4>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 stretch-card grid-margin">
                                <div class="card bg-gradient-danger card-img-holder text-white">
                                    <div class="card-body" style="padding: 0%">
                                        <img src="https://panel.speakify.co.in/assets/images/circle.svg" class="card-img-absolute" alt="circle-image" />
                                        <h5 class="font-weight-normal text-white">Inactive</h5>
                                        <h4 style='color:snow;'>+<?= $this->Crud_model->fetch('sales_person', array('status' => 1))->num_rows(); ?></h4>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="page-header">
                            <h4 class="page-title" style="font-size: 1.0rem">
                                Designation
                            </h4>
                        </div>

                        <div class="row">
                            <div class="col-md-4 stretch-card grid-margin">
                                <div class="card bg-gradient-info card-img-holder text-white">
                                    <div class="card-body" style="padding: 0%">
                                        <img src="https://panel.speakify.co.in/assets/images/circle.svg" class="card-img-absolute" alt="circle-image" />
                                        <h5 class="font-weight-normal text-white">All</h5>
                                        <h4 style='color:snow;'>+<?= $this->Crud_model->fetch('designation')->num_rows(); ?></h4>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 stretch-card grid-margin">
                                <div class="card bg-gradient-success card-img-holder text-white">
                                    <div class="card-body" style="padding: 0%">
                                        <img src="https://panel.speakify.co.in/assets/images/circle.svg" class="card-img-absolute" alt="circle-image" />
                                        <h5 class="font-weight-normal text-white">Active</h5>
                                        <h4 style='color:snow;'>+<?= $this->Crud_model->fetch('designation', array('status' => 0))->num_rows(); ?></h4>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 stretch-card grid-margin">
                                <div class="card bg-gradient-danger card-img-holder text-white">
                                    <div class="card-body" style="padding: 0%">
                                        <img src="https://panel.speakify.co.in/assets/images/circle.svg" class="card-img-absolute" alt="circle-image" />
                                        <h5 class="font-weight-normal text-white">Inactive</h5>
                                        <h4 style='color:snow;'>+<?= $this->Crud_model->fetch('designation', array('status' => 1))->num_rows(); ?></h4>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
<!-- </div> -->