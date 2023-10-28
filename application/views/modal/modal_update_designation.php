<h5 class="text-center pt-4">Update Designations</h5>
<form class="form" method="post" id="form">
    <div class="form-group pt-2">
        <label>Designation Name : <span class="star">★</span></label>
        <input type="text" name="designation" placeholder="Enter The Designation Name" value="<?= $param1 ?>" class="form-control" style="padding: 15px 12px;" required />
        <input type="hidden" name="hidden_id" value="<?= $ajax_id ?>" />
    </div>
    <div class="form-group">
        <button type="submit" name="update_submit" class="model-btn btn">Update</button>
    </div>
</form>