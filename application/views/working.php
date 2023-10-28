<div class="card">
    <div class="card-header">
        <div class="container-fluid">
            <div class="row justify-content-start sp">
                <div class="col-4">
                    <h4>Working Job</h4>
                </div>
            </div>
        </div>
        <div class="scroll">
            <table class="table table-striped table-bordered zero-configuration">
                <thead class="table_head">
                    <tr>
                        <th>S no.</th>
                        <th>Dr.Name</th>
                        <th>Patient Name</th>
                        <th>Job Type</th>
                        <th>Received Date</th>
                        <th>Due Date</th>
                        <th>Department</th>
                        <th>Employee Name</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1;
                    if(isset($dispatch)){
                    foreach ($dispatch->result() as $row) :
                        $get_status = $this->db->order_by('id', 'desc')->where('assign_job_id', $row->assign_job_id)->get('job_form');
                        $get_name = $this->Crud_model->fetch('jobs', array('id' => $row->job_id));
                        $get_dep_name = $this->Crud_model->fetch('create_department', array('id' => $row->department_id));
                        $get_emp_name = $this->Crud_model->fetch('employee', array('id' => $row->employee_id));
                    ?>
                        <tr>
                            <td><?= $i++; ?></td>
                            <td><?= $row->dr_name; ?></td>
                            <td><?= $row->patient_name; ?></td>
                            <td><?= $get_name->row('job_type'); ?></td>
                            <td><?= $row->received_date; ?></td>
                            <td><?= $row->due_date; ?></td>
                            <td><?= $get_dep_name->row('department_name'); ?></td>
                            <td><?= $get_emp_name->row('name'); ?></td>
                            <td><?php if ($get_status->row('working_status') == 0) {
                                    echo "<p class='active-pills' style='background-color: #fd73d6;'>Pending</p>";
                                } else if ($get_status->row('working_status') == 1) {
                                    echo "<p class='active-pills' style='background-color: #ff732e;'>Working</p>";
                                } else if ($get_status->row('working_status') == 3) {
                                    echo "<p class='active-pills' style='background-color: #579dff;'>Accept</p>";
                                } else if ($get_status->row('working_status') == 4) {
                                    echo "<p class='active-pills' style='background-color: #ff5779c4;'>On Hold</p>";
                                } else if ($get_status->row('working_status') == 2) {
                                    echo "<p class='active-pills'>Complete</p>";
                                }
                                ?></td>
                            <td>
                                <a href="javascript:void(0)" onclick="ajax_modal('modal/ajax_modal/modal_assign_history', '<?= $row->assign_job_id ?>', this)"><i class="fa-solid fa-history" style="background-color: #344e5c; padding: 5px; color: #fff; border-radius: 2px;"></i></a>
                            </td>
                        </tr>
                    <?php endforeach; } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
