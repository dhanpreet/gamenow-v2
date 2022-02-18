	
<div class="row">
    <div class="heading">
        <h3>Mini Games</h3>
        <span class="head-desc">Bite-sized games to play</span>
    </div>
</div>

<div class="row">
    <div class="glider-contain">
        <div class="glider-2">
            <?php if(is_array(@$miniGamesBanners[0]) && count(@$miniGamesBanners[0])> 0){ $miniCount_1 =1;  ?>
                <div>
                    <?php foreach($miniGamesBanners[0] as $rowMini_1){ ?>
                        <a href="<?php echo $rowMini_1['game_play_link'] ?>">
                            <div class="row thumbnails">
                                <div class="col-xs-3">
                                <?php  if(!empty($rowMini_1['img_gif_link']) && $miniCount_1 %3 == 0){ ?>
                                    <img alt="<?php echo $rowMini_1['game_name'] ?>" data-src="<?php echo base_url('uploads/content/'.$rowMini_1['img_gif_link']) ?>" loading="lazy" class="lazyload">

                                <?php } else { ?>
                                    <img alt="<?php echo $rowMini_1['game_name'] ?>" data-src="<?php echo base_url('uploads/content/'.$rowMini_1['img_link']) ?>" loading="lazy" class="lazyload">

                                <?php }  ?>
                                </div>

                                <div class="col-xs-7"><h3><?php echo $rowMini_1['game_name'] ?></h3><span class="head-desc">Available offline</span></div>
                                <div class="col-xs-2"><i class="fa fa-play"></i></div>
                            </div>
                        </a>
                    <?php $miniCount_1++; } ?>
                </div>
            <?php } ?>


            <?php if(is_array(@$miniGamesBanners[1]) && count(@$miniGamesBanners[1])> 0){ $miniCount_2 =1; ?>
                <div>
                <?php foreach($miniGamesBanners[1] as $rowMini_2){ ?>
                    <a href="<?php echo $rowMini_2['game_play_link'] ?>">
                        <div class="row thumbnails">
                            <div class="col-xs-3">
                                <?php  if(!empty($rowMini_2['img_gif_link']) && $miniCount_2 % 2 != 0){ ?>
                                    <img alt="<?php echo $rowMini_2['game_name'] ?>" data-src="<?php echo base_url('uploads/content/'.$rowMini_2['img_gif_link']) ?>" loading="lazy" class="lazyload">

                                <?php } else { ?>
                                    <img alt="<?php echo $rowMini_2['game_name'] ?>" data-src="<?php echo base_url('uploads/content/'.$rowMini_2['img_link']) ?>" loading="lazy" class="lazyload">

                                <?php }  ?>
                            </div>
                            <div class="col-xs-7"><h3><?php echo $rowMini_2['game_name'] ?></h3><span class="head-desc">Available offline</span></div>
                            <div class="col-xs-2"><i class="fa fa-play"></i></div>
                        </div>
                    </a>
                <?php $miniCount_2++;  } ?>
                </div>
            <?php } ?>


            <?php if(is_array(@$miniGamesBanners[2]) && count(@$miniGamesBanners[2])> 0){ $miniCount_3 =1; ?>
                <div>
                <?php foreach($miniGamesBanners[2] as $rowMini_3){ ?>
                    <a href="<?php echo $rowMini_3['game_play_link'] ?>">
                        <div class="row thumbnails">
                            <div class="col-xs-3">
                                <?php  if(!empty($rowMini_3['img_gif_link']) && $miniCount_2 % 2 != 0){ ?>
                                    <img alt="<?php echo $rowMini_3['game_name'] ?>" data-src="<?php echo base_url('uploads/content/'.$rowMini_3['img_gif_link']) ?>" loading="lazy" class="lazyload">

                                <?php } else { ?>
                                    <img alt="<?php echo $rowMini_3['game_name'] ?>" data-src="<?php echo base_url('uploads/content/'.$rowMini_3['img_link']) ?>" loading="lazy" class="lazyload">

                                <?php }  ?>
                            </div>
                            <div class="col-xs-7"><h3><?php echo $rowMini_3['game_name'] ?></h3><span class="head-desc">Available offline</span></div>
                            <div class="col-xs-2"><i class="fa fa-play"></i></div>
                        </div>
                    </a>
                <?php $miniCount_3++;  } ?>
                </div>
            <?php } ?>


        </div>
    </div>
</div>
		