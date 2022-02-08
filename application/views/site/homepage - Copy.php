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
<script src="<?php echo base_url() ?>assets/frontend/js/glider.js"></script>
<script>
  window.addEventListener('load',function(){
		window._ = new Glider(document.querySelector('.glider-1'), {
		slidesToShow: 3, //'auto',
		slidesToScroll: 3,
		itemWidth: 150,
		draggable: true,
		scrollLock: false,
		dots: '#dots',
		rewind: true,
		arrows: false,
		responsive: [
			{
				breakpoint: 800,
				settings: {
					slidesToShow: 4.2, 
				}
			},
		 ]
	   
	});
		window._ = new Glider(document.querySelector('.glider-5'), {
		slidesToShow: 3, //'auto',
		slidesToScroll: 3,
		itemWidth: 150,
		draggable: true,
		scrollLock: false,
		dots: '#dots',
		rewind: true,
		arrows: false,
		responsive: [
			{
				breakpoint: 800,
				settings: {
					slidesToShow: 4.2, 
				}
			},
		 ]
	   
	});
		window._ = new Glider(document.querySelector('.glider-05'), {
		slidesToShow: 3, //'auto',
		slidesToScroll: 3,
		itemWidth: 150,
		draggable: true,
		scrollLock: false,
		dots: '#dots',
		rewind: true,
		arrows: false,
		responsive: [
			{
				breakpoint: 800,
				settings: {
					slidesToShow: 4.2, 
				}
			},
		 ]
	   
	});
		 window._ = new Glider(document.querySelector('.slide-menu'), {
		slidesToShow: 4, //'auto',
		slidesToScroll: 1,
		itemWidth: 80,
		draggable: true,
		scrollLock: false,
		dots: '#dots',
		rewind: true,
		arrows: false,
		center:true,
	   
	});
		window._ = new Glider(document.querySelector('.glider-0'), {
		slidesToShow: 1, //'auto',
		slidesToScroll: 1,
		itemWidth: 150,
		draggable: true,
		scrollLock: false,
		dots: '#dots',
		rewind: true,
		arrows: false,
		responsive: [
			{
				breakpoint: 800,
				settings: {
					slidesToShow: 1.1, 
				}
			},
		 ]
	   
	});
   
	window._ = new Glider(document.querySelector('.glider-2'), {
		slidesToShow: 1.3, //'auto',
		slidesToScroll: 1,
		itemWidth: 150,
		draggable: true,
		scrollLock: false,
		dots: '#dots',
		rewind: true,
		arrows: false,
		responsive: [
			{
				breakpoint: 800,
				settings: {
					slidesToShow: 2.1, 
				}
			},
		 ]
	   
	});
		  window._ = new Glider(document.querySelector('.glider-6'), {
		slidesToShow: 1.3, //'auto',
		slidesToScroll: 1,
		itemWidth: 150,
		draggable: true,
		scrollLock: false,
		dots: '#dots',
		rewind: true,
		arrows: false,
		responsive: [
			{
				breakpoint: 800,
				settings: {
					slidesToShow: 2.1, 
				}
			},
		 ]
	   
	});
		  window._ = new Glider(document.querySelector('.glider-3'), {
		slidesToShow: 3, //'auto',
		slidesToScroll: 3,
		itemWidth: 150,
		draggable: true,
		scrollLock: false,
		dots: '#dots',
		rewind: true,
		arrows: false,
		responsive: [
			{
				breakpoint: 800,
				settings: {
					slidesToShow: 4.2, 
				}
			},
		 ]
	   
	});  window._ = new Glider(document.querySelector('.glider-4'), {
		slidesToShow: 1, //'auto',
		slidesToScroll: 1,
		itemWidth: 150,
		draggable: true,
		scrollLock: false,
		dots: '#dots',
		rewind: true,
		arrows: false,
		responsive: [
			{
				breakpoint: 800,
				settings: {
					slidesToShow: 1.1, 
				}
			},
		 ]
	   
	});
	
		window._ = new Glider(document.querySelector('.glider-01'), {
		slidesToShow: 3, //'auto',
		slidesToScroll: 3,
		itemWidth: 150,
		draggable: true,
		scrollLock: false,
		dots: '#dots',
		rewind: true,
		arrows: false,
		responsive: [
			{
				breakpoint: 800,
				settings: {
					slidesToShow: 4.2, 
				}
			},
		 ]
	   
	});
		 
	  
	   
		  window._ = new Glider(document.querySelector('.glider-03'), {
		slidesToShow: 3, //'auto',
		slidesToScroll: 3,
		itemWidth: 150,
		draggable: true,
		scrollLock: false,
		dots: '#dots',
		rewind: true,
		arrows: false,
		responsive: [
			{
				breakpoint: 800,
				settings: {
					slidesToShow: 4.2, 
				}
			},
		 ]
	   
	});  window._ = new Glider(document.querySelector('.glider-04'), {
		slidesToShow: 1, //'auto',
		slidesToScroll: 1,
		itemWidth: 150,
		draggable: true,
		scrollLock: false,
		dots: '#dots',
		rewind: true,
		arrows: false,
		responsive: [
			{
				breakpoint: 800,
				settings: {
					slidesToShow: 1.1, 
				}
			},
		 ]
	   
	});

  });
