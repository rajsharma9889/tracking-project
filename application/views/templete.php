<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $page_title; ?></title>
  <link rel="shortcut icon" href="">
  <?php if ((!empty($this->session->flashdata('success'))) || !empty($this->session->flashdata('alert'))) {
    include_once("alert.php");
  } ?>
  <?php include_once("header_link.php"); ?>
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
  <?php include_once("side_menu.php"); ?>
  <div class="content-wrapper">
    <?php include_once($page_name . ".php"); ?>
    <?php include "ajax_model.php"; ?>
  </div>
  <?php include_once("footer_link.php"); ?>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.js"></script>
  <script src="<?php echo base_url(); ?>assets/js/admin_form_validation.js"></script>
</body>

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