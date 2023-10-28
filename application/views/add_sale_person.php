<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-12">
                <h4>Add Sale Person</h4>
            </div>
        </div>
    </div>
    <div>
        <form id="form" method="post" enctype="multipart/form-data">
            <div class="row pt-2">
                <div class="form-group col-6 fontuser">
                    <label class="lab">Name <span class="star">★</span></label>
                    <input type="text" name="name" class="form-control form-control-lg mb-4" placeholder="  Please Enter Sales Person Name" autocomplete="off" required style=" padding: 12px 29px;" />
                    <i class="fa fa-user fa-lg" style="padding-top: 13px;"></i>
                </div>
                <div class="form-group col-6 fontuser">
                    <label class="lab">Mobile No. <span class="star">★</span></label>
                    <input type="number" name="mobile" class="form-control form-control-lg" placeholder="Please Enter Sales Person Mobile" style="display: inline-block; padding: 12px 40px;" autocomplete="off" required />
                    <i class="fa fa-mobile-android-alt fa-lg" style="left: 12px; top: 61px"></i>
                </div>
            </div>

            <div class="row">
                <div class="form-group col-6 fontuser">
                    <label class="lab">Email. <span class="star">★</span></label>
                    <input type="email" name="email" class="form-control form-control-lg mb-4" placeholder="  Please Enter Sales Person Email" style="margin-top: 10px;" autocomplete="off" required />
                    <i class="fa fa-id-card fa-lg" style="top: 64px"></i>
                </div>
                <div class="form-group col-6 fontuser">
                    <label class="lab">Password. <span class="star">★</span></label>
                    <input type="password" name="password" class="form-control form-control-lg" placeholder="Please Enter Sales Person Password" style="display: inline-block; padding: 12px 40px; margin-top: 10px;" autocomplete="off" required />
                    <i class="fa fa-file-alt fa-lg" style="left: 12px; top: 64px"></i>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-6 fontuser">
                    <label class="lab">Sub Admin. <span class="star">★</span></label>
                    <select name="user_id" class="form-control" id="user_id" style="color:#777777; outline: 1px solid #ced4da; margin-top: 10px" required>
                        <option value="">--Select Job Type--</option>
                        <?php foreach ($user as $row) : ?>
                            <option value="<?= $row->id; ?>"><?= $row->name; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group col-6 fontuser">
                    <label class="lab">Designation. <span class="star">★</span></label>
                    <select name="designation_id" class="form-control" id="designation_id" style="color:#777777; outline: 1px solid #ced4da; margin-top: 10px" required>
                        <option value="">--Select designation Type--</option>
                        <?php foreach ($designation as $row) : ?>
                            <option value="<?= $row->id; ?>"><?= $row->designation; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-12 fontuser">
                    <label class="lab">Image. <span class="star">★</span></label>
                    <input type="file" name="image" class="form-control" style="padding: 10px 11px; border-radius: 4px; margin-top: 10px" accept=".jpg,.jpeg,.png" required>
                    <p class="text-danger">Image allow type(jpg, jpeg, png)</p>
                </div>
            </div>
            <div class="row d-flex justify-content-end">
                <div class="form-group col-2 fonbtn">
                    <a href="<?= base_url('admin/sale_person'); ?>" class="form-control btn btn-danger" style="padding: 12px;">Cancel</a>
                    <i class="fa fa-ban fa-lg"></i>
                </div>
                <div class="form-group col-2 fonbtn">
                    <input type="submit" class="form-control btn btn-success" id="submit" name="submit" style="padding: 4px;">
                    <i class="fa fa-check-circle fa-lg"></i>
                </div>
            </div>
        </form>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.js"></script>
<script>
    jQuery('#form').validate({
        rules: {
            name: "required",
            email: "required",
            password: "required",
            image: "required",
            designation_id: "required",
            user_id: "required",
            mobile: {
                required: true,
                maxlength: 10
            }
        },
        messages: {
            name: "<p class='text-danger'>Please Enter Name*</p>",
            email: "<p class='text-danger'>Please Enter Email*</p>",
            password: "<p class='text-danger'>Please Enter Password*</p>",
            image: "<p class='text-danger'>Please Select image*</p>",
            designation_id: "<p class='text-danger'>Please Select Designation *</p>",
            user_id: "<p class='text-danger'>Please Select Sub Admin*</p>",
            mobile: {
                required: "<p class='text-danger'>Please Enter Mobile No.*</p>",
                maxlength: "<p class='text-danger'>Please Enter 10 Digit Mobile No.*</p>"
            }
        }
    });
</script>