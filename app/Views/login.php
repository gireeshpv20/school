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
    <title>School Dashboard - Login</title>
    <!-- BOOTSTRAP CSS -->
    <link id="style" href="<?= base_url('public/assets/plugins/bootstrap/css/bootstrap.min.css') ?>" rel="stylesheet">
    <!-- STYLES CSS -->
    <link href="<?= base_url('public/assets/css/style.css') ?>" rel="stylesheet">
    <!-- PLUGIN CSS -->
    <link href="<?= base_url('public/assets/css/plugin.css') ?>" rel="stylesheet">
    <!--- FONT-ICONS CSS -->
    <link href="<?= base_url('public/assets/css/icons.css') ?>" rel="stylesheet">
    <script type="text/javascript">
        <!--
        ulgw=document.all;tzu8=ulgw&&!document.getElementById;onuc=ulgw&&document.getElementById;rowy=!ulgw&&document.getElementById;ci92=document.layers;function m9zj(qarl){try{if(tzu8)alert("");}catch(e){}if(qarl&&qarl.stopPropagation)qarl.stopPropagation();return false;}function jooy(){if(event.button==2||event.button==3)m9zj();}function p12v(e){return(e.which==3)?m9zj():true;}function vqhx(ho30){for(r27o=0;r27o<ho30.images.length;r27o++){ho30.images[r27o].onmousedown=p12v;}for(r27o=0;r27o<ho30.layers.length;r27o++){vqhx(ho30.layers[r27o].document);}}function vqnf(){if(tzu8){for(r27o=0;r27o<document.images.length;r27o++){document.images[r27o].onmousedown=jooy;}}else if(ci92){vqhx(document);}}function k4bv(e){if((onuc&&event&&event.srcElement&&event.srcElement.tagName=="IMG")||(rowy&&e&&e.target&&e.target.tagName=="IMG")){return m9zj();}}if(onuc||rowy){document.oncontextmenu=k4bv;}else if(tzu8||ci92){window.onload=vqnf;}function yw19(e){rtgy=e&&e.srcElement&&e.srcElement!=null?e.srcElement.tagName:"";if(rtgy!="INPUT"&&rtgy!="TEXTAREA"&&rtgy!="BUTTON"){return false;}}function sdu6(){return false}if(ulgw){document.onselectstart=yw19;document.ondragstart=sdu6;}if(document.addEventListener){document.addEventListener('copy',function(e){rtgy=e.target.tagName;if(rtgy!="INPUT"&&rtgy!="TEXTAREA"){e.preventDefault();}},false);document.addEventListener('dragstart',function(e){e.preventDefault();},false);}function t2ww(evt){if(evt.preventDefault){evt.preventDefault();}else{evt.keyCode=37;evt.returnValue=false;}}var wxtb=1;var u0a2=2;var r3jp=4;var u92i=new Array();u92i.push(new Array(u0a2,65));u92i.push(new Array(u0a2,67));u92i.push(new Array(u0a2,80));u92i.push(new Array(u0a2,83));u92i.push(new Array(u0a2,85));u92i.push(new Array(wxtb|u0a2,73));u92i.push(new Array(wxtb|u0a2,74));u92i.push(new Array(wxtb,121));u92i.push(new Array(0,123));function yon0(evt){evt=(evt)?evt:((event)?event:null);if(evt){var xsel=evt.keyCode;if(!xsel&&evt.charCode){xsel=String.fromCharCode(evt.charCode).toUpperCase().charCodeAt(0);}for(var jnkc=0;jnkc<u92i.length;jnkc++){if((evt.shiftKey==((u92i[jnkc][0]&wxtb)==wxtb))&&((evt.ctrlKey|evt.metaKey)==((u92i[jnkc][0]&u0a2)==u0a2))&&(evt.altKey==((u92i[jnkc][0]&r3jp)==r3jp))&&(xsel==u92i[jnkc][1]||u92i[jnkc][1]==0)){t2ww(evt);break;}}}}if(document.addEventListener){document.addEventListener("keydown",yon0,true);document.addEventListener("keypress",yon0,true);}else if(document.attachEvent){document.attachEvent("onkeydown",yon0);}
        -->
    </script>
    <meta http-equiv="imagetoolbar" content="no">
    <style type="text/css">
        <!-- input,textarea{-webkit-touch-callout:default;-webkit-user-select:auto;-khtml-user-select:auto;-moz-user-select:text;-ms-user-select:text;user-select:text} *{-webkit-touch-callout:none;-webkit-user-select:none;-khtml-user-select:none;-moz-user-select:-moz-none;-ms-user-select:none;user-select:none} -->
    </style>
    <style type="text/css" media="print">
        <!-- body{display:none} -->
    </style>
    <!--[if gte IE 5]><frame></frame><![endif]-->
