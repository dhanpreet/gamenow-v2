<!doctype html>
<html lang="en" class="color-sidebar sidebarcolor8">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--favicon-->
    <link rel="icon" href="<?php echo base_url() ?>assets/admin/images/favicon-32x32.png" type="image/png" />
    <!--plugins-->
    <link href="<?php echo base_url() ?>assets/admin/plugins/simplebar/css/simplebar.css" rel="stylesheet" />
    <link href="<?php echo base_url() ?>assets/admin/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" />
    <link href="<?php echo base_url() ?>assets/admin/plugins/metismenu/css/metisMenu.min.css" rel="stylesheet" />
    <link href="<?php echo base_url() ?>assets/admin/plugins/datatable/css/dataTables.bootstrap5.min.css" rel="stylesheet" />
    <!-- loader-->
    <link href="<?php echo base_url() ?>assets/admin/css/pace.min.css" rel="stylesheet" />
    <script src="<?php echo base_url() ?>assets/admin/js/pace.min.js"></script>
    <!-- Bootstrap CSS -->
    <link href="<?php echo base_url() ?>assets/admin/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>assets/admin/css/bootstrap-extended.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&amp;display=swap" rel="stylesheet">
    <link href="<?php echo base_url() ?>assets/admin/css/app.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>assets/admin/css/icons.css" rel="stylesheet">
    <!-- Theme Style CSS -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/admin/css/dark-theme.css" />
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/admin/css/semi-dark.css" />
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/admin/css/header-colors.css" />
    <title>ADVERTISEMENTS | GAMENOW</title>
</head>

