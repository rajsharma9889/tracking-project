<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $page_title . "। Sub Admin"; ?></title>
  <link rel="icon" href="" type="image/png" sizes="16x16">
  <link rel="shortcut icon" href="<?php echo base_url('assets/images/demo.png'); ?>">
  <?php require(APPPATH . '/views/header_link.php'); ?>

</head>

<style>
  @media screen and (max-width: 600px) {
    .content-wrapper {
      padding: 1.2rem 0.95rem;
    }

    .card {
      padding: 25px;
    }
  }
</style>

<body>

  <?php include 'side_menu.php'; ?>
  <div class="content-wrapper">

    <?php include $page_name . ".php"; ?>
    <?php include "ajax_model.php"; ?>
  </div>

  <?php require(APPPATH . '/views/footer_link.php'); ?>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.js"></script>
  <script src="<?php echo base_url(); ?>assets/js/admin_form_validation.js"></script>

</body>
<!-- Profile-->
<div class="modal fade" id="exampleModalCenterPro" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <h5 class="text-center pt-4">Profile</h5>
      <div class="card-body">
        <center class="mt-3"> <img src="<?php echo base_url('assets/images/admin_logo1.png'); ?>" class="rounded-circle" width="140" />
          <hr style="height: 0px">
          <h6 class="mt-1">
            Sub Admin</h6>
        </center>
        <form class="form-horizontal form-material" action="<?= base_url('admin/update_profile'); ?>" method="POST">
          <?php
          $id = $this->session->userdata('id');
          $admin_data = $this->Crud_model->fetch("users", array('id' => $id))->result();
          foreach ($admin_data as $row) : ?>
            <div class="form-group">
              <label for="example-email" class="col-md-12">Email</label>
              <div class="col-md-12">
                <input type="email" placeholder="Enter Email" value='<?= $row->email; ?>' class="form-control form-control-line" name="email" id="example-email">
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
      </div>
    </div>
  </div>
</div>

<!-- Ajax Modal Start -->
<div class="modal fade" id="show_ajax_modal" tabindex="-1" role="dialog" aria-labelledby="show_ajax_modal" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button onclick="closeModal()" type="button" class="close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="card-body">
        <div id="ajax_response"></div>
      </div>
    </div>
  </div>
</div>
<!-- Ajax Modal End -->


<script>
  function ajax_modal(url, id, element, param1 = '', param2 = '') {
    var original_content = element.innerHTML;
    element.innerHTML = '<div class="spinner-border spinner-border-sm" role="status"><span class="sr-only">Loading...</span></div>';
    element.style.cursor = "no-drop";
    $.ajax({
      url: "<?= base_url() ?>" + url,
      method: "POST",
      data: {
        id: id,
        param1: param1,
        param2: param2
      },
      success: function(res) {
        $("#ajax_response").html(res);
        $('#show_ajax_modal').modal('show');
        element.innerHTML = original_content;
        element.style.cursor = "pointer";
      }
    });
  }

  function closeModal() {
    $('#show_ajax_modal').modal('hide');
  }
</script>

<?php if (!empty($this->session->flashdata('success'))) {
  $get_session = $this->session->flashdata('success');
  echo $hello = "<script>success('$get_session');</script>";
}
?>

<?php if (!empty($this->session->flashdata('alert'))) {
  $get_session_alert = $this->session->flashdata('alert');
  echo $hello = "<script>danger('$get_session_alert');</script>";
}
?>

<script>
  $(document).ready(function() {
    $('[data-toggl="tooltip"]').tooltip({
      delay: {
        "show": 10,
        "hide": 10
      }
    });
  });
</script>

</html>