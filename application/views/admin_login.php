<!DOCTYPE html>
<html lang="en">

<head>
  <title>Admin Login</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="description" content="#">
  <meta name="keywords" content="#">
  <meta name="author" content="#">
  <!-- Favicon icon -->
  <link rel="icon" href="<?= base_url('assets/images/demo.png'); ?>" type="image/x-icon">
  <link rel="stylesheet" type="text/css" href="<?= base_url('/assets/css/login_page.css') ?>">
  <link rel="stylesheet" type="text/css" href="<?= base_url('/assets/css/bootstrap_login.min.css') ?>">
  <link rel="stylesheet" href="<?= base_url(); ?>assets/css/fafa_desian.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
  <section class="login-block" style="background: linear-gradient(to bottom, #7ccbe3  0%, #d6e1e5 100%)">
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
          <form class="md-float-material form-material" action="<?= base_url(); ?>" method="post" id="admin_form">
            <div class="auth-box card" style="border-radius: 8px; border: 1px solid #80808066">
              <div class="card-block" style="padding: 40px">
                <div class="m-b-25 text-center">
                  <img src="<?= base_url('assets/images/demo.png'); ?>" alt="" height="auto" width="40%">
                </div>
                <div class="form-group">
                  <select name="user_type" class="form-control">
                    <option value="0">Admin</option>
                    <option value="1">Sub Admin</option>
                  </select>
                </div>
                <div class="form-group">
                  <input type="email" name="email" class="form-control form-control-lg" placeholder="Please enter email number" />
                </div>
                <div class="form-group">
                  <input type="password" name="password" class="form-control form-control-lg" placeholder="Please enter password" />
                </div>
                <div class="row m-t-30">
                  <div class="col-md-12">
                    <button type="submit" name="submit" class="btn-md btn-block waves-effect waves-light text-center" style="background-color: #67c4e6;">Login</button>
                  </div>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>
  <script>
    jQuery('#admin_form').validate({
      rules: {
        email: "required",
        password: {
          required: true,
          minlength: 6,
        }
      },
      messages: {
        email: "<p class='text-danger'>Please Enter Email ID*</p>",
        password: {
          required: "<p class='text-danger'>Please Enter password*</p>",
          minlength: "<p class='text-danger'>Please Enter minimum 6 Digit your password</p>",
        }
      }
    });
  </script>
</body>

</html>