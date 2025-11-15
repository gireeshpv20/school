<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
                
<div class="page-header main-container container-fluid px-5">
    <h4 class="page-title">Create Student</h4>
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
                            <a class="btn btn-success dropdown-toggle" href="<?= base_url('studentlist') ?>"> Students Lists</a>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <!-- ✅ Added enctype for file upload -->
                    <form method="post" action="<?= base_url('student/add') ?>" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label mt-0">School</label>
                                    <select name="school" class="form-control form-select select2" required>
                                        <option value="">Choose School</option>
                                        <option value="CGHSS" selected>CGHSS</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label mt-0">Student Name</label>
                                    <input type="text" name="studentname" class="form-control" placeholder="Student Name" required>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label mt-0">Mobile</label>
                                    <input type="text" name="mobile" class="form-control" placeholder="Mobile" pattern="^[6-9][0-9]{9}$" required>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label mt-0">Gender</label>
                                    <select name="gender" class="form-control form-select select2" required>
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
                                    <label class="form-label mt-0">Standard</label>
                                    <select id="standard" name="standard" class="form-control form-select select2" required>
                                        <option value="">Choose Standard</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label mt-0">Division</label>
                                    <select id="division" name="division" class="form-control form-select select2" required>
                                        <option value="">Choose Division</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label mt-0">Roll No</label>
                                    <input type="text" name="rollno" class="form-control" placeholder="Roll No" pattern="\d{6}" maxlength="6" minlength="6" required>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label mt-0">Class No</label>
                                    <input type="text" name="classno" class="form-control" placeholder="Class No" required>
                                </div>
                            </div>
                        </div>

                        <!-- ✅ Added file upload field -->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label mt-0">Upload Student Image</label>
                                    <input type="file" name="filename" class="form-control" accept="image/*">
                                    <small class="text-muted">Allowed types: jpg, jpeg, png</small>
                                </div>
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
<script>
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
</script>

<?= $this->endSection() ?>
