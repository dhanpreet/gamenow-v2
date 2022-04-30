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
	<!-- Dropify Style CSS -->
	
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/admin/dropify/dist/css/dropify.css">
	<style>
		span.file-icon > p{

			font-size:15px !important;
		}
	</style>
	<title>GAMES IMAGES | GAMENOW</title>
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
					<div class="breadcrumb-title pe-3">Tournament's Images</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="<?php echo site_url('Admin/Home') ?>"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item"><a href="<?php echo site_url('Admin/Tournaments') ?>"> Manage Tournaments</a></li>
								<li class="breadcrumb-item active" aria-current="page">Manage Tournaments Images</li>
							</ol>
						</nav>
					</div>
					<div class="ms-auto">
						<a href="<?php echo site_url('Admin/Tournaments') ?>" class="btn btn-sm btn-outline-secondary radius-30"><i class="lni lni-chevron-left mr-1 font-16"></i> Back </a>
					</div>
				</div>
				<!--end breadcrumb-->
				
				<br><br>
				<h6 class="mb-0 text-uppercase">Tournament: <span class="text-danger"><?php echo $tournamentInfo['tournament_name']; ?></span></h6>
				<hr/>
				
						
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
					
					
				
							<br>
							<!-- <div class="row row-cols-1 row-cols-md-1 row-cols-lg-1 row-cols-xl-1">
								<div class=" text-end">
									<button type="submit" id="upload-data" class="btn btn-outline-secondary radius-30"> <i class="lni lni-upload mr-1"></i> Upload & Save Images</button>
								</div>
							</div>
							<br>  -->
							
							
							<!-- *****************************  Hero Banners   **************************  -->
								
								<div class="row row-cols-1 row-cols-md-1 row-cols-lg-2 row-cols-xl-2">
									<form action="<?php echo site_url('admin/uploadTournamentHeroBanner') ?>" id="form-upload-hero" method="post" enctype="multipart/form-data">
									<div class="col d-flex">
										<div class="card bg-danger w-100">
											
											<input type="hidden" name="game_id" value="<?php echo @$game_id; ?>" />
											<input type="file" id="input-file-1"  name="hero_banner" class="dropify-hero dropify-event" data-max-file-size="0.5M" data-max-width="581" data-max-height="271" data-allowed-file-extensions="jpg jpeg png" <?php if(!empty($heroBanner['tour_img_img_link'])){ ?> data-default-file="<?php echo base_url('uploads/tournaments/'.@$heroBanner['tour_img_img_link']); ?>" <?php } ?>  />
											<div class="card-body text-white text-center">
												<h5 class="card-title text-white">Tournament Full Banner</h5>
												<p class="card-text">Recommend Size: 580px * 270px</p>
											</div>
										</div>
									</div>
									</form>
						
									
									<form action="<?php echo site_url('admin/uploadTournamentHeroBannerGIF') ?>" id="form-upload-hero-gif" method="post" enctype="multipart/form-data">
									<div class="col d-flex">
										<div class="card bg-danger w-100">
											
											<input type="hidden" name="game_id" value="<?php echo @$game_id; ?>" />
											
											<input type="file" id="input-file-2" name="hero_banner_gif" class="dropify-hero-gif dropify-event" data-max-file-size="0.5M"  data-max-width="581" data-max-height="271" data-allowed-file-extensions="gif" <?php if(!empty($heroBanner['tour_img_img_gif'])){ ?> data-default-file="<?php echo base_url('uploads/tournaments/'.@$heroBanner['tour_img_img_gif']); ?>" <?php } ?>  />
											<div class="card-body text-white text-center">
												<h5 class="card-title text-white">Tournament Full Banner Animated</h5>
												<p class="card-text">Recommend Size: 580px * 270px</p>
											</div>
										</div>
									</div>
									</form>
							<!-- *****************************  Hero Banners Ends  **************************  -->
									
							
							
							
							<!-- *****************************  Page Banners   **************************  -->
								
							<!-- *****************************  Page Banners Ends  **************************  -->
								
								
									
							<!-- *****************************  Large Thumbnail Banners   **************************  -->
								
							<!-- *****************************  Large Thumbnail Banners Ends  **************************  -->
								
							

							
							<!-- *****************************  Medium Thumbnail Banners   **************************  -->
								
							<!-- *****************************  Medium Thumbnail Banners Ends  **************************  -->
								
									
						
							<!-- *****************************  Small Thumbnail Banners   **************************  -->
								
							<!-- *****************************  Small Thumbnail Banners Ends  **************************  -->
							

							
							<!-- *****************************  Horizontal Thumbnail Banners   **************************  -->
								
							<!-- *****************************  Horizontal Thumbnail Banners Ends  **************************  -->
								
								
								
							
							<!-- *****************************  Vertical Thumbnail Banners   **************************  -->
								<form action="<?php echo site_url('admin/uploadTournamentVerticalThumb') ?>" id="form-upload-vertical-thumb" method="post" enctype="multipart/form-data">
									<div class="col d-flex">
										<div class="card bg-danger w-100">
											
											<input type="hidden" name="game_id" value="<?php echo @$game_id; ?>" />
											<input type="file" id="input-file-13" name="vertical_thumb_banner" class="dropify-vertical-thumb dropify-event" data-max-file-size="0.5M" data-max-width="181" data-max-height="241" data-allowed-file-extensions="jpg jpeg png" <?php if(!empty($verticalBanner['tour_img_img_link'])){ ?> data-default-file="<?php echo base_url('uploads/tournaments/'.@$verticalBanner['tour_img_img_link']); ?>" <?php } ?>  />
											<div class="card-body text-white text-center">
												<h5 class="card-title text-white">Vertical Thumbnail </h5>
												<p class="card-text">Recommend Size: 180px * 240px</p>
											</div>
										</div>
									</div>
								</form>
									
								<form action="<?php echo site_url('admin/uploadTournamentVerticalThumbGIF') ?>" id="form-upload-vertical-thumb-gif" method="post" enctype="multipart/form-data">
									<div class="col d-flex">
										<div class="card bg-danger w-100">
											
											<input type="hidden" name="game_id" value="<?php echo @$game_id; ?>" />
											
											<input type="file" id="input-file-14" name="vertical_thumb_banner_gif" class="dropify-vertical-thumb-gif dropify-event" data-max-file-size="0.5M" data-max-width="181" data-max-height="241" data-allowed-file-extensions="gif" <?php if(!empty($verticalBanner['tour_img_img_gif'])){ ?> data-default-file="<?php echo base_url('uploads/tournaments/'.@$verticalBanner['tour_img_img_gif']); ?>" <?php } ?>  />
											<div class="card-body text-white text-center">
												<h5 class="card-title text-white">Vertical Thumbnail  Animated</h5>
												<p class="card-text">Recommend Size: 180px * 240px</p>
											</div>
										</div>
									</div>
								</form>
							<!-- *****************************  Vertical Thumbnail Banners Ends  **************************  -->
								
									
						
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
	<script src="<?php echo base_url() ?>assets/admin/plugins/datatable/js/jquery.dataTables.min.js"></script>
	<script src="<?php echo base_url() ?>assets/admin/plugins/datatable/js/dataTables.bootstrap5.min.js"></script>
	<script src="<?php echo base_url() ?>assets/admin/dropify/dist/js/dropify.js"></script>
	
	
	<!--  Hero Banners Upload Script  -->
	
	<script>
		$(document).ready(function() {
			var drEvent = $('.dropify-hero').dropify();
			drEvent.on('dropify.fileReady', function(event, element){
				var formData = new FormData($("#form-upload-hero")[0]);
				$.ajax({
				  url: "<?php echo site_url('admin/uploadTournamentHeroBanner') ?>",
				  data: formData,			  
				  type: "POST",
				  mimeType: "multipart/form-data",
				  contentType: false,  
				  cache: false,  
				  processData:false,
				  success: function (response) {
					// alert(response);
				  }
				});
			});
			drEvent.on('dropify.beforeClear', function(event, element){
				return confirm("Do you really want to delete the image permanently ?");
			});
			
			drEvent.on('dropify.afterClear', function(event, element){
				//alert('File deleted!');
					var gameId = "<?php echo $game_id; ?>";
					var type = "1";
					var imgType = "normal";
					var dataStr = "gameId="+gameId+"&type="+type+"&imgType="+imgType;
					// alert(dataStr);
					$.ajax({
					  url: "<?php echo site_url('admin/deleteTournamentImage');?>",
					  data: dataStr,			  
					  type: "POST",
					  cache: false, 
					  success: function (response) {
						// alert(response);
					  }
					});
			});
		});
	</script>
	<script>
		$(document).ready(function() {
			var drEvent = $('.dropify-hero-gif').dropify();
			drEvent.on('dropify.fileReady', function(event, element){
				var formData = new FormData($("#form-upload-hero-gif")[0]);
				$.ajax({
				  url: "<?php echo site_url('admin/uploadTournamentHeroBannerGIF') ?>",
				  data: formData,			  
				  type: "POST",
				  mimeType: "multipart/form-data",
				  contentType: false,  
				  cache: false,  
				  processData:false,
				  success: function (response) {
					// alert(response);
				  }
				});
			});
			drEvent.on('dropify.beforeClear', function(event, element){
				return confirm("Do you really want to delete the image permanently ?");
			});
			drEvent.on('dropify.afterClear', function(event, element){
				//alert('File deleted!');
				var gameId = "<?php echo $game_id; ?>";
				var type = "1";
				var imgType = "gif";
				var dataStr = "gameId="+gameId+"&type="+type+"&imgType="+imgType;
				$.ajax({
				  url: "<?php echo site_url('admin/deleteTournamentImage') ?>",
				  data: dataStr,			  
				  type: "POST",
				  cache: false, 
				  success: function (response) {
					// alert(response);
				  }
				});
			});
		});
	</script>
	<!--  Hero Banners Upload Script Ends -->
	<!--  Vertical Thumbnail Upload Script  -->
	<script>
		$(document).ready(function() {
			var drEvent = $('.dropify-vertical-thumb').dropify();
			drEvent.on('dropify.fileReady', function(event, element){
				var formData = new FormData($("#form-upload-vertical-thumb")[0]);
			   $.ajax({
				  url: "<?php echo site_url('admin/uploadTournamentVerticalThumb') ?>",
				  data: formData,			  
				  type: "POST",
				  mimeType: "multipart/form-data",
				  contentType: false,  
				  cache: false,  
				  processData:false,
				  success: function (response) {
					// alert(response);
				  }
				});
			});
			drEvent.on('dropify.beforeClear', function(event, element){
				return confirm("Do you really want to delete the image permanently ?");
			});
			
			drEvent.on('dropify.afterClear', function(event, element){
				//alert('File deleted!');
				var gameId = "<?php echo $game_id; ?>";
				var type = "2";
				var imgType = "normal";
				var dataStr = "gameId="+gameId+"&type="+type+"&imgType="+imgType;
				$.ajax({
				  url: "<?php echo site_url('admin/deleteTournamentImage') ?>",
				  data: dataStr,			  
				  type: "POST",
				  cache: false, 
				  success: function (response) {
					// alert(response);
				  }
				});
			});
		});
	</script>
	
	<script>
		$(document).ready(function() {
			var drEvent = $('.dropify-vertical-thumb-gif').dropify();
			drEvent.on('dropify.fileReady', function(event, element){
				var formData = new FormData($("#form-upload-vertical-thumb-gif")[0]);
			   $.ajax({
				  url: "<?php echo site_url('admin/uploadVerticalThumbGIF') ?>",
				  data: formData,			  
				  type: "POST",
				  mimeType: "multipart/form-data",
				  contentType: false,  
				  cache: false,  
				  processData:false,
				  success: function (response) {
					// alert(response);
				  }
				});
			});
			drEvent.on('dropify.beforeClear', function(event, element){
				return confirm("Do you really want to delete the image permanently ?");
			});
			
			drEvent.on('dropify.afterClear', function(event, element){
				//alert('File deleted!');
				var gameId = "<?php echo $game_id; ?>";
				var type = "2";
				var imgType = "gif";
				var dataStr = "gameId="+gameId+"&type="+type+"&imgType="+imgType;
				$.ajax({
				  url: "<?php echo site_url('admin/deleteTournamentImage') ?>",
				  data: dataStr,			  
				  type: "POST",
				  cache: false, 
				  success: function (response) {
					// alert(response);
				  }
				});
			});
		});
	</script>
	<!--  Horizontal Thumbnail Upload Script Ends -->
	
	
	<script>
		$(document).ready(function() {
			$('#example').DataTable();
		});
	</script>
	
	<script>
		window.setTimeout(function() {
		  $(".alert").fadeTo(500, 0).slideUp(500, function(){
			$(this).remove(); 
		  });
		}, 5000);
	</script>
		

	<!--app JS-->
	<script src="<?php echo base_url() ?>assets/admin/js/app.js"></script>
</body>
</html>