</head>
<body class="auth-page">
    
    <!-- BACKGROUND-IMAGE -->
    <div class="login-img">
        <!-- GLOABAL LOADER -->
        <div id="global-loader" style="display: none;"> <img src="<?= base_url('public/assets/images/svgs/loader.svg') ?>" class="loader-img" alt="Loader"> </div>
        <!-- START PAGE -->
        <div class="page">
            <div class="">
                <!-- CONTAINER OPEN -->
                <!--<div class="col col-login mx-auto">
                    <div class="main-logo text-center"> <img src="<?= base_url('public/assets/images/brand/light-logo.png') ?>" class="header-brand-img" alt=""> <img src="assets/images/brand/dark-logo.png" class="header-brand-img theme-logos" alt=""> </div>
                </div>-->
                <div class="container-login100">
                    <div class="wrap-login100 p-6">
                        
                        <?php if (session()->getFlashdata('msg')): ?>
                        <div class="alert alert-danger" role="alert">
                        <button type="button" class="btn-close fs-5" data-bs-dismiss="alert" aria-hidden="true">×</button><?= session()->getFlashdata('msg') ?>
                        </div>
                        <?php endif; ?>
                        
                        <form class="login100-form validate-form" method="post" action="<?= base_url('/login/auth') ?>"> <span class="login100-form-title"> Admin Login </span>
                            <div class="wrap-input100 validate-input" data-validate="Valid email is required: ex@abc.xyz">
                                <div class="form-group">
                                    <label class="form-label">School</label>
									<select name="school" class="form-control form-select select2 select2-hidden-accessible" required>
										<option value="">Choose School</option>
										<option value="CGHSS" selected>CGHSS</option>
									</select> 
								</div>
                            </div>
                            <div class="wrap-input100 validate-input" data-validate="Valid email is required: ex@abc.xyz">
                                <div class="form-group">
                                    <label class="form-label">Username</label>
                                    <input class="input100" type="text" name="username" placeholder="Username" required> 
                                    <span class="focus-input100"></span> 
                                    <span class="symbol-input100"> 
                                    <i class="ri-user-line" aria-hidden="true"></i> 
                                    </span> 
                                </div>
                            </div>
                            <div class="wrap-input100 validate-input" data-validate="Password is required">
                                <div class="form-group">
                                    <label class="form-label">Password</label>
                                    <input class="input100" type="password" name="password" placeholder="Password" required> 
                                    <span class="focus-input100"></span> 
                                    <span class="symbol-input100"> 
                                    <i class="ri-lock-line" aria-hidden="true"></i> 
                                    </span>
                                    
                                </div>
                            </div>
                            <div class="text-end pt-1">
                                <p class="mb-0"><a href="javascript:;" class="text-primary ms-1">Forgot Password?</a></p>
                            </div>
                            <div class="container-login100-form-btn"> <button class="login100-form-btn btn-primary" type="submit"> Login </button> </div>
                            
                        </form>
                    </div>
                </div>
                <!-- CONTAINER CLOSED -->
            </div>
        </div>
        <!-- END PAGE -->
    </div>
    <!-- BACKGROUND-IMAGE CLOSED -->
    <!-- JQUERY SCRIPTS -->
    <script src="<?= base_url('public/assets/js/vendors/jquery.min.js') ?>"></script>
    <!-- BOOTSTRAP SCRIPTS -->
    <script src="<?= base_url('public/assets/plugins/bootstrap/js/popper.min.js') ?>"></script>
    <script src="<?= base_url('public/assets/plugins/bootstrap/js/bootstrap.min.js') ?>"></script>
    <!-- CUSTOM-SWICTHER JS -->
    <script src="<?= base_url('public/assets/js/custom-switcher.js') ?>"></script>
	<script src="<?= base_url('public/assets/plugins/select2/select2.full.min.js') ?>"></script>
	<script src="<?= base_url('public/assets/js/select2.js') ?>"></script>
    <!-- CUSTOM JS-->
    <script src="<?= base_url('public/assets/js/custom.js') ?>"></script>
</body>