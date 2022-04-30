<style>
	
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

<div class="modal-dialog modal-xl" role="document">
		<div class="modal-content">
			<div class="modal-body">
				<div class="card-body">
					<div class="row" style="margin-bottom: 30px">
						<div class="col-xs-12  auto-margin games_area"> 
							<?php if(is_array($profileImages) && count($profileImages)>0){ $iCount=1; ?>
								<?php foreach($profileImages as $rowMale){ ?>
								
									  <div class="col-xs-4 padding-10 margin-10">
										<div class="thumb-container-login text-center" data-attr-id="<?php echo (@$rowMale['id']); ?>">
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
	


 
 <script>
	$(document).on('click', '.thumb-container-login' ,function(){
		
		$(".thumb-container").removeClass("thumb-container-active");
		$(this).addClass("thumb-container-active");
		var imgId = $(this).attr('data-attr-id');
	
		var imgURL = "<?php echo base_url('uploads/site_users/"+imgId+".png') ?>";
		$("#profile_login_image").val(imgId);
		$("#user-img-login").attr('src', imgURL);
		$('#showLoginProfileImages').modal('hide');
		$('#loginModal').modal('show');
		
	});
 </script>