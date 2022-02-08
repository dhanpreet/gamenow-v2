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
	<title>TOURNAMENTS | GAMENOW</title>
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
					<div class="breadcrumb-title pe-3">Tournaments</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="<?php echo site_url('Admin/Home') ?>"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">Manage Tournaments</li>
							</ol>
						</nav>
					</div>
					<div class="ms-auto">
						<a href="<?php echo site_url('Admin/NewTournament') ?>" class="btn btn-dark radius-30"><i class="lni lni-game mr-1"></i> New Tournament</a>
					</div>
				</div>
				<!--end breadcrumb-->
				
				<br><br>
				<h6 class="mb-0 text-uppercase">Tournament's List</h6>
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
										<th width="14%">Tournament<br> &nbsp; </th>
										<th width="14%" class="text-center">Partner<br>&nbsp;</th>
										<!-- <th width="10%">Game <br> &nbsp; </th> -->
										<th width="14%">Starts On<br> &nbsp; </th>
										<!-- <th>Thumbnail <br> &nbsp; </th> -->
										<th width="14%">Ends on <br>&nbsp;</th>
										
										
										<th width="14%" class="text-center">Status<br> &nbsp; </th>
										<th width="14%">Media upload<br> &nbsp; </th>
										<th width="14%" class="text-center">Action <br> &nbsp; </th>
									</tr>
								</thead>
								<tbody>
								<?php if(is_array($list) && count($list)>0){ ?>
									<?php foreach($list as $row){ ?>
										<tr>
											<td width="14%"><?php echo ucfirst($row['tournament_name']); ?></td>
											<td width="14%"><?php echo ucfirst($row['partner_name']); ?></td>
											<!-- <td width="10%"><?php echo ucfirst($row['game_name']); ?></td> -->
											<td width="14%"><?php echo date('d/M/Y' ,strtotime($row['tournament_start_date'])); ?></td>
										<!-- 	<td><img src="<?php echo $row['game_thumbnail']; ?>" /></td> -->
											<td width="14%"><?php echo  date('d/M/Y' ,strtotime($row['tournament_end_date'])); ?></td>
											
												
											<!-- <td width="10%"><?php echo date('d/M/Y h:i A', $row['tournament_updated_on']); ?></td> -->
											<td width="14%">
											<?php if($row['tournament_status'] == 0){ ?>
												<span class="badge bg-secondary"> Uploaded Only </span>
											<?php } else if($row['tournament_status'] == 1){ ?>
												<span class="badge bg-primary"> Approved </span>
											<?php } else if($row['tournament_status'] == 2){ ?>
												<span class="badge bg-success"> Active </span>
											<?php } else if($row['tournament_status'] == 3){ ?>
												<span class="badge bg-danger"> Rejected </span>
											<?php } else { ?>
												<span class="badge bg-warning"> Inactive </span>
											<?php } ?>
											
											</td>
											
											<td width="14%" class="text-center">
												<a href="<?php echo site_url('Admin/ManageTournamentImages/'.base64_encode($row['tournament_id'])) ?>" class="btn btn-sm btn-secondary radius-30">
												<i class="lni lni-upload mr-1"></i>  Upload
												</a>
											</td>
											
											<td width="14%" class="text-center">
												<a href="<?php echo site_url('Admin/UpdateTournament/'.base64_encode($row['tournament_id'])) ?>">
													<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-3 text-primary"><path d="M12 20h9"></path><path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"></path></svg>
												</a>
												&nbsp;&nbsp;&nbsp;
												

												<a href="<?php echo site_url('admin/deleteTournament/'.base64_encode($row['tournament_id'])) ?>" onClick="return confirm('Are you sure, you want to delete this tournament information?');">
													<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash text-danger"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path></svg>
												</a>
											
											</td>
										</tr>
									<?php } ?>
								<?php } ?>	
								</tbody>
								<tfoot>
									<tr>
									<th width="14%">Tournament<br> &nbsp; </th>
										<!-- <th width="10%">Game <br> &nbsp; </th> -->
										<th width="14%">Starts On<br> &nbsp; </th>
										<!-- <th>Thumbnail <br> &nbsp; </th> -->
										<th width="14%">Ends on <br>&nbsp;</th>
										<th width="14%" class="text-center">Partner<br>&nbsp;</th>
										<th width="14%">Status<br> &nbsp; </th>
										<th width="14%" class="text-center">Action <br> &nbsp; </th>
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