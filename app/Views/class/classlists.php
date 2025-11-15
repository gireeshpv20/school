<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
                
                    <!-- START PAGE-HEADER -->
                    <div class="page-header main-container container-fluid px-5">
                        <h4 class="page-title">Class List</h4>
                        
                    </div>
                    <!-- END PAGE-HEADER -->
                    <!-- START MAIN-CONTAINER -->
                    <div class="main-container container-fluid">
                        
                        <div class="row">
							<div class="col-md-12 col-xl-12">
								<div class="card">
									<div class="card-header">
										<h4 class="card-title"></h4> </div>
									<div class="card-body">
										<form method="post" action="<?= base_url('classlist') ?>">
											
											<div class="row">
												<div class="col-md-3"></div>
												<div class="col-md-6">
													<div class="form-group">
														<div class="form-floating">
															<select name="schoolid" class="form-control form-select select2 select2-hidden-accessible" data-bs-placeholder="Select" tabindex="-1" aria-hidden="true" required>
																<option value="">Choose School</option>
																<option value="1" <?= ($schoolid == 1) ? 'selected' : '' ?>>CGHSS</option>
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
						
						
						
						<!-- START ROW-2 -->
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">Class List</h3> </div>
                                    <div class="card-body">
                                        <div class="table-responsive export-table">
                                            <div id="file-datatable_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">
                                                
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <table id="file-datatable" class="table table-bordered text-nowrap key-buttons border-bottom dataTable no-footer" role="grid" aria-describedby="file-datatable_info">
                                                            <thead>
                                                                <tr>
																  <th>Sl No</th>
																  <th>Class</th>
																  <th>Standard</th>
																  <th>Division</th>
																  <th>Teacher</th>
																  <th>A.C.Time</th>
																  <th>Action</th>
																</tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php if (isset($_POST['schoolform'])) { $i=1; ?>
																<?php foreach ($groups as $group): ?>
																  <tr>
																	<td><?= $i++; ?></td>
																	<td><?= esc($group['classid']) ?></td>
																	<td><?= esc($group['standard']) ?></td>
																	<td><?= esc($group['division']) ?></td>
																	<td><?= esc($group['teacher']) ?></td>
																	<td><?= esc($group['attendtime']) ?></td>
																	<td>
																	    <div class="btn-list float-end1">
																	        <button title="View More" type="button" class="btn btn-sm btn-info-light" data-bs-toggle="modal" data-bs-target="#largeModal<?= esc($group['classid']) ?>" data-id="<?= esc($group['classid']) ?>"><i class="fa fa-eye fs-14"></i></button>
																	        <button title="Edit" type="button" class="btn btn-sm btn-danger-light" data-bs-toggle="modal" data-bs-target="#largeModal1<?= esc($group['classid']) ?>" data-id="<?= esc($group['classid']) ?>"><i class="fa fa-edit fs-14"></i></button>
																	    </div>
																	</td>
																  </tr>
																<?php endforeach; ?>
																<?php } else { $i=1; ?>
																<?php foreach ($groups as $group): ?>
																  <tr>
																	<td><?= $i++; ?></td>
																	<td><?= esc($group['classid']) ?></td>
																	<td><?= esc($group['standard']) ?></td>
																	<td><?= esc($group['division']) ?></td>
																	<td><?= esc($group['teacher']) ?></td>
																	<td><?= esc($group['attendtime']) ?></td>
																	<td>
																	    <div class="btn-list float-end1">
																	        <button title="View More" type="button" class="btn btn-sm btn-info-light" data-bs-toggle="modal" data-bs-target="#largeModal<?= esc($group['classid']) ?>" data-id="<?= esc($group['classid']) ?>"><i class="fa fa-eye fs-14"></i></button>
																	        <button title="Edit" type="button" class="btn btn-sm btn-danger-light" data-bs-toggle="modal" data-bs-target="#largeModal1<?= esc($group['classid']) ?>" data-id="<?= esc($group['classid']) ?>"><i class="fa fa-edit fs-14"></i></button>
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
                
                
<?php  if (isset($_POST['schoolform'])) { ?>
<?php foreach ($groups as $group): ?>
  <div id="largeModal<?= esc($group['classid']) ?>" class="modal fade" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content ">
            <div class="modal-header pd-x-20">
                <h6 class="modal-title">Class Details</h6>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"> </button>
            </div>
            <div class="modal-body pd-20">
                <div class="table-responsive table-lg">
				<table class="table table-bordered mb-0 text-dark">
					<tbody>
						<tr class="border-bottom">
							<th>School</th>
							<td><?= esc(session()->get('school')) ?></td>
							<td>Teacher Name</td>
							<td><?= esc($group['teacher']) ?></td>
						</tr>
						<tr class="border-bottom">
							<td>Standard</td>
							<td><?= esc($group['standard']) ?></td>
							<td>Division</td>
							<td><?= esc($group['division']) ?></td>
						</tr>
						<tr class="border-bottom">
							<td>Class Group</td>
							<td><?= esc($group['classgroup']) ?></td>
							<td>Attend Time</td>
							<td><?= esc($group['attendtime']) ?></td>
						</tr>
						<tr class="border-bottom">
							<td>Attend Start Date</td>
							<td><?= esc($group['attendstartdt']) ?></td>
							<td>User Name</td>
							<td><?= esc(session()->get('username')) ?></td>
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

<div id="largeModal1<?= esc($group['classid']) ?>" class="modal fade" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content ">
            <div class="modal-header pd-x-20">
                <h6 class="modal-title">Class Update</h6>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"> </button>
            </div>
            <form method="post" action="<?= base_url('class/update/' . esc($group['classid'])) ?>">
            <div class="modal-body pd-20">
                <div class="table-responsive">
            <table class="table text-nowrap border text-md-nowrap mb-0 text-dark">
                <input type="hidden" name="studentid" value="<?= esc($group['classid']) ?>">
				<input type="hidden" name="teachername" class="form-control" id="teachername<?= esc($group['classid']) ?>" value="<?= esc($group['teacher']) ?>"  required>
				<input type="hidden" name="username" value="<?= session()->get('username'); ?>" class="form-control">
				<tbody>
                    <tr>    
						<td>School</td>
                        <td>
							<select name="schoolid" id="schoolid" class="form-control form-select select2" required>
								<option value="">Choose School</option>
								<option value="1" selected>CGHSS</option>
							</select>
						</td>
                    </tr>
					<tr>
                        <td>Teacher Name</td>
                        <td>
							<select id="teacherid<?= esc($group['classid']) ?>" name="teacherid" class="form-control form-select" required>
								<option value="">Choose Teacher</option>
							</select>
						</td>
                    </tr>
					<tr>    
						<td>Standard</td>
                        <td><input class="form-control" name="standard" value="<?= esc($group['standard']) ?>" required></td>
                    </tr>
					<tr>    
						<td>Division</td>
                        <td><input class="form-control" name="division" value="<?= esc($group['division']) ?>" required></td>
                    </tr>
					<tr>
                        <td>Class Group</td>
                        <td>
							<select id="classgroup<?= esc($group['classid']) ?>" name="classgroup" class="form-control form-select" required>
								<option value="">Choose Class Group</option>
							</select>
						</td>
                    </tr>
					<tr>    
						<td>Attend Time</td>
                        <td><input type="time" name="attendtime" class="form-control" value="<?= esc($group['attendtime']) ?>" required></td>
                    </tr>
					<tr>    
						<td>Attend Start Date</td>
                        <td><input class="form-control" type="date" name="attendstartdt" value="<?= esc(date('Y-m-d', strtotime($group['attendstartdt']))) ?>" required></td>
                    </tr>
                
                </tbody>
            </table>
        </div>
            </div>
            <!-- modal-body -->
            
    <div class="modal-footer">
        <button type="submit" name="schoolform" class="btn btn-primary">Save changes</button>
    </div>
    </form>
        </div>
    </div>
    <!-- MODAL DIALOG -->
</div>




<?php endforeach; ?>
<?php } else {?>
<?php foreach ($groups as $group): ?>
<div id="largeModal<?= esc($group['classid']) ?>" class="modal fade" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content ">
            <div class="modal-header pd-x-20">
                <h6 class="modal-title">Class Details</h6>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"> </button>
            </div>
            <div class="modal-body pd-20">
                <div class="table-responsive table-lg">
				<table class="table table-bordered mb-0 text-dark">
					<tbody>
						<tr class="border-bottom">
							<th>School</th>
							<td><?= esc(session()->get('school')) ?></td>
							<td>Teacher Name</td>
							<td><?= esc($group['teacher']) ?></td>
						</tr>
						<tr class="border-bottom">
							<td>Standard</td>
							<td><?= esc($group['standard']) ?></td>
							<td>Division</td>
							<td><?= esc($group['division']) ?></td>
						</tr>
						<tr class="border-bottom">
							<td>Class Group</td>
							<td><?= esc($group['classgroup']) ?></td>
							<td>Attend Time</td>
							<td><?= esc($group['attendtime']) ?></td>
						</tr>
						<tr class="border-bottom">
							<td>Attend Start Date</td>
							<td><?= esc($group['attendstartdt']) ?></td>
							<td>User Name</td>
							<td><?= esc(session()->get('username')) ?></td>
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


<div id="largeModal1<?= esc($group['classid']) ?>" class="modal fade" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content ">
            <div class="modal-header pd-x-20">
                <h6 class="modal-title">Class Update</h6>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"> </button>
            </div>
            <form method="post" action="<?= base_url('class/update/' . esc($group['classid'])) ?>">
            <div class="modal-body pd-20">
                <div class="table-responsive">
            <table class="table text-nowrap border text-md-nowrap mb-0 text-dark">
                <input type="hidden" name="studentid" value="<?= esc($group['classid']) ?>">
				<input type="hidden" name="teachername" class="form-control" id="teachername<?= esc($group['classid']) ?>" value="<?= esc($group['teacher']) ?>"  required>
				<input type="hidden" name="username" value="<?= session()->get('username'); ?>" class="form-control">
				<tbody>
                    <tr>    
						<td>School</td>
                        <td>
							<select name="schoolid" id="schoolid" class="form-control form-select select2" required>
								<option value="">Choose School</option>
								<option value="1" selected>CGHSS</option>
							</select>
						</td>
                    </tr>
					<tr>
                        <td>Teacher Name</td>
                        <td>
							<select id="teacherid<?= esc($group['classid']) ?>" name="teacherid" class="form-control form-select" required>
								<option value="">Choose Teacher</option>
							</select>
						</td>
                    </tr>
					<tr>    
						<td>Standard</td>
                        <td><input class="form-control" name="standard" value="<?= esc($group['standard']) ?>" required></td>
                    </tr>
					<tr>    
						<td>Division</td>
                        <td><input class="form-control" name="division" value="<?= esc($group['division']) ?>" required></td>
                    </tr>
					<tr>
                        <td>Class Group</td>
                        <td>
							<select id="classgroup<?= esc($group['classid']) ?>" name="classgroup" class="form-control form-select" required>
								<option value="">Choose Class Group</option>
							</select>
						</td>
                    </tr>
					<tr>    
						<td>Attend Time</td>
                        <td><input type="time" name="attendtime" class="form-control" value="<?= esc($group['attendtime']) ?>" required></td>
                    </tr>
					<tr>    
						<td>Attend Start Date</td>
                        <td><input class="form-control" type="date" name="attendstartdt" value="<?= esc(date('Y-m-d', strtotime($group['attendstartdt']))) ?>" required></td>
                    </tr>
					<tr>
                        <td>AC Year</td>
                        <td>
							<select name="acyear" id="acyear" class="form-control form-select select2" required>
								<option value="">Choose AC Year</option>
								<option value="2025-2026" selected>2025-2026</option>
							</select>
						</td>
                    </tr>
                
                </tbody>
            </table>
        </div>
            </div>
            <!-- modal-body -->
            
    <div class="modal-footer">
        <button type="submit" name="schoolform" class="btn btn-primary">Save changes</button>
    </div>
    </form>
        </div>
    </div>
    <!-- MODAL DIALOG -->
</div>

<?php endforeach; ?>
<?php } ?>				
				
				
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>	

<?php foreach ($groups as $group): ?>
<script>
$(document).ready(function() {
	
	
	$('#teacherid<?= esc($group['classid']) ?>').on('change', function() {
		var teacherText = $('#teacherid<?= esc($group['classid']) ?> option:selected').text();
		alert(teacherText);
		$('#teachername<?= esc($group['classid']) ?>').val(teacherText);
	});
	
	
    let classData = [];

    // Step 1: Load all classes
    $.ajax({
        url: "<?= base_url('ajax/classgroup') ?>",
        type: "GET",
        dataType: "json",
        success: function(data) {
            classData = data;

            // Populate Standard dropdown
            let groupnames = [];
            data.forEach(function(item) {
                if (!groupnames.includes(item.groupname)) {
                    groupnames.push(item.groupname);
                    $('#classgroup<?= esc($group['classid']) ?>').append(`<option value="${item.groupname}" ${item.groupname == "<?= esc($group['classgroup']) ?>" ? 'selected' : ''}>${item.groupname}</option>`);
                }
            });
        }
    });
	
	// Step 1: Load all Teachers
    $.ajax({
        url: "<?= base_url('ajax/get-teachers') ?>",
        type: "GET",
        dataType: "json",
        success: function(data) {
            classData = data;

            // Populate Standard dropdown
            let teachernames = [];
            data.forEach(function(item) {
                if (!teachernames.includes(item.teachername)) {
                    teachernames.push(item.teachername);
                    $('#teacherid<?= esc($group['classid']) ?>').append(`<option value="${item.id}" ${item.id == "<?= esc($group['teacherid']) ?>" ? 'selected' : ''}>${item.teachername}</option>`);
                }
            });
        }
    });

    // Step 2: When a standard is selected, populate Division dropdown
    $('#standard').on('change', function() {
        let selectedStandard = $(this).val();
        $('#division').html('<option value="">Choose Division</option>');
        $('#classgroup').html('<option value="">Choose Class Group</option>');

        let divisions = [];
        classData.forEach(function(item) {
            if (item.standard === selectedStandard && !divisions.includes(item.division)) {
                divisions.push(item.division);
                $('#division').append(`<option value="${item.division}">${item.division}</option>`);
            }
        });
    });

    // Step 3: When a division is selected, show corresponding class group
    $('#division').on('change', function() {
        let selectedStandard = $('#standard').val();
        let selectedDivision = $(this).val();

        $('#classgroup').html('<option value="">Choose Class Group</option>');

        classData.forEach(function(item) {
            if (item.standard === selectedStandard && item.division === selectedDivision) {
                $('#classgroup').append(`<option value="${item.classgroup}">${item.classgroup}</option>`);
            }
        });
    });
});




</script>
<?php endforeach; ?>
			
				
				
				
				
				
				<?= $this->endSection() ?>