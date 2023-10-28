<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<div class="col-lg-12 p-5 new">
    <div class="row">
        <h3 class="m-4 text-center text-danger">Admin Profile</h3>
    </div>
    <?= $alert; ?>

    <form id="form" class="ajax" method="POST">
        <div class="row">
            <div class="form-group">
                <div class="col-12 mb-4">
                    <label class="col-12">Email</label>
                    <input type="email" class="form-control form-control-lg" name="admin_contact" value="<?= $data_get->email; ?>" placeholder="Please Enter Your Email">
                </div>
                <div class="col-12">
                    <label class="col-12"> Password</label>
                    <input type="text" class="form-control form-control-lg" minlength="6" maxlength="6" name="admin_password" placeholder="Please Enter Your password">
                </div>
            </div>
        </div>

        <div class="mt-3 ml-3">
            <button type="submit" name="sub" class="btn btn-primary">Update</button>
        </div>
    </form>
</div>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>
<script>
    jQuery('#form').validate({
        rules: {
            admin_contact: {
                required: true,
                email: true
            },
            admin_password: "required"
        },
        messages: {
            admin_contact: {
                required: "<p class='text-danger'>Please enter your email*</p>",
                email: "<p class='text-danger'>Please enter your valid email*</p>",
            },
            admin_password: "<p class='text-danger'>Please enter your Password*</p>"
        }
    });
</script>