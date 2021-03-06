<?php 
$sessionUserId = $this->session->userdata('user_id');
$sessionPhone = @$this->session->userdata('user_phone');


?>

<div id="mySidenav" class="sidenav">
	<div class="sidebar-head">
		<span class="pull-left">
			<?php if($sessionUserId !== 'unknown'){ ?>
				<img id="user-img-sidebar" class="menu-profile-picture" src="<?php echo $this->session->userdata('user_img') ?>" width="44">
			<?php } else { ?>
			
				<img id="user-img-sidebar" class="menu-profile-picture" src="<?php echo base_url('uploads/site_users/default.png') ?>" width="44">
			<?php } ?>
		</span>
		
		<?php 
		
		if($sessionUserId !== 'unknown'){
		
		$sessionPhone = substr($sessionPhone, 0, 2).'*****'.substr($sessionPhone, 7, 3);  
		?>
		<span class="pull-left">+92 <?php echo $sessionPhone; ?></span>
		
		<?php } else { ?>
			<span class="pull-left">+92 **********</span>
		<?php } ?>
		
	
	
	</div>
	<hr style="border-top: 1px solid #424242;">
	<a href="javascript:void(0)" class="closebtn">&times;</a>

	<div class="side-menu">
		<ul>
			<li><a href="#" class="active"><i class="menu-item fa fa-home"></i> <span>Home</span></a></li>
			
			<?php if($sessionUserId !== 'unknown'){ ?>
				<li><a href="javascript(0);" data-toggle="modal" data-target="#updateProfileImage"> <i class="menu-item fa fa-user-circle"></i> <span>Update Your Avatar</span></a></li>
			<?php } else { ?>
				<li><a href="javascript(0);" data-toggle="modal" data-target="#loginModal"> <i class="menu-item fa fa-user-circle"></i> <span>Update Your Avatar</span></a></li>
			<?php } ?>
			
			<li><a href="#"><i class="menu-item fa fab fa-facebook"></i> <span>Connect With Facebook</span></a></li>
		</ul>
		<hr style="border-top: 1px solid #424242;">
		<ul>
			<li><a href="#"><i class="menu-item fa fa-file-alt"></i><span>About Us</span></a></li>
			<li><a href="#"><i class="menu-item fa fa-file-contract"></i><span>Terms & Conditions</span></a></li>
			<li><a href="#"><i class="menu-item fa fa-shield-alt"></i><span>Privacy Policy</span></a></li>
			<li><a href="#"><i class="menu-item fa fa-headset"></i><span>Support</span></a></li>
			<li><a href="<?php echo site_url('site/logout') ?>"><i class="menu-item fa fa-lock"></i><span>Logout</span></a></li>
		</ul>
	</div>
</div>	


<div class="header-strip" style="border-bottom: 1px solid #312b2b; padding-bottom:10px;">
	<span class="open-sidebar"><img src="<?php echo base_url() ?>assets/frontend/img/white-menu-icon.png"> </span>
	<img src="<?php echo base_url() ?>assets/frontend/img/logo.png" width="50">
	
			<?php if($sessionUserId !== 'unknown'){ ?>
				<a href="javascript(0);" data-toggle="modal" data-target="#updateProfileImage"> 
					<span class="pull-right">
						<img id="user-img" class="profile-picture menu-profile-picture" src="<?php echo $this->session->userdata('user_img') ?>" width="44">
					</span>
				</a>
			<?php } else { ?>
				<a href="javascript(0);" data-toggle="modal" data-target="#loginModal"> 
					<span class="pull-right">
						<img id="user-img" class="profile-picture menu-profile-picture" src="<?php echo base_url('uploads/site_users/default.png') ?>" width="44">
					</span>
				</a>
			<?php } ?>
		
		
		
	
</div>




