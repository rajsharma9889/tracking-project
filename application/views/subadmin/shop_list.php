<div class="card">
    <div class="card-header">
        <div class="container-fluid">
            <div class="row justify-content-start sp">
                <div class="col-4">
                    <h4><?= $page_title ?></h4>
                </div>
            </div>
        </div>
        <div class="scroll">
            <table class="table table-striped table-bordered zero-configuration">
                <thead class="table_head">
                    <tr>
                        <th>S no.</th>
                        <th>Created at</th>
                        <th>Image</th>
                        <th>Sales Person Details</th>
                        <th>Shop Name</th>
                        <th>Mobile No.</th>
                        <th>Address</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1;
                    foreach ($data->result() as $row) :
                        $get_sales_person = $this->db->limit('1')->get_where('sales_person', array('id' => $row->sales_person_id));
                    ?>
                        <tr>
                            <td><?= $i++; ?></td>
                            <td><?= $row->create_at; ?></td>
                            <td><img src="<?= base_url($row->photo); ?>" alt="image"></td>
                            <td>
                                Name : <?= $get_sales_person->row('name'); ?><br>
                                Mobile : <?= $get_sales_person->row('mobile'); ?>
                            </td>
                            <td><?= $row->shop_name; ?></td>
                            <td><?= $row->mobile_number; ?></td>
                            <td><?= $row->address; ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>