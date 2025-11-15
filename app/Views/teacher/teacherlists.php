<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
                
                    <!-- START PAGE-HEADER -->
                    <div class="page-header main-container container-fluid px-5">
                        <h4 class="page-title">Teachers</h4>
                        
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
                                                <a class="btn btn-success dropdown-toggle" href="<?= base_url('teacher/add') ?>"> Create Teacher</a>
                                            </div>
                                        </div>
									</div>
									<div class="card-body">
										<form method="post" action="<?= base_url('teacherlist') ?>">
											
											<div class="row">
												<div class="col-md-3"></div>
												<div class="col-md-6">
													<div class="form-group">
														<div class="form-floating">
															<select name="schoolid" class="form-control form-select select2 select2-hidden-accessible" data-bs-placeholder="Select" tabindex="-1" aria-hidden="true" required>
																<option value="">Choose School</option>
																<option value="CGHSS" <?= ($schoolid == 'CGHSS') ? 'selected' : '' ?>>CGHSS</option>
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
                                        <h3 class="card-title">Teachers List</h3> </div>
                                    <div class="card-body">
                                        <div class="table-responsive export-table">
                                            <div id="file-datatable_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">
                                                
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <table id="file-datatable" class="table table-bordered text-nowrap key-buttons border-bottom dataTable no-footer" role="grid" aria-describedby="file-datatable_info">
                                                            <thead>
                                                                <tr>
																  <th>Sl No</th>
																  <th>School Id</th>
																  <th>Emp No</th>
																  <th>Name</th>
																  <th>Actions</th>
																</tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php if (isset($_POST['schoolform'])) { $i=1; ?>
																<?php foreach ($groups as $group): ?>
																  <tr>
																	<td><?= $i++; ?></td>
																	<td><?= esc($group['schoolid']) ?></td>
																	<td><?= esc($group['empno']) ?></td>
																	<td><?= esc($group['teachername']) ?></td>
																	<td>
																	    <div class="btn-list float-end1">
																	        <button type="button" class="btn btn-sm btn-success-light" data-bs-toggle="modal" data-bs-target="#exampleModal<?= esc($group['id']) ?>" data-id="<?= esc($group['id']) ?>"><i class="fa fa-eye fs-14"></i></button>
																	        <button type="button" class="btn btn-sm btn-danger-light" data-bs-toggle="modal" data-bs-target="#exampleModal1<?= esc($group['id']) ?>" data-id="<?= esc($group['id']) ?>"><i class="fa fa-edit fs-14"></i></button>
																	    </div>
																	</td>
																  </tr>
																<?php endforeach; ?>
																<?php } else { $i=1; ?>
																<?php foreach ($groups as $group): ?>
																  <tr>
																	<td><?= $i++; ?></td>
																	<td><?= esc($group['schoolid']) ?></td>
																	<td><?= esc($group['empno']) ?></td>
																	<td><?= esc($group['teachername']) ?></td>
																	<td>
																	    <div class="btn-list float-end1">
																	        <button type="button" class="btn btn-sm btn-success-light" data-bs-toggle="modal" data-bs-target="#exampleModal<?= esc($group['id']) ?>" data-id="<?= esc($group['id']) ?>"><i class="fa fa-eye fs-14"></i></button>
																	        <button type="button" class="btn btn-sm btn-danger-light" data-bs-toggle="modal" data-bs-target="#exampleModal1<?= esc($group['id']) ?>" data-id="<?= esc($group['id']) ?>"><i class="fa fa-edit fs-14"></i></button>
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
 <?php if (isset($_POST['schoolform'])) { ?>
<?php foreach ($groups as $group): ?>                   <!-- END MAIN-CONTAINER -->
					
	<div class="modal fade" id="exampleModal<?= esc($group['id']) ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Teacher Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"> </button>
            </div>
            <div class="modal-body">
                <div class="table-responsive">
    <table class="table text-nowrap border text-md-nowrap mb-0 text-dark">
        <tbody>
            <tr class="border-bottom">
                <td>Name</td>
                <td><?= esc($group['teachername']) ?></td>
            </tr>
            <tr class="border-bottom">
                <td>School</td>
                <td><?= esc($group['schoolname']) ?></td>
            </tr>
            <tr class="border-bottom">
                <td>Emp No</td>
                <td><?= esc($group['empno']) ?></td>
            </tr>
            <tr class="border-bottom">
                <td>Qualification</td>
                <td><?= esc($group['qualification']) ?></td>
            </tr>
            <tr class="border-bottom">
                <td>Mobile</td>
                <td><?= esc($group['mobile']) ?></td>
            </tr>
            <tr class="border-bottom">
                <td>Address</td>
                <td><?= esc($group['address']) ?></td>
            </tr>
            <tr class="border-bottom">
                <td>Email</td>
                <td><?= esc($group['emailid']) ?></td>
            </tr>
            <tr class="border-bottom">
                <td>DOB</td>
                <td><?= esc($group['dob']) ?></td>
            </tr>
            <tr class="border-bottom">
                <td>Gender</td>
                <td><?= esc($group['gender']) ?></td>
            </tr>
        </tbody>
    </table>
</div>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="exampleModal1<?= esc($group['id']) ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Teacher Update</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"> </button>
            </div>
            <form method="post" action="<?= base_url('teacher/update/' . esc($group['id'])) ?>">
    <div class="modal-body">
        <div class="table-responsive">
            <table class="table text-nowrap border text-md-nowrap mb-0 text-dark">
                <input type="hidden" name="teacherid" value="<?= esc($group['id']) ?>">
				<input type="hidden" name="schoolid" value="<?= esc($group['schoolid']) ?>">
				<tbody>
                    <tr>
                        <td>Name</td>
                        <td><input class="form-control" name="teachername" value="<?= esc($group['teachername']) ?>" required></td>
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
                        <td>Emp No</td>
                        <td><input class="form-control" name="empno" value="<?= esc($group['empno']) ?>" required></td>
                    </tr>
                    <tr>
                        <td>Qualification</td>
                        <td><input class="form-control" name="qualification" value="<?= esc($group['qualification']) ?>"></td>
                    </tr>
                    <tr>
                        <td>Mobile</td>
                        <td><input class="form-control" name="mobile" value="<?= esc($group['mobile']) ?>" pattern="^[6-9][0-9]{9}$" required></td>
                    </tr>
                    <tr>
                        <td>Address</td>
                        <td><textarea class="form-control" name="address"><?= esc($group['address']) ?></textarea></td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td><input type="email" class="form-control" name="email" value="<?= esc($group['emailid']) ?>"></td>
                    </tr>
                    <tr>
                        <td>DOB</td> <?php     $dob1 = isset($group['dob']) ? substr($group['dob'], 0, 10) : ''; ?>
                        <td><input type="date" class="form-control" name="dob" value="<?= esc($dob1) ?>" required></td>
                    </tr>
                    <tr>
                        <td>Gender</td>
                        <td>
							<select name="gender" class="form-control form-select" required>
								<option value="">Choose Gender</option>
								<option value="Male" <?= esc($group['gender'])=='Male' ? 'selected' : '' ?>>Male</option>
								<option value="Female" <?= esc($group['gender'])=='Female' ? 'selected' : '' ?>>Female</option>
								<option value="Other" <?= esc($group['gender'])=='Other' ? 'selected' : '' ?>>Other</option>
							</select>
						</td>
                    </tr>
                    <tr>
                        <td>Status</td>
                        <td>
                            <select name="status" class="form-control form-select" required>
                                <option value="">Choose Status</option>
                                <option value="Active" <?= esc($group['status'])=='Active' ? 'selected' : '' ?>>Active</option>
                                <option value="Inactive" <?= esc($group['status'])=='Inactive' ? 'selected' : '' ?>>Inactive</option>
                            </select>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Save changes</button>
    </div>
</form>
        </div>
    </div>
</div>






					
<?php endforeach; ?>
<?php } else { ?>
<?php foreach ($groups as $group): ?>

<div class="modal fade" id="exampleModal<?= esc($group['id']) ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Teacher Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"> </button>
            </div>
            <div class="modal-body">
                <div class="table-responsive">
    <table class="table text-nowrap border text-md-nowrap mb-0 text-dark">
        <tbody>
            <tr class="border-bottom">
                <td>Name</td>
                <td><?= esc($group['teachername']) ?></td>
            </tr>
            <tr class="border-bottom">
                <td>School</td>
                <td><?= esc($group['schoolname']) ?></td>
            </tr>
            <tr class="border-bottom">
                <td>Emp No</td>
                <td><?= esc($group['empno']) ?></td>
            </tr>
            <tr class="border-bottom">
                <td>Qualification</td>
                <td><?= esc($group['qualification']) ?></td>
            </tr>
            <tr class="border-bottom">
                <td>Mobile</td>
                <td><?= esc($group['mobile']) ?></td>
            </tr>
            <tr class="border-bottom">
                <td>Address</td>
                <td><?= esc($group['address']) ?></td>
            </tr>
            <tr class="border-bottom">
                <td>Email</td>
                <td><?= esc($group['emailid']) ?></td>
            </tr>
            <tr class="border-bottom">
                <td>DOB</td>
                <td><?= esc($group['dob']) ?></td>
            </tr>
            <tr class="border-bottom">
                <td>Gender</td>
                <td><?= esc($group['gender']) ?></td>
            </tr>
        </tbody>
    </table>
</div>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="exampleModal1<?= esc($group['id']) ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Teacher Update</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"> </button>
            </div>
            <form method="post" action="<?= base_url('teacher/update/' . esc($group['id'])) ?>">
    <div class="modal-body">
        <div class="table-responsive">
            <table class="table text-nowrap border text-md-nowrap mb-0 text-dark">
                <input type="hidden" name="teacherid" value="<?= esc($group['id']) ?>">
				<input type="hidden" name="schoolid" value="<?= esc($group['schoolid']) ?>">
				<tbody>
                    <tr>
                        <td>Name</td>
                        <td><input class="form-control" name="teachername" value="<?= esc($group['teachername']) ?>" required></td>
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
                        <td>Emp No</td>
                        <td><input class="form-control" name="empno" value="<?= esc($group['empno']) ?>" required></td>
                    </tr>
                    <tr>
                        <td>Qualification</td>
                        <td><input class="form-control" name="qualification" value="<?= esc($group['qualification']) ?>"></td>
                    </tr>
                    <tr>
                        <td>Mobile</td>
                        <td><input class="form-control" name="mobile" value="<?= esc($group['mobile']) ?>" pattern="^[6-9][0-9]{9}$" required></td>
                    </tr>
                    <tr>
                        <td>Address</td>
                        <td><textarea class="form-control" name="address"><?= esc($group['address']) ?></textarea></td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td><input type="email" class="form-control" name="email" value="<?= esc($group['emailid']) ?>"></td>
                    </tr>
                    <tr>
                        <td>DOB</td> <?php     $dob1 = isset($group['dob']) ? substr($group['dob'], 0, 10) : ''; ?>
                        <td><input type="date" class="form-control" name="dob" value="<?= esc($dob1) ?>" required></td>
                    </tr>
                    <tr>
                        <td>Gender</td>
                        <td>
							<select name="gender" class="form-control form-select" required>
								<option value="">Choose Gender</option>
								<option value="Male" <?= esc($group['gender'])=='Male' ? 'selected' : '' ?>>Male</option>
								<option value="Female" <?= esc($group['gender'])=='Female' ? 'selected' : '' ?>>Female</option>
								<option value="Other" <?= esc($group['gender'])=='Other' ? 'selected' : '' ?>>Other</option>
							</select>
						</td>
                    </tr>
                    <tr>
                        <td>Status</td>
                        <td>
                            <select name="status" class="form-control form-select" required>
                                <option value="">Choose Status</option>
                                <option value="Active" <?= esc($group['status'])=='Active' ? 'selected' : '' ?>>Active</option>
                                <option value="Inactive" <?= esc($group['status'])=='Inactive' ? 'selected' : '' ?>>Inactive</option>
                            </select>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Save changes</button>
    </div>
</form>
        </div>
    </div>
</div>

	
<?php endforeach; ?>
<?php } ?>																
					
                <?= $this->endSection() ?>