<div class="card">
    <div class="card-header">
        <div class="container-fluid mb-3">
            <div class="row justify-content-start">
                <div class="col-4">
                    <h4>Sales Person Track</h4>
                </div>
            </div>
        </div>
        <form method="get">
            <div class="row">
                <div class="col-3">
                    <div class="form-group">
                        <label>Sales Person</label>
                        <select name="sales_person" class="form-select" style="padding: 10px; margin: 7px 0;">
                            <option value="">--Please select sales person--</option>
                            <?php
                            $subadmin_id = $this->session->userdata('subadmin_id');
                            $sp_table = $this->Crud_model->fetch('sales_person', array('status' => 0, 'user_id' => $subadmin_id));
                            foreach ($sp_table->result() as $row) { ?>
                                <option value="<?= $row->id ?>"><?= $row->name ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="col-3 mt-2">
                    <div class="form-group" style="margin: 28px 0;">
                        <button name="filter" class="btn denbtn" type="submit">Filter</button>
                    </div>
                </div>
            </div>
        </form>
        <?php
        $user_id = $this->input->get('sales_person');
        $get_sales_person = $this->Crud_model->fetch('sales_person', array('id' => $user_id));
        $get_attendance = $this->Crud_model->fetch('attendance', array('user_id' => $user_id, 'in_date >=' => date('Y-m-d'), 'in_date <=' => date('Y-m-d')));
        ?>
        <div class="row">
            <div class="col-6">
                <span class="text-muted">Name: <b><?= $get_sales_person->row('name') ?></b></span><br>
                <hr>
            </div>
            <div class="col-6">
                <span class="text-muted">Email: <b><?= $get_sales_person->row('email') ?></b></span><br>
                <hr>
            </div>
            <div class="col-6">
                <span class="text-muted">Mobile: <b><?= $get_sales_person->row('mobile') ?></b></span><br>
                <hr>
            </div>
            <div class="col-6">
                <?php include_once('distancecalculate.php'); ?>
                <hr>
            </div>
            <div class="col-6">
                <span class="text-muted">Punch IN Time: <b><?= $get_attendance->row('in_time') ?? "N/A" ?></b></span><br>
                <hr>
            </div>
            <div class="col-6">
                <span class="text-muted">Punch IN Location: <b><?= $get_attendance->row('punch_in_address') ?? "N/A" ?></b></span><br>
                <hr>
            </div>
            <div class="col-6">
                <span class="text-muted">Punch Out Time: <b><?= $get_attendance->row('out_time') ?? "N/A" ?></b></span><br>
                <hr>
            </div>
            <div class="col-6">
                <span class="text-muted">Punch Out Location: <b><?= $get_attendance->row('punch_out_address') ?? "N/A" ?></b></span><br>
                <hr>
            </div>
            <div class="col-6">
                <span class="text-muted">Punch IN Image: <b><img width="100px" src="<?= base_url($get_attendance->row('punch_in_image')) ?? "N/A" ?>" alt="image"></b></span><br>
                <hr>
            </div>
            <div class="col-6">
                <span class="text-muted">Punch Out Image: <b><img width="100px" src="<?= base_url($get_attendance->row('punch_out_image')) ?? "N/A" ?>" alt="image"></b></span><br>
                <hr>
            </div>
        </div>
        <div id="map" style="height: 600px; width: 100%;"></div>
    </div>
</div>