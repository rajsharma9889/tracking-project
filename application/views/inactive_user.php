<div class="card">
    <div class="card-header">
        <div class="container-fluid">
            <div class="row justify-content-start sp">
                <div class="col-4">
                    <h4>Inactive Sub Admin</h4>
                </div>

            </div>
        </div>
        <div class="scroll">
            <table class="table table-striped table-bordered zero-configuration">
                <thead class="table_head">
                    <tr>
                        <th>S no.</th>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Mobile No.</th>
                        <th>Email</th>
                        <th>Compony Name</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1;
                    foreach ($users as $row) :
                    ?>
                        <tr>
                            <td><?= $i++; ?></td>
                            <td><img src="<?= base_url($row->image); ?>" alt="image"></td>
                            <td><?= $row->name; ?></td>
                            <td><?= $row->mobile; ?></td>
                            <td><?= $row->email; ?></td>
                            <td><?= $row->compony_name; ?></td>
                            <td>
                                <?php
                                if ($row->status == 0) {
                                    echo '<p class="active-pills">Active</p>';
                                } else {
                                    echo '<p class="inactive-pills">Inactive</p>';
                                }
                                ?>
                            </td>
                            <td>
                                <a href="?sid=<?= $row->id; ?>"><?= $row->status == 0 ? "<i class='inactive fa-solid fa-ban' data-toggl='tooltip' data-placement='top' title='Mark Inactive'></i>" :  "<i class='active fas fa-circle-check' data-toggl='tooltip' data-placement='top' title='Mark Active'></i>"; ?></a>
                                <a href="<?= base_url('admin/update_users/' . $row->id); ?>"><i class="square fa-solid fa-pen-to-square click" data-toggl="tooltip" data-placement="top" title="Update"></i></a>
                                <a href="<?= base_url('admin/sale_person/' . $row->id); ?>"><i class="square fa-solid fa-user bg-warning click" data-toggl="tooltip" data-placement="top" title="Sale Person"></i></a>
                                <a href="#" onclick="ajax_modal('modal/ajax_modal/change_password', '<?= $row->id ?>', this, 'users')"><i style="background-color: gray;" class="square fa-solid fa-lock" data-toggl="tooltip" data-placement="top" title="Change Password"></i></a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>