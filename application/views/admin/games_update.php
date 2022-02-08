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
	<title>PARTNERS GAMES | GAMENOW</title>
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
					<div class="breadcrumb-title pe-3">Games</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="<?php echo site_url('Admin/Home') ?>"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item"><a href="<?php echo site_url('Admin/Games') ?>"> Manage Games</a></li>
								<li class="breadcrumb-item active" aria-current="page">Update Games</li>
							</ol>
						</nav>
					</div>
					<div class="ms-auto">
						<a href="<?php echo site_url('Admin/Games') ?>" class="btn btn-sm btn-outline-secondary radius-30"><i class="lni lni-chevron-left mr-1 font-16"></i> Back </a>
					</div>
				</div>
				<!--end breadcrumb-->
				
				<br><br>
				<h6 class="mb-0 text-uppercase">New Game Information</h6>
				<hr/>
				<div class="card">
					<div class="card-body">
					
						
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
					
					
					
					<div class="row">
						<div class="col-12">
						
						<br><br>
							<form action="<?php echo site_url('admin/updatePartnerGame/'.base64_encode($gameInfo['game_id'])) ?>" method="post" class="row g-3 px-3 needs-validation" novalidate autocomplete="new-password">
						
							<div class="row mb-4">
								<label for="game_name" class="col-sm-4 col-form-label">Choose Partner Name</label>
								<div class="col-sm-8">
									<select class="form-control" name="game_partner_id"  id="game_partner_id" required>
									<!-- <option value=''>----- Choose Partner -----</option> -->
									<?php foreach($partners as $partner){ ?>
									<option value="<?php echo $partner['partner_id'] ?>" <?php if($partner['partner_id']==$gameInfo['game_partner_id']) echo 'selected'; ?>><?php echo $partner['partner_name'] ?></option>
									<?php } ?>
									</select>
								</div>
							</div>
							
							<div class="row mb-4">
								<label for="game_name" class="col-sm-4 col-form-label">Game Name</label>
								<div class="col-sm-8">
									<input type="text" class="form-control" name="game_name" value="<?php echo $gameInfo['game_name']; ?>" id="game_name" autocomplete="new-password" required />
								</div>
							</div>
							
							<div class="row mb-4">
								<label for="game_category" class="col-sm-4 col-form-label">Category</label>
								<div class="col-sm-8">
									<input type="text" class="form-control" name="game_category" value="<?php echo $gameInfo['game_category']; ?>" id="game_category" autocomplete="new-password" required />
								</div>
							</div>
							
							<div class="row mb-4">
								<label for="game_genre" class="col-sm-4 col-form-label">Genre</label>
								<div class="col-sm-8">
									<input type="text" class="form-control" name="game_genre" value="<?php echo $gameInfo['game_genre']; ?>" id="game_genre" autocomplete="new-password" required />
									<span id="username_error_hint" class="text-danger mt-1"></span>
								</div>
							</div>
							
							
							<div class="row mb-4">
								<label for="game_play_link" class="col-sm-4 col-form-label">Game-Play Link</label>
								<div class="col-sm-8">
									<input type="url" class="form-control" name="game_play_link" value="<?php echo $gameInfo['game_play_link']; ?>" id="game_play_link" autocomplete="new-password" required />
									<span id="username_error_hint" class="text-danger mt-1"></span>
								</div>
							</div>
							
							
							<div class="row mb-4">
								<label for="game_apk_link" class="col-sm-4 col-form-label">Game APK Link (if available)</label>
								<div class="col-sm-8">
									<input type="url" class="form-control" name="game_apk_link" value="<?php echo $gameInfo['game_apk_link']; ?>" id="game_apk_link" autocomplete="new-password"  />
									<span id="username_error_hint" class="text-danger mt-1"></span>
								</div>
							</div>
							
							
							<div class="row mb-4">
								<label for="game_desc" class="col-sm-4 col-form-label"> Description (if any)</label>
								<div class="col-sm-8">
									<textarea class="form-control" name="game_desc"  id="game_desc"><?php echo $gameInfo['game_desc']; ?></textarea>
								</div>
							</div>
							
							<div class="row mb-4">
								<label for="game_tips" class="col-sm-4 col-form-label"> Tips (if any)</label>
								<div class="col-sm-8">
									<textarea class="form-control" name="game_tips"  id="game_tips"><?php echo $gameInfo['game_tips']; ?></textarea>
								</div>
							</div>
							
							<div class="row mb-4">
								<label for="game_how_to_play" class="col-sm-4 col-form-label"> How to Play (if any)</label>
								<div class="col-sm-8">
									<textarea class="form-control" name="game_how_to_play"  id="game_how_to_play"><?php echo $gameInfo['game_how_to_play']; ?></textarea>
								</div>
							</div>
							
							
							
							
							<div class="row mb-5">
								<label class="col-sm-4 col-form-label"> Available Section </label>
								<div class="col-sm-8">
									<div class="row">
										<div class="col-sm-6">
											<input class="form-check-input" type="checkbox" name="game_top_banner" id="checkbox-7" value="1" <?php if($gameInfo['game_top_banner']==1) echo 'checked'; ?>>
											<label class="form-check-label" for="checkbox-7">Top Hero Banner</label>
										</div>
										
										<div class="col-sm-6">
											<input class="form-check-input" type="checkbox" name="game_page_banner" id="checkbox-8" value="1" <?php if($gameInfo['game_page_banner']==1) echo 'checked'; ?>>
											<label class="form-check-label" for="checkbox-8">Page Banner</label>
										</div>
										<div class="col-sm-12"> <br> </div>
										
										<div class="col-sm-6">
											<input class="form-check-input" type="checkbox" name="game_popular" id="checkbox-1" value="1" <?php if($gameInfo['game_popular']==1) echo 'checked'; ?> >
											<label class="form-check-label" for="checkbox-1">Popular Games</label>
										</div>
										
										<div class="col-sm-6">
											<input class="form-check-input" type="checkbox" name="game_mini_games" id="checkbox-2" value="1" <?php if($gameInfo['game_mini_games']==1) echo 'checked'; ?>>
											<label class="form-check-label" for="checkbox-2">Mini Games</label>
										</div>
										<div class="col-sm-12"> <br> </div>
										
										<div class="col-sm-6">
											<input class="form-check-input" type="checkbox" name="game_top_chart" id="checkbox-3" value="1" <?php if($gameInfo['game_top_chart']==1) echo 'checked'; ?>>
											<label class="form-check-label" for="checkbox-3">Top Chart Games</label>
										</div>
										
										<div class="col-sm-6">
											<input class="form-check-input" type="checkbox" name="game_tournament" id="checkbox-4" value="1" <?php if($gameInfo['game_tournament']==1) echo 'checked'; ?>>
											<label class="form-check-label" for="checkbox-4">Tournaments Games</label>
										</div>
										<div class="col-sm-12"> <br> </div>
										
										<div class="col-sm-6">
											<input class="form-check-input" type="checkbox" name="game_most_played" id="checkbox-5" value="1" <?php if($gameInfo['game_most_played']==1) echo 'checked'; ?>>
											<label class="form-check-label" for="checkbox-5">Mostly Played Games</label>
										</div>
										
										<div class="col-sm-6">
											<input class="form-check-input" type="checkbox" name="game_free_to_play" id="checkbox-6" value="1" <?php if($gameInfo['game_free_to_play']==1) echo 'checked'; ?>>
											<label class="form-check-label" for="checkbox-6">Free To Play Games</label>
										</div>
										
										
									</div>
								</div>
							</div>
							
							
							<div class="row mb-5">
								<label class="col-sm-4 col-form-label"> Status</label>
								<div class="col-sm-8">
									<div class="row">
										<div class="col-sm-3">
											<input class="form-check-input" type="radio" name="game_status" id="radio-1" value="1" <?php if($gameInfo['game_status']==1) echo 'checked' ?>/>
											<label class="form-check-label" for="radio-1">Approve</label>
										</div>
										<div class="col-sm-3">
											<input class="form-check-input" type="radio" name="game_status" id="radio-2" value="2" <?php if($gameInfo['game_status']==2) echo 'checked' ?> />
											<label class="form-check-label" for="radio-2">Publish</label>
										</div>
										<div class="col-sm-3">
											<input class="form-check-input" type="radio" name="game_status" id="radio-3" value="3"<?php if($gameInfo['game_status']==3) echo 'checked' ?> />
											<label class="form-check-label" for="radio-3">Reject</label>
										</div>
										
										<div class="col-sm-3">
											<input class="form-check-input" type="radio" name="game_status" id="radio-4" value="4" <?php if($gameInfo['game_status']==4) echo 'checked' ?>/>
											<label class="form-check-label" for="radio-4">Inactive</label>
										</div>
										
										
									</div>
								</div>
							</div>
							
							
							<div class="row mb-4">
								<div class="col-sm-12 text-center">
									<button type="submit" class="col-4 btn btn-success radius-30">Update Game</button>
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
	</script>
		
	
	<script>
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
	<!--app JS-->
	<script src="<?php echo base_url() ?>assets/admin/js/app.js"></script>
</body>
</html>