</script>
<style type="text/css">
.slide-menu.glider.draggable {
		position: fixed;
		bottom: 0;
		background: #202123;
		z-index: 1;
		border-top: 1px solid #4a4a4a;
		padding: 10px 0px;
	}
	
</style>

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
	color: #2b2b2b;
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

<div class="main-wrapper">

<?php include("sidebar.php"); ?>




<section>
	<div class="container">

		<!-- <div class="row">
			<form method="" action="" id="search">
				<input name="q" type="text" size="40" placeholder="Search..." />
			</form>
		</div> -->

		<!-- End -->

		<div class="row">
			<div class="glider-contain">
				<div class="slide-menu">
					<span><a class="nav-menu current" data-toggle="tab" href="#for-you"> For You</a></span>
					<span><a class="nav-menu" data-toggle="tab" href="#top-chart"> Top Chart</a></span>
					<span><a class="nav-menu" data-toggle="tab" href="#popular"> Popular</a></span>
					<span><a class="nav-menu" data-toggle="tab" href="#premium"> Tournaments</a></span>
						
				</div>
			</div>
		</div>

		<!-- End Menu -->
		<div class="tab-content">
		<div id="for-you" class="tab-pane fade in active">
		<div class="row">
			<div class="glider-contain">
				<div class="glider-0">
				<?php $hCount=1; foreach($heroBanners as $rowHero){ ?>
				<?php if(!empty($rowHero['img_gif_link']) && ($hCount== 1 || $hCount== 3)){ ?>
					
					<a href="<?php echo $rowHero['game_play_link'] ?>"><img width="100%" alt="<?php echo $rowHero['game_name'] ?>" src="<?php echo base_url('uploads/content/'.$rowHero['img_gif_link']) ?>"><span class="play-icon"><i class="fa fa-play"></i></span></a>
				<?php } else { ?>
						<a href="<?php echo $rowHero['game_play_link'] ?>"><img width="100%" alt="<?php echo $rowHero['game_name'] ?>" src="<?php echo base_url('uploads/content/'.$rowHero['img_link']) ?>"><span class="play-icon"><i class="fa fa-play"></i></span></a>
				
				<?php } ?>
				
				
				<?php $hCount++;  } ?>
						
				</div>
			</div>
		</div>

			<!-- End Slider -->
		<div class="row">
			<div class="heading">
			<h3 class="pull-left">Popular in Pakistan</h3>
			<span class="pull-right"><i style="font-size: 14px;    color: #dedede;" class="fa fa-chevron-right"></i></span>
			</div>
				<!-- end Heading -->
		</div>
		<div class="row">
			<div class="glider-contain">
			<div class="glider-1">
				<?php $pCount = 1; foreach($popularGamesBanners as $rowPopular){ ?>
					<a href="<?php echo $rowPopular['game_play_link'] ?>">
						<div>
							<?php if(!empty($rowPopular['img_gif_link']) && $pCount%2 != 0){ ?>
								<img style="border-radius:20px;" alt="<?php echo $rowPopular['game_name'] ?>" src="<?php echo base_url('uploads/content/'.$rowPopular['img_gif_link']) ?>">
							<?php } else { ?>
								<img style="border-radius:20px;" alt="<?php echo $rowPopular['game_name'] ?>" src="<?php echo base_url('uploads/content/'.$rowPopular['img_link']) ?>">
							<?php } ?>
							<span class="game-name"><?php echo $rowPopular['game_name'] ?></span>
							
						</div>
					</a>
				<?php $pCount++; } ?>
				
			</div>
		
			</div>
		</div>
		

		<!-- End Thumbnails -->
		
		
		<?php if(!empty($pageBanners[0])){ ?>
			<div class="row">
				<div class="single-banner">
					<a href="<?php echo $pageBanners[0]['game_play_link'] ?>"><img class="img-responsive" alt="<?php echo $pageBanners[0]['game_name'] ?>" src="<?php echo base_url('uploads/content/'.$pageBanners[0]['img_link']) ?>"></a>
				</div>
			</div>
		<?php } ?>
		
		<!-- End Single Banner -->
		
		
		
		<?php if(is_array(@$miniGamesBanners[0]) && count(@$miniGamesBanners[0])> 0){ ?>	
		<div class="row">
			<div class="heading">
				<h3>Mini Games</h3>
				<span class="head-desc">Bite-sized games to play</span>
			</div>
		</div>
		
		<div class="row">
			<div class="glider-contain">
				<div class="glider-2">
					<?php if(is_array(@$miniGamesBanners[0]) && count(@$miniGamesBanners[0])> 0){ ?>
						<div>
							<?php foreach($miniGamesBanners[0] as $rowMini_1){ ?>
								<a href="<?php echo $rowMini_1['game_play_link'] ?>">
									<div class="row thumbnails">
										<div class="col-xs-3"><img alt="<?php echo $rowMini_1['game_name'] ?>" src="<?php echo base_url('uploads/content/'.$rowMini_1['img_link']) ?>"></div>
										<div class="col-xs-7"><h3><?php echo $rowMini_1['game_name'] ?></h3><span class="head-desc">Available offline</span></div>
										<div class="col-xs-2"><i class="fa fa-play"></i></div>
									</div>
								</a>
							<?php } ?>
						</div>
					<?php } ?>
					
					<div>
					<?php if(is_array(@$miniGamesBanners[1]) && count(@$miniGamesBanners[1])> 0){ ?>
						<?php foreach($miniGamesBanners[1] as $rowMini_2){ ?>
							<a href="<?php echo $rowMini_2['game_play_link'] ?>">
								<div class="row thumbnails">
									<div class="col-xs-3"><img alt="<?php echo $rowMini_2['game_name'] ?>" src="<?php echo base_url('uploads/content/'.$rowMini_2['img_link']) ?>"></div>
									<div class="col-xs-7"><h3><?php echo $rowMini_2['game_name'] ?></h3><span class="head-desc">Available offline</span></div>
									<div class="col-xs-2"><i class="fa fa-play"></i></div>
								</div>
							</a>
						<?php } ?>
					<?php } ?>
					</div>
					
				</div>
			</div>
		</div>
		<?php } ?>
		
		<!-- End Section -->
		<div class="row">
			<div class="heading">
			<h3>Tournamnets for You</h3>
			<span class="head-desc">Bite-sized games to play</span>
			
			</div>
				<!-- end Heading -->
		</div>
		<div class="row">
			<div class="glider-contain">
				<div class="glider-5">
					<?php $tCount = 1; foreach($tournamentGamesBanners as $rowTournament){ ?>
						<a href="<?php echo $rowTournament['game_play_link'] ?>">
							<div>
								<img style="border-radius:20px;" alt="<?php echo $rowTournament['game_name'] ?>" src="<?php echo base_url('uploads/content/'.$rowTournament['img_link']) ?>">
								<span class="game-name"><?php echo $rowTournament['game_name'] ?></span>
								
							</div>
						</a>
					<?php $tCount++; } ?>
					
				</div>
			</div>
		</div>

		<!-- End Section -->
		<div class="row">
			<div class="glider-contain" style="margin-top:30px;">
			<div class="glider-4">
				<?php /* $pbCount = 1;  foreach($pageBannersGIF as $rowPageGIF){ ?>
					
					<?php if($pbCount%2 !=0){ ?>
						<a href="<?php echo $rowPageGIF['game_play_link'] ?>"><img width="100%" alt="<?php echo $rowPageGIF['game_name'] ?>" src="<?php echo base_url('uploads/content/'.$rowPageGIF['img_gif_link']) ?>"><span class="play-icon"><i class="fa fa-play"></i></span></a>
				
					<?php } else { ?>
						<a href="<?php echo $rowPageGIF['game_play_link'] ?>"><img width="100%" alt="<?php echo $rowPageGIF['game_name'] ?>" src="<?php echo base_url('uploads/content/'.$rowPageGIF['img_link']) ?>"><span class="play-icon"><i class="fa fa-play"></i></span></a>
				
					<?php } ?>
				<?php $pbCount++; }  */ ?>
					
				<?php if(!empty($pageBanners[1]['img_gif_link'])){ ?>
					<a href="<?php echo $pageBanners[1]['game_play_link'] ?>"><img width="100%" alt="<?php echo $pageBanners[1]['game_name'] ?>" src="<?php echo base_url('uploads/content/'.$pageBanners[1]['img_gif_link']) ?>"><span class="play-icon"><i class="fa fa-play"></i></span></a>
				<?php } else { ?>
					<a href="<?php echo $pageBanners[1]['game_play_link'] ?>"><img width="100%" alt="<?php echo $pageBanners[1]['game_name'] ?>" src="<?php echo base_url('uploads/content/'.$pageBanners[1]['img_link']) ?>"><span class="play-icon"><i class="fa fa-play"></i></span></a>
				<?php } ?>
				
				<a href="<?php echo $pageBanners[2]['game_play_link'] ?>"><img width="100%" alt="<?php echo $pageBanners[2]['game_name'] ?>" src="<?php echo base_url('uploads/content/'.$pageBanners[2]['img_link']) ?>"><span class="play-icon"><i class="fa fa-play"></i></span></a>
				
				
				<?php if(!empty($pageBanners[3]['img_gif_link'])){ ?>
					<a href="<?php echo $pageBanners[3]['game_play_link'] ?>"><img width="100%" alt="<?php echo $pageBanners[1]['game_name'] ?>" src="<?php echo base_url('uploads/content/'.$pageBanners[3]['img_gif_link']) ?>"><span class="play-icon"><i class="fa fa-play"></i></span></a>
				<?php } else { ?>
					<a href="<?php echo $pageBanners[3]['game_play_link'] ?>"><img width="100%" alt="<?php echo $pageBanners[1]['game_name'] ?>" src="<?php echo base_url('uploads/content/'.$pageBanners[3]['img_link']) ?>"><span class="play-icon"><i class="fa fa-play"></i></span></a>
				<?php } ?>
				
			</div>
			</div>
		</div>
		<!-- End Section -->
		
		<div class="row">
			<div class="heading">
			<h3 class="pull-left">Continue Games</h3>
			<span class="pull-right"><i style="font-size: 14px;    color: #dedede;" class="fa fa-chevron-right"></i></span>
			</div>
				<!-- end Heading -->
		</div>
		<div class="row">
			<div class="glider-contain">
			<div class="glider-3">
				
					<?php $mpCount = 1; foreach($mostlyPlayedGamesBanners as $rowMostlyPlayed){ ?>
					<a href="<?php echo $rowMostlyPlayed['game_play_link'] ?>">
						<div>
							<?php if(!empty($rowMostlyPlayed['img_gif_link']) && $mpCount%2 != 0){ ?>
								<img style="border-radius:20px;" alt="<?php echo $rowMostlyPlayed['game_name'] ?>" src="<?php echo base_url('uploads/content/'.$rowMostlyPlayed['img_gif_link']) ?>">
							<?php } else { ?>
								<img style="border-radius:20px;" alt="<?php echo $rowMostlyPlayed['game_name'] ?>" src="<?php echo base_url('uploads/content/'.$rowMostlyPlayed['img_link']) ?>">
							<?php } ?>
							<span class="game-name"><?php echo $rowMostlyPlayed['game_name'] ?></span>
							
						</div>
					</a>
				<?php $mpCount++; } ?>
				
			</div>
		
		
			</div>
		</div>
		<!--  -->
		
		<?php if(is_array(@$freeGamesBanners[0]) && count(@$freeGamesBanners[0])> 0){ ?>
		<div class="row">
			<div class="heading">
			<h3>Free to Play</h3>
			<span class="head-desc">Bite-sized games to play</span>
			
			</div>
				<!-- end Heading -->
		</div>
		<div class="row">
			<div class="glider-contain">
				<div class="glider-6">
					<?php if(is_array(@$freeGamesBanners[0]) && count(@$freeGamesBanners[0])> 0){ ?>
						<div>
							<?php foreach($freeGamesBanners[0] as $rowFree){ ?>
								<a href="<?php echo $rowFree['game_play_link'] ?>">
									<div class="row thumbnails">
										<div class="col-xs-12"><img alt="Test" src="<?php echo base_url('uploads/content/'.$rowFree['img_link']) ?>"></div>
										<div class="col-xs-12 game-name"><h3><?php echo $rowFree['game_name'] ?></h3><span class="head-desc">Available offline</span></div>
										
									</div>
								</a>
							<?php } ?>
						</div>
					<?php } ?>
					
					<?php if(is_array(@$freeGamesBanners[1]) && count(@$freeGamesBanners[1])> 0){ ?>	
						<div>
							<?php foreach($freeGamesBanners[1] as $rowFree_1){ ?>
								<a href="<?php echo $rowFree_1['game_play_link'] ?>">
									<div class="row thumbnails">
										<div class="col-xs-12"><img alt="Test" src="<?php echo base_url('uploads/content/'.$rowFree_1['img_link']) ?>"></div>
										<div class="col-xs-12 game-name"><h3><?php echo $rowFree_1['game_name'] ?></h3><span class="head-desc">Available offline</span></div>
										
									</div>
								</a>
							<?php } ?>
						</div>
					<?php } ?>
						
					<?php if(is_array(@$freeGamesBanners[2]) && count(@$freeGamesBanners[2])> 0){ ?>
						<div>
							<?php foreach($freeGamesBanners[2] as $rowFree_2){ ?>
								<a href="<?php echo $rowFree_2['game_play_link'] ?>">
									<div class="row thumbnails">
										<div class="col-xs-12"><img alt="Test" src="<?php echo base_url('uploads/content/'.$rowFree_2['img_link']) ?>"></div>
										<div class="col-xs-12 game-name"><h3><?php echo $rowFree_2['game_name'] ?></h3><span class="head-desc">Available offline</span></div>
										
									</div>
								</a>
							<?php } ?>
						</div>
					<?php } ?>
				</div>
			</div>
		</div>
		<?php } ?>
		
		
		<!-- End Section -->
		<!-- <div class="footer-strip">
			<span class="col-xs-6"><span class="block"><i style="font-size: 18px;" class="fa fa-trophy"></i></span>Featured</span>
			<span class="col-xs-6"><span class="block"><i style="font-size: 18px;" class="fa fa-gamepad"></i></span>Practice</span>
		</div> -->
					</div>
		<!-- END TAP-1 -->



		<div id="top-chart" class="tab-pane fade">
			<div class="top-chart-content" style="margin-top: 30px;">
			
				<?php if(is_array(@$topChartGames) && count(@$topChartGames)> 0){ ?>
					<?php $tCount=1; foreach($topChartGames as $rowTopChart){ ?>
						<a href="<?php echo $rowTopChart['game_play_link'] ?>">
							<div class="row thumbnails">
								<?php if(!empty($rowTopChart['img_gif_link']) && $tCount%3 == 0){ ?>
									<div class="col-xs-3"><img alt="<?php echo $rowTopChart['game_name'] ?>" src="<?php echo base_url('uploads/content/'.$rowTopChart['img_gif_link']) ?>"></div>
								<?php } else { ?>
									<div class="col-xs-3"><img alt="<?php echo $rowTopChart['game_name'] ?>" src="<?php echo base_url('uploads/content/'.$rowTopChart['img_link']) ?>"></div>
								<?php } ?>
								<div class="col-xs-7"><h3><?php echo $rowTopChart['game_name'] ?></h3><span class="head-desc">Available offline</span></div>
								<div class="col-xs-2"><i class="fa fa-play"></i></div>
							</div>
						</a>
					<?php $tCount++; } ?>
				<?php } ?>
			
			</div>
		</div>
		<!-- End -->
		
		
		
		
	<div id="popular" class="tab-pane fade">
		<?php if(!empty($pageBanners[4]['game_play_link'])){ ?>
		<div class="row">
			<a href="<?php echo @$pageBanners[4]['game_play_link'] ?>">
				<div class="single-banner">
					<?php if(!empty($pageBanners[4]['img_gif_link'])){ ?>
						<img class="img-responsive" alt="<?php echo $pageBanners[4]['game_name'] ?>" src="<?php echo base_url('uploads/content/'.$pageBanners[4]['img_gif_link']) ?>">
					<?php } else { ?>	
						<img class="img-responsive" alt="<?php echo $pageBanners[4]['game_name'] ?>" src="<?php echo base_url('uploads/content/'.$pageBanners[4]['img_link']) ?>">
					<?php }  ?>
				</div>
			</a>
		</div>
		<?php } ?>
		<div class="row">
			<div class="heading">
			<h3>Tournamnets for You</h3>
			<span class="head-desc">Bite-sized games to play</span>
			
			</div>
				<!-- end Heading -->
		</div>
		<div class="row">
			<div class="glider-contain">
				<div class="glider-05">
					<?php  foreach($tournamentGamesBanners as $rowTournamentPopular){ ?>
						<a href="<?php echo $rowTournamentPopular['game_play_link'] ?>">
							<div>
								<img style="border-radius:20px;" alt="<?php echo $rowTournamentPopular['game_name'] ?>" src="<?php echo base_url('uploads/content/'.$rowTournamentPopular['img_link']) ?>">
								<span class="game-name"><?php echo $rowTournamentPopular['game_name'] ?></span>
								
							</div>
						</a>
					<?php  } ?>
				</div>		
			</div>
		</div>
		
		<br>

		<div class="top-chart-content">
			<?php $pCount = 1; foreach($popularGamesBanners as $rowPopular_2){ ?>
				<a href="<?php echo $rowPopular_2['game_play_link'] ?>">
					<div class="row thumbnails">
						<?php if(!empty($rowPopular_2['img_gif_link']) && $pCount%2 == 0){ ?>
							<div class="col-xs-3"><img alt="<?php echo $rowPopular_2['game_name'] ?>" src="<?php echo base_url('uploads/content/'.$rowPopular_2['img_gif_link']) ?>"></div>
						<?php } else { ?>
							<div class="col-xs-3"><img alt="<?php echo $rowPopular_2['game_name'] ?>" src="<?php echo base_url('uploads/content/'.$rowPopular_2['img_link']) ?>"></div>
						<?php } ?>
						<div class="col-xs-7"><h3><?php echo $rowPopular_2['game_name'] ?></h3><span class="head-desc">Available offline</span></div>
						<div class="col-xs-2"><i class="fa fa-play"></i></div>
					</div>
				</a>
			<?php $pCount++; } ?>
		</div>
	</div>

	<!-- End Section -->
	
	<div id="premium" class="tab-pane fade">
		
		<div class="row">
			<?php $fCount=1;  foreach($fullTournamentGamesBanners as $rowFullTournament){ ?>
				<a href="<?php echo $rowFullTournament['game_play_link'] ?>">
					<div class="single-banner">
						<?php if($fCount%2 == 0){ ?>
						<img class="img-responsive" alt="<?php echo $rowFullTournament['game_name'] ?>" src="<?php echo base_url('uploads/content/'.$rowFullTournament['img_link']) ?>">
						<?php } else { ?>
							<?php if(!empty($rowFullTournament['img_gif_link'])){ ?>
								<img class="img-responsive" alt="<?php echo $rowFullTournament['game_name'] ?>" src="<?php echo base_url('uploads/content/'.$rowFullTournament['img_gif_link']) ?>">
							<?php } else { ?>
								<img class="img-responsive" alt="<?php echo $rowFullTournament['game_name'] ?>" src="<?php echo base_url('uploads/content/'.$rowFullTournament['img_link']) ?>">
							<?php } ?>
						<?php } ?>
					</div>
				</a>
			<?php $fCount++; } ?>
		</div>
		<!-- End Single Banner -->
		
		
	</div>
	</div>
		<br><br>
	</div>
