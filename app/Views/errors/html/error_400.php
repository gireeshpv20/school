<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <!-- Meta data -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <meta name="Description" content="Solic- Django Bootstrap Admin &amp; Dashboard Template">
    <meta content="Spruko Technologies Private Limited" name="author">
    <meta name="keywords" content="bootstrap 5 dashboard template, django admin panel, django bootstrap 5, dashboard, bootstrap admin, django admin dashboard, bootstrap 5 dashboard, admin dashboard template, django, admin dashboard, bootstrap admin dashboard, template django, django bootstrap">
    <!--favicon -->
    <link rel="icon" href="<?= base_url('public/assets/images/brand/favicon.ico') ?>" type="image/x-icon">
    <!-- TITLE -->
    <title>School - <?= lang('Errors.badRequest') ?></title>
    <!-- BOOTSTRAP CSS -->
    <link id="style" href="<?= base_url('public/assets/plugins/bootstrap/css/bootstrap.min.css') ?>" rel="stylesheet">
    <!-- STYLES CSS -->
    <link href="<?= base_url('public/assets/css/style.css') ?>" rel="stylesheet">
    <!-- PLUGIN CSS -->
    <link href="<?= base_url('public/assets/css/plugin.css') ?>" rel="stylesheet">
    <!--- FONT-ICONS CSS -->
    <link href="<?= base_url('public/assets/css/icons.css') ?>" rel="stylesheet">
</head>
<body class="auth-page">
    <div id="global-loader" style="display: none;"> <img src="<?= base_url('public/assets/images/svgs/loader.svg') ?>" class="loader-img" alt="Loader"> </div>
    <!-- START PAGE -->
    <div class="page">
        <!-- PAGE-CONTENT OPEN -->
        <div class="page-content error-page">
            <div class="container text-center">
                <div class="error-template">
                    <h1 class="display-1  mb-2">400<span class="text-muted fs-20">error</span></h1>
                    <h5 class="error-details">
                        <?php if (ENVIRONMENT !== 'production') : ?>
                            <?= nl2br(esc($message)) ?>
                        <?php else : ?>
                            <?= lang('Errors.sorryBadRequest') ?>
                        <?php endif; ?>
                    </h5>
                    <div class="text-center">
                        <a class="btn  btn-primary mt-5 mb-5" href="<?= base_url('dashboard') ?>"> <i class="fa fa-long-arrow-left"></i> Back to Home </a>
                    </div>
                </div>
            </div>
        </div>
        <!-- PAGE-CONTENT OPEN CLOSED -->
    </div>
    <!-- END PAGE -->
    <!-- JQUERY SCRIPTS -->
    <script src="<?= base_url('public/assets/js/vendors/jquery.min.js') ?>"></script
    <script src="<?= base_url('public/assets/plugins/bootstrap/js/popper.min.js') ?>"></script>
    <script src="<?= base_url('public/assets/plugins/bootstrap/js/bootstrap.min.js') ?>"></script>
    <script src="<?= base_url('public/assets/js/custom-switcher.js') ?>"></script>
    <script src="<?= base_url('public/assets/js/custom.js') ?>"></script>
</body>
