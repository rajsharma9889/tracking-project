<div class="card">
    <div class="card-header">
        <div class="container-fluid">
            <div class="row justify-content-start sp">
                <div class="col-4">
                    <h4>Sales Person</h4>
                </div>
                <div class="col-8 d-flex justify-content-end">
                    <a class="btn denbtn" href="<?= base_url('admin/add_sale_person') ?>">Add Sale Person</a>
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
                        <th>Sub Admin</th>
                        <th>Designation</th>
                        <th>Battery Percentage</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1;
                    foreach ($sales_person as $row) :
                        $get_dep = $this->db->limit('1')->get_where('designation', array('id' => $row->designation_id));
                        $get_user_id = $this->db->limit('1')->get_where('users', array('id' => $row->user_id));
                        $get_location = $this->db->order_by('id', 'desc')->limit('1')->get_where('location', array('user_id' => $row->id, 'type' => '3'));
                    ?>
                        <tr>
                            <td><?= $i++; ?></td>
                            <td><a href="<?= base_url($row->image); ?>" target="_blank"><img src="<?= base_url($row->image); ?>" alt="image"></a></td>
                            <td><?= $row->name; ?></td>
                            <td><?= $row->mobile; ?></td>
                            <td><?= $row->email; ?></td>
                            <td><?= $get_user_id->row('name') ?></td>
                            <td><?= $get_dep->row('designation') ?></td>
                            <td>Battery Percentage : <?= $get_location->row('battery_percentage') ?>% <br>Date : <?= $get_location->row('date') ?><br>Time : <?= $get_location->row('time') ?></td>
                            <td><?= $row->status == 0 ? '<p class="active-pills">Active</p>' : '<p class="inactive-pills">Inactive</p>'; ?></td>
                            <td>
                                <a href="?sid=<?= $row->id; ?>"><?= $row->status == 0 ? "<i class='inactive fa-solid fa-ban' data-toggl='tooltip' data-placement='top' title='Mark Inactive'></i>" : "<i class='active fas fa-circle-check' data-toggl='tooltip' data-placement='top' title='Mark Active'></i>"; ?></a>
                                <a href="<?= base_url('admin/update_sale_person/' . $row->id); ?>"><i class="square fa-solid fa-pen-to-square click" data-toggl="tooltip" data-placement="top" title="Update"></i></a>
                                <a href="<?= base_url('admin/geofencing?user_id=' . $row->id); ?>"><i class="square fa-solid fa-location click" data-toggl="tooltip" data-placement="top" title="Today Path"></i></a>
                                <a href="<?= base_url('admin/attendance?user_id=' . $row->id); ?>"><i style="background-color: #4077d7; padding: 5px; margin: 0;" class="square fa-solid fa fa-calendar" data-toggl="tooltip" data-placement="top" title="Attendance"></i></a>
                                <a href="<?= base_url('admin/shop_list/' . $row->id); ?>"><i style="background-color: #4077d7; padding: 5px; margin: 0;" class="square fa-solid fa fa-shopping-bag" data-toggl="tooltip" data-placement="top" title="Shop List"></i></a>
                                <a href="<?= base_url('admin/order_list/' . $row->id); ?>"><i style="background-color: #4077d7; padding: 5px; margin: 0;" class="square fa-solid fa fa-truck" data-toggl="tooltip" data-placement="top" title="Order List"></i></a>
                                <a href="<?= base_url('admin/comptiter_List/' . $row->id); ?>"><i style="background-color: #4077d7; padding: 5px; margin: 0;" class="square fa-solid fa fa-window-close" data-toggl="tooltip" data-placement="top" title="Copmptiter Box"></i></a>
                                <a href="#" onclick="ajax_modal('modal/ajax_modal/change_password', '<?= $row->id ?>', this, 'sales_person')"><i style="background-color: gray;" class="square fa-solid fa-lock" data-toggl="tooltip" data-placement="top" title="Change Password"></i></a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>