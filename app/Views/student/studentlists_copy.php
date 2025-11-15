<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
                
                    <!-- START PAGE-HEADER -->
                    <div class="page-header main-container container-fluid px-5">
                        <h4 class="page-title">Students</h4>
                        
                    </div>
                    <!-- END PAGE-HEADER -->
                    <!-- START MAIN-CONTAINER -->
                    <div class="main-container container-fluid">
                        
                        <div class="row">
							<div class="col-md-12 col-xl-12">
								<div class="card">
									<div class="card-header">
										<h4 class="card-title"></h4> 
										<div class="card-options">
                                            <div class="btn-group">
                                                <a class="btn btn-success dropdown-toggle" href="javascript:;"> Create Student</a>
                                            </div>
                                        </div>
									</div>
									<div class="card-body">
										<form id="studentForm" method="post" action="<?= base_url('studentlist') ?>">
											
											<div class="row">
												<div class="col-md-3">
													<div class="form-group">
														<div class="form-floating">
															<select name="schoolid" id="schoolid" class="form-control form-select select2 select2-hidden-accessible" data-bs-placeholder="Select" tabindex="-1" aria-hidden="true" required>
																<option value="">Choose School</option>
																<option value="CGHSS" <?= ($schoolid == 'CGHSS') ? 'selected' : '' ?> selected>CGHSS</option>
															</select>
														</div>
													</div>
												</div>
												<div class="col-md-3">
													<div class="form-group">
														<div class="form-floating">
															<select id="standard" name="standard" class="form-control form-select select2 select2-hidden-accessible" data-bs-placeholder="Select" tabindex="-1" aria-hidden="true" required>
																<option value="">Choose Standard</option>
															</select>
														</div>
													</div>
												</div>
												<div class="col-md-3">
													<div class="form-group">
														<div class="form-floating">
															<select id="division" name="division" class="form-control form-select select2 select2-hidden-accessible" data-bs-placeholder="Select" tabindex="-1" aria-hidden="true" required>
																<option value="">Choose Division</option>
															</select>
														</div>
													</div>
												</div>
												<div class="col-md-3">
													<div class="form-group">
														<div class="form-floating">
															<button type="submit" name="schoolform" class="btn btn-primary mt-4 mb-0" style="margin-top: 0px !important;">Submit</button>
														</div>
													</div>
												</div>
											</div>
											
										</form>
									</div>
								</div>
							</div>
						</div>
						
						<?php if (session()->getFlashdata('success')): ?>
							<div class="alert alert-success" role="alert">
								<button type="button" class="btn-close fs-5" data-bs-dismiss="alert" aria-hidden="true">×</button><?= session()->getFlashdata('success') ?>
							</div>
						<?php endif; ?>

						<?php if (session()->getFlashdata('error')): ?>
							<div class="alert alert-success" role="alert">
								<button type="button" class="btn-close fs-5" data-bs-dismiss="alert" aria-hidden="true">×</button><?= session()->getFlashdata('error') ?>
							</div>
						<?php endif; ?>
						
						
						<!-- START ROW-2 -->
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">Students List</h3> </div>
                                    <div class="card-body">
                                        <div class="table-responsive export-table">
                                            <div id="file-datatable_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">
                                                
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <table id="file-datatable" class="table table-bordered text-nowrap key-buttons border-bottom dataTable no-footer" role="grid" aria-describedby="file-datatable_info">
                                                            <thead>
                                                                <tr>
																  <th>Sl No</th>
																  <th>rollno</th>
																  <th>admissionno</th>
																  <th>Name</th>
																  <th>Actions</th>
																</tr>
                                                            </thead>
                                                            <tbody>
																<?php if (isset($_POST['schoolform'])) { $i=1; ?>
                                                                <?php foreach ($groups as $group): ?>
																  <tr>
																	<td><?= $i++; ?></td>
																	<td><?= esc($group['rollno']) ?></td>
																	<td><?= esc($group['admissionno']) ?></td>
																	<td><?= esc($group['studentname']) ?></td>
																	<td>
																	    <div class="btn-list float-end1">
																	        <button title="View More" type="button" class="btn btn-sm btn-info-light" data-bs-toggle="modal" data-bs-target="#largeModal<?= esc($group['id']) ?>" data-id="<?= esc($group['id']) ?>"><i class="fa fa-eye fs-14"></i></button>
																	        <button title="Edit" type="button" class="btn btn-sm btn-danger-light" data-bs-toggle="modal" data-bs-target="#largeModal1<?= esc($group['id']) ?>" data-id="<?= esc($group['id']) ?>"><i class="fa fa-edit fs-14"></i></button>
																	        <button title="Class Change" type="button" class="btn btn-sm btn-success-light" data-bs-toggle="modal" data-bs-target="#exampleModal<?= esc($group['id']) ?>" data-id="<?= esc($group['id']) ?>"><i class="fa fa-refresh fs-14"></i></button>
																	    </div>
																	</td>
																  </tr>
																<?php endforeach; ?>
																<?php } else{ $i=1; ?>
																<?php foreach ($groups as $group): ?>
																  <tr>
																	<td><?= $i++; ?></td>
																	<td><?= esc($group['rollno']) ?></td>
																	<td><?= esc($group['admissionno']) ?></td>
																	<td><?= esc($group['studentname']) ?></td>
																	<td>
																	    <div class="btn-list float-end1">
																	        <button title="View More" type="button" class="btn btn-sm btn-info-light" data-bs-toggle="modal" data-bs-target="#largeModal<?= esc($group['id']) ?>" data-id="<?= esc($group['id']) ?>"><i class="fa fa-eye fs-14"></i></button>
																	        <button title="Edit" type="button" class="btn btn-sm btn-danger-light" data-bs-toggle="modal" data-bs-target="#largeModal1<?= esc($group['id']) ?>" data-id="<?= esc($group['id']) ?>"><i class="fa fa-edit fs-14"></i></button>
																	        <button title="Class Change" type="button" class="btn btn-sm btn-success-light" data-bs-toggle="modal" data-bs-target="#exampleModal<?= esc($group['id']) ?>" data-id="<?= esc($group['id']) ?>"><i class="fa fa-refresh fs-14"></i></button>
																	    </div>
																	</td>
																  </tr>
																<?php endforeach; ?>
																<?php } ?>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- END ROW-2 -->
                        
                    </div>
                    <!-- END MAIN-CONTAINER -->
