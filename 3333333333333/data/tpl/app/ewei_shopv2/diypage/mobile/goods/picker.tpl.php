<?php defined('IN_IA') or exit('Access Denied');?><style>
    .option-picker .member-price{
        background: #000;
        color: #fece67;
        border-radius:0.1rem;
        height: 0.65rem;
        line-height: 0.65rem ;
        font-size: 0.45rem;
        padding: 0 0.2rem;
        display: inline-block;
        position: relative;
        margin-left:0.25rem;
        vertical-align:middle;
    }
    .option-picker .member-price span{
        position: absolute;
        left: -0.2rem;
        top: 0;
        width: 0.25rem;
        height: 0.25rem;
        border: 0.25rem solid #000;
        border-color:  #000 transparent transparent transparent;
        display: inline-block;
    }
</style>
<script type="text/html" id="option-picker">
    <div class="option-picker ">
        <div class="option-picker-inner">
            <div class="option-picker-cell goodinfo">
                <div class="closebtn"><i class="icon icon-guanbi1"></i></div>
                <div class="img"><img class='thumb' src="<%goods.thumb%>" /></div>
                <div class="info info-price text-danger">
                    <?php  if($threen &&(!empty($threenprice['price'])||!empty($threenprice['discount']))) { ?>
                    <span>&yen<span class=''>
			<?php  if(!empty($threenprice['price'])) { ?>
			<?php  echo $threenprice['price'];?>
			<?php  } else if(!empty($threenprice['discount'])) { ?>
			<?php  echo $threenprice['discount']*$goods['minprice'];?>
			<?php  } ?>
			<?php  } else { ?>
			<span>
				￥
				<span class='price<?php  if($_SESSION["taskcut"]) { ?>-task<?php  } ?>'>
				<?php  if($taskGoodsInfo) { ?>
				<?php  echo $taskGoodsInfo['price'];?>
				<?php  } else { ?>
				<%if goods.ispresell>0 && (goods.preselltimeend == 0 || goods.preselltimeend > goods.thistime)%>
				<%goods.presellprice%>
				<%else%>
				<%if goods.maxprice == goods.minprice%><%goods.minprice%><%else%><%goods.minprice%>~<%goods.maxprice%><%/if%>
				<%/if%>
					<?php  } ?>
				</span>
			</span>

			<?php  } ?>
			<?php  if($goods['cansee']>0  &&  $goods['seecommission']>0 ) { ?>
			<span class="option-Commission" > <?php echo empty($goods['seetitle'])?'预计最高佣金':$goods['seetitle']?>￥<span><?php  echo $goods['seecommission'];?></span></span>
			<?php  } ?>
                </div>
                <div class="info info-total" style="    margin-left: 0.15rem;">
                    <%if seckillinfo==false || ( seckillinfo && seckillinfo.status==1) %>
                        <%if goods.member_discount >0 && goods.show==0%>
                            <!--非多规格的展示-->
                    <span class=' text-danger' style='color:#c8952a'> ¥ <% goods.member_discount%></span>
                    <span class='member-price'>会员价 <span></span></span>
                    <!--<span class='member_discount' style="border: red 1px solid;color: red;margin-right: 5px;"> 会员价￥ <% goods.member_discount%></span>-->
                        <%/if%>
                   <%if goods.show==1%>
                    <!--多规格的展示-->
                    <div class="member_discount"  style="display: none;">
                        <span class=' text-danger' style='color:#c8952a;'> ¥ <% goods.member_discount%></span>
                        <span class='member-price' >会员价 <span></span></span>
                    </div>
                    <%/if%>
                    <span>
                    <%if goods.showtotal != 0%>
                        <%if goods.unite_total != 0%>总<%/if%>库存 <span class='total'><%goods.total%></span> 件<%/if%>
                    <%/if%>
                    </span>
                </div>
                <div class="info info-titles"><%if specs.length>0%>请选择规格<%/if%></div>
            </div>
            <div class="option-picker-options">
                <%each specs as spec%>
                <div class="option-picker-cell option spec">
                    <div class="title"><%spec.title%></div>
                    <div class="select">
                        <%each spec.items as item%>
                        <a href="javascript:;" class="btn btn-default btn-sm nav spec-item spec-item<%item.id%>" data-id="<%item.id%>" data-thumb="<%item.thumb%>"> <%item.title%> </a>
                        <%/each%>
                    </div>
                </div>
                <%/each%>
                <%=diyformhtml%>

                <%if seckillinfo==false || ( seckillinfo && seckillinfo.status==1) %>
                <div class="fui-cell-group" style="margin-top:0">
                    <div class="fui-cell">
                        <div class="fui-cell-label">数量</div>
                        <div class="fui-cell-info"></div>
                        <div class="fui-cell-mask noremark">
                            <?php  if($_SESSION['taskcut']) { ?>
                            <!--任务中心特惠商品-->
                            x 1<?php  } else { ?>
                            <div class="fui-number">
                                <div class="minus">-</div>
                                <input class="num" type="tel" name="" value="<%if goods.minbuy>0%><%goods.minbuy%><%else%>1<%/if%>"/>
                                <div class="plus ">+</div>
                            </div>
                            <?php  } ?>
                        </div>
                    </div>
                    <%else%>
                    <input class="num" type="hidden" name="" value="1"/>
                    <%/if%>
                </div>

                <%if  goods['cangift'] ==true && goods['giftinfo']%>
                <div class="fui-cell-group" style="margin-top:0">
                    <div class="fui-cell">
                        <div class="fui-cell-label">请选择赠品</div>
                        <div class="fui-cell-text dispatching">
                            <%if  goods.gifttotal ==1%>
                            <div class="dispatching-info" style="max-height:12rem;overflow-y: auto ">
                                <%each goods.giftinfo as item%>
                                <div class="fui-list goods-item align-start" data-giftid="<%item.id%>">
                                    <div class="fui-list-media">
                                        <input type="radio" name="checkbox" class="fui-radio fui-radio-danger gift-item" checked value="<%item.id%>" style="display: list-item;">
                                    </div>
                                    <div class="fui-list-inner">
                                        <%each item.gift as gift%>
                                        <div class="fui-list">
                                            <div class="fui-list-media image-media" style="position: initial;">
                                                <a href="javascript:void(0);">
                                                    <img class="round" src="<%gift.thumb%>" data-lazyloaded="true">
                                                </a>
                                            </div>
                                            <div class="fui-list-inner">
                                                <a href="javascript:void(0);">
                                                    <div class="text">
                                                        <%gift.title%>
                                                    </div>
                                                </a>
                                                <%if gift.total <=0%>
                                                <span style="color:red;">售罄</span>
                                                <%/if%>
                                            </div>
                                            <div class='fui-list-angle'>
                                                <span class="price">&yen;<del class='marketprice'><%gift.marketprice%></del></span>
                                            </div>
                                        </div>
                                        <%/each%>
                                    </div>
                                </div>
                                <%/each%>
                            </div>
                            <%else%>
                            <div class="dispatching-info" style="max-height:12rem;overflow-y: auto ">
                                <%each goods.giftinfo as item%>
                                <div class="fui-list goods-item align-start" data-giftid="<%item.id%>">
                                    <div class="fui-list-media">
                                        <input type="radio" name="checkbox" class="fui-radio fui-radio-danger gift-item" value="<%item.id%>" style="display: list-item;">
                                    </div>
                                    <div class="fui-list-inner">
                                        <%each item.gift as gift%>
                                        <div class="fui-list">
                                            <div class="fui-list-media image-media" style="position: initial;">
                                                <a href="javascript:void(0);">
                                                    <img class="round" src="<%gift.thumb%>" data-lazyloaded="true">
                                                </a>
                                            </div>
                                            <div class="fui-list-inner">
                                                <a href="javascript:void(0);">
                                                    <div class="text">
                                                        <%gift.title%>
                                                    </div>
                                                </a>
                                            </div>
                                            <div class='fui-list-angle'>
                                                <span class="price">&yen;<del class='marketprice'><%gift.marketprice%></del></span>
                                            </div>
                                        </div>
                                        <%/each%>
                                    </div>
                                </div>
                                <%/each%>
                            </div>
                            <%/if%>
                        </div>
                    </div>
                </div>
                <%/if%>
            </div>
            <!-- <?php  if(is_weixin()) { ?><%if height == 2436 && width == 1125%>iphonex<%/if%><?php  } ?>-->
            <div style="z-index: 2;"  class="fui-navbar " >
                    <a href="javascript:;" class="nav-item btn cartbtn" style='display:none'>加入购物车</a>
                    <a href="javascript:;" class="nav-item btn buybtn"  style='display:none' >立刻购买</a>
                    <a href="javascript:;" class="nav-item btn confirmbtn"  style='display:none'>确定</a>
            </div>
        </div>
    </div>
