<h5 class="text-center pt-2">Change Password</h5>
<form class="form" method="post" action="<?= base_url('admin/change_password') ?>">
    <div class="form-group pt-2">
        <label>Password : <span class="star">★</span></label>
        <input type="hidden" name="user_type" value="<?= $param1 ?>">
        <input type="password" name="password" placeholder="Please enter your password" class="form-control" style="padding: 15px 12px;" required />
    </div>
    <div class="form-group">
        <button type="submit" name="submit" value="<?= $ajax_id ?>" class="model-btn btn">Save</button>
    </div>
</form>