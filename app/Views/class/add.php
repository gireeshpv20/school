<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
                
<div class="page-header main-container container-fluid px-5">
    <h4 class="page-title">Add Class</h4>
</div>

<div class="main-container container-fluid">
    <?php if ($error = session()->getFlashdata('error')): ?>
    <?php 
        // Try to decode JSON
        $decoded = json_decode($error, true);

        // If JSON contains 'error' key → show only that
        if (is_array($decoded) && isset($decoded['error'])) {
            $errorMessage = $decoded['error'];
        } 
        // If JSON contains 'message' key → show that
        elseif (is_array($decoded) && isset($decoded['message'])) {
            $errorMessage = $decoded['message'];
        } 
        // Otherwise show raw error text
        else {
            $errorMessage = $error;
        }
    ?>
    
    <div class="row">
        <div class="col-md-12 col-xl-12">
            <div class="alert alert-danger" role="alert">
                <button type="button" class="btn-close fs-5" data-bs-dismiss="alert" aria-hidden="true">×</button>
                <?= esc($errorMessage) ?>
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
                            <a class="btn btn-success dropdown-toggle" href="<?= base_url('classlist') ?>"> Class Lists</a>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <!-- ✅ Added enctype for file upload -->
                    <form method="post" action="<?= base_url('class/add') ?>" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label mt-0">School</label>
                                    <select name="schoolid" id="schoolid" class="form-control form-select select2" required>
                                        <option value="">Choose School</option>
                                        <option value="1" selected>CGHSS</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label mt-0">Teacher Name</label>
                                    <select id="teacherid" name="teacherid" class="form-control form-select select2" required>
                                        <option value="">Choose Teacher</option>
                                    </select>
                                </div>
                            </div>
                        </div>
						
						<div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label mt-0">Standard</label>
                                    <input type="text" name="standard" class="form-control" placeholder="Standard"  required>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label mt-0">Division</label>
                                    <input type="text" name="division" class="form-control" placeholder="Division"  required>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label mt-0">Class Group</label>
                                    <select id="classgroup" name="classgroup" class="form-control form-select select2" required>
										<option value="">Choose Class Group</option>
									</select>
                                </div>
                            </div>
							
							<div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label mt-0">Attend Time</label>
                                    <input type="time" name="attendtime" class="form-control" placeholder="Mobile"  required>
                                </div>
                            </div>

                            
                        </div>

                        

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label mt-0">Attend Start Date</label>
                                    <input type="date" name="attendstartdt" class="form-control" placeholder="Roll No">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label mt-0">AC Year</label>
                                    <select name="acyear" id="acyear" class="form-control form-select select2" required>
                                        <option value="">Choose AC Year</option>
                                        <option value="2025-2026" selected>2025-2026</option>
                                    </select>
                                </div>
                            </div>

                            
                        </div>

                        <div class="col-md-6">
                                <div class="form-group">
                                    <input type="hidden" name="teachername" class="form-control" id="teachername"  required>
									<input type="hidden" name="username" value="<?= session()->get('username'); ?>" class="form-control">
                                </div>
                            </div>

                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <button type="submit" name="schoolform" class="btn btn-primary mt-4 mb-0">Submit</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- AJAX: Standard/Division loader -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!--<script>
$(document).ready(function() {
    $.ajax({
        url: "<?= base_url('ajax/classlist') ?>",
        type: "GET",
        dataType: "json",
        success: function(data) {
            let standards = [];
            data.forEach(function(item) {
                if (!standards.includes(item.standard)) {
                    standards.push(item.standard);
                    $('#standard').append(`<option value="${item.standard}">${item.standard}</option>`);
                }
            });
        }
    });

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
</script>-->
<script>
$(document).ready(function() {
	
	
	$('#teacherid').on('change', function() {
		var teacherText = $('#teacherid option:selected').text();
		//alert(2);
		$('#teachername').val(teacherText);
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
                    $('#classgroup').append(`<option value="${item.groupname}">${item.groupname}</option>`);
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
                    $('#teacherid').append(`<option value="${item.id}">${item.teachername}</option>`);
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
<?= $this->endSection() ?>