</script>
<script type="text/html" id="followqrcode">
    <div class="follow_hidden">
        <div id="alert-mask"></div>
        <div class="verify-pop">
            <div class="close"><i class="icon icon-roundclose"></i></div>
            <div class="qrcode" style="height: 250px;">
                <img class="qrimg" src="" />
            </div>
            <div class="tip">
                <p class="text-white">长按识别二维码关注</p>
                <p class="text-warning" style="color: <?php  echo $diyfollowbar['style']['highlight'];?>;"><?php  echo $_W['shopset']['shop']['name'];?></p>
            </div>
        </div>
    </div>
</script>

<script language='javascript'>
    var width = window.screen.width *  window.devicePixelRatio;
    var height = window.screen.height *  window.devicePixelRatio;
    var h = document.body.offsetHeight *  window.devicePixelRatio;

    if(height==2436 && width==1125){
        $(".fui-navbar,.cart-list,.fui-footer,.fui-content.navbar").addClass('iphonex')
    }
    if(h == 1923){
        $(".fui-navbar,.cart-list,.fui-footer,.fui-content.navbar").removeClass('iphonex');
    }
    $(function(){
        $(document).on("blur", '.option-picker input,.option-picker select, .option-picker textarea',function (e) {
            $('.option-picker .btn').trigger('focus');
        });
    })
</script>
<?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('_account', TEMPLATE_INCLUDEPATH)) : (include template('_account', TEMPLATE_INCLUDEPATH));?>