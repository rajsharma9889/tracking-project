<div class="card">
    <div class="card-header">
        <div class="container-fluid">
            <div class="row justify-content-start sp">
                <div class="col-4">
                    <h4>Message List</h4>
                </div>
                <div class="col-8 d-flex justify-content-end">
                    <a class="btn denbtn" href="javascript:;" onclick="ajax_modal('modal/ajax_modal/add_message', '', this)">Add Message</a>
                </div>
            </div>
        </div>
        <div class="scroll">
            <table class="table table-striped table-bordered zero-configuration">
                <thead class="table_head">
                    <tr>
                        <th>S no.</th>
                        <th>Date</th>
                        <th>Message</th>
                        <th>User Type</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1;
                    foreach ($get_table as $row) :
                    ?>
                        <tr>
                            <td><?= $i++; ?></td>
                            <td><?= $row->created_at; ?></td>
                            <td><?= $row->msg; ?></td>
                            <td><?= $row->user_type == '1' ? 'Admin' : 'Subadmin'; ?></td>
                            <td> <a href="<?= base_url('admin/message_box?delete_id=' . $row->id); ?>"><i style="background-color: #4077d7; padding: 5px; margin: 0;" class="square fa-solid fa fa-trash" data-toggl="tooltip" data-placement="top" title="Delete Message"></i></a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>