</section>
</div>

<!-- Modal -->
<div class="modal fade" id="loginModal" style="z-index:999999 !important;" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content modal-bg " align="center">
		  <div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			  <span aria-hidden="true" style="color:#fff;">&times;</span>
			</button>
		  </div>
		  <div class="modal-body">
			<form action="<?php echo site_url('site/processLogin') ?>" method="post">
				
				
				<div class="row upload-login-image">
					<div class="col-12 col-sm-12 col-md-12 col-lg-12 text-center text-white">
						<p>Update your avatar & <br> confirm mobile number</p>
					</div>
					
					<div class="col-12 col-sm-12 col-md-12 col-lg-12 text-center avatar-player-name">
						<div class="relative img-icon upload-login-image">
							<img id="user-img-login" src="<?php echo base_url() ?>uploads/site_users/default.png"  style="border:1px solid #efefef; padding:5px; background:#2b2b2b; border-radius:50%; width:120px;" />
							<span><i class="fa fa-plus"></i></span>
						</div>
					</div>
					
				</div>
				
				<br>
				
				<div class="row">
					<div class="col-12 col-sm-12 col-md-12 col-lg-12 ">
						<div class="input-group"> 
							<span class=" input-group-addon">+92</span>
							<input class=" form-control form-control-custom" type="text" name="phone" pattern="\d{10}" placeholder="Enter 10 digit mobile number" value="<?php if(!empty($user_msisdn)) { echo @$user_msisdn; } ?>" required />
						</div>
					</div>
				</div>
				<br>
				<div class="row">
					<div class="col-12 col-sm-12 col-md-12 col-lg-12 text-center">
					
						<input type="hidden" class=" form-control form-control-custom" name="profile_login_image" id="profile_login_image" value="default" />
						<button type="submit" class="btn btn-custom-theme">Continue</button>
						<br><br><br>
						
						<a href="#" style="font-size:1.05em; color:#fff;" data-dismiss="modal" aria-label="Close">Skip</a>
					</div>
				</div>
				
			</form>
		  </div>
		 
		</div>
	</div>
