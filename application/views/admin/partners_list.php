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
	<title>PARTNERS | GAMENOW</title>
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
					<div class="breadcrumb-title pe-3">Partners</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="<?php echo site_url('Admin/Home') ?>"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">Manage Partners</li>
							</ol>
						</nav>
					</div>
					<div class="ms-auto">
						<button type="button" data-bs-toggle="modal" data-bs-target="#addPartner" class="btn btn-dark  radius-30"><i class="bx bx-user mr-1"></i> Add Partners</button>
					</div>
				</div>
				<!--end breadcrumb-->
				
				<br><br>
				<h6 class="mb-0 text-uppercase">Partners List</h6>
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
					
					
						<div class="table-responsive">
							<table id="example" class="table table-striped table-bordered" style="width:100%">
								<thead>
									<tr>
										<th>Name</th>
										<th>Email</th>
										<th>Username</th>
										<th>Last Updated</th>
										<th>Status</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
								<?php if(is_array($list) && count($list)>0){ ?>
									<?php foreach($list as $row){ ?>
										<tr>
											<td><?php echo ucfirst($row['partner_name']); ?></td>
											<td><?php echo $row['partner_email']; ?></td>
											<td><?php echo $row['partner_username']; ?></td>
											<td><?php echo date('d/M/Y h:i A', $row['partner_updated_on']); ?></td>
											<td>
											<?php if($row['partner_status'] == 1){ ?>
												<span class="badge bg-primary"> Active </span>
											<?php } else { ?>
												<span class="badge bg-warning"> Inactive </span>
											<?php } ?>
											
											</td>
											<td>
												<a href="#" data-bs-toggle="modal"  data-bs-target="#editPartner-<?php echo $row['partner_id']; ?>">
													<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-3 text-primary"><path d="M12 20h9"></path><path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"></path></svg>
												</a>
												&nbsp;&nbsp;&nbsp;
												<a href="<?php echo site_url('admin/deletePartner/'.base64_encode($row['partner_id'])) ?>" onClick="return confirm('Are you sure, you want to delete this partner information?');">
													<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash text-danger"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path></svg>
												</a>
											
											</td>
										</tr>
									<?php } ?>
								<?php } ?>
									
								</tbody>
								<tfoot>
									<tr>
										<th>Name</th>
										<th>Email</th>
										<th>Username</th>
										<th>Added On</th>
										<th>Status</th>
										<th>Action</th>
									</tr>
								</tfoot>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--end page wrapper -->
		
		
		<!--  For Footer section part -->
		<?php include ('footer.php'); ?>
		
		
	<div class="modal fade" id="addPartner" tabindex="-1" aria-hidden="true" style="display: none;">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content ">
				<div class="modal-header bg-">
					<h5 class="modal-title">Add New Partner</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				
				<form action="<?php echo site_url('admin/processPartner') ?>" method="post" class="row g-3 px-3 needs-validation" novalidate autocomplete="new-password">
				<div class="modal-body">
				
					<div class="row mb-4">
						<label for="partner_name" class="col-sm-4 col-form-label">Partner Name</label>
						<div class="col-sm-8">
							<input type="text" class="form-control" name="partner_name"  id="partner_name" autocomplete="new-password" required />
						</div>
					</div>
					
					<div class="row mb-4">
						<label for="partner_email" class="col-sm-4 col-form-label">Partner Email</label>
						<div class="col-sm-8">
							<input type="email" class="form-control" name="partner_email" id="partner_email" autocomplete="new-password" required />
						</div>
					</div>
					
					<div class="row mb-4">
						<label for="partner_username" class="col-sm-4 col-form-label"> Username</label>
						<div class="col-sm-8">
							<input type="text" class="form-control" name="partner_username" id="partner_username" autocomplete="new-password" required />
							<span id="username_error_hint" class="text-danger mt-1"></span>
						</div>
					</div>
					
					
					<div class="row mb-4">
						<label for="partner_password" class="col-sm-4 col-form-label"> Password</label>
						<div class="col-sm-8">
							<input type="password" class="form-control" name="partner_password" id="partner_password" autocomplete="new-password" required />
						</div>
					</div>
					
					
					<div class="row mb-4">
						<label for="partner_website" class="col-sm-4 col-form-label"> Website (if any)</label>
						<div class="col-sm-8">
							<input type="url" class="form-control" name="partner_website" id="partner_website" autocomplete="new-password"  />
						</div>
					</div>
					
					
					<div class="row mb-4">
						<label class="col-sm-4 col-form-label"> Status</label>
						<div class="col-sm-8">
							<div class="row">
								<div class="col-sm-6 ">
									<input class="form-check-input" type="radio" name="partner_status" id="radio-1" value="1" checked>
									<label class="form-check-label" for="radio-1">Active</label>
								</div>
								<div class="col-sm-6 ">
									<input class="form-check-input" type="radio" name="partner_status" id="radio-2" value="2">
									<label class="form-check-label" for="radio-2">Inactive</label>
								</div>
							</div>
						</div>
					</div>
					
				</div>
				
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary radius-30" data-bs-dismiss="modal">Close</button>
					<button type="submit" id="addPartnerBtn" class="btn btn-success radius-30">Save Partner</button>
				</div>
				</form>
			</div>
		</div>
	</div>	
	

