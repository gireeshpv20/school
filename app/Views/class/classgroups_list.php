<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
                
                    <!-- START PAGE-HEADER -->
                    <div class="page-header main-container container-fluid px-5">
                        <h4 class="page-title">Class Group</h4>
                        
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
										<form id="schoolForm" method="post" action="<?= base_url('classgroup') ?>">
											
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
																  <th>Class</th>
																  <th>Standard</th>
																  <th>Group</th>
																  <th>Actions</th>
																</tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php if (isset($_POST['schoolform'])) { $i=1;?>
																<?php foreach ($groups as $group): ?>
																  <tr>
																	<td><?= $i++; ?></td>
																	<td><?= esc($group['classid']) ?></td>
																	<td><?= esc($group['standard']) ?></td>
																	<td><?= esc($group['groupname']) ?></td>
																	<td>
																	    <div class="btn-list float-end1">
																	        <a class="btn btn-sm btn-primary btn-subjects" href="javascript:void(0);" data-classgroup="<?= esc($group['groupname']) ?>" data-schoolid="<?= esc($schoolid) ?>"> Subjects</a>
																	        <a class="btn btn-sm btn-primary btn-classes" href="javascript:void(0);" data-classgroup="<?= esc($group['groupname']) ?>" data-schoolid="<?= esc($schoolid) ?>"> Class</a>
																	    </div>
																	</td>
																  </tr>
																<?php endforeach; ?>
																<?php } else{ $i=1;?>
																<?php foreach ($groups as $group): ?>
																  <tr>
																	<td><?= $i++; ?></td>
																	<td><?= esc($group['classid']) ?></td>
																	<td><?= esc($group['standard']) ?></td>
																	<td><?= esc($group['groupname']) ?></td>
																	<td>
																	    <div class="btn-list float-end1">
																	        <a class="btn btn-sm btn-primary btn-subjects" href="javascript:void(0);" data-classgroup="<?= esc($group['groupname']) ?>" data-schoolid="<?= esc($schoolid) ?>"> Subjects</a>
																	        <a class="btn btn-sm btn-primary btn-classes" href="javascript:void(0);" data-classgroup="<?= esc($group['groupname']) ?>" data-schoolid="<?= esc($schoolid) ?>"> Class</a>
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
                
<!-- Subjects Modal -->
<div class="modal fade" id="subjectsModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Subjects</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body" id="subjectsList">
        <!-- Subjects will load here -->
      </div>
    </div>
  </div>
</div>  

<!-- Class Modal -->
<div class="modal fade" id="classesModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Class</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body" id="classesList">
        <!-- Subjects will load here -->
      </div>
    </div>
  </div>
</div>
                
				
				
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