</div>

<!-- Modal -->
<div class="modal fade" id="updateProfileImage" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content modal-bg modal-bg-custom" align="center">
		  <div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			  <span aria-hidden="true" style="color:#fff;">&times;</span>
			</button>
		  </div>
		  <div class="modal-body">
				<br>
				<a href="#" class="btn btn-custom-light upload-image"> <i class="fa fa-user-circle fa-lg"></i> &nbsp; Update Your Avatar</a>
				<br><br><br>
				<a href="" class="btn btn-custom-facebook"> <i class="fa fab fa-facebook fa-lg"></i> &nbsp; Connect With Facebook</a>
			
				<br><br><br>
		  </div>
		 
		</div>
	</div>
</div>



<div class="modal fade" id="showProfileImages" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	
</div>



<div class="modal fade" id="showLoginProfileImages" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	
</div>


<script>
$(document).ready(function(){
$('.open-sidebar').on('click', function(){
	$("#mySidenav").show('fast');
});
});
</script>

<script>
$(document).ready(function(){
$('.closebtn').on('click', function(){
	$("#mySidenav").hide('fast');
});
});
</script>

<script>
$(document).ready(function(){
$('a.nav-menu').on('click', function(){

$('a.nav-menu').removeClass('current');
$(this).addClass('current');
});
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




<script>
$(document).ready(function() {
$('.nav-menu').click(function(){
	
	// $("html, body").animate({ scrollTop: 0 }, "slow");
	window.scrollTo({ top: 0, behavior: 'smooth' });
});
});
</script>



 
<script>
$(document).on('click', '.upload-image', function(){
	$.ajax({
		url : "<?php echo site_url('site/chooseProfileImage') ?>",
		type: "POST",
		success: function(data){
			$('#updateProfileImage').modal('hide');
			$('#showProfileImages').html(data);
			$('#showProfileImages').modal('show');
		}
	});
});
</script>



 
<script>
$(document).on('click', '.upload-login-image', function(){
	$.ajax({
		url : "<?php echo site_url('site/chooseLoginProfileImage') ?>",
		type: "POST",
		success: function(data){
			$('#loginModal').modal('hide');
			$('#showLoginProfileImages').html(data);
			$('#showLoginProfileImages').modal('show');
		}
	});
});
</script>



</body>
</html>