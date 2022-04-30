<!DOCTYPE html>
<html lang="en">
<head>
<title>Jazz Games</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="<?php echo base_url() ?>assets/frontend/css/bootstrap-min.css">
<link rel="stylesheet" href="<?php echo base_url() ?>assets/frontend/css/style.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/frontend/fontawesome-5.15.1/css/all.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/frontend/fontawesome-5.15.1/css/brands.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/frontend/css/glider.css" />
<script src="<?php echo base_url() ?>assets/frontend/js/jquery.js"></script>
<script src="<?php echo base_url() ?>assets/frontend/js/bootstrap.js"></script>

<style>
.avatar-player-name > div.img-icon {
    width: 100px;
    height: 100px;
    margin: auto;
}
.relative {
    position: relative;
}
.avatar-player-name > div.relative > span > i {
    padding: 4px;
    border-radius: 50%;
    background: rgb(255,255,255);
    position: absolute;
    right: 6px;
    bottom: 0px;
    border: 3px solid;
}

	
.thumb-container > img {
		text-align: center !important;
		max-width:100%;
	}
	
	.thumb-container{
		background:#efefef;
		border-radius:5px;
		padding:10px 10px 10px 10px;
	}
	.padding-10{
		padding:10px !important;
	}
	
	.thumb-container-active{
		background:#2b2b2b !important;
		
	}
	
</style>
  
	
</head>
<body>
<div id="preloader">
<div id="status">&nbsp;</div>
</div>

<div class="main-wrapper" style="min-height:100vh;">

	<section>
		<form action="<?php echo site_url('site/processLogin') ?>" method="post">
		<br>
			<div class="container">
				<div class="row">
					<div class="col-12 col-sm-12 col-md-12 col-lg-12 text-center">
						<img src="<?php echo base_url() ?>assets/frontend/img/logo.png" width="50">
					</div>
				</div>
			</div>
		
			<div class="container upload-image" style="margin-top:20%;">
				<div class="row">
					<div class="col-12 col-sm-12 col-md-12 col-lg-12 text-center text-white">
						<p>Update your avatar & <br> confirm mobile number</p>
					</div>
					
					<div class="col-12 col-sm-12 col-md-12 col-lg-12 text-center avatar-player-name">
						<div class="relative img-icon upload-image">
							<img id="user-img" src="<?php echo base_url() ?>uploads/site_users/default.png"  style="border:1px solid #efefef; padding:5px; background:#2b2b2b; border-radius:50%; width:120px;" />
							<span><i class="fa fa-plus"></i></span>
						</div>
					</div>
					
				</div>
			</div>
		<br>
		
		
			<div class="container">
				<div class="row">
					<div class="col-12 col-sm-12 col-md-12 col-lg-12 ">
						<div class="input-group"> 
							<span class=" input-group-addon">+92</span>
							<input class=" form-control form-control-custom" type="text" name="phone" pattern="\d{10}" placeholder="Enter 10 digit mobile number" value="<?php if(!empty($user_msisdn)) { echo @$user_msisdn; } ?>" required />
						</div>
					</div>
				</div>
			</div>
			
		<br><br>
			<div class="container">
				<div class="row">
					<div class="col-12 col-sm-12 col-md-12 col-lg-12 text-center">
					
								<?php if(@$this->session->flashdata('error')) { ?>
								
									<div class="alert alert-danger ">
										<div class=""><?php echo $this->session->flashdata('error'); ?></div>
										
									</div>
								<?php } ?>
					
					
					
						<input type="hidden" name="profile_image" id="profile_image" value="default" />
						<button type="submit" class="btn btn-custom-theme">Continue</button>
					</div>
				</div>
			</div>
			
		<br>
		
		</form>
		
		
		
	</section>
</div>


<div class="modal fade" id="showProfileImages" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-xl" role="document">
		<div class="modal-content">
			<div class="modal-body">
				<div class="card-body">
					<div class="row" style="margin-bottom: 30px">
						<div class="col-xs-12  auto-margin games_area"> 
							<?php if(is_array($profileImages) && count($profileImages)>0){ $iCount = 1; ?>
								<?php foreach($profileImages as $rowMale){ ?>
								
									  <div class="col-xs-4 col-sm-4 col-md-4 padding-10 margin-10">
										<div class="thumb-container text-center" data-attr-id="<?php echo (@$rowMale['id']); ?>">
										  <img class="lazy" src="<?php echo base_url('uploads/site_users/'.$rowMale['img']); ?>"  >
										 <!-- <p class="game-name"><?php echo @$rowMale['Name']; ?></p> -->
										</div>
									  </div>
									<?php if($iCount %3 == 0){ ?>
										<div style="clear:both !important;"><br></div>
									<?php } ?>
								<?php $iCount++; } ?>
							<?php } ?>
						</div>
					</div>
				</div>
			</div>
			<div class="modal-footer" style="text-align:center !important;"> <br>  
				<button type="button" class="btn btn-main" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>
	
 
<script>
$(document).on('click', '.upload-image', function(){
	$('#showProfileImages').modal('show');
});
</script>


 <script>
	$(document).on('click', '.thumb-container' ,function(){
		
		$(".thumb-container").removeClass("thumb-container-active");
		$(this).addClass("thumb-container-active");
		var imgId = $(this).attr('data-attr-id');
		
		var imgURL = "<?php echo base_url('uploads/site_users/"+imgId+".png') ?>";
		$("#profile_image").val(imgId);
		$("#user-img").attr('src', imgURL);
		$('#showProfileImages').modal('hide');
		
	});
 </script>


<script type="text/javascript">

$(window).on('load', function() { // makes sure the whole site is loaded 
$('#status').fadeOut(); // will first fade out the loading animation 
$('#preloader').fadeOut('fast'); // will fade out the white DIV that covers the website. 
$('body').css({'overflow':'visible'});
});

/*Fixed Navigation*/

</script>



</body>
</html>