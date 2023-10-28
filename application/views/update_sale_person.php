<div class="card" style="background-color: #e2edf159;">
    <!-- <div class="card-header"> -->
    <div class="row">
        <div class="col-12">
            <h4>Update Sales Person</h4>
        </div>
    </div>
    <!-- </div> -->
    <div class="page-body">
        <div class="pt-4">
            <div class="row">
                <div class="col-lg-4 col-xlg-3 col-md-5">
                    <form class="form-horizontal form-material" method="post" action="<?= base_url('admin/update_sale_person/' . $sales_person_update->id); ?>" enctype="multipart/form-data">
                        <div class="card">
                            <div class="card-body">
                                <center class="mt-3">
                                    <img src="<?= base_url($sales_person_update->image) ?>" class="" style="width: 99%">
                                </center>
                            </div>

                        </div>

                    </form>
                </div>

                <div class="col-lg-8 col-xlg-9 col-md-7">
                    <form class="form-horizontal form-material" method="post" action="<?= base_url('admin/update_sale_person/' . $sales_person_update->id); ?>" enctype="multipart/form-data">
                        <div class="card">
                            <!-- <div class="card-body"> -->
                            <form class="form-horizontal form-material" method="POST" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label class="col-md-12">Name. <span class="star">★</span></label>
                                    <div class="col-md-12">
                                        <input type="text" value="<?= $sales_person_update->name; ?>" name="name" class="form-control mb-4" placeholder="Please Enter Driver Name" style="padding: 12px 15px; margin-top: 3px" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="example-email" class="col-md-12">Email. <span class="star">★</span></label>
                                    <div class="col-md-12">
                                        <input type="email" name="email" value="<?= $sales_person_update->email; ?>" class="form-control mb-4" placeholder="Please Enter Driver Email" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12">Mobile. <span class="star">★</span></label>
                                    <div class="col-md-12" style="margin-top: -15px">
                                        <input type="number" name="mobile" value="<?= $sales_person_update->mobile; ?>" class="form-control my-3" placeholder="Please Enter Driver Mobile" style="padding: 12px 15px" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12">Sub Admin. <span class="star">★</span></label>
                                    <div class="col-md-12" margin-top: -15px>
                                        <select name="user_id" class="form-control" id="user_id" style="color:#777777; outline: 1px solid #ced4da" required>
                                            <option value="">---Select Sub Admin---</option>
                                            <?php
                                            $select_sub = "";
                                            foreach ($user as $row) :
                                                if ($sales_person_update->user_id === $row->id) {
                                                    $select_sub = "selected";
                                                } else {
                                                    $select_sub = "";
                                                }
                                            ?>
                                                <option <?= $select_sub ?> value="<?= $row->id; ?>"><?= $row->name; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-12">Designation. <span class="star">★</span></label>
                                    <div class="col-md-12" style="margin-top: -10px">
                                        <select name="designation_id" class="form-control" id="designation_id" style="color:#777777; outline: 1px solid #ced4da; margin-top: 15px " required>
                                            <option value="">---Select Job Type---</option>
                                            <?php
                                            $select_des = "";
                                            foreach ($designation as $row) :
                                                if ($sales_person_update->designation_id === $row->id) {
                                                    $select_des = "selected";
                                                } else {
                                                    $select_des = "";
                                                }
                                            ?>
                                                <option <?= $select_des ?> value="<?= $row->id; ?>"><?= $row->designation; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group col-12">
                                    <label class="lab">Image. <span class="star">★</span></label>
                                    <input type="file" name="image" class="form-control" style="padding: 11px 22px; margin: 2px 0;" autocomplete="off" required value="<?= $sales_person_update->image; ?>" />
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
                            <!-- </div> -->
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>