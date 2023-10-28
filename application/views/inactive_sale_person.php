<div class="card">
    <div class="card-header">
        <div class="container-fluid">
            <div class="row justify-content-start sp">
                <div class="col-4">
                    <h4>Inactive Sales Person</h4>
                </div>
            </div>
        </div>
        <div class="scroll">
            <table class="table table-striped table-bordered zero-configuration">
                <thead class="table_head">
                    <tr>
                        <th>S no.</th>
                        <th>Image</th>
                        <th>Sale Person Name</th>
                        <th>Mobile No.</th>
                        <th>Email</th>
                        <th>Sub_Admin</th>
                        <th>Designation</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1;
                    foreach ($sales_person as $row) :
                        $get_dep = $this->Crud_model->fetch('designation', array('id' => $row->designation_id));
                        $get_user_id = $this->Crud_model->fetch('users', array('id' => $row->user_id))
                    ?>
                        <tr>
                            <td><?= $i++; ?></td>
                            <td><img src="<?= base_url($row->image); ?>" alt="image"></td>
                            <td><?= $row->name; ?></td>
                            <td><?= $row->mobile; ?></td>
                            <td><?= $row->email; ?></td>
                            <td><?= $get_user_id->row('name') ?></td>
                            <td><?= $get_dep->row('designation') ?></td>
                            <td><?= $row->status == 0 ? '<p class="active-pills">Active</p>' : '<p class="inactive-pills">Inactive</p>'; ?></td>
                            <td>
                                <a href="?sid=<?= $row->id; ?>"><?= $row->status == 0 ? "<i class='inactive fa-solid fa-ban' data-toggl='tooltip' data-placement='top' title='Mark Inactive'></i>" : "<i class='active fas fa-circle-check' data-toggl='tooltip' data-placement='top' title='Mark Active'></i>"; ?></a>
                                <a href="<?= base_url('admin/update_sale_person/' . $row->id); ?>"><i class="square fa-solid fa-pen-to-square click" data-toggl="tooltip" data-placement="top" title="Update"></i></a>
                                <a href="#" onclick="ajax_modal('modal/ajax_modal/change_password', '<?= $row->id ?>', this, 'sales_person')"><i style="background-color: gray;" class="square fa-solid fa-lock" data-toggl="tooltip" data-placement="top" title="Change Password"></i></a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>