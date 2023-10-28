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
                        $get_location = $this->db->order_by('time', 'desc')->get_where('location', array('date' => $row->in_date, 'user_id' => $row->user_id));
                        $lineCoordinates = array();
                        if ($get_location->num_rows() > 0) {
                            foreach ($get_location->result() as $row_item) {
                                $lineCoordinates[] = array('lat' => floatval($row_item->lattitude), 'lng' => floatval($row_item->longitude));
                            }
                        }
                        $distanceCalculate = array_sum(distanceTravel($lineCoordinates));
                        if ($distanceCalculate > 1000) {
                            $distanceCalculateKm = $distanceCalculate / 1000 . ' Km';
                        } else {
                            $distanceCalculateKm = $distanceCalculate . ' M';
                        }
                    ?>
                        <tr>
                            <td><?= $i++; ?></td>
                            <td><?= $row->in_date; ?></td>
                            <td><?= $row->in_time; ?></td>
                            <td><?= $row->punch_in_address; ?></td>
                            <td><img src="<?= base_url($row->punch_in_image); ?>" alt="image"></td>
                            <td><?= $row->out_time; ?></td>
                            <td><?= $row->punch_out_address; ?></td>
                            <td><img src="<?= base_url($row->punch_out_image); ?>" alt="image"></td>
                            <td><?= $distanceCalculateKm; ?></td>
                            <td><a href="<?= base_url('subadmin/track_location?sales_person=' . $row->user_id . '&start_date=' . $row->in_date . '&end_date=' . $row->in_date . '&filter='); ?>"><i class="square fa-solid fa-location click" data-toggl="tooltip" data-placement="top" title="Location Path"></i></a></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>