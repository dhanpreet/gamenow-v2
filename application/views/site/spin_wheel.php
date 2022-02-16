<!-- Spin Wheel Modal -->
<div class="modal fade" id="spinWheelModal" tabindex="-1" role="dialog" aria-labelledby="spinWheelModal" aria-hidden="true" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog" role="document">
        <div class="modal-content modal-bg modal-bg-custom" align="center">
            <div class="modal-header">
                <button type="button" class="close spin_wheel_close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" style="color:#fff;">&times;</span>
                </button>
                <p>Advertisement</p>
                <h4>Win Free Subscription</h4>
            </div>
            <div class="modal-body">
                <div class="mainbox" id="mainbox">
                    <div class="box" id="box">
                        <div class="box1">
                            <span class="font span1"><b>Games World</b></span>
                            <span class="font span2"><b>Games Club</b></span>
                            <span class="font span3"><b>Lystn</b></span>
                        </div>
                        <div class="box2">
                            <span class="font span1"><b>Magical English</b></span>
                            <span class="font span2"><b>Jazz Game <br /> Zone</b></span>
                        </div>
                    </div>
                    <button class="spin" onclick="spin()"></button>
                    <div class="toast" style="top: 50%;left: 50%;transform: translate(-50%, -50%) matrix(1, 0, 0, 1, 0, 0);visibility: visible;background-color: rgb(232, 29, 98);opacity: 1;z-index: 1000;">  
                        <p>CLICK TO SPIN IT! </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="spinWheelSuccess" tabindex="-1" role="dialog" aria-labelledby="spinWheelSuccess" aria-hidden="true" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog" role="document">
        <div class="modal-content modal-bg modal-bg-custom" align="center">
            <div class="modal-header">
                <button type="button" class="close spin_wheel_close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" style="color:#fff;">&times;</span>
                </button>                
            </div>
            <div class="modal-body">
                <h4>Congratulations!</h4>
                <p>You have won 30 days free subscription of</p>                
                <h3 id="spin_wheel_selected"></h3>
                <br>
                <a class="btn btn-primary" id="redeem_now" href="">Redeem Now</a>
            </div>
        </div>
    </div>
</div>

<audio controls="controls" id="applause" src="<?php echo base_url() ?>assets/frontend/sounds/applause.mp3" type="audio/mp3"></audio>
<audio controls="controls" id="wheel" src="<?php echo base_url() ?>assets/frontend/sounds/wheel.mp3" type="audio/mp3"></audio>

<script type="text/javascript">
var spin_values = [];
var redeem_now_link;

$(document).ready(function(){     
    var ads = $.parseJSON('<?php echo json_encode($ads_list); ?>');  
    var total_ads = '<?php echo count($ads_list); ?>';
    function getRndAd(min, max) {
        return Math.floor(Math.random() * (max - min)) + min;
    }
    
    getAdsDetail();
    
});
    
function getAdsDetail() {
    var all_ads = $.parseJSON('<?php echo json_encode($ads_list); ?>');  
    var ad_count = 1;
    $.each(all_ads, function (key, val) {
        if(val.id != '1') {
            if(ad_count <= 5) {            
                //var ad_text = val.ad_text_main;
                spin_values.push({
                    ad_name: val.ad_text_main, //ad_text.match(/.{1,10}/g).join("<br/>"), //val.ad_text_main.replace(" ","_"),
                    ad_link: val.ad_link,
                });
                
                //console.log(ad_count+'  '+val.ad_text_main);
                
                $('#spin_val_'+ad_count).html('<b>'+val.ad_text_main+'</b>');
                
            }        
            ad_count++;
        }
    });
    
    console.log(spin_values);
    
}
</script>


<!-- Spin And Win Wheel -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<script type="text/javascript">
$(document).ready(function() {
    $(document).on('click', '.toast', function(e) {
        $('.spin').trigger('click');
    });
});
function shuffle(array) {
    var currentIndex = array.length,
    randomIndex;
    while (0 !== currentIndex) {
        randomIndex = Math.floor(Math.random() * currentIndex);
        currentIndex--;
        [array[currentIndex], array[randomIndex]] = [
            array[randomIndex],
            array[currentIndex],
        ];
    }
    return array;
}

function spin() {
    $('.spin_wheel_close').attr('disabled', 'disabled');
    // Play the sound
    wheel.play();
    const box = document.getElementById("box");
    const element = document.getElementById("mainbox");
    let SelectedItem = "";
    let spin_val_1 = shuffle([1695, 2060, 2775]); //shuffle([245]); //shuffle([1890, 2250, 2610]);
    let spin_val_2 = shuffle([1618, 1980, 2700]); //shuffle([170]); //shuffle([1850, 2210, 2570]); //Kemungkinan : 100%
    let spin_val_3 = shuffle([1906, 2265, 2625]); //shuffle([90]); //shuffle([1810, 2170, 2530]);
    let spin_val_4 = shuffle([1840, 2200, 2560]); //shuffle([30]); //shuffle([1770, 2130, 2490]);
    let spin_val_5 = shuffle([1770, 2130, 2850]); //shuffle([320]); //shuffle([1750, 2110, 2470]);
    let Hasil = shuffle([
        spin_val_1[0],
        spin_val_2[0],
        spin_val_3[0],
        spin_val_4[0],
        spin_val_5[0],
    ]);
    //console.log(Hasil[0]);
    // get the value of selected item
    if (spin_val_1.includes(Hasil[0])) {
        SelectedItem = spin_values[0].ad_name;
        redeem_now_link = spin_values[0].ad_link;
    }
    if (spin_val_2.includes(Hasil[0])) {
        SelectedItem = spin_values[1].ad_name;
        redeem_now_link = spin_values[1].ad_link;
    }
    if (spin_val_3.includes(Hasil[0])) {
        SelectedItem = spin_values[2].ad_name;
        redeem_now_link = spin_values[2].ad_link;
    }
    if (spin_val_4.includes(Hasil[0])) {
        SelectedItem = spin_values[3].ad_name;
        redeem_now_link = spin_values[3].ad_link;
    }
    if (spin_val_5.includes(Hasil[0])) {
        SelectedItem = spin_values[4].ad_name;
        redeem_now_link = spin_values[4].ad_link;
    }
    // spin
    //box.style.setProperty("transition", "all ease 2s");
    box.style.setProperty("transition-duration", "5s");
    box.style.transform = "rotate(" + Hasil[0] + "deg)";
    
    element.classList.remove("animate");
    setTimeout(function () {
        element.classList.add("animate");
    }, 5000);
    // alert
    setTimeout(function () {
        $('#spinWheelModal').modal('hide');
        $('.spin_wheel_close').removeAttr('disabled');
        $('#spinWheelSuccess').modal('show');
        applause.play();
        
        $('#spin_wheel_selected').html(SelectedItem);
        $('#redeem_now').attr('href', redeem_now_link);
        
        /*
        var msg = "You won free subscription for <a href='https://business.igpl.pro/'> " + SelectedItem + "</a>.";        
        var htmlContent = document.createElement("div");
        htmlContent.innerHTML = msg;
        
        swal({
            title: "Congratulations",
            content: htmlContent,
            type: "success",
            html: true,
        });
        */
    }, 5500);
    // delay
    setTimeout(function () {
        box.style.setProperty("transition", "initial");
        box.style.transform = "rotate(90deg)";
    }, 6000);
}

$('.spin_wheel').click(function() {
    $('#spinWheelModal').modal('show');
});
</script>