<?php if (isset($_POST['schoolform'])) { ?>
<?php foreach ($groups as $group): ?>
  <div id="largeModal<?= esc($group['id']) ?>" class="modal fade" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content ">
            <div class="modal-header pd-x-20">
                <h6 class="modal-title">Student Details</h6>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"> </button>
            </div>
            <div class="modal-body pd-20">
                <div class="table-responsive table-lg">
				<table class="table table-bordered mb-0 text-dark">
					<tbody>
						<tr class="border-bottom">
							<td>Name</td>
							<td><?= esc($group['studentname']) ?></td>
							<td>Roll No</td>
							<td><?= esc($group['rollno']) ?></td>
						</tr>
						<tr class="border-bottom">
							<td>Admission No</td>
							<td><?= esc($group['admissionno']) ?></td>
							<td>Standard</td>
							<td><?= esc($group['standard']) ?></td>
						</tr>
						<tr class="border-bottom">
							<td>Division</td>
							<td><?= esc($group['division']) ?></td>
							<td>Mobile</td>
							<td><?= esc($group['mobile']) ?></td>
						</tr>
						<tr class="border-bottom">
							<td>Father Name</td>
							<td><?= esc($group['fathername']) ?></td>
							<td>Mother Name</td>
							<td><?= esc($group['mothername']) ?></td>
						</tr>
						<tr class="border-bottom">
							<td>Address</td>
							<td><?= esc($group['address']) ?></td>
							<td>Email</td>
							<td><?= esc($group['emailid']) ?></td>
						</tr>
						<tr class="border-bottom">
							<td>DOB</td>
							<td><?= esc($group['dob']) ?></td>
							<td>School</td>
							<td><?= esc($group['schoolname']) ?></td>
						</tr>
						<tr class="border-bottom">
							<td>DOA</td>
							<td><?= esc($group['doa']) ?></td>
							<td>Registration No</td>
							<td><?= esc($group['regstrationno']) ?></td>
						</tr>
						<tr class="border-bottom">
							<td>Height</td>
							<td><?= esc($group['height']) ?></td>
							<td>Weight</td>
							<td><?= esc($group['weight']) ?></td>
						</tr>
						<tr class="border-bottom">
							<td>Gender</td>
							<td><?= esc($group['gender']) ?></td>
							<td>AC Year</td>
							<td><?= esc($group['acyear']) ?></td>
						</tr>
						</tbody>
    </table>
</div>
            </div>
            <!-- modal-body -->
            
        </div>
    </div>
    <!-- MODAL DIALOG -->
</div>

<div id="largeModal1<?= esc($group['id']) ?>" class="modal fade" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content ">
            <div class="modal-header pd-x-20">
                <h6 class="modal-title">Student Update</h6>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"> </button>
            </div>
            <form method="post" action="<?= base_url('student/update/' . esc($group['id'])) ?>">
            <div class="modal-body pd-20">
                <div class="table-responsive">
            <table class="table text-nowrap border text-md-nowrap mb-0 text-dark">
                <input type="hidden" name="studentid" value="<?= esc($group['id']) ?>">
				<input type="hidden" name="schoolid" value="<?= esc($group['schoolid']) ?>">
				<tbody>
                    <tr>
                        <td>Name</td>
                        <td><input class="form-control" name="studentname" value="<?= esc($group['studentname']) ?>" required></td>
                    </tr>
                    <tr>
                        <td>Roll No</td>
                        <td><input class="form-control" name="rollno" value="<?= esc($group['rollno']) ?>" required></td>
                    </tr>
                    <tr>
                        <td>School</td>
                        <td>
                            <select name="school" class="form-control form-select" required>
								<option value="">Choose School</option>
								<option value="CGHSS" <?= esc($group['schoolname'])=='CGHSS' ? 'selected' : '' ?>>CGHSS</option>
							</select>
                        </td>
                    </tr>
                    <tr>
                        <td>Father Name</td>
                        <td><input class="form-control" name="fathername" value="<?= esc($group['fathername']) ?>" required></td>
                    </tr>
                    <tr>
                        <td>Mother Name</td>
                        <td><input class="form-control" name="mothername" value="<?= esc($group['mothername']) ?>"></td>
                    </tr>
                    <tr>
                        <td>DOB</td><?php     $dob1 = isset($group['dob']) ? substr($group['dob'], 0, 10) : ''; ?>
                        <td><input type="date" class="form-control" name="dob" value="<?= esc($dob1) ?>" required></td>
                    </tr>
                    <tr>
                        <td>Mobile</td>
                        <td><input class="form-control" name="mobile" value="<?= esc($group['mobile']) ?>" pattern="^[6-9][0-9]{9}$" required></td>
                    </tr>
                    <tr>
                        <td>Standard</td>
                        <td>
							<select id="standard<?= esc($group['id']) ?>" name="standard" class="form-control" required>
								<option value="">Choose Standard</option>
								<?php 
								$standards = [];
								foreach ($classes as $class): 
								if (!in_array($class['standard'], $standards)):
								$standards[] = $class['standard']; ?>
									<option value="<?= esc($class['standard']) ?>" <?= ($class['standard'] == $group['standard']) ? 'selected' : '' ?>><?= esc($class['standard']) ?></option>
								<?php endif;
								endforeach; ?>
							</select>
						</td>
                    </tr>
                    <tr>
                        <td>Division</td>
                        <td>
							<select id="division<?= esc($group['id']) ?>" name="division" class="form-control" required>
								<option value="">Choose Division</option>
							</select>
						</td>
                    </tr>
                    <tr>
                        <td>Address</td>
                        <td><textarea class="form-control" name="address"><?= esc($group['address']) ?></textarea></td>
                    </tr>
                    <tr>
                        <td>Height</td>
                        <td><input class="form-control" name="height" value="<?= esc($group['height']) ?>"></td>
                    </tr>
                    <tr>
                        <td>Weight</td>
                        <td><input class="form-control" name="weight" value="<?= esc($group['weight']) ?>"></td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td><input type="email" class="form-control" name="email" value="<?= esc($group['emailid']) ?>"></td>
                    </tr>
                </tbody>
            </table>
        </div>
            </div>
            <!-- modal-body -->
            
    <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Save changes</button>
    </div>
    </form>
        </div>
    </div>
    <!-- MODAL DIALOG -->
</div>


<div class="modal fade" id="exampleModal<?= esc($group['id']) ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Class Change</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"> </button>
            </div>
            <div class="modal-body">
                <p><?= esc($group['studentname']) ?></p>
            </div>
        </div>
    </div>
</div>

<?php endforeach; ?>
<?php } else {?>
<?php foreach ($groups as $group): ?>
<div id="largeModal<?= esc($group['id']) ?>" class="modal fade" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content ">
            <div class="modal-header pd-x-20">
                <h6 class="modal-title">Student Details</h6>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"> </button>
            </div>
            <div class="modal-body pd-20">
                <div class="table-responsive table-lg">
				<table class="table table-bordered mb-0 text-dark">
					<tbody>
						<tr class="border-bottom">
							<th>Name</th>
							<td><?= esc($group['studentname']) ?></td>
							<td>Roll No</td>
							<td><?= esc($group['rollno']) ?></td>
						</tr>
						<tr class="border-bottom">
							<td>Admission No</td>
							<td><?= esc($group['admissionno']) ?></td>
							<td>Standard</td>
							<td><?= esc($group['standard']) ?></td>
						</tr>
						<tr class="border-bottom">
							<td>Division</td>
							<td><?= esc($group['division']) ?></td>
							<td>Mobile</td>
							<td><?= esc($group['mobile']) ?></td>
						</tr>
						<tr class="border-bottom">
							<td>Father Name</td>
							<td><?= esc($group['fathername']) ?></td>
							<td>Mother Name</td>
							<td><?= esc($group['mothername']) ?></td>
						</tr>
						<tr class="border-bottom">
							<td>Address</td>
							<td><?= esc($group['address']) ?></td>
							<td>Email</td>
							<td><?= esc($group['emailid']) ?></td>
						</tr>
						<tr class="border-bottom">
							<td>DOB</td>
							<td><?= esc($group['dob']) ?></td>
							<td>School</td>
							<td><?= esc($group['schoolname']) ?></td>
						</tr>
						<tr class="border-bottom">
							<td>DOA</td>
							<td><?= esc($group['doa']) ?></td>
							<td>Registration No</td>
							<td><?= esc($group['regstrationno']) ?></td>
						</tr>
						<tr class="border-bottom">
							<td>Height</td>
							<td><?= esc($group['height']) ?></td>
							<td>Weight</td>
							<td><?= esc($group['weight']) ?></td>
						</tr>
						<tr class="border-bottom">
							<td>Gender</td>
							<td><?= esc($group['gender']) ?></td>
							<td>AC Year</td>
							<td><?= esc($group['acyear']) ?></td>
						</tr>
						</tbody>
    </table>
</div>
            </div>
            <!-- modal-body -->
            
        </div>
    </div>
    <!-- MODAL DIALOG -->
</div>

<div id="largeModal1<?= esc($group['id']) ?>" class="modal fade" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content ">
            <div class="modal-header pd-x-20">
                <h6 class="modal-title">Student Update</h6>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"> </button>
            </div>
            <form method="post" action="<?= base_url('student/update/' . esc($group['id'])) ?>">
            <div class="modal-body pd-20">
                <div class="table-responsive">
            <table class="table text-nowrap border text-md-nowrap mb-0 text-dark">
                <input type="hidden" name="studentid" value="<?= esc($group['id']) ?>">
				<input type="hidden" name="schoolid" value="<?= esc($group['schoolid']) ?>">
				<tbody>
                    <tr>
                        <td>Name</td>
                        <td><input class="form-control" name="studentname" value="<?= esc($group['studentname']) ?>" required></td>
                    </tr>
                    <tr>
                        <td>Roll No</td>
                        <td><input class="form-control" name="rollno" value="<?= esc($group['rollno']) ?>" required></td>
                    </tr>
                    <tr>
                        <td>School</td>
                        <td>
                            <select name="school" class="form-control form-select" required>
								<option value="">Choose School</option>
								<option value="CGHSS" <?= esc($group['schoolname'])=='CGHSS' ? 'selected' : '' ?>>CGHSS</option>
							</select>
                        </td>
                    </tr>
                    <tr>
                        <td>Father Name</td>
                        <td><input class="form-control" name="fathername" value="<?= esc($group['fathername']) ?>" required></td>
                    </tr>
                    <tr>
                        <td>Mother Name</td>
                        <td><input class="form-control" name="mothername" value="<?= esc($group['mothername']) ?>"></td>
                    </tr>
                    <tr>
                        <td>DOB</td><?php     $dob1 = isset($group['dob']) ? substr($group['dob'], 0, 10) : ''; ?>
                        <td><input type="date" class="form-control" name="dob" value="<?= esc($dob1) ?>" required></td>
                    </tr>
                    <tr>
                        <td>Mobile</td>
                        <td><input class="form-control" name="mobile" value="<?= esc($group['mobile']) ?>" pattern="^[6-9][0-9]{9}$" required></td>
                    </tr>
                    <tr>
                        <td>Standard</td>
                        <td>
							<select id="standard<?= esc($group['id']) ?>" name="standard" class="form-control" required>
								<option value="">Choose Standard</option>
								<?php 
								$standards = [];
								foreach ($classes as $class): 
								if (!in_array($class['standard'], $standards)):
								$standards[] = $class['standard']; ?>
									<option value="<?= esc($class['standard']) ?>" <?= ($class['standard'] == $group['standard']) ? 'selected' : '' ?>><?= esc($class['standard']) ?></option>
								<?php endif;
								endforeach; ?>
							</select>
						</td>
                    </tr>
                    <tr>
                        <td>Division</td>
                        <td>
							<select id="division<?= esc($group['id']) ?>" name="division" class="form-control" required>
								<option value="">Choose Division</option>
							</select>
						</td>
                    </tr>
                    <tr>
                        <td>Address</td>
                        <td><textarea class="form-control" name="address"><?= esc($group['address']) ?></textarea></td>
                    </tr>
                    <tr>
                        <td>Height</td>
                        <td><input class="form-control" name="height" value="<?= esc($group['height']) ?>"></td>
                    </tr>
                    <tr>
                        <td>Weight</td>
                        <td><input class="form-control" name="weight" value="<?= esc($group['weight']) ?>"></td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td><input type="email" class="form-control" name="email" value="<?= esc($group['emailid']) ?>"></td>
                    </tr>
                </tbody>
            </table>
        </div>
            </div>
            <!-- modal-body -->
            
    <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Save changes</button>
    </div>
    </form>
        </div>
    </div>
    <!-- MODAL DIALOG -->
</div>

<div class="modal fade" id="exampleModal<?= esc($group['id']) ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Class Change</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"> </button>
            </div>
            <div class="modal-body">
                <p><?= esc($group['studentname']) ?></p>
            </div>
        </div>
    </div>
</div>
<?php endforeach; ?>
<?php } ?>
					
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>					
<script>					
$(document).ready(function() {
    let autoSubmitted = false; // prevent multiple auto submits

    // Load standards on page load
    $.ajax({
        url: "<?= base_url('ajax/classlist') ?>", // Your API endpoint
        type: "GET",
        dataType: "json",
        success: function(data) {
            if (data.error) {
                alert(data.error);
                return;
            }

            let standards = [];
            let firstStandard = null;

            // Populate unique standards
            data.forEach(function(item) {
                if (!standards.includes(item.standard)) {
                    standards.push(item.standard);
                    $('#standard').append(`<option value="${item.standard}">${item.standard}</option>`);
                }
            });

            // Select first standard by default
            if (standards.length > 0) {
                firstStandard = standards[0];
                $('#standard').val(firstStandard).trigger('change'); // trigger change to load divisions
            }
        }
    });

    // When standard changes, load divisions
    $('#standard').on('change', function() {
        let selectedStandard = $(this).val();
        $('#division').html('<option value="">Choose Division</option>');

        $.ajax({
            url: "<?= base_url('ajax/classlist') ?>",
            type: "GET",
            dataType: "json",
            success: function(data) {
                let divisions = [];
                data.forEach(function(item) {
                    if (item.standard == selectedStandard && !divisions.includes(item.division)) {
                        divisions.push(item.division);
                        $('#division').append(`<option value="${item.division}">${item.division}</option>`);
                    }
                });

                // Auto-select first division if available
                if (divisions.length > 0) {
                    $('#division').val(divisions[0]);

                    // ✅ Auto submit only once
                    
                }
            }
        });
    });
});




