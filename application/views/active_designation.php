<div class="card">
    <div class="card-header">
        <div class="container-fluid">
            <div class="row justify-content-start sp">
                <div class="col-4">
                    <h4>Active Designation</h4>
                </div>

            </div>
        </div>
        <div class="scroll">
            <table class="table table-striped table-bordered zero-configuration">
                <thead class="table_head">
                    <tr>
                        <th>S no.</th>
                        <th>Designation</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1;
                    foreach ($fetch_designation as $row) :
                    ?>
                        <tr>
                            <td><?= $i++; ?></td>
                            <td><?= $row->designation; ?></td>
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
                                <a href="vajascript:void(0)" onclick="ajax_modal('modal/ajax_modal/modal_update_designation', '<?= $row->id ?>', this, '<?= $row->designation ?>')"><i class="square fa-solid fa-pen-to-square"></i></a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>