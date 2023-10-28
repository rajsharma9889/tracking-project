<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-12">
                <h4>Add Sub Admin</h4>
            </div>
        </div>
    </div>
    <div>
        <form id="employy_form" method="post" enctype="multipart/form-data">
            <div class="row pt-2">
                <div class="form-group col-6 fontuser">
                    <label class="lab">Name <span class="star">★</span></label>
                    <input type="text" name="name" class="form-control form-control-lg mb-4" placeholder="  Please Enter Your Name" autocomplete="off" required style=" padding: 12px 39px;" />
                    <i class="fa fa-user fa-lg" style="padding-top: 12px;"></i>
                </div>
                <div class="form-group col-6 fontuser">
                    <label class="lab">Mobile No. <span class="star">★</span></label>
                    <input type="number" name="mobile" class="form-control form-control-lg" placeholder="Please Enter Your Mobile" style="display: inline-block; padding: 12px 40px;" autocomplete="off" required />
                    <i class="fa fa-mobile-android-alt fa-lg" style="left: 12px;top: 60px"></i>
                </div>
            </div>

            <div class="row">
                <div class="form-group col-6 fontuser">
                    <label class="lab">Email. <span class="star">★</span></label>
                    <input type="email" name="email" class="form-control form-control-lg mb-4" placeholder="  Please Enter Your Email" style="margin-top: 10px" autocomplete="off" required />
                    <i class="fa fa-id-card fa-lg" style="top: 60px"></i>
                </div>
                <div class="form-group col-6 fontuser">
                    <label class="lab">Password. <span class="star">★</span></label>
                    <input type="password" name="password" class="form-control form-control-lg" placeholder="Please Enter Your Password" style="display: inline-block; padding: 12px 40px; margin-top: 10px" autocomplete="off" required />
                    <i class="fa fa-file-alt fa-lg" style="left: 12px;top: 59px"></i>
                </div>

            </div>

            <div class="row">
                <div class="form-group col-6 fontuser">
                    <label class="lab">Compony Name. <span class="star">★</span></label>
                    <input type="text" name="compony_name" class="form-control form-control-lg my-3" placeholder="Please Enter Your Compony Name" style="display: inline-block; padding: 12px 40px;" autocomplete="off" required />
                    <i class="fa fa-file-alt fa-lg" style="left: 12px;top: 67px"></i>
                </div>
                <div class="form-group col-6 fontuser">
                    <label class="lab">Image. <span class="star">★</span></label>
                    <input type="file" name="image" class="form-control" style="display: inline-block; padding: 12px 20px; margin-top: 17px;" accept=".jpg,.jpeg,.png" required>
                    <p class="text-danger">Image allow type(jpg, jpeg, png)</p>
                    <!-- <input type="file" name="image" class="form-control form-control-lg my-3" style="display: inline-block; padding: 12px 40px;" autocomplete="off" required />
                    <i class="fa fa-mobile-android-alt fa-lg" style="left: 12px;top: 67px"></i> -->
                </div>
            </div>

            <div class="row d-flex justify-content-end">
                <div class="form-group col-2 fonbtn">
                    <a href="<?= base_url('admin/users'); ?>" class="form-control btn btn-danger" style="padding: 12px;">Cancel</a>
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
    jQuery('#employy_form').validate({
        rules: {
            name: "required",
            email: "required",
            password: "required",
            compony_name: "required",
            mobile: {
                required: true,
                maxlength: 10
            }
        },
        messages: {
            name: "<p class='text-danger'>Please Enter User Name*</p>",
            email: "<p class='text-danger'>Please Enter User Email*</p>",
            password: "<p class='text-danger'>Please Enter User Password*</p>",
            compony_name: "<p class='text-danger'>Please Enter Compony Name*</p>",
            mobile: {
                required: "<p class='text-danger'>Please Enter User Mobile No.*</p>",
                maxlength: "<p class='text-danger'>Please Enter 10 Digit Mobile No.*</p>"
            }
        }
    });
</script>