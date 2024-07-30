<div class="card">
    <div class="card-header">
        <div class="container-fluid">
            <div class="row justify-content-start sp">
                <div class="col-4">
                    <h4>Sales Person Attendance</h4>
                </div>
                <form method="POST">
                    <div class="row">
                        <div class="col-3">
                            <div class="form-group">
                                <label>Start Date</label>
                                <input type="date" name="start_date" style="padding: 10px;" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label>End Date</label>
                                <input type="date" name="end_date" style="padding: 10px;" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-3 mt-2">
                            <div class="form-group" style="margin: 28px 0;">
                                <button name="filter" class="btn denbtn" type="submit">Filter</button>
                            </div>
                        </div>
                    </div>
                </form>
                <br>
                <span class="text-muted">Name: <b><?= $sp_data->row('name') ?></b></span>
                <span class="text-muted">Mobile: <b><?= $sp_data->row('mobile') ?></b></span><br>
            </div>
        </div>
        <div class="scroll">
            <table class="table table-striped table-bordered zero-configuration">
                <thead class="table_head">
                    <tr>
                        <th>S no.</th>
                        <th>Date</th>
                        <th>Lunch Start Time</th>
                        <th>Lunch End Time</th>
                        <th>Punch IN Time</th>
                        <th>Punch IN Address</th>
                        <th>Punch IN Image</th>
                        <th>Punch Out Time</th>
                        <th>Punch Out Address</th>
                        <th>Punch Out Image</th>
                        <th>Total Distance Travel</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1;
                    foreach ($data->result() as $row) :
                        $get_location = $this->db->order_by('id', 'desc')->get_where('location', array('user_id' => $row->user_id, 'date' => $row->in_date));
                        $cordinate_array = array_map(function ($query) {
                            return [
                                $query['lattitude'], $query['longitude']
                            ];
                        }, $get_location->result_array());
                    ?>
                        <tr>
                            <td><?= $i++; ?></td>
                            <td><?= $row->in_date; ?></td>
                            <td><?= $row->lunch_start_times; ?></td>
                            <td><?= $row->lunch_end_times; ?></td>
                            <td><?= $row->in_time; ?></td>
                            <td><?= $row->punch_in_address; ?></td>
                            <td><a href="<?= base_url($row->punch_in_image); ?>" target="_blank"><img src="<?= base_url($row->punch_in_image); ?>" alt="image"></a></td>
                            <td><?= $row->out_time; ?></td>
                            <td><?= $row->punch_out_address; ?></td>
                            <td><a href="<?= base_url($row->punch_out_image); ?>" target="_blank"></a><img src="<?= base_url($row->punch_out_image); ?>" alt="image"></a></td>
                            <td><?= calculateTotalDistance($cordinate_array) ?></td>
                            <td><a href="<?= base_url('admin/geofencing?user_id=' . $row->user_id . '&start_date=' . $row->in_date . '&end_date=' . $row->in_date . '&filter='); ?>"><i class="square fa-solid fa-location click" data-toggl="tooltip" data-placement="top" title="Location Path"></i></a></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>