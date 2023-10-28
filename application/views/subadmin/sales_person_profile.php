<?php
$user_id = $this->input->get('user_id');

$subadmin_id = $this->session->userdata('subadmin_id');

$get_subadmin = $this->Crud_model->fetch('users', array('id' => $subadmin_id));

$get_table = $this->Crud_model->fetch('sales_person', array('id' => $user_id));

$get_dep = $this->Crud_model->fetch('designation', array('id' => $get_table->row('designation_id')));

?>
<div class="page-body">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-4 col-xlg-3 col-md-5">
                <div class="card">
                    <div class="card-body">
                        <center class="mt-3">
                            <img src="<?= base_url($get_table->row('image')) ?>" class="rounded-circle" style="width: 99%">
                        </center>
                    </div>

                </div>
            </div>
            <div class="col-lg-8 col-xlg-9 col-md-7">
                <div class="card">
                    <div class="card-body">
                        <form class="form-horizontal form-material" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <label class="col-md-12">Name</label>
                                <div class="col-md-12">
                                    <input type="text" placeholder="Johnathan Doe" class="form-control px-3" value="<?= $get_table->row('name') ?>" readonly>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="example-email" class="col-md-12">Email</label>
                                <div class="col-md-12">
                                    <input type="email" placeholder="johnathan@admin.com" value="<?= $get_table->row('email') ?>" class="form-control" readonly>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12">Mobile</label>
                                <div class="col-md-12">
                                    <input type="mobile" placeholder="123 456 7890" value="<?= $get_table->row('mobile') ?>" class="form-control" readonly>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12">Designation</label>
                                <div class="col-md-12">
                                    <input type="text" name="designation" class="form-control" autocomplete="off" value="<?= $get_dep->row('designation') ?>" style="padding: 12px 14px" readonly>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12">Companey Name</label>
                                <div class="col-md-12">
                                    <input type="text" placeholder="companey name" class="form-control px-3" value="<?= $get_subadmin->row('compony_name') ?>" style="padding: 12px 14px" readonly>
                                </div>
                            </div>
                            <!-- <div class="form-group">
                                <label class="col-md-12">Profile Image</label>
                                <div class="col-md-12">
                                    <input type="file" class="form-control" value="<?= $get_table->row('compony_name') ?>" name="profile_image">
                                </div>
                            </div>  -->
                            <!-- <div class="form-group">
                                <div class="col-sm-12">
                                    <button class="btn btn-success float-right" type="submit" name="submit">Update Profile</button>
                                </div>
                            </div> -->
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>