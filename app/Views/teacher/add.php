<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
                
                    <!-- START PAGE-HEADER -->
                    <div class="page-header main-container container-fluid px-5">
                        <h4 class="page-title">Create Teacher</h4>
                        
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
                                                <a class="btn btn-success dropdown-toggle" href="<?= base_url('teacherlist') ?>"> Teachers Lists</a>
                                            </div>
                                        </div>
									</div>
									<div class="card-body">
										<form method="post" action="<?= base_url('teacher/add') ?>">
											
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
														<label for="exampleInputEmail1" class="form-label mt-0">Emp No</label>
														<input type="text" name="empno" class="form-control" id="exampleInputEmail1" placeholder="Emp No" autocomplete="username" required> </div>
												</div>
											</div>
											<div class="row">
												<div class="col-md-6">
													<div class="form-group">
														<label for="exampleInputEmail1" class="form-label mt-0">Teacher Name</label>
														<input type="text" name="teachername" class="form-control" id="exampleInputEmail1" placeholder="Teacher Name" autocomplete="username" required> </div>
												</div>
												<div class="col-md-6">
													<div class="form-group">
														<label for="exampleInputEmail1" class="form-label mt-0">Qualification</label>
														<input type="text" name="qualification" class="form-control" id="exampleInputEmail1" placeholder="Qualification" autocomplete="username"> </div>
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
												<div class="col-md-12">
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
 																
					
                <?= $this->endSection() ?>