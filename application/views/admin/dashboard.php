<!doctype html>
<html lang="en" class="color-sidebar sidebarcolor8">
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--favicon-->
	<link rel="icon" href="<?php echo base_url() ?>assets/admin/images/favicon-32x32.png" type="image/png" />
	<!--plugins-->
	<link href="<?php echo base_url() ?>assets/admin/plugins/vectormap/jquery-jvectormap-2.0.2.css" rel="stylesheet"/>
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
	<!-- Theme Style CSS -->
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/admin/css/dark-theme.css" />
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/admin/css/semi-dark.css" />
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/admin/css/header-colors.css" />
	<title>ADMIN DASHBOARD | GAMENOW</title>
</head>

<body>


	<!--wrapper-->
	<div class="wrapper">
		
		<!--  for left-sidebar and top-header part -->
		<?php include('sidebar.php'); ?>
	
		
		<!--start page wrapper -->
		<div class="page-wrapper">
			<div class="page-content">
				<div class="row row-cols-1 row-cols-md-2 row-cols-xl-4">
                   <div class="col">
					 <div class="card radius-10 bg-warning bg-gradient">
							<div class="card-body">
								<div class="d-flex align-items-center">
									<div>
										<p class="mb-0 text-dark">Total Partners</p>
										<h4 class="text-dark my-1">05</h4>
									</div>
									<div class="text-dark ms-auto font-35"><i class="bx bx-user-pin"></i>
									</div>
								</div>
							</div>
						</div>
					
				   </div>
				  
				  <div class="col">
					<div class="card radius-10 bg-success bg-gradient">
						<div class="card-body">
							<div class="d-flex align-items-center">
								<div>
									<p class="mb-0 text-light">Total Games</p>
									<h4 class="text-light my-1">2,450 </h4>
								</div>
								<div class="text-white ms-auto font-35"><i class="lni lni-game"></i>
								</div>
							</div>
						</div>
					</div>
					
					
				  </div>
				
				</div><!--end row-->

			
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
	<script src="<?php echo base_url() ?>assets/admin/plugins/vectormap/jquery-jvectormap-2.0.2.min.js"></script>
    <script src="<?php echo base_url() ?>assets/admin/plugins/vectormap/jquery-jvectormap-world-mill-en.js"></script>
	<script src="<?php echo base_url() ?>assets/admin/plugins/chartjs/js/Chart.min.js"></script>
	<script src="<?php echo base_url() ?>assets/admin/plugins/chartjs/js/Chart.extension.js"></script>
	<script src="<?php echo base_url() ?>assets/admin/js/index.js"></script>
	<!--app JS-->
	<script src="<?php echo base_url() ?>assets/admin/js/app.js"></script>
</body>
</html>