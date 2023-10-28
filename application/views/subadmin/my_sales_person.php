<div class="card">
    <div class="card-header">
        <div class="container-fluid">
            <div class="row justify-content-start sp">
                <div class="col-4">
                    <h4>Sales Person</h4>
                </div>
            </div>
        </div>
        <div class="scroll">
            <table class="table table-striped table-bordered zero-configuration">
                <thead class="table_head">
                    <tr>
                        <th>S no.</th>
                        <th>Sale Person Name</th>
                        <th>Mobile No.</th>
                        <th>Email</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1;
                    foreach ($my_sales_person as $row) :
                    ?>
                        <tr>
                            <td><?= $i++; ?></td>
                            <td><?= $row->name; ?></td>
                            <td><?= $row->mobile; ?></td>
                            <td><?= $row->email; ?></td>
                            <td><?= $row->status == 0 ? '<p class="active-pills">Active</p>' : '<p class="inactive-pills">Inactive</p>'; ?></td>
                            <td>
                                <a href="<?= base_url('subadmin/track_location?sales_person=' . $row->id . '&start_date=' . date('Y-m-d') . '&end_date=' . date('Y-m-d') . '&filter=&id'); ?>"><i class="square fa-solid fa-location click" data-toggl="tooltip" data-placement="top" title="Today Path"></i></a>
                                <a href="<?= base_url('subadmin/attendance?user_id=' . $row->id); ?>"><i style="background-color: #4077d7; padding: 5px; margin: 0;" class="square fa-solid fa fa-calendar" data-toggl="tooltip" data-placement="top" title="Attendance"></i></a>
                                <a href="<?= base_url('subadmin/sales_person_profile?user_id=' . $row->id); ?>"><i style="background-color: #858585; padding: 5px 7px;" class="square fa-solid fa-user" data-toggl="tooltip" data-placement="top" title="View Profile"></i></a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>