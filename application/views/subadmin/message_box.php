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
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1;
                    $data = $this->Crud_model->fetch('notification', 'desc')->result();
                    foreach ($data as $row) :
                    ?>
                        <tr>
                            <td><?= $i++; ?></td>
                            <td><?= $row->created_at; ?></td>
                            <td><?= $row->msg; ?></td>
                            <td><?= $row->user_type == '1' ? 'Admin' : 'Subadmin'; ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>