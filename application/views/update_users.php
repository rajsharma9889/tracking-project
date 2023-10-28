<div class="card" style="background-color: #e2edf159;">
    <!-- <div class="card-header"> -->
    <div class="row">
        <div class="col-12">
            <h4>Update Users</h4>
        </div>
    </div>
    <!-- </div> -->
    <div class="page-body">
        <div class="pt-4">
            <form class="form-horizontal form-material" method="POST" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-lg-4 col-xlg-3 col-md-5">
                        <div class="card">
                            <div class="card-body">
                                <center class="mt-3">
                                    <img src="<?= base_url($update_users->image) ?>" class="" style="width: 99%">
                                </center>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-8 col-xlg-9 col-md-7">
                        <div class="card">
                            <div class="card-body">
                                <form class="form-horizontal form-material" method="POST" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label class="col-md-12">Name. <span class="star">★</span></label>
                                        <div class="col-md-12">
                                            <input type="text" name="name" value="<?= $update_users->name; ?>" class="form-control" placeholder="Enter the Users Name" style="padding: 12px 15px;" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="example-email" class="col-md-12">Email. <span class="star">★</span></label>
                                        <div class="col-md-12">
                                            <input type="email" value="<?= $update_users->email ?>" name="email" placeholder="Enter the Users Email" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12">Mobile. <span class="star">★</span></label>
                                        <div class="col-md-12">
                                            <input type="number" class="form-control" value="<?= $update_users->mobile ?>" name="mobile" placeholder="Enter the User Mobile" style="padding: 12px 15px;" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12">Compony Name. <span class="star">★</span></label>
                                        <div class="col-md-12">
                                            <input type="text" name="compony_name" value="<?= $update_users->compony_name; ?>" class="form-control" placeholder="Please Enter Your Compony Name" style="padding: 12px 15px;" required>
                                        </div>
                                    </div>

                                    <div class="form-group ">
                                        <label class="col-md-12">Image. <span class="star">★</span></label>
                                        <div class="col-md-12">
                                            <input type="file" name="image" class="form-control" style="padding: 11px 22px; margin: 11px 0;" autocomplete="off" required value="<?= $update_users->image; ?>" />
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="row d-flex justify-content-end">
                                            <div class="form-group col-4 fonbtn">
                                                <a href="<?= base_url('admin/users'); ?>" class="form-control btn btn-danger" style="padding: 12px;">Cancel</a>
                                                <i class="fa fa-ban fa-lg"></i>
                                            </div>
                                            <div class="form-group col-4 fonbtn">
                                                <input type="submit" class="form-control btn btn-lg btn-success" style="padding: 4px;" name="submit">
                                                <i class="fa fa-check-circle fa-lg"></i>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
            </form>
        </div>
    </div>
</div>