<h5 class="text-center pt-4">Admin Profile</h5>
<center class="mt-3"> <img src="<?php echo base_url('assets/images/admin_logo1.png'); ?>" class="rounded-circle" width="140" />
    <hr style="height: 0px">
    <h6 class="mt-1">Admin</h6>
</center>
<form class="form-horizontal form-material" action="<?= base_url('modal/modal_user_profile'); ?>" method="POST">
    <?php $admin_data = $this->Crud_model->fetch("admin_login")->result();
    foreach ($admin_data as $row) : ?>
        <div class="form-group">
            <label for="example-email" class="col-md-12">Email</label>
            <div class="col-md-12">
                <input type="email" placeholder="Enter Admin Email" value='<?= $row->email; ?>' class="form-control form-control-line" name="email" id="example-email">
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-12">Password</label>
            <div class="col-md-12">
                <input type="password" name="password" placeholder="***********" class="form-control form-control-line" autocomplete="off" />
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-12 d-flex justify-content-end">
                <button class="btn btn-success" type="submit" name="submit">Update Profile</button>
            </div>
        </div>
    <?php endforeach; ?>
</form>