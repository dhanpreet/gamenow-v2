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
					<div class="breadcrumb-title pe-3">Game's Images</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="<?php echo site_url('Admin/Home') ?>"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item"><a href="<?php echo site_url('Admin/Games') ?>"> Manage Games</a></li>
								<li class="breadcrumb-item active" aria-current="page">Manage Games Images</li>
							</ol>
						</nav>
					</div>
					<div class="ms-auto">
						<a href="<?php echo site_url('Admin/Games') ?>" class="btn btn-sm btn-outline-secondary radius-30"><i class="lni lni-chevron-left mr-1 font-16"></i> Back </a>
					</div>
				</div>
				<!--end breadcrumb-->
				
				<br><br>
				<h6 class="mb-0 text-uppercase">Game: <span class="text-danger"><?php echo $gameInfo['game_name']; ?></span></h6>
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
									<form action="<?php echo site_url('admin/uploadHeroBanner') ?>" id="form-upload-hero" method="post" enctype="multipart/form-data">
									<div class="col d-flex">
										<div class="card bg-danger w-100">
											
											<input type="hidden" name="game_id" value="<?php echo @$game_id; ?>" />
											<input type="file" id="input-file-1"  name="hero_banner" class="dropify-hero dropify-event" data-max-file-size="0.5M" data-max-width="501" data-max-height="236" data-allowed-file-extensions="jpg jpeg png" <?php if(!empty($heroBanner['img_link'])){ ?> data-default-file="<?php echo base_url('uploads/content/'.@$heroBanner['img_link']); ?>" <?php } ?>  />
											<div class="card-body text-white text-center">
												<h5 class="card-title text-white">Hero Banner</h5>
												<p class="card-text">Recommend Size: 500px * 235px</p>
											</div>
										</div>
									</div>
									</form>
						
									
									<form action="<?php echo site_url('admin/uploadHeroBannerGIF') ?>" id="form-upload-hero-gif" method="post" enctype="multipart/form-data">
									<div class="col d-flex">
										<div class="card bg-danger w-100">
											
											<input type="hidden" name="game_id" value="<?php echo @$game_id; ?>" />
											
											<input type="file" id="input-file-2" name="hero_banner_gif" class="dropify-hero-gif dropify-event" data-max-file-size="0.5M"  data-max-width="501" data-max-height="236" data-allowed-file-extensions="gif" <?php if(!empty($heroBanner['img_gif_link'])){ ?> data-default-file="<?php echo base_url('uploads/content/'.@$heroBanner['img_gif_link']); ?>" <?php } ?>  />
											<div class="card-body text-white text-center">
												<h5 class="card-title text-white">Hero Banner Animated</h5>
												<p class="card-text">Recommend Size: 500px * 235px</p>
											</div>
										</div>
									</div>
									</form>
							<!-- *****************************  Hero Banners Ends  **************************  -->
									
							
							
							
							<!-- *****************************  Page Banners   **************************  -->
									
									<form action="<?php echo site_url('admin/uploadPageBanner') ?>" id="form-upload-page" method="post" enctype="multipart/form-data">
									<div class="col d-flex">
										<div class="card bg-danger w-100">
											
											<input type="hidden" name="game_id" value="<?php echo @$game_id; ?>" />
											
											<input type="file" id="input-file-3" name="page_banner" class="dropify-page dropify-event" data-max-file-size="0.5M" data-max-width="581" data-max-height="271" data-allowed-file-extensions="jpg jpeg png" <?php if(!empty($pageBanner['img_link'])){ ?> data-default-file="<?php echo base_url('uploads/content/'.@$pageBanner['img_link']); ?>" <?php } ?>  />
											<div class="card-body text-white text-center">
												<h5 class="card-title text-white">Page  Banner </h5>
												<p class="card-text">Recommend Size: 580px * 270px</p>
											</div>
										</div>
									</div>
									</form>
									
									<form action="<?php echo site_url('admin/uploadPageBannerGIF') ?>" id="form-upload-page-gif" method="post" enctype="multipart/form-data">
									<div class="col d-flex">
										<div class="card bg-danger w-100">
											
											<input type="hidden" name="game_id" value="<?php echo @$game_id; ?>" />
											
											<input type="file" id="input-file-4" name="page_banner_gif" class="dropify-page-gif dropify-event" data-max-file-size="0.5M" data-max-width="581" data-max-height="271" data-allowed-file-extensions="gif" <?php if(!empty($pageBanner['img_gif_link'])){ ?> data-default-file="<?php echo base_url('uploads/content/'.@$pageBanner['img_gif_link']); ?>" <?php } ?>  />
											<div class="card-body text-white text-center">
												<h5 class="card-title text-white">Page  Banner Animated</h5>
												<p class="card-text">Recommend Size: 580px * 270px</p>
											</div>
										</div>
									</div>
									</form>
							
							<!-- *****************************  Page Banners Ends  **************************  -->
								
								
									
							<!-- *****************************  Large Thumbnail Banners   **************************  -->
								<form action="<?php echo site_url('admin/uploadLargeThumb') ?>" id="form-upload-large-thumb" method="post" enctype="multipart/form-data">
									<div class="col d-flex">
										<div class="card bg-danger w-100">
											
											<input type="hidden" name="game_id" value="<?php echo @$game_id; ?>" />
											
											<input type="file" id="input-file-5" name="large_thumb_banner" class="dropify-large-thumb dropify-event" data-max-file-size="0.5M" data-max-width="181" data-max-height="181" data-allowed-file-extensions="jpg jpeg png" <?php if(!empty($largeThumbBanner['img_link'])){ ?> data-default-file="<?php echo base_url('uploads/content/'.@$largeThumbBanner['img_link']); ?>" <?php } ?>  />
											<div class="card-body text-white text-center">
												<h5 class="card-title text-white">Large Thumbnail </h5>
												<p class="card-text">Recommend Size: 180px * 180px</p>
											</div>
										</div>
									</div>
								</form>
									
								<form action="<?php echo site_url('admin/uploadLargeThumbGIF') ?>" id="form-upload-large-thumb-gif" method="post" enctype="multipart/form-data">
									<div class="col d-flex">
										<div class="card bg-danger w-100">
											
											<input type="hidden" name="game_id" value="<?php echo @$game_id; ?>" />
											
											<input type="file" id="input-file-6" name="large_thumb_banner_gif" class="dropify-large-thumb-gif dropify-event" data-max-file-size="0.5M" data-max-width="181" data-max-height="181" data-allowed-file-extensions="gif" <?php if(!empty($largeThumbBanner['img_gif_link'])){ ?> data-default-file="<?php echo base_url('uploads/content/'.@$largeThumbBanner['img_gif_link']); ?>" <?php } ?>  />
											<div class="card-body text-white text-center">
												<h5 class="card-title text-white">Large Thumbnail  Animated</h5>
												<p class="card-text">Recommend Size: 180px * 180px</p>
											</div>
										</div>
									</div>
								</form>
							<!-- *****************************  Large Thumbnail Banners Ends  **************************  -->
								
							

							
							<!-- *****************************  Medium Thumbnail Banners   **************************  -->
								<form action="<?php echo site_url('admin/uploadMediumThumb') ?>" id="form-upload-medium-thumb" method="post" enctype="multipart/form-data">
									<div class="col d-flex">
										<div class="card bg-danger w-100">
											
											<input type="hidden" name="game_id" value="<?php echo @$game_id; ?>" />
											
											<input type="file" id="input-file-7" name="medium_thumb_banner" class="dropify-medium-thumb dropify-event" data-max-file-size="0.5M" data-max-width="136" data-max-height="136" data-allowed-file-extensions="jpg jpeg png" <?php if(!empty($mediumThumbBanner['img_link'])){ ?> data-default-file="<?php echo base_url('uploads/content/'.@$mediumThumbBanner['img_link']); ?>" <?php } ?>  />
											<div class="card-body text-white text-center">
												<h5 class="card-title text-white">Medium Thumbnail </h5>
												<p class="card-text">Recommend Size: 135px * 135px</p>
											</div>
										</div>
									</div>
								</form>
									
								<form action="<?php echo site_url('admin/uploadMediumThumbGIF') ?>" id="form-upload-medium-thumb-gif" method="post" enctype="multipart/form-data">
									<div class="col d-flex">
										<div class="card bg-danger w-100">
											
											<input type="hidden" name="game_id" value="<?php echo @$game_id; ?>" />
											
											<input type="file" id="input-file-8" name="medium_thumb_banner_gif" class="dropify-medium-thumb-gif dropify-event" data-max-file-size="0.5M" data-max-width="136" data-max-height="136" data-allowed-file-extensions="gif" <?php if(!empty($mediumThumbBanner['img_gif_link'])){ ?> data-default-file="<?php echo base_url('uploads/content/'.@$mediumThumbBanner['img_gif_link']); ?>" <?php } ?>  />
											<div class="card-body text-white text-center">
												<h5 class="card-title text-white">Medium Thumbnail  Animated</h5>
												<p class="card-text">Recommend Size: 135px * 135px</p>
											</div>
										</div>
									</div>
								</form>
							<!-- *****************************  Medium Thumbnail Banners Ends  **************************  -->
								
									
						
							<!-- *****************************  Small Thumbnail Banners   **************************  -->
								<form action="<?php echo site_url('admin/uploadSmallThumb') ?>" id="form-upload-small-thumb" method="post" enctype="multipart/form-data">
									<div class="col d-flex">
										<div class="card bg-danger w-100">
											
											<input type="hidden" name="game_id" value="<?php echo @$game_id; ?>" />
											
											<input type="file" id="input-file-9" name="small_thumb_banner" class="dropify-small-thumb dropify-event" data-max-file-size="0.5M" data-max-width="101" data-max-height="101" data-allowed-file-extensions="jpg jpeg png" <?php if(!empty($smallThumbBanner['img_link'])){ ?> data-default-file="<?php echo base_url('uploads/content/'.@$smallThumbBanner['img_link']); ?>" <?php } ?>  />
											<div class="card-body text-white text-center">
												<h5 class="card-title text-white">Small Thumbnail </h5>
												<p class="card-text">Recommend Size: 100px * 100px</p>
											</div>
										</div>
									</div>
								</form>
									
								<form action="<?php echo site_url('admin/uploadSmallThumbGIF') ?>" id="form-upload-small-thumb-gif" method="post" enctype="multipart/form-data">
									<div class="col d-flex">
										<div class="card bg-danger w-100">
											
											<input type="hidden" name="game_id" value="<?php echo @$game_id; ?>" />
											
											<input type="file" id="input-file-10" name="small_thumb_banner_gif" class="dropify-small-thumb-gif dropify-event" data-max-file-size="0.5M" data-max-width="101" data-max-height="101" data-allowed-file-extensions="gif" <?php if(!empty($smallThumbBanner['img_gif_link'])){ ?> data-default-file="<?php echo base_url('uploads/content/'.@$smallThumbBanner['img_gif_link']); ?>" <?php } ?>  />
											<div class="card-body text-white text-center">
												<h5 class="card-title text-white">Small Thumbnail  Animated</h5>
												<p class="card-text">Recommend Size: 100px * 100px</p>
											</div>
										</div>
									</div>
								</form>
							<!-- *****************************  Small Thumbnail Banners Ends  **************************  -->
							

							
							<!-- *****************************  Horizontal Thumbnail Banners   **************************  -->
								<form action="<?php echo site_url('admin/uploadHorizontalThumb') ?>" id="form-upload-horizontal-thumb" method="post" enctype="multipart/form-data">
									<div class="col d-flex">
										<div class="card bg-danger w-100">
											
											<input type="hidden" name="game_id" value="<?php echo @$game_id; ?>" />
											
											<input type="file" id="input-file-11" name="horizontal_thumb_banner" class="dropify-horizontal-thumb dropify-event" data-max-file-size="0.5M" data-max-width="301" data-max-height="171" data-allowed-file-extensions="jpg jpeg png" <?php if(!empty($horizontalThumbBanner['img_link'])){ ?> data-default-file="<?php echo base_url('uploads/content/'.@$horizontalThumbBanner['img_link']); ?>" <?php } ?>  />
											<div class="card-body text-white text-center">
												<h5 class="card-title text-white">Horizontal Thumbnail </h5>
												<p class="card-text">Recommend Size: 300px * 170px</p>
											</div>
										</div>
									</div>
								</form>
									
								<form action="<?php echo site_url('admin/uploadHorizontalThumbGIF') ?>" id="form-upload-horizontal-thumb-gif" method="post" enctype="multipart/form-data">
									<div class="col d-flex">
										<div class="card bg-danger w-100">
											
											<input type="hidden" name="game_id" value="<?php echo @$game_id; ?>" />
											
											<input type="file" id="input-file-12" name="horizontal_thumb_banner_gif" class="dropify-horizontal-thumb-gif dropify-event" data-max-file-size="0.5M" data-max-width="301" data-max-height="171" data-allowed-file-extensions="gif" <?php if(!empty($horizontalThumbBanner['img_gif_link'])){ ?> data-default-file="<?php echo base_url('uploads/content/'.@$horizontalThumbBanner['img_gif_link']); ?>" <?php } ?>  />
											<div class="card-body text-white text-center">
												<h5 class="card-title text-white">Horizontal Thumbnail  Animated</h5>
												<p class="card-text">Recommend Size: 300px * 170px</p>
											</div>
										</div>
									</div>
								</form>
							<!-- *****************************  Horizontal Thumbnail Banners Ends  **************************  -->
								
								
								
							
							<!-- *****************************  Vertical Thumbnail Banners   **************************  -->
								<form action="<?php echo site_url('admin/uploadVerticalThumb') ?>" id="form-upload-vertical-thumb" method="post" enctype="multipart/form-data">
									<div class="col d-flex">
										<div class="card bg-danger w-100">
											
											<input type="hidden" name="game_id" value="<?php echo @$game_id; ?>" />
											
											<input type="file" id="input-file-13" name="vertical_thumb_banner" class="dropify-vertical-thumb dropify-event" data-max-file-size="0.5M" data-max-width="181" data-max-height="241" data-allowed-file-extensions="jpg jpeg png" <?php if(!empty($verticalThumbBanner['img_link'])){ ?> data-default-file="<?php echo base_url('uploads/content/'.@$verticalThumbBanner['img_link']); ?>" <?php } ?>  />
											<div class="card-body text-white text-center">
												<h5 class="card-title text-white">Vertical Thumbnail </h5>
												<p class="card-text">Recommend Size: 180px * 240px</p>
											</div>
										</div>
									</div>
								</form>
									
								<form action="<?php echo site_url('admin/uploadVerticalThumbGIF') ?>" id="form-upload-vertical-thumb-gif" method="post" enctype="multipart/form-data">
									<div class="col d-flex">
										<div class="card bg-danger w-100">
											
											<input type="hidden" name="game_id" value="<?php echo @$game_id; ?>" />
											
											<input type="file" id="input-file-14" name="vertical_thumb_banner_gif" class="dropify-vertical-thumb-gif dropify-event" data-max-file-size="0.5M" data-max-width="181" data-max-height="241" data-allowed-file-extensions="gif" <?php if(!empty($verticalThumbBanner['img_gif_link'])){ ?> data-default-file="<?php echo base_url('uploads/content/'.@$verticalThumbBanner['img_gif_link']); ?>" <?php } ?>  />
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
				  url: "<?php echo site_url('admin/uploadHeroBanner') ?>",
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
					$.ajax({
					  url: "<?php echo site_url('admin/deleteGameImage') ?>",
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
				  url: "<?php echo site_url('admin/uploadHeroBannerGIF') ?>",
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
				  url: "<?php echo site_url('admin/deleteGameImage') ?>",
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
	
	
	<!--  Page Banners Upload Script  -->
	<script>
		$(document).ready(function() {
			var drEvent = $('.dropify-page').dropify();
			drEvent.on('dropify.fileReady', function(event, element){
				var formData = new FormData($("#form-upload-page")[0]);
			   $.ajax({
				  url: "<?php echo site_url('admin/uploadPageBanner') ?>",
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
				  url: "<?php echo site_url('admin/deleteGameImage') ?>",
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
			var drEvent = $('.dropify-page-gif').dropify();
			drEvent.on('dropify.fileReady', function(event, element){
				var formData = new FormData($("#form-upload-page-gif")[0]);
			   $.ajax({
				  url: "<?php echo site_url('admin/uploadPageBannerGIF') ?>",
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
				  url: "<?php echo site_url('admin/deleteGameImage') ?>",
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
	<!--  Page Banners Upload Script Ends -->
	
	
	
	<!--  Large Thumbnail Upload Script  -->
	<script>
		$(document).ready(function() {
			var drEvent = $('.dropify-large-thumb').dropify();
			drEvent.on('dropify.fileReady', function(event, element){
				var formData = new FormData($("#form-upload-large-thumb")[0]);
			   $.ajax({
				  url: "<?php echo site_url('admin/uploadLargeThumb') ?>",
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
				var type = "3";
				var imgType = "normal";
				var dataStr = "gameId="+gameId+"&type="+type+"&imgType="+imgType;
				$.ajax({
				  url: "<?php echo site_url('admin/deleteGameImage') ?>",
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
			var drEvent = $('.dropify-large-thumb-gif').dropify();
			drEvent.on('dropify.fileReady', function(event, element){
				var formData = new FormData($("#form-upload-large-thumb-gif")[0]);
			   $.ajax({
				  url: "<?php echo site_url('admin/uploadLargeThumbGIF') ?>",
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
				var type = "3";
				var imgType = "gif";
				var dataStr = "gameId="+gameId+"&type="+type+"&imgType="+imgType;
				$.ajax({
				  url: "<?php echo site_url('admin/deleteGameImage') ?>",
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
	<!--  Large Thumbnail Upload Script Ends -->
	
	
	<!--  Medium Thumbnail Upload Script  -->
	<script>
		$(document).ready(function() {
			var drEvent = $('.dropify-medium-thumb').dropify();
			drEvent.on('dropify.fileReady', function(event, element){
				var formData = new FormData($("#form-upload-medium-thumb")[0]);
			   $.ajax({
				  url: "<?php echo site_url('admin/uploadMediumThumb') ?>",
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
				var type = "4";
				var imgType = "normal";
				var dataStr = "gameId="+gameId+"&type="+type+"&imgType="+imgType;
				$.ajax({
				  url: "<?php echo site_url('admin/deleteGameImage') ?>",
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
			var drEvent = $('.dropify-medium-thumb-gif').dropify();
			drEvent.on('dropify.fileReady', function(event, element){
				var formData = new FormData($("#form-upload-medium-thumb-gif")[0]);
			   $.ajax({
				  url: "<?php echo site_url('admin/uploadMediumThumbGIF') ?>",
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
				var type = "4";
				var imgType = "gif";
				var dataStr = "gameId="+gameId+"&type="+type+"&imgType="+imgType;
				$.ajax({
				  url: "<?php echo site_url('admin/deleteGameImage') ?>",
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
	<!--  Large Thumbnail Upload Script Ends -->
	
	
	<!--  Small Thumbnail Upload Script  -->
	<script>
		$(document).ready(function() {
			var drEvent = $('.dropify-small-thumb').dropify();
			drEvent.on('dropify.fileReady', function(event, element){
				var formData = new FormData($("#form-upload-small-thumb")[0]);
			   $.ajax({
				  url: "<?php echo site_url('admin/uploadSmallThumb') ?>",
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
				var type = "5";
				var imgType = "normal";
				var dataStr = "gameId="+gameId+"&type="+type+"&imgType="+imgType;
				$.ajax({
				  url: "<?php echo site_url('admin/deleteGameImage') ?>",
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
			var drEvent = $('.dropify-small-thumb-gif').dropify();
			drEvent.on('dropify.fileReady', function(event, element){
				var formData = new FormData($("#form-upload-small-thumb-gif")[0]);
			   $.ajax({
				  url: "<?php echo site_url('admin/uploadSmallThumbGIF') ?>",
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
				var type = "5";
				var imgType = "gif";
				var dataStr = "gameId="+gameId+"&type="+type+"&imgType="+imgType;
				$.ajax({
				  url: "<?php echo site_url('admin/deleteGameImage') ?>",
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
	<!--  Large Thumbnail Upload Script Ends -->
	
		
	<!--  Horizontal Thumbnail Upload Script  -->
	<script>
		$(document).ready(function() {
			var drEvent = $('.dropify-horizontal-thumb').dropify();
			drEvent.on('dropify.fileReady', function(event, element){
				var formData = new FormData($("#form-upload-horizontal-thumb")[0]);
			   $.ajax({
				  url: "<?php echo site_url('admin/uploadHorizontalThumb') ?>",
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
				var type = "6";
				var imgType = "normal";
				var dataStr = "gameId="+gameId+"&type="+type+"&imgType="+imgType;
				$.ajax({
				  url: "<?php echo site_url('admin/deleteGameImage') ?>",
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
			var drEvent = $('.dropify-horizontal-thumb-gif').dropify();
			drEvent.on('dropify.fileReady', function(event, element){
				var formData = new FormData($("#form-upload-horizontal-thumb-gif")[0]);
			   $.ajax({
				  url: "<?php echo site_url('admin/uploadHorizontalThumbGIF') ?>",
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
				var type = "6";
				var imgType = "gif";
				var dataStr = "gameId="+gameId+"&type="+type+"&imgType="+imgType;
				$.ajax({
				  url: "<?php echo site_url('admin/deleteGameImage') ?>",
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
	
	
		
	<!--  Vertical Thumbnail Upload Script  -->
	<script>
		$(document).ready(function() {
			var drEvent = $('.dropify-vertical-thumb').dropify();
			drEvent.on('dropify.fileReady', function(event, element){
				var formData = new FormData($("#form-upload-vertical-thumb")[0]);
			   $.ajax({
				  url: "<?php echo site_url('admin/uploadVerticalThumb') ?>",
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
				var type = "7";
				var imgType = "normal";
				var dataStr = "gameId="+gameId+"&type="+type+"&imgType="+imgType;
				$.ajax({
				  url: "<?php echo site_url('admin/deleteGameImage') ?>",
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
				var type = "7";
				var imgType = "gif";
				var dataStr = "gameId="+gameId+"&type="+type+"&imgType="+imgType;
				$.ajax({
				  url: "<?php echo site_url('admin/deleteGameImage') ?>",
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
	/*
	$(document).on('click', '#upload-data', function(e){
		   e.preventDefault();
		  // var data = $('#form-upload').serialize();
		   var formData = new FormData($("#form-upload")[0]);
		   $.ajax({
			  url: "<?php echo site_url('admin/uploadGameImages') ?>",
			  data: formData,
			  
              type: "POST",
              mimeType: "multipart/form-data",
              contentType: false,  
              cache: false,  
              processData:false,
			  success: function (response) {
				 alert(response);
			  },
			  complete: function () {}
		   });
		
	});  */
	</script>
	
	
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