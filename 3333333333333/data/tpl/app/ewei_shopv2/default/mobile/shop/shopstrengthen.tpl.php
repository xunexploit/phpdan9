<?php defined('IN_IA') or exit('Access Denied');?><?php  if(!empty($order)) { ?>
<div id="unpaid" >
    <div class="unpaid-alert">
        <div class="unpaid-title">您有一个订单待支付</div>
        <div class="unpaid-subtitle">未支付的订单将在<span class="last-time"><span class="time-hour"></span>:<span class="time-min"></span>:<span class="time-sec"></span></span>后自动关闭，请尽快支付哦！</div>
        <div class="unpaid-content fui-list-group">
            <?php  if(is_array($goods)) { foreach($goods as $item) { ?>
                <div class="fui-list">
                    <div class="fui-list-media image-media">
                        <a>
                            <img class=""  src="<?php  echo tomedia($item['thumb'])?>">
                        </a>
                    </div>
                    <div class="fui-list-inner">
                        <a>
                            <div class="subtitle">
                                <?php  echo $item['title'];?>
                            </div>
                        </a>
                        <div class="price">
                            <span class="bigprice text-danger">￥<span class="marketprice"><?php  echo $item['marketprice'];?>  </span> </span><span style="float:right;color:#999;font-size:.6rem">x <?php  echo $item['totals'];?></span>
                        </div>
                    </div>
                </div>
            <?php  } } ?>
            <?php  if($goodstotal>3) { ?>
                <div class="fui-list">
                    等多件商品
                </div>
            <?php  } ?>
        </div>
        <a id="btn-pay" href="<?php  echo mobileurl('order/detail', array('id'=>$order['id']))?>" class=" btn btn-danger disable block">立即支付<span style="font-size:.65rem;margin-left:.5rem">(合计:￥<?php  echo $order['price'];?>)</span></a>
        <i class="icon icon-guanbi1" id="unpaid-colse" style="font-size:1.5rem;color:#fff;position: absolute;top:105%;left:46%"></i>
    </div>
</div>


<script>
    var timer=0;
    var close_time=<?php echo empty($close_time)?0:$close_time?>;
    var lasttime=0;

    $(function(){
        $("#unpaid-colse").click(function(){
            $("#unpaid").addClass("shut");
            clearInterval(timer);
            setTimeout(function(){
                $("#unpaid").css("display","none");
                $("#unpaid").removeClass("shut");
            },1000)
        });
        initTimer();
    });

    function initTimer () {
        if(close_time==0 || close_time=='undefined' || close_time==''){
            $(".last-time").html("不久之");
            return;
        }
        clearInterval(timer);
        $.ajax({
            url: '../addons/ewei_shopv2/map.json',cache:false,
            complete: function (x) {
                currenttime = +new Date(x.getResponseHeader("Date")) / 1000;
                lasttime = close_time-currenttime;
                timer = setTimerInterval()
            }
        })
    };
    function setTimer() {
        //每十秒请求一次服务器，获取时间
        if(lasttime%10==0){
            $.ajax({
                url: '../addons/ewei_shopv2/map.json',cache:false,
                complete: function (x) {
                    currenttime = +new Date(x.getResponseHeader("Date")) / 1000;
                    lasttime = close_time-currenttime;
                }
            })
        }
        lasttime -= 1;
        var times = formatSeconds(lasttime);
        var obj = $(".last-time");
        obj.find('.time-hour').html(" "+times.hour);
        obj.find('.time-min').html(times.min);
        obj.find('.time-sec').html(times.sec+" ");
        if (lasttime <= 0) {
            clearInterval(timer);
            $(".last-time").html("不久之");
        }
    };

    function setTimerInterval() {
        return setInterval(function () {
            setTimer()
        }, 1000)
    };


    function formatSeconds(value) {
        var theTime = parseInt(value);
        var theTime1 = 0;
        var theTime2 = 0;
        if (theTime > 60) {
            theTime1 = parseInt(theTime / 60);
            theTime = parseInt(theTime % 60);
            if (theTime1 > 60) {
                theTime2 = parseInt(theTime1 / 60);
                theTime1 = parseInt(theTime1 % 60)
            }
        }
        return {
            'hour': theTime2 < 10 ? '0' + theTime2 : theTime2,
            'min': theTime1 < 10 ? '0' + theTime1 : theTime1,
            'sec': theTime < 10 ? '0' + theTime : theTime
        }
    };

</script>

<?php  } ?>