<?php if(is_array($list) && count($list)>0){ ?>
	<?php foreach($list as $rows){ ?>
		<div class="modal fade" id="editPartner-<?php echo $rows['partner_id']; ?>" tabindex="-1" aria-hidden="true" style="display: none;">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content ">
					<div class="modal-header bg-">
						<h5 class="modal-title">Update Partner</h5>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					
					<form action="<?php echo site_url('admin/processPartner/'.base64_encode($rows['partner_id'])) ?>" method="post" class="row g-3 px-3 needs-validation" novalidate autocomplete="new-password">
					
					
					<div class="modal-body">
					
						<div class="row mb-4">
							<label for="partner_name_<?php echo ($rows['partner_id']) ?>" class="col-sm-4 col-form-label">Partner Name</label>
							<div class="col-sm-8">
								<input type="text" class="form-control" name="partner_name"  id="partner_name_<?php echo ($rows['partner_id']) ?>" value="<?php echo $rows['partner_name']; ?>" autocomplete="new-password" required />
							</div>
						</div>
						
						<div class="row mb-4">
							<label for="partner_email_<?php echo ($rows['partner_id']) ?>" class="col-sm-4 col-form-label">Partner Email</label>
							<div class="col-sm-8">
								<input type="email" class="form-control" name="partner_email" id="partner_email_<?php echo ($rows['partner_id']) ?>" value="<?php echo $rows['partner_email']; ?>" autocomplete="new-password" required />
							</div>
						</div>
						
						<div class="row mb-4">
							<label for="partner_username_<?php echo ($rows['partner_id']) ?>" class="col-sm-4 col-form-label"> Username</label>
							<div class="col-sm-8">
								<input type="text" class="form-control username" name="partner_username" id="partner_username_<?php echo ($rows['partner_id']) ?>" data-id="<?php echo ($rows['partner_id']) ?>" value="<?php echo $rows['partner_username']; ?>" autocomplete="new-password" required />
								<span class="text-danger mt-1 username_error_hint"></span>
							</div>
						</div>
						
						
						<div class="row mb-4">
							<label for="partner_password_<?php echo ($rows['partner_id']) ?>" class="col-sm-4 col-form-label"> Password (if want to update previous)</label>
							<div class="col-sm-8">
								<input type="password" class="form-control" name="partner_password" id="partner_password_<?php echo ($rows['partner_id']) ?>" autocomplete="new-password"  />
							</div>
						</div>
						
						
						<div class="row mb-4">
							<label for="partner_website_<?php echo ($rows['partner_id']) ?>" class="col-sm-4 col-form-label"> Website (if any)</label>
							<div class="col-sm-8">
								<input type="url" class="form-control" name="partner_website" id="partner_website_<?php echo ($rows['partner_id']) ?>" value="<?php echo $rows['partner_website']; ?>" autocomplete="new-password"  />
							</div>
						</div>
						
						
						<div class="row mb-4">
							<label class="col-sm-4 col-form-label"> Status</label>
							<div class="col-sm-8">
								<div class="row">
									<div class="col-sm-6 ">
										<input class="form-check-input" type="radio" name="partner_status" id="radio_1_<?php echo $rows['partner_id'] ?>" value="1" <?php if($rows['partner_status'] == 1){ echo "checked"; } ?> >
										<label class="form-check-label" for="radio_1_<?php echo $rows['partner_id'] ?>">Active</label>
									</div>
									<div class="col-sm-6 ">
										<input class="form-check-input" type="radio" name="partner_status" id="radio_2_<?php echo $rows['partner_id'] ?>" value="2" <?php if($rows['partner_status'] == 2){ echo "checked"; } ?>>
										<label class="form-check-label" for="radio_2_<?php echo $rows['partner_id'] ?>">Inactive</label>
									</div>
								</div>
							</div>
						</div>
						
					</div>
					
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary radius-30" data-bs-dismiss="modal">Close</button>
						<button type="submit" id="updatePartnerBtn<?php echo base64_encode($rows['partner_id']) ?>" class="btn btn-success radius-30 updatePartnerBtn">Save Partner</button>
					</div>
					</form>
				</div>
			</div>
		</div>	
	

	<?php } ?>
<?php } ?>


	
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
	
	<script>
		$(document).ready(function() {
			$('#example').DataTable();
		});
	</script>
	
	
	<script>
		$(document).on('keyup blur', '#partner_username', function(){
			var username = $(this).val();
			var dataStr = "username="+username;
			$.ajax({
				url: "<?php echo site_url('admin/validatePartnerUsername') ?>",
				type: "POST",
				data: dataStr,
				success: function(response){
					if(response == 'error'){
						$("#username_error_hint").empty();
						$("#username_error_hint").append('Error! Username already exists.');
						$("#addPartnerBtn").attr('disabled', true);
					} else {
						$("#username_error_hint").empty();
						$("#addPartnerBtn").attr('disabled', false);
					}
				}
			});
		});
	</script>
	
	
	<script>
		$(document).on('keyup blur', '.username', function(){
			var username = $(this).val();
			var id = $(this).attr('data-id');
			
			var dataStr = "username="+username+"&id="+id;
			$.ajax({
				url: "<?php echo site_url('admin/validatePartnerUsername') ?>",
				type: "POST",
				data: dataStr,
				success: function(response){
					if(response == 'error'){
						$(".username_error_hint").empty();
						$(".username_error_hint").append('Error! Username already exists.');
						$(".updatePartnerBtn").attr('disabled', true);
					} else {
						$(".username_error_hint").empty();
						$(".updatePartnerBtn").attr('disabled', false);
					}
				}
			});
		});
	</script>
	
	
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