<body>
<!--wrapper-->
<div class="wrapper">

    <!--  for left-sidebar and top-header part -->
    <?php include('sidebar.php'); ?>	
		
    <!--start page wrapper -->
    <div class="page-wrapper">
        <div class="page-content">
            <!--breadcrumb-->
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">Advertisements</div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item"><a href="<?php echo site_url('Admin/Home') ?>"><i class="bx bx-home-alt"></i></a></li>
                            <li class="breadcrumb-item"><a href="<?php echo site_url('Admin/Advertisements') ?>">Manage Advertisements</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Update Advertisement</li>
                        </ol>
                    </nav>
                </div>
                <div class="ms-auto">
                    <a href="<?php echo site_url('Admin/Advertisements') ?>" class="btn btn-sm btn-outline-secondary radius-30"><i class="lni lni-chevron-left mr-1 font-16"></i> Back </a>
                </div>
            </div>
            <!--end breadcrumb-->

            <br><br>
            <h6 class="mb-0 text-uppercase">Update Advertisement Information</h6>
            <hr/>
            <div class="card">
                <div class="card-body">	
                    <div class="row">
                        <div class="col-12">
                            <?php if(@$this->session->flashdata('error')) { ?>
                                <div class="alert alert-danger border-0 bg-danger alert-dismissible fade show py-2">
                                    <div class="d-flex align-items-center">
                                        <div class="font-35 text-white"><i class="bx bxs-message-square-x"></i></div>
                                        <div class="ms-3">
                                            <h6 class="mb-0 text-white">Error!</h6>
                                            <div class="text-white"><?php echo $this->session->flashdata('error'); ?></div>
                                        </div>
                                    </div>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            <?php } ?>
								
                            <?php if(@$this->session->flashdata('success')) { ?>
                                <div class="alert alert-success border-0 bg-success alert-dismissible fade show py-2">
                                    <div class="d-flex align-items-center">
                                        <div class="font-35 text-white"><i class="bx bxs-check-circle"></i></div>
                                        <div class="ms-3">
                                            <h6 class="mb-0 text-white">Success!</h6>
                                            <div class="text-white"><?php echo $this->session->flashdata('success'); ?></div>
                                        </div>
                                    </div>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            <?php } ?>
                        </div>
                    </div> 
					
                    <div class="row">
                        <div class="col-12">						
                            <br><br>
                            <form action="<?php echo site_url('Admin/saveAdvertisement/'.base64_encode($info['id'])) ?>" method="post" class="row g-3 px-3 needs-validation" novalidate autocomplete="new-password">

                            <div class="row mb-4">
                                <label for="ad_text_main" class="col-sm-4 col-form-label">Advertisement Text Main</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="ad_text_main" id="ad_text_main" value="<?php echo $info['ad_text_main']; ?> " autocomplete="new-password" required />
                                    <span id="ad_text_main_error_hint" class="text-danger mt-1"></span>
                                </div>
                            </div>
														
                            <div class="row mb-4">
                                <label for="ad_text_mini" class="col-sm-4 col-form-label">Advertisement Text Mini</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="ad_text_mini" id="ad_text_main" value="<?php echo $info['ad_text_mini']; ?> " autocomplete="new-password" required />
                                    <span id="ad_text_mini_error_hint" class="text-danger mt-1"></span>
                                </div>
                            </div>
                                
                            <div class="row mb-4">
                                <label for="ad_btn_text" class="col-sm-4 col-form-label">Advertisement Button Text</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="ad_btn_text" id="ad_btn_text" value="<?php echo $info['ad_btn_text']; ?> " autocomplete="new-password" required />
                                    <span id="ad_btn_text_error_hint" class="text-danger mt-1"></span>
                                </div>
                            </div>
														
                            <div class="row mb-4">
                                <label for="ad_action_text" class="col-sm-4 col-form-label">Advertisement Action Text</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="ad_action_text" id="ad_action_text" value="<?php echo $info['ad_action_text']; ?> " autocomplete="new-password" />
                                    <span id="ad_action_text_error_hint" class="text-danger mt-1"></span>
                                </div>
                            </div>
						
                            <div class="row mb-4">
                                <label for="ad_link" class="col-sm-4 col-form-label">Advertisement Link</label>
                                <div class="col-sm-8">
                                    <input type="url" class="form-control" value="<?php echo $info['ad_link'] ; ?>" name="ad_link" id="ad_link" autocomplete="new-password" required />
                                    <span id="ad_link_error_hint" class="text-danger mt-1"></span>
                                </div>
                            </div>
		
                            <div class="row mb-5">
                                <label class="col-sm-4 col-form-label"> Status</label>
                                <div class="col-sm-8">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <input class="form-check-input" type="radio" name="status" id="radio-1" value="1" <?php if($info['status']==1) echo 'checked'; ?>/>
                                            <label class="form-check-label" for="radio-3">Active</label>
                                        </div>

                                        <div class="col-sm-6">
                                            <input class="form-check-input" type="radio" name="status" id="radio-2" value="0" <?php if($info['status']==0) echo 'checked'; ?>/>
                                            <label class="form-check-label" for="radio-4">Inactive</label>
                                        </div>										
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-4">
                                <div class="col-sm-12 text-center">
                                    <button type="submit" class="col-4 btn btn-success radius-30">Update Advertisement</button>
                                </div>
                            </div>							
                        </form>					
                    </div>
                </div>					
            </div>
        </div>
    </div>
    <!--end page wrapper -->
		
    <!--  For Footer section part -->
    <?php include ('footer.php'); ?>
		
</div>
<!--end wrapper-->
		
<!-- Bootstrap JS -->
<script src="<?php echo base_url() ?>assets/admin/js/bootstrap.bundle.min.js"></script>
<!--plugins-->
<script src="<?php echo base_url() ?>assets/admin/js/jquery.min.js"></script>
<script src="<?php echo base_url() ?>assets/admin/plugins/simplebar/js/simplebar.min.js"></script>
<script src="<?php echo base_url() ?>assets/admin/plugins/metismenu/js/metisMenu.min.js"></script>
<script src="<?php echo base_url() ?>assets/admin/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>

<script>
    window.setTimeout(function() {
        $(".alert").fadeTo(500, 0).slideUp(500, function(){
            $(this).remove(); 
        });
    }, 5000);

    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (function () {
      'use strict'

      // Fetch all the forms we want to apply custom Bootstrap validation styles to
      var forms = document.querySelectorAll('.needs-validation')

      // Loop over them and prevent submission
      Array.prototype.slice.call(forms)
            .forEach(function (form) {
              form.addEventListener('submit', function (event) {
                    if (!form.checkValidity()) {
                      event.preventDefault()
                      event.stopPropagation()
                    }

                    form.classList.add('was-validated')
              }, false)
            })
    })()
</script>
<!--app JS-->
<script src="<?php echo base_url() ?>assets/admin/js/app.js"></script>
</body>
</html>