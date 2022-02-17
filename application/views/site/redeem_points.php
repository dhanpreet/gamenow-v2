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
<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/frontend/css/spin_wheel.css" />
<script src="<?php echo base_url() ?>assets/frontend/js/jquery.js"></script>
<script src="<?php echo base_url() ?>assets/frontend/js/bootstrap.js"></script>
<script src="<?php echo base_url() ?>assets/frontend/js/glider.js"></script>

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

<?php  include "pwa_settings.php"; ?>
<?php // include "google_analytics.php"; ?>
  
</head>
<body>
<div id="preloader">
<div id="status">&nbsp;</div>
</div>

<div class="main-wrapper">

<?php include("sidebar.php"); ?>

<section>
    <div class="container">
        
        <?php
            $error_message = $this->session->flashdata('error');
            if(!empty($error_message)) {
        ?>
        <div class="row">
            <span class="error"><?php echo $error_message; ?></span>
        </div>
        <?php } ?>
        
        <div class="row">            
            <h4 class="heading redeem_points_coins_heading">
                <b>My Coins</b> 
                <span class="pull-right">
                    <img src="<?php echo base_url() ?>assets/frontend/img/gold-coins.png" alt="" width="30" height="30">
                    <?php echo $total_coins; ?>
                </span>
            </h4>
            
            <!-- Advertisements -->
            <?php                 
                //echo "<pre>"; print_r($ads_list); die;            
                foreach($ads_list as $ad) {
            ?>
            <form method="POST" action="<?php echo site_url('site/subscribe_ad') ?>" id="subscribe_ad_<?php echo $ad['id']; ?>">
                <input type="hidden" name="ad_id" value="<?php echo $ad['id']; ?>" />
                <div class="row">        
                    <div class="col-lg-11 redeem_points_div">
                        <div class="col-lg-12">
                            <span class="ad_text_span ad_name_<?php echo $ad['id']; ?>"><?php echo $ad['ad_text_main']; ?></span>
                        </div>
                        <div class="clearfix"></div>
                        <div class="col-lg-12 margin-top-15">
                            <div class="subscription_text_div">
                                <p>30 Days <br>
                                Free Subscription</p>
                            </div>
                            <div class="subscribe_div">
                                <img src="<?php echo base_url() ?>assets/frontend/img/gold-coins.png" alt="" width="30" height="30">
                                <span class="subscription_coins"><?php echo $ad['subscription_coins']; ?></span>                            
                                <br>
                                <button class="btn btn-success subscribe_btn" type="button" data-ad_id="<?php echo $ad['id']; ?>">Redeem Now</button>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>    
                    <div class="clearfix"></div>
                </div>
                <br>
            </form>
            <?php } ?>
        </div>
        <br><br>
    </div>
</section>
</div>
    
<?php include("spin_wheel.php"); ?>

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



<!-- Subscribe Ad Modal -->
<div class="modal fade" id="subscribeAdModal" tabindex="-1" role="dialog" aria-labelledby="subscribeAdModal" aria-hidden="true" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog" role="document">
        <div class="modal-content modal-bg modal-bg-custom" align="center">
            <div class="modal-header">
                <button type="button" class="close spin_wheel_close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" style="color:#fff;">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row subscription_box">
                    <input type="hidden" id="subscribe_ad_id" value="">
                    <div class="row">
                        <p>
                            Are you sure you want to subscribe 
                            <span id="subscribe_ad_name"></span>?
                            <!--for <span id="subscribe_ad_coins"></span>? -->
                        </p>
                    </div>
                    <br>
                    <div class="row">
                        <button class="btn btn-success subscribe_btn" id="subscribe_confirm">Subscribe</button>
                    </div>   
                </div>                             
            </div>
        </div>
    </div>
</div>


<script type="text/javascript">
$(window).on('load', function() { // makes sure the whole site is loaded 
    $('#status').fadeOut(); // will first fade out the loading animation 
    $('#preloader').fadeOut('fast'); // will fade out the white DIV that covers the website. 
    $('body').css({'overflow':'visible'});
});
    
$(document).ready(function(){     
    var ads = $.parseJSON('<?php echo json_encode($ads_list); ?>');  
    var total_ads = '<?php echo count($ads_list); ?>';
        
    $('.open-sidebar').on('click', function(){
        $("#mySidenav").show('fast');
    });
    
    $('.closebtn').on('click', function(){
	$("#mySidenav").hide('fast');
    });
    
    $('a.nav-menu').on('click', function() {
        $('a.nav-menu').removeClass('current');
        $(this).addClass('current');
    });
    
    $('.nav-menu').click(function(){	
	// $("html, body").animate({ scrollTop: 0 }, "slow");
	window.scrollTo({ top: 0, behavior: 'smooth' });
    });
    
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
    
    // subscribe ad
    $(document).on('click', '.subscribe_btn', function(e){
        e.preventDefault();
        var subscribe_ad_id = $(this).data('ad_id');
        var ad_name = $.trim($('.ad_name_'+subscribe_ad_id).html());
        //var ad_coins = $('.ad_coins_'+subscribe_ad_id).html();
        
        $('#subscribe_ad_id').val(subscribe_ad_id);
        $('#subscribe_ad_name').text(ad_name);
        //$('#subscribe_ad_coins').text(ad_coins);
        
        $('#subscribeAdModal').modal('show');
        
    });
    
    
    $(document).on('click', '#subscribe_confirm', function(){
        var subscribe_ad = $('#subscribe_ad_id').val();
        $('#subscribe_ad_'+subscribe_ad).submit();
    });
    
    
});

</script>

</body>
</html>