<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
                
                    <!-- START PAGE-HEADER -->
                    <div class="page-header main-container container-fluid px-5">
                        <h4 class="page-title">Create Student</h4>
                        
                    </div>
                    <!-- END PAGE-HEADER -->
                    <!-- START MAIN-CONTAINER -->
                    <div class="main-container container-fluid">
                        <?php if (session()->getFlashdata('error')): ?>
						<div class="row">
							<div class="col-md-12 col-xl-12">
								<div class="alert alert-success" role="alert">
									<button type="button" class="btn-close fs-5" data-bs-dismiss="alert" aria-hidden="true">×</button><?= session()->getFlashdata('error') ?>
								</div>
							</div>
						</div>
						<?php endif; ?>
						<div class="row">
							<div class="col-md-12 col-xl-12">
								<div class="card">
									<div class="card-header">
										<h4 class="card-title"></h4> 
										<div class="card-options">
                                            <div class="btn-group">
                                                <a class="btn btn-success dropdown-toggle" href="<?= base_url('studentlist') ?>"> Students Lists</a>
                                            </div>
                                        </div>
									</div>
									<div class="card-body">
										<form method="post" action="<?= base_url('student/add') ?>">
											<div class="row">
												<div class="col-md-6">
													<div class="form-group">
														<label for="exampleInputEmail1" class="form-label mt-0">School</label>
														<select name="school" class="form-control form-select select2 select2-hidden-accessible" data-bs-placeholder="Select" tabindex="-1" aria-hidden="true" required>
															<option value="">Choose School</option>
															<option value="CGHSS" selected>CGHSS</option>
														</select>
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group">
														<label for="exampleInputEmail1" class="form-label mt-0">Student Name</label>
														<input type="text" name="studentname" class="form-control" id="exampleInputEmail1" placeholder="Student Name" autocomplete="username" required> </div>
												</div>
											</div>
											<div class="row">
												<div class="col-md-6">
													<div class="form-group">
														<label for="exampleInputEmail1" class="form-label mt-0">Father Name</label>
														<input type="text" name="fathername" class="form-control" id="exampleInputEmail1" placeholder="Student Name" autocomplete="username" required> </div>
												</div>
												<div class="col-md-6">
													<div class="form-group">
														<label for="exampleInputEmail1" class="form-label mt-0">Mother Name</label>
														<input type="text" name="mothername" class="form-control" id="exampleInputEmail1" placeholder="Mother Name" autocomplete="username"> </div>
												</div>
											</div>
											<div class="row">
												<div class="col-md-6">
													<div class="form-group">
														<label for="exampleInputEmail1" class="form-label mt-0">Mobile</label>
														<input type="text" name="mobile" class="form-control" id="exampleInputEmail1" placeholder="Mobile" autocomplete="username" pattern="^[6-9][0-9]{9}$" required> </div>
												</div>
												<div class="col-md-6">
													<div class="form-group">
														<label for="exampleInputEmail1" class="form-label mt-0">Email</label>
														<input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email" autocomplete="username"> </div>
												</div>
											</div>
											<div class="row">
												
												<div class="col-md-6">
													<div class="form-group">
														<label for="exampleInputEmail1" class="form-label mt-0">DOB</label>
														<input type="date" name="dob" class="form-control" id="exampleInputEmail1" placeholder="Enter email" autocomplete="username" required> </div>
												</div>
												<div class="col-md-6">
													<div class="form-group">
														<label for="exampleInputEmail1" class="form-label mt-0">Gender</label>
														<select name="gender" class="form-control form-select select2 select2-hidden-accessible" data-bs-placeholder="Select" tabindex="-1" aria-hidden="true" required>
															<option value="">Choose Gender</option>
															<option value="Male">Male</option>
															<option value="Female">Female</option>
															<option value="Other">Other</option>
														</select>
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-md-6">
													<div class="form-group">
														<label for="exampleInputEmail1" class="form-label mt-0">Standard</label>
														<div class="form-floating">
															<select id="standard" name="standard" class="form-control form-select select2 select2-hidden-accessible" data-bs-placeholder="Select" tabindex="-1" aria-hidden="true" required>
																<option value="">Choose Standard</option>
															</select>
														</div>
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group">
														<label for="exampleInputEmail1" class="form-label mt-0">Division</label>
														<div class="form-floating">
															<select id="division" name="division" class="form-control form-select select2 select2-hidden-accessible" data-bs-placeholder="Select" tabindex="-1" aria-hidden="true" required>
																<option value="">Choose Division</option>
															</select>
														</div> 
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-md-6">
													<div class="form-group">
														<label for="exampleInputEmail1" class="form-label mt-0">Height</label>
														<input type="text" name="height" class="form-control" id="exampleInputEmail1" placeholder="Height" autocomplete="username" required> </div>
												</div>
												<div class="col-md-6">
													<div class="form-group">
														<label for="exampleInputEmail1" class="form-label mt-0">Weight</label>
														<input type="text" name="weight" class="form-control" id="exampleInputEmail1" placeholder="Weight" autocomplete="username"> </div>
												</div>
											</div>
											<div class="row">
											    <div class="col-md-6">
													<div class="form-group">
														<label for="exampleInputEmail1" class="form-label mt-0">Roll No</label>
														<input type="text" name="rollno" class="form-control" id="exampleInputEmail1" placeholder="Roll No" autocomplete="username"> </div>
												</div>
												<div class="col-md-6">
													<div class="form-group"> <div class="form-floating floating-label1"> <textarea name="address" class="form-control" placeholder="" id="floatingTextarea2" style="height: 100px"></textarea> <label for="floatingTextarea2">Address</label> </div> </div>
												</div>
												
											</div>
											
											
											
											<div class="row">
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
						
						
						
						
						
                        
                    </div>
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

                
            }
        });
    });
});




</script>
					
                <?= $this->endSection() ?>