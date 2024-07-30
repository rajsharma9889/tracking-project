<div class="card">
    <div class="card-header">
        <div class="container-fluid">
            <div class="row justify-content-start sp">
                <div class="col-4">
                    <h4>Comptiter List</h4>
                </div>
            </div>
        </div>
        <div class="scroll">
            <table class="table table-striped table-bordered zero-configuration">
                <thead class="table_head">
                    <tr>
                        <th>S no.</th>
                        <th>Created at</th>
                        <th>Sales Person Name</th>
                        <th>Mobile No.</th>
                        <th>Comptiter Detail</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1;
                    foreach ($data->result() as $row) :
                        $get_sales_person = $this->Crud_model->fetch('sales_person', array('id' => $row->sales_person_id))
                    ?>
                        <tr>
                            <td><?= $i++; ?></td>
                            <td><?= $row->create_at; ?></td>
                            <td><?= $get_sales_person->row('name'); ?></td>
                            <td><?= $get_sales_person->row('mobile'); ?></td>
                            <td><?= $row->description; ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>