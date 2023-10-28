<div id="main-wrapper">
    <div class="container-fluid">
        <div class="row sp">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="container-fluid">
                            <div class="row justify-content-start sp">
                                <div class="col-4">
                                    <h4>All Jobs</h4>
                                </div>
                                <div class="col-8 d-flex justify-content-end">
                                    <button type="submit" class="btn denbtn" data-toggle="modal" data-target="#exampleModalCenter">Add Jobs</button>
                                </div>

                            </div>
                        </div>
                        <div class="scroll">
                            <table class="table table-striped table-bordered zero-configuration">
                                <thead class="table_head">
                                    <tr>
                                        <th>S no.</th>
                                        <th>Name</th>
                                        <th>Contact</th>
                                        <th>Password</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1;
                                    foreach ($demo as $row) :
                                    ?>
                                        <tr>
                                            <td><?php echo $i++; ?></td>
                                            <td><?php echo $row->name; ?></td>
                                            <td><?php echo $row->mobile_no; ?></td>
                                            <td><?php echo $row->password; ?></td>

                                            <td>

                                                <a href="#"><i data-user_id="<?= $row->id ?>" data-name="<?= $row->name ?>" data-mobile_no="<?= $row->mobile_no ?>" data-password="<?= $row->password ?>" class="square fa-solid fa-pen-to-square click" data-toggl="tooltip" data-placement="top" title="Update" data-toggle="modal" data-target="#jobs-update"></i></a>

                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Modal insert -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <h5 class="text-center pt-4">Add demo</h5>
            <div class="modal-body">
                <form class="form" method="post" id="form">
                    <div class="form-group pt-2">
                        <label>Name : <span class="star">★</span></label>
                        <input type="text" name="name" placeholder="Enter The Name" class="form-control" style="padding: 15px 12px;" required />
                    </div>

                    <div class="form-group pt-2">
                        <label>Contact : <span class="star">★</span></label>
                        <input type="mobile_no" name="mobile_no" placeholder="Enter The mobile_no" class="form-control" style="padding: 15px 12px;" required />
                    </div>

                    <div class="form-group pt-2">
                        <label>Password : <span class="star">★</span></label>
                        <input type="text" name="password" placeholder="Enter The Password" class="form-control" style="padding: 15px 12px;" required />
                    </div>
                    <div class="form-group">
                        <button type="submit" name="submit" class="model-btn btn">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal Update -->
<div class="modal fade" id="jobs-update" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <h5 class="text-center pt-4">Update Jobs</h5>
            <div class="modal-body">
                <form class="form" method="post" id="form">
                    <div class="form-group pt-2">
                        <label>Name : <span class="star">★</span></label>
                        <input type="text" name="name" id="name" placeholder="Enter The Name" class="form-control" style="padding: 15px 12px;" required />
                        <input type="hidden" name="hidden_id" id="hidden_id" />
                    </div>
                    <div class="form-group pt-2">
                        <label>Contact : <span class="star">★</span></label>
                        <input type="mobile_no" name="mobile_no" id="mobile_no" placeholder="Enter The mobile_no" class="form-control" style="padding: 15px 12px;" required />
                    </div>

                    <div class="form-group pt-2">
                        <label>Password : <span class="star">★</span></label>
                        <input type="text" name="password" id="password" placeholder="Enter The Password" class="form-control" style="padding: 15px 12px;" required />
                    </div>
                    <div class="form-group">
                        <button type="submit" name="update_submit" class="model-btn btn">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script>
    $(document).ready(function() {
        $(".click").on("click", function() {
            var id = $(this).attr("data-user_id");
            var name = $(this).attr("data-name");
            var mobile_no = $(this).attr("data-mobile_no");
            var password = $(this).attr("data-password");
            $("#name").val(name);
            $("#mobile_no").val(mobile_no);
            $("#password").val(password);
            $("#hidden_id").val(id);

        });
    });
</script>