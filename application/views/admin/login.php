<!doctype html>
<html lang="en">
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
	<!-- loader-->
	<link href="<?php echo base_url() ?>assets/admin/css/pace.min.css" rel="stylesheet" />
	<script src="<?php echo base_url() ?>assets/admin/js/pace.min.js"></script>
	<!-- Bootstrap CSS -->
	<link href="<?php echo base_url() ?>assets/admin/css/bootstrap.min.css" rel="stylesheet">
	<link href="<?php echo base_url() ?>assets/admin/css/bootstrap-extended.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&amp;display=swap" rel="stylesheet">
	<link href="<?php echo base_url() ?>assets/admin/css/app.css" rel="stylesheet">
	<link href="<?php echo base_url() ?>assets/admin/css/icons.css" rel="stylesheet">
	<title>Gamenow</title>
</head>

<body class="bg-login">
	<!--wrapper-->
	<div class="wrapper">
		<div class="section-authentication-signin d-flex align-items-center justify-content-center my-5 my-lg-0">
			<div class="container-fluid">
				<div class="row row-cols-1 row-cols-lg-2 row-cols-xl-3">
					<div class="col mx-auto">
						
						<div class="card">
							<div class="card-body">
								<div class="border p-4 rounded">
									<div class="text-center">
										<img src="<?php echo base_url() ?>assets/admin/images/gamenow-logo.png" width="120" alt="" />
									</div>
									
									<div class="login-separater text-center mb-4"> <span>ADMIN DASHBOARD SIGN IN </span>
										<hr/>
									</div>
									
										<div class="row">
										   <div class="col-12">
												<?php if(@$this->session->flashdata('error')) { ?>
													<div class="alert alert-danger border-0 bg-danger alert-dismissible fade show py-2">
														<div class="d-flex align-items-center">
															<div class="font-35 text-white"><i class="bx bxs-message-square-x"></i>
															</div>
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
															<div class="font-35 text-white"><i class="bx bxs-check-circle"></i>
															</div>
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
									
									<div class="form-body">
										<form class="row g-3" action="<?php echo site_url('admin/processLogin') ?>" method="post">
											<div class="col-12">
												<label for="inputEmailAddress" class="form-label">Email Username</label>
												<input type="text" name="username" class="form-control" id="inputEmailAddress" placeholder="Email Username">
											</div>
											<div class="col-12">
												<label for="inputChoosePassword" class="form-label">Enter Password</label>
												<div class="input-group" id="show_hide_password">
													<input type="password" name="password" class="form-control border-end-0" id="inputChoosePassword" value="12345678" placeholder="Enter Password"> <a href="javascript:;" class="input-group-text bg-transparent"><i class='bx bx-hide'></i></a>
												</div>
											</div>
											<!--
											<div class="col-md-6">
												<div class="form-check form-switch">
													<input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" checked>
													<label class="form-check-label" for="flexSwitchCheckChecked">Remember Me</label>
												</div>
											</div>
											 <div class="col-md-6 text-end">	<a href="authentication-forgot-password.html">Forgot Password ?</a> 
											</div>
											
											-->
											
											
											<div class="col-12">
												<div class="d-grid">
													<button type="submit" class="btn btn-primary"><i class="bx bxs-lock-open"></i>Sign in</button>
												</div>
											</div>
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!--end row-->
			</div>
		</div>
	</div>
	<!--end wrapper-->
	<!-- Bootstrap JS -->
	<script src="<?php echo base_url() ?>assets/admin/js/bootstrap.bundle.min.js"></script>
	<!--plugins-->
	<script src="<?php echo base_url() ?>assets/admin/js/jquery.min.js"></script>
	<script src="<?php echo base_url() ?>assets/admin/plugins/simplebar/js/simplebar.min.js"></script>
	<script src="<?php echo base_url() ?>assets/admin/plugins/metismenu/js/metisMenu.min.js"></script>
	<script src="<?php echo base_url() ?>assets/admin/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
	<!--Password show & hide js -->
	<script>
		$(document).ready(function () {
			$("#show_hide_password a").on('click', function (event) {
				event.preventDefault();
				if ($('#show_hide_password input').attr("type") == "text") {
					$('#show_hide_password input').attr('type', 'password');
					$('#show_hide_password i').addClass("bx-hide");
					$('#show_hide_password i').removeClass("bx-show");
				} else if ($('#show_hide_password input').attr("type") == "password") {
					$('#show_hide_password input').attr('type', 'text');
					$('#show_hide_password i').removeClass("bx-hide");
					$('#show_hide_password i').addClass("bx-show");
				}
			});
		});
	</script>
	<!--app JS-->
	<script src="<?php echo base_url() ?>assets/admin/js/app.js"></script>
</body>
</html>