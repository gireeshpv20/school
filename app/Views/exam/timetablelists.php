<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
                
                    <!-- START PAGE-HEADER -->
                    <div class="page-header main-container container-fluid px-5">
                        <h4 class="page-title">Time Table List</h4>
                        
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
										<form id="schoolForm" method="post" action="<?= base_url('timetablelist') ?>">
											
											<div class="row">
												<div class="col-md-3">
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
															<select name="examid" class="form-control form-select select2 select2-hidden-accessible" data-bs-placeholder="Select" tabindex="-1" aria-hidden="true" required>
																<option value="">Choose Exam</option>
																<?php foreach ($exams as $exam): ?>
																<option value="<?= esc($exam['id']) ?>" <?= ($exam['id'] == $examid) ? 'selected' : '' ?>><?= esc($exam['examname']) ?></option>
																<?php endforeach; ?>
															</select>
														</div>
													</div>
												</div>
												<div class="col-md-3">
													<div class="form-group">
														<div class="form-floating">
															<select name="classgroup" class="form-control form-select select2 select2-hidden-accessible" data-bs-placeholder="Select" tabindex="-1" aria-hidden="true" required>
																<option value="">Choose Class Group</option>
																<?php foreach ($class_groups as $class_group): ?>
																<option value="<?= esc($class_group['groupname']) ?>" <?= ($class_group['groupname'] == $classgroup) ? 'selected' : '' ?>><?= esc($class_group['groupname']) ?></option>
																<?php endforeach; ?>
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
                                        <h3 class="card-title">Class Group List</h3> </div>
                                    <div class="card-body">
                                        <div class="table-responsive export-table">
                                            <div id="file-datatable_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">
                                                
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <table id="file-datatable" class="table table-bordered text-nowrap key-buttons border-bottom dataTable no-footer" role="grid" aria-describedby="file-datatable_info">
                                                            <thead>
                                                                <tr>
																  <th>Sl No</th>
																  <th>Subject</th>
																  <th>Total Marks</th>
																  <th>Pass Marks</th>
																  <th>Actions</th>
																</tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php if (isset($_POST['schoolform'])) { $i=1;?>
																<?php foreach ($groups as $group): ?>
																  <tr>
																	<td><?= $i++; ?></td>
																	<td><?= esc($group['subject']) ?></td>
																	<td><?= esc($group['totalmarks']) ?></td>
																	<td><?= esc($group['passmarks']) ?></td>
																	<td>
																	    <div class="btn-list float-end1">
																	        <button title="View More" type="button" class="btn btn-sm btn-info-light" data-bs-toggle="modal" data-bs-target="#largeModal<?= $i; ?>" data-id="<?= $i; ?>"><i class="fa fa-eye fs-14"></i></button>
																	    </div>
																	</td>
																  </tr>
																<?php endforeach; ?>
																<?php } else{ $i=1;?>
																<?php foreach ($groups as $group): ?>
																  <tr>
																	<td><?= $i++; ?></td>
																	<td><?= esc($group['subject']) ?></td>
																	<td><?= esc($group['totalmarks']) ?></td>
																	<td><?= esc($group['passmarks']) ?></td>
																	<td>
																	    <div class="btn-list float-end1">
																	        <button title="View More" type="button" class="btn btn-sm btn-info-light" data-bs-toggle="modal" data-bs-target="#largeModal<?= $i; ?>" data-id="<?= $i; ?>"><i class="fa fa-eye fs-14"></i></button>
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
                
                <!-- END APP-CONTENT -->
<?php if (isset($_POST['schoolform'])) { $i=1;?>
<?php foreach ($groups as $group):  $i++; ?>                
<div id="largeModal<?= $i; ?>" class="modal fade" style="display: none;" aria-hidden="true">
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
							<td>School</td>
							<td><?= esc(session()->get('school')) ?></td>
							<td>Subject</td>
							<td><?= esc($group['subject']) ?></td>
						</tr>
						<tr class="border-bottom">
							<td>Total Marks</td>
							<td><?= esc($group['totalmarks']) ?></td>
							<td>Pass Marks</td>
							<td><?= esc($group['passmarks']) ?></td>
						</tr>
						<tr class="border-bottom">
							<td>Exam Date</td>
							<td><?= esc($group['examdate']) ?></td>
							<td>Exam Time</td>
							<td><?= esc($group['examtime']) ?></td>
						</tr>
						<tr class="border-bottom">
							<td>Class Group</td>
							<td><?= esc($group['classgroup']) ?></td>
							<td>Exam Marks</td>
							<td><?= esc($group['exammarks']) ?></td>
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
<?php endforeach; ?>
<?php } else { $i=1;?>
<?php foreach ($groups as $group): $i++; ?>                
<div id="largeModal<?= $i; ?>" class="modal fade" style="display: none;" aria-hidden="true">
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
							<td>School</td>
							<td><?= esc(session()->get('school')) ?></td>
							<td>Subject</td>
							<td><?= esc($group['subject']) ?></td>
						</tr>
						<tr class="border-bottom">
							<td>Total Marks</td>
							<td><?= esc($group['totalmarks']) ?></td>
							<td>Pass Marks</td>
							<td><?= esc($group['passmarks']) ?></td>
						</tr>
						<tr class="border-bottom">
							<td>Exam Date</td>
							<td><?= esc($group['examdate']) ?></td>
							<td>Exam Time</td>
							<td><?= esc($group['examtime']) ?></td>
						</tr>
						<tr class="border-bottom">
							<td>Class Group</td>
							<td><?= esc($group['classgroup']) ?></td>
							<td>Exam Marks</td>
							<td><?= esc($group['exammarks']) ?></td>
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
<?php endforeach; ?>
<?php } ?>

<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
<script>
$(document).on("click", ".btn-subjects", function () {
    var schoolid   = $(this).data("schoolid");
    var classgroup = $(this).data("classgroup");

    $.ajax({
        url: "<?= base_url('get-subjects'); ?>",
        type: "GET",
        data: { schoolid: schoolid, classgroup: classgroup },
        success: function (res) {
            $("#subjectsList").empty();

            if(res && res.length > 0){
                let table = `
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Subject</th>
                                <th>Total Marks</th>
                                <th>Pass Marks</th>
                                <th>Exam?</th>
                            </tr>
                        </thead>
                        <tbody>
                `;

                $.each(res, function(index, subj){
                    table += `
                        <tr>
                            <td>${subj.id}</td>
                            <td>${subj.subject}</td>
                            <td>${subj.totalmarks}</td>
                            <td>${subj.passmarks}</td>
                            <td>${subj.isexamid}</td>
                        </tr>
                    `;
                });

                table += `</tbody></table>`;

                $("#subjectsList").html(table);
            } else {
                $("#subjectsList").html("<p>No subjects found</p>");
            }

            var myModal = new bootstrap.Modal(document.getElementById('subjectsModal'));
            myModal.show();
        },
        error: function () {
            alert("Error fetching subjects");
        }
    });
});



$(document).on("click", ".btn-classes", function () {
    var schoolid   = $(this).data("schoolid");
    var classgroup = $(this).data("classgroup"); // this could also be classid if needed

    $.ajax({
        url: "<?= base_url('get-classes'); ?>",
        type: "GET",
        data: { schoolid: schoolid },
        success: function (res) {
            $("#classesList").empty();

            // Filter classes according to classgroup or classid
            let filtered = res.filter(cls => cls.classgroup == classgroup);

            if(filtered.length > 0){
                let table = `
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Standard</th>
                                <th>Division</th>
                                <th>Classgroup</th>
                            </tr>
                        </thead>
                        <tbody>
                `;

                $.each(filtered, function(index, cls){
                    table += `
                        <tr>
                            <td>${cls.classid}</td>
                            <td>${cls.standard}</td>
                            <td>${cls.division}</td>
                            <td>${cls.classgroup}</td>
                        </tr>
                    `;
                });

                table += `</tbody></table>`;

                $("#classesList").html(table);
            } else {
                $("#classesList").html("<p>No classes found</p>");
            }

            var myModal = new bootstrap.Modal(document.getElementById('classesModal'));
            myModal.show();
        },
        error: function () {
            alert("Error fetching classes");
        }
    });
});

</script>
            <?= $this->endSection() ?>