</script>
<?php foreach ($groups as $group): ?>
<script>
$(document).ready(function() {
    let autoSubmitted = false; // prevent multiple auto submits

    // Load standards on page load
    $.ajax({
        url: "<?= base_url('ajax/classlist') ?>", // Your API endpoint
        type: "GET",
        dataType: "json",
        success: function(data) {
            if (data.error) {
                alert(data.error);
                return;
            }

            let standards = [];
            let firstStandard = null;

            // Populate unique standards
            data.forEach(function(item) {
                if (!standards.includes(item.standard)) {
                    standards.push(item.standard);
                    $('#standard').append(`<option value="${item.standard}">${item.standard}</option>`);
                }
            });

            
        }
    });

    // When standard changes, load divisions
    $('#standard<?= esc($group['id']) ?>').on('change', function() {
        let selectedStandard = $(this).val();
        $('#division<?= esc($group['id']) ?>').html('<option value="">Choose Division</option>');

        $.ajax({
            url: "<?= base_url('ajax/classlist') ?>",
            type: "GET",
            dataType: "json",
            success: function(data) {
                let divisions = [];
                data.forEach(function(item) {
                    if (item.standard == selectedStandard && !divisions.includes(item.division)) {
                        divisions.push(item.division);
                        $('#division<?= esc($group['id']) ?>').append(`<option value="${item.division}">${item.division}</option>`);
                    }
                });

                
            }
        });
    });
	
	
	
	// When standard changes, load divisions
    $(document).ready(function() {
    let selectedStandard = '<?= esc($group['standard']) ?>';
    let selectedDivision = '<?= esc($group['division']) ?>';
    let $division = $('#division<?= esc($group['id']) ?>');

    $division.html('<option value="">Choose Division</option>');

    $.ajax({
        url: "<?= base_url('ajax/classlist') ?>",
        type: "GET",
        dataType: "json",
        success: function(data) {
            let divisions = [];

            data.forEach(function(item) {
                if (item.standard == selectedStandard && !divisions.includes(item.division)) {
                    divisions.push(item.division);

                    // Append option and mark selected if it matches
                    let selectedAttr = (item.division === selectedDivision) ? 'selected' : '';
                    $division.append(`<option value="${item.division}" ${selectedAttr}>${item.division}</option>`);
                }
            });
        }
    });
});

	
	
	
});



</script>
<?php endforeach; ?>
					
                <?= $this->endSection() ?>