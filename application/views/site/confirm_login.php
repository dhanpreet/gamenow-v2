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
		<form action="<?php echo site_url('site/processLoginOTP/'.base64_encode($user_id)) ?>" method="post">
		<br>
			<div class="container">
				<div class="row">
					<div class="col-12 col-sm-12 col-md-12 col-lg-12 text-center">
						<img src="<?php echo base_url() ?>assets/frontend/img/logo.png" width="50">
					</div>
				</div>
			</div>
		
			<div class="container " style="margin-top:20%;">
				<div class="row">
					<div class="col-12 col-sm-12 col-md-12 col-lg-12 text-center text-white">
						<p>Confirm your mobile number</p>
					</div>
					
					<div class="col-12 col-sm-12 col-md-12 col-lg-12 text-center avatar-player-name">
						<div class="relative img-icon">
							<img id="user-img" src="<?php echo $userInfo['user_img'] ?>"  style="border:1px solid #efefef; padding:5px; background:#2b2b2b; border-radius:50%; width:120px;" />
							
						</div>
					</div>
					
				</div>
			</div>
		<br>
		
		
			<div class="container">
				<div class="row">
					<div class="col-12 col-sm-12 col-md-12 col-lg-12 ">
						<div class="input-group"> 
							<span class=" input-group-addon"><i class="fa fa-mobile"></i></span>
							<input class=" form-control form-control-custom" type="number" name="confirm_otp" pattern="\d{10}" placeholder="Enter OTP" value="<?php if(!empty($user_msisdn)) { echo @$user_msisdn; } ?>" required />
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
					
					
					
						<input type="hidden" name="profile_image" id="profile_image" value="2" />
						<button type="submit" class="btn btn-custom-theme">Confirm</button>
					</div>
				</div>
			</div>
			
		<br>
		
		</form>
		
		
		
	</section>
</div>



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