<?php $subadmin_id = $this->session->userdata('subadmin_id');
$user_id = $this->input->get('user_id');


$get_table = $this->Crud_model->fetch('users', array('id' => $subadmin_id));
?>
<div class="page-body">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-4 col-xlg-3 col-md-5">
                <div class="card">
                    <div class="card-body">
                        <center class="mt-3">
                            <img src="<?= base_url($get_table->row('image')) ?>" style="width: 99%">
                        </center>
                    </div>
                    <!-- <div class="card-body">
                        <small class="text-muted">Companey Name</small>
                        <h6><?= $get_table->row('compony_name') ?></h6>
                    </div> -->
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
                            <!-- <div class="form-group">
                                <label class="col-md-12">Password</label>
                                <div class="col-md-12">
                                    <input type="password" name="password" class="form-control" autocomplete="off" placeholder="*************">
                                </div>
                            </div>-->
                            <div class="form-group">
                                <label class="col-md-12">Companey Name</label>
                                <div class="col-md-12">
                                    <input type="text" placeholder="companey name" class="form-control px-3" value="<?= $get_table->row('compony_name') ?